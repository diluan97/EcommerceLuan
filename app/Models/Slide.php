<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\BeautyLink;
use App\Helpers\SearchTrait;
class Slide extends Model
{
    use BeautyLink, SearchTrait;

    public static $urlAdminEdit = 'admin_slide.edit';
    public static $urlAdminShow = 'admin_slide.show';
    public static $urlAdminDestroy = 'admin_slide.destroy';
    public static $urlAdminUpdate = 'admin_slide.update';

    protected $table = 'sliders';
    protected $timestamp = true;
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];
    public function getStatus()
    {
        if ($this->status == 1) {
            echo "Hoạt Động";
        } else {
            echo "Chưa Hoạt Động";
        }
    }
}
