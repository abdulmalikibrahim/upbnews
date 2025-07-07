<?php
namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_article', 'name', 'email', 'comment', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
