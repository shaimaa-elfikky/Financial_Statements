<?php

namespace App\Models;

use App\models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyCapitalStructure extends Model
{
    protected $table = 'comp_cap_struct' ;
    protected $guarded ='' ;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
