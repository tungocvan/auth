<?php

namespace modules\Groups\src\Models;

use Modules\Auth\src\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groups extends Model
{
    use HasFactory;
   //protected $table = "";
   //protected $primaryKey = "id";
   //protected $fillable = [];
   //protected $timestamps = true;
   //const CREATED_AT ="created_at";
   //const UPDATED_AT ="updated_at";
   public function users(){
        return $this->hasMany(User::class);
   }

  
}
