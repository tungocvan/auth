<?php

namespace modules\Modules\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;
    protected $table = "modules";
   //protected $primaryKey = "id";
   protected $fillable = ['name','title'];
   //protected $timestamps = true;
   //const CREATED_AT ="created_at";
   //const UPDATED_AT ="updated_at";
}
