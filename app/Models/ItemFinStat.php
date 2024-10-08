<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemFinStat extends Model
{
    protected $table = 'item_fin_stat';
    protected $guarded = [''];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
