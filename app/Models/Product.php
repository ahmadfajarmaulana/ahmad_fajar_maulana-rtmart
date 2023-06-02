<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['image_src'];

    public function getImageSrcAttribute(){
        $urlPath = assetURL("storage/products")."/";
        $fileName = $this->image;
        $url = $urlPath.$fileName ;
        return $fileName ? $url : null;
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
