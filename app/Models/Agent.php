<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ([
        'parent_id',
        'name',
        'phone',
    ]);

    public function children()
    {
        return $this->hasMany(Agent::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Agent::class, 'parent_id');
    }

    public function agentProducts()
    {
        return $this->hasMany(AgentProduct::class);
    }
}
