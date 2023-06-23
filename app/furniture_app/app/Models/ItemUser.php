<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemUser extends Model
{
    use HasFactory;

    protected $table = 'item_user';

    protected $fillable = [
        'quantity',
        'item_id',
    ];


    // リレーション
    public function user () {
        return $this->belongsTo(User::class);
    }
    public function item () {
        return $this->belongsTo(Item::class);
    }
}