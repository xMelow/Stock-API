<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['customer_name', 'status', 'total'];

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }
}
