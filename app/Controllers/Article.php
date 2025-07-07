<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\LikesModel;
use App\Models\SharesModel;
use App\Models\ViewsModel;

class Article extends BaseController
{
    public function create($id)
    {
        $data["id"] = $id;
        $id = d_text($id);
        $modelCategory = new CategoryModel();
        $modelArticle = new ArticleModel();
        $data["category"] = $modelCategory->findAll();
        $data["data"] = $modelArticle->find($id);
        return view('article/create',$data);
    }

    public function getLink($pass)
    {
        if($pass != "160697"){
            return "Password tidak valid";
        }

        $model = new ArticleModel();
        $model->save([
            "id_category" => 0,
        ]);
        $insertID = $model->getInsertID();
        $urlArticle = base_url("article/create/".e_text($insertID));
        return "Yout Link Article is<br><br><a href='".$urlArticle."'>".$urlArticle."</a>";
    }

    public function save($id)
    {
        $id_decrypt = d_text($id);
        $thumbnail = $this->request->getFile('thumbnail');
        $writer = htmlentities($this->request->getPost('writer'));
        $title  = htmlentities($this->request->getPost('title'));
        $content   = $this->request->getPost('content');
        $category   = $this->request->getPost('category');
        if (!filter_var($category, FILTER_VALIDATE_INT)) {
            return redirect()->back()->with('message', 'Kategori tidak valid.');
        }

        $category = (int) $category;

        $newName = '';
        if ($thumbnail->isValid() && !$thumbnail->hasMoved()) {
            $mime = $thumbnail->getMimeType();
            if (in_array($mime, ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'])) {
                $newName = $thumbnail->getRandomName();

                // Ambil info gambar
                $imageInfo = getimagesize($thumbnail->getTempName());
                $originalWidth  = $imageInfo[0];
                $originalHeight = $imageInfo[1];

                $targetWidth = 800; // misalnya 800px
                $targetHeight = intval(($targetWidth / $originalWidth) * $originalHeight); // hitung tinggi yang proporsional

                // Resize dengan ukuran fix
                \Config\Services::image()
                    ->withFile($thumbnail)
                    ->resize($targetWidth, $targetHeight, false) // false = jangan maintain rasio (karena udah kita hitung manual)
                    ->save(FCPATH . 'thumbnail/' . $newName);

            } else {
                return redirect()->back()->with('message', 'File thumbnail tidak didukung!');
            }
        }


        $model = new ArticleModel();
        $data = [
            'id_category' => $category,
            'title'       => $title,
            'content'     => $content, 
            'writer'      => $writer,
        ];
        if(!empty($newName)){
            $data["thumbnail"] = $newName;
        }
        $model->update($id_decrypt, $data);

        return redirect()->to('/article/create/'.$id)->with('message', 'Artikel berhasil disimpan!');
    }

    public function view($id)
    {
        $categoryModel = new CategoryModel();
        $data["category"] = $categoryModel->findAll();
        $modelArticle = new ArticleModel();
        $data["title"] = $modelArticle->select('title')->find($id)['title'] ?? null;
        $data["news5Popular"] = $modelArticle->getArticle5Popular();
        $data["detail"] = $modelArticle->getDetailArticle($id);

        $modelComment = new CommentModel();
        $data["comment"] = $modelComment->orderBy("id","DESC")->where("id_article",$id)->findAll(6);

        $ip = $this->request->getIPAddress();
        $modelViews = new ViewsModel();


        // Cek apakah IP sudah view artikel ini hari ini
        $alreadyViewed = $modelViews->where([
            'visitor_ip' => $ip,
            'id_article' => $id,
            'date_views' => date('Y-m-d'),
        ])->first();
        
        if (!empty($id) && is_numeric($id) && !$alreadyViewed) {
            $modelViews->save([
                "date_views" => date("Y-m-d"),
                "visitor_ip" => $ip,
                "id_article" => $id,
            ]);
        }

        return view('article/view',$data);    
    }

    public function category($category)
    {
        $categoryModel = new CategoryModel();
        $data["category"] = $categoryModel->findAll();
        $data["category_name"] = $categoryModel->find($category);
        $modelArticle = new ArticleModel();
        $data["listArticle"] = $modelArticle->getArticleByCategory($category);
        $data["news5Popular"] = $modelArticle->getArticle5Popular();

        return view('article/view_category',$data);    
    }

    public function share()
    {
        $request = service('request');

        if ($this->request->isAJAX()) {
            $data = $request->getJSON(true);

            $ip = $request->getIPAddress();
            $platform = $data['platform'] ?? 'unknown';
            $id_article = $data['id_article'] ?? 0;

            if (!$id_article || !is_numeric($id_article)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid article ID']);
            }

            $model = new SharesModel();
            $model->save([
                'id_article' => $id_article,
                'share_to' => $platform,
                'visitor_ip' => $ip,
            ]);

            return $this->response->setJSON(['status' => 'ok']);
        }

        return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
    }

    public function like()
    {
        if ($this->request->isAJAX()) {
            $id_article = $this->request->getPost('id_article');
            $email      = htmlentities($this->request->getPost('email'));

            if ($id_article && $email) {
                $likesModel = new LikesModel();
                $likesModel->save([
                    'id_article' => $id_article,
                    'email' => $email,
                ]);
                return $this->response->setJSON(['status' => 'ok']);
            }
        }

        return $this->response->setJSON(['status' => 'fail']);
    }


}
