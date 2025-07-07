<?php

namespace App\Models;

use CodeIgniter\Model;

class ViewsModel extends Model
{
    protected $table      = 'views';
    protected $primaryKey = 'id';

    protected $allowedFields = ['date_views', 'visitor_ip', 'id_article'];
}
