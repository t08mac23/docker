<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'img_path',
        'name',
        'height',
        'width',
        'length',
        'release_day',
        'color_id',
        'category_id',
        'plan_id',
    ];

    // リレーション
    public function master () {
        return $this->belongsTo(Master::class);
    }


}
