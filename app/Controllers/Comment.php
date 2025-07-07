<?php
namespace App\Controllers;

use App\Models\CommentModel;

class Comment extends BaseController
{
    public function submit()
    {
        $id_article = null; // Default biar gak error

        if ($this->request->isAJAX()) {
            $name     = htmlentities($this->request->getPost('name'));
            $email    = htmlentities($this->request->getPost('email'));
            $comment  = htmlentities($this->request->getPost('comment'));
            $id_article = $this->request->getPost('id_article');

            if ($id_article && is_numeric($id_article)) {
                $model = new CommentModel();
                $model->save([
                    'id_article' => $id_article,
                    'name'       => $name,
                    'email'      => $email,
                    'comment'    => $comment,
                ]);

                return $this->response->setJSON(['status' => 'ok']);
            }
        }

        return $this->response->setJSON([
            'status' => 'fail',
            'id' => $id_article
        ]);
    }

}
