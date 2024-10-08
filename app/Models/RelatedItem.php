<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatedItem extends Model
{

    protected $table = 'related_item' ;
    protected $guarded = [];


        public function item()
        {
           return $this->belongsTo(Item::class , 'item_related_id') ;
        }

}
