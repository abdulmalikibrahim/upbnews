<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table      = 'articles';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_category', 'title', 'thumbnail', 'content', 'date_issues', 'writer'];
    protected $useTimestamps = true;

    public function getArticleWithCategory($limit = 0, $order = "DESC")
    {
        $query = $this->select('articles.*, category.category')
                  ->join('category', 'category.id = articles.id_category')
                  ->orderBy('articles.id',$order);

        if (!empty($limit) && is_numeric($limit) && $limit > 0) {
            return $query->findAll($limit);
        }

        return $query->findAll();
    }

    public function getArticlePopular()
    {
        $query = $this->select('
            articles.*, 
            COUNT(DISTINCT views.id) AS total_views, 
            COUNT(DISTINCT comments.id) AS total_comments, 
            COUNT(DISTINCT likes.id) AS total_likes
        ')
        ->join('views', 'views.id_article = articles.id', 'left')
        ->join('comments', 'comments.id_article = articles.id', 'left')
        ->join('likes', 'likes.id_article = articles.id', 'left')
        ->groupBy('articles.id')
        ->where('articles.content != ""')
        ->orderBy('id', 'DESC');

        return $query->first();
    }

    public function getArticleByCategory($id_category)
    {
        $query = $this->select('
            articles.id,
            articles.title,
            articles.created_at,
            articles.writer,
            articles.content,
            articles.thumbnail,
            category.category,
            COUNT(DISTINCT views.id) AS total_views, 
            COUNT(DISTINCT comments.id) AS total_comments, 
            COUNT(DISTINCT likes.id) AS total_likes
        ')
        ->join('category', 'category.id = articles.id_category', 'left')
        ->join('views', 'views.id_article = articles.id', 'left')
        ->join('comments', 'comments.id_article = articles.id', 'left')
        ->join('likes', 'likes.id_article = articles.id', 'left')
        ->groupBy('articles.id')
        ->where('articles.id_category = "'.$id_category.'"')
        ->orderBy('articles.id', 'DESC');

        return $query->findAll();
    }
    
    public function getArticle7Popular()
    {
        $query = $this->select('
            articles.*, 
            COUNT(DISTINCT views.id) AS total_views, 
            COUNT(DISTINCT comments.id) AS total_comments, 
            COUNT(DISTINCT likes.id) AS total_likes
        ')
        ->join('views', 'views.id_article = articles.id', 'left')
        ->join('comments', 'comments.id_article = articles.id', 'left')
        ->join('likes', 'likes.id_article = articles.id', 'left')
        ->groupBy('articles.id')
        ->where('articles.content != ""')
        ->orderBy('total_views', 'DESC');

        return $query->findAll(7);
    }

    public function getArticle5Popular()
    {
        $query = $this->select('
            articles.*, 
            category.category,
            COUNT(DISTINCT comments.id) AS total_comments, 
            COUNT(DISTINCT likes.id) AS total_likes
        ')
        ->join('category', 'category.id = articles.id_category', 'left')
        ->join('comments', 'comments.id_article = articles.id', 'left')
        ->join('likes', 'likes.id_article = articles.id', 'left')
        ->groupBy('articles.id')
        ->where('articles.content != ""')
        ->orderBy('total_likes,total_comments', 'DESC');

        return $query->findAll(7);
    }

    public function getCategoryWithArticle()
    {
        $query = $this->select('
            articles.*, 
            category.category,
            COUNT(DISTINCT views.id) AS total_views,
            COUNT(DISTINCT comments.id) AS total_comments, 
            COUNT(DISTINCT likes.id) AS total_likes,
            COUNT(DISTINCT shares.id) AS total_shares,
        ')
        ->join('category', 'category.id = articles.id_category', 'left')
        ->join('views', 'views.id_article = articles.id', 'left')
        ->join('comments', 'comments.id_article = articles.id', 'left')
        ->join('likes', 'likes.id_article = articles.id', 'left')
        ->join('shares', 'shares.id_article = articles.id', 'left')
        ->groupBy('articles.id')
        ->where('articles.content != ""')
        ->orderBy('created_at', 'DESC');

        return $query->findAll(30);
    }

    public function getDetailArticle($id)
    {
        $query = $this->select('
            articles.*, 
            category.category,
            COUNT(DISTINCT views.id) AS total_views,
            COUNT(DISTINCT comments.id) AS total_comments, 
            COUNT(DISTINCT likes.id) AS total_likes,
            COUNT(DISTINCT shares.id) AS total_shares,
        ')
        ->join('category', 'category.id = articles.id_category', 'left')
        ->join('views', 'views.id_article = articles.id', 'left')
        ->join('comments', 'comments.id_article = articles.id', 'left')
        ->join('likes', 'likes.id_article = articles.id', 'left')
        ->join('shares', 'shares.id_article = articles.id', 'left')
        ->groupBy('articles.id')
        ->where('articles.content != ""')
        ->orderBy('created_at', 'DESC');

        return $query->find($id);
    }
}
