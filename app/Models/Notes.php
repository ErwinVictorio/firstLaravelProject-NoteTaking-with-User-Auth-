<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
   protected $table = 'notes';

   // store the New Notes
   protected $fillable = ['title', 'note','user_id'];


   //mga create ng relationship

   public function Notes() {

      return $this->hasMany(Notes::class);
   }
}
