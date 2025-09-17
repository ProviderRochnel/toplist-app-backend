<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected  $primaryKey = 'brand_id';
    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_image',
        'description',
        'bonus_message',
        'tag',
        'isNew',
        'rating',
    ];

    protected $appends = ['brand_image_url'];

    public function getBrandImageUrlAttribute(){
        return $this->brand_image ? asset('storage/'. $this->brand_image) : null;
    }
}
