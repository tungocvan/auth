<?php

namespace modules\Posts\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content'
    ];

   //protected $table = "";
   //protected $primaryKey = "id";
   //protected $fillable = [];
   //protected $timestamps = true;
   //const CREATED_AT ="created_at";
   //const UPDATED_AT ="updated_at";
}
