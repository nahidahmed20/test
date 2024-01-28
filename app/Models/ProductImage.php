<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    private static $productImage, $otherImages, $image, $imageName, $imageUrl, $directory, $extension;

    public static function newProductImage($otherImages, $id)
    {
        foreach ($otherImages as $otherImage)
        {
            self::$extension = $otherImage->getClientOriginalExtension();
            self::$imageName = rand(10000, 50000).'.'.self::$extension;
            self::$directory = 'upload/product-other-images/';
            $otherImage->move(self::$directory, self::$imageName);
            self::$imageUrl = self::$directory.self::$imageName;

            self::$productImage = new ProductImage();
            self::$productImage->product_id = $id;
            self::$productImage->image = self::$imageUrl;
            self::$productImage->save();

        }
    }
    public static function updateOtherProductImage($otherImages, $id)
    {
        self::deleteProductOtherImage($id);
        self::newProductImage($otherImages, $id);
    }
    public static function deleteProductOtherImage($id)
    {
        self::$otherImages = ProductImage::where('product_id', $id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
    }
}
