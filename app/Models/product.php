<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\category;

class product extends Model
{
    use HasFactory;

    
    protected $table = 'products';

    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'smaill_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
    public function category()
    {
        return $this->belongsTo(category::class,'cate_id','id');
    }
}

