<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'item_id',
    ];

    protected $table = 'item_user';

    // リレーション
    public function user () {
        return $this->belongsTo(User::class);
    }

    public function item () {
        return $this->belongsTo(Item::class);
    }
}
