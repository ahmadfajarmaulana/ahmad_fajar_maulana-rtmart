<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['image_src'];

    public function getImageSrcAttribute(){
        $urlPath = assetURL("storage/payment")."/";
        $fileName = $this->upload_image;
        $url = $urlPath.$fileName ;
        return $fileName ? $url : null;
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id','order_id');
    }
}
