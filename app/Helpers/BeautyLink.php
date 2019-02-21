<?php
namespace App\Helpers;

trait BeautyLink
{

    public function linkImage()
    {
        if ($this->image) {
            return asset(self::$imgPath . $this->image);
        }
        return asset('images/empty_image.jpg');
    }

    public function urlAdminEdit()
    {
        return route(self::$urlAdminEdit, ['id' => $this->id]);
    }

    public function urlAdminShow()
    {
        return route(self::$urlAdminShow, ['id' => $this->id]);
    }

    public function urlAdminDestroy()
    {
        return route(self::$urlAdminDestroy, ['id' => $this->id]);
    }

    public function urlAdminUpdate()
    {
        return route(self::$urlAdminUpdate, ['id' => $this->id]);
    }

    public function urlGuestShow()
    {
        return route(self::$urlGuestShow, ['slug' => $this->slug]);
    }
}
