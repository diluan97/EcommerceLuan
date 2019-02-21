<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\BeautyLink;
use App\Helpers\SearchTrait;

class Category extends Model
{
    use BeautyLink, SearchTrait;

    public static $urlAdminEdit = 'admin_category.edit';
    public static $urlAdminShow = 'admin_category.show';
    public static $urlAdminDestroy = 'admin_category.destroy';
    public static $urlAdminUpdate = 'admin_category.update';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'parent_id',
        'context_type',
        'description',
        'image'
    ];
    public function products()
    {
        return $this->hasMany('App\Models\Products\Product', 'category_id');
    }
    public function getStatus(){
        if($this->status == 1){
            echo "Hoạt Động";
        }else{
            echo "Chưa Hoạt Động";
        }
    }
}
