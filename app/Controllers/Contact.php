<?php
namespace App\Controllers;

use App\Models\CategoryModel;

class Contact extends BaseController
{
    public function index()
    {
        $categoryModel = new CategoryModel();
        $data["category"] = $categoryModel->findAll();
        return view('main/contact_us',$data);
    }
}
