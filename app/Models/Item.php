<?php

namespace App\models;

use App\Models\FinState;
use App\Models\ItemFinStat;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $guarded = [];




    public function following()
    {
        return $this->belongsTo(Item::class, 'follow_item_id', 'code');
    }

    public function itemCopmPrdVals()
    {
        return $this->hasMany(ItemCopmPrdVal::class, 'item_id');
    }


    public function statFins()
    {
        return $this->belongsToMany(ItemFinStat::class, 'item_id', 'fin_stat_id');
    }

}
