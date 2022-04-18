<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountsModel extends Model
{
   protected $table = 'accounts';
   protected $allowedFields = [
      'fname', 'username', 'email', 'password', 'bdate', 'gender', 'status', 'bio', 'gambar'
   ];

   public function getId($id) 
   {
      return $this->where(['id' => $id])->first();
   }

}