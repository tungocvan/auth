<?php

//namespace App\Models;
namespace modules\Auth\src\Models;

use Laravel\Sanctum\HasApiTokens;
use Modules\Groups\src\Models\Groups;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'provider_id',
        'provider',
        'group_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // protected $primaryKey = 'id';
    // public $timestamps = true;
    // const CREATED_AT ='created_at';
    // const UPDATED_AT ='updated_at';
    public function group(){
        return $this->belongsTo(Groups::class);
    }
}
