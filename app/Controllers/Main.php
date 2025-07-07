<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryModel;

class Main extends BaseController
{
    public function index(): string
    {
        $categoryModel = new CategoryModel();
        $articleModel = new ArticleModel();

        $data["article4"] = $articleModel->getArticleWithCategory(4);
        $data["latest_news"] = $articleModel->getArticleWithCategory(7);
        $data["news_side"] = $articleModel->getArticleWithCategory(5,"ASC");
        $data["newsPopular"] = $articleModel->getArticlePopular();
        $data["news7Popular"] = $articleModel->getArticle7Popular();
        $data["news5Popular"] = $articleModel->getArticle5Popular();
        $data["newsByCategory"] = $articleModel->getCategoryWithArticle();
        $data["category"] = $categoryModel->findAll();

        return view('main/index',$data);
    }
}
