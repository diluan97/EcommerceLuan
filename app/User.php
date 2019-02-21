<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Helpers\BeautyLink;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, BeautyLink;


    public static $urlAdminEdit = 'admin_users.edit';
    public static $urlAdminShow = 'admin_users.show';
    public static $urlAdminDestroy = 'admin_users.destroy';
    public static $urlAdminUpdate = 'admin_users.update';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getRole(){
        if($this->role == 1){
            echo "Admin";
        }else{
            echo "Bình Thường";
        }
    }
}
