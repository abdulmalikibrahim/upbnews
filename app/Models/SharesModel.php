<?php

namespace App\Models;

use CodeIgniter\Model;

class SharesModel extends Model
{
    protected $table      = 'shares';
    protected $primaryKey = 'id';

    protected $allowedFields = ['visitor_ip', 'share_to', 'id_article'];
}
