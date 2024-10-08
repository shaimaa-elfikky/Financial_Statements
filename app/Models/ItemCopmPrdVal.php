<?php

namespace App\Models;

use App\models\Company;
use App\models\Item;
use Illuminate\Database\Eloquent\Model;

class ItemCopmPrdVal extends Model
{
    protected $table = 'item_comp_prd_val';
    protected $guarded = [''];


    public function period()
    {

        return $this->belongsTo(Period::class);
    }


    public function item()
    {
        return $this->belongsTo(Item::class);
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
}
