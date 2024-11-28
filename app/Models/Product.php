<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ([
        'name',
    ]);

    public function agentProducts()
    {
        return $this->hasMany(AgentProduct::class, 'product_id');
    }
}
