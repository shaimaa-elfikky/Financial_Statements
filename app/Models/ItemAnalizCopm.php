<?php

namespace App\Models;

use App\models\Company;
use Illuminate\Database\Eloquent\Model;

class ItemAnalizCopm extends Model
{
    protected $table = 'item_analyze_comp';

    protected $guarded = [];


    public function company()
    {
       return $this->belongsTo(Company::class , 'company_id');
    }
}
