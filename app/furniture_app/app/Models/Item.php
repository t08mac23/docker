<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function getColorNameAttribute () {
        return config('color.'.$this->color_id);
    }

    public function getCategoryNameAttribute () {
        return config('category.'.$this->category_id);
    }

    public function getPlanNameAttribute () {
        return config('plan.'.$this->plan_id);
    }

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

    public function users() {
         return $this->belongsToMany('App\Models\User');
    }

    public function item_user () {
        return $this->hasMany(Item_user::class);
    }

}
