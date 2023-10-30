<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserSetup extends Model{
    protected $table = 'user_setup';
    
    protected $allowedFields = [
        'username',
        'allow_posting_from',
        'allow_posting_to',
        'user',
        'user_setup'
    ];
}