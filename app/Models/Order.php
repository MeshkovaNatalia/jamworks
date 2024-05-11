<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public $timestamps = false;

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
