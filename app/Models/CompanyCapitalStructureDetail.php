<?php

namespace App\Models;

use App\models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyCapitalStructureDetail extends Model
{

    protected $table = 'comp_cap_struct_det';
    protected $guarded  = '';



    public function structureCompany()
    {
        return $this->belongsTo(CompanyCapitalStructure::class , 'comp_cap_struct_id');
    }

    public function companyName()
    {
        return $this->belongsTo(Company::class, 'invest_company_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'comp_cap_struct_id');
    }
}
