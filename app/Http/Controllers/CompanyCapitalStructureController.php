<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCapitalStructureRequest;
use App\Http\Requests\CompanyCapitalStructureStoreRequest;
use App\Http\Requests\CompanyCapitalStructureUpdateRequest;
use App\models\Company;
use App\Models\CompanyCapitalStructure;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CompanyCapitalStructureController extends Controller
{



    public function index(Request $request)
    {
       //dd($request);
       $company_capital_structures = CompanyCapitalStructure::with('company')->where('company_id', $request->company_id)->paginate(5);

       return view('admin.company_capital_structure.index', compact('company_capital_structures'));
    }



    public function create(Request $request)
    {
        $companyId = $request->input('company_id');
        $compnay = Company::find($companyId);
        $companyName = $compnay->name;
        return view('admin.company_capital_structure.create', get_defined_vars());
    }



    public function store(CompanyCapitalStructureStoreRequest $request)
    {

        $data = $request->validated();

        CompanyCapitalStructure::create($data);

        $companyId =$request->input('company_id');

        $compnay = Company::find($companyId);

        $companyName = $compnay->name ;


        $redirectRoute = route('company_capital_structure.index') . '?company_id=' . $companyId . '&company_name=' . urlencode($companyName);

        return redirect()->to($redirectRoute)->with('success',__('keywords.created_successfully'));
    }


    public function show($id)
    {
       //
    }



    public function edit(CompanyCapitalStructure $company_capital_structure)
    {

        return view('admin.company_capital_structure.edit', get_defined_vars());
    }



    public function update(CompanyCapitalStructureUpdateRequest $request, CompanyCapitalStructure $company_capital_structure)
    {

        $data = $request->validated();

        $company_capital_structure->update($data);


        $companyId = $request->input('company_id');

        $compnay = Company::find($companyId);

        $companyName = $compnay->name;

        $redirectRoute = route('company_capital_structure.index') . '?company_id=' . $companyId . '&company_name=' . $companyName;

        return redirect()->to($redirectRoute)->with('success',__('keywords.updated_successfully'));
    }



    public function destroy(CompanyCapitalStructure $company_capital_structure)
    {

        $company_capital_structure->delete();

        $companyId = $company_capital_structure->company_id ;

        $compnay = Company::find($companyId);

        $companyName = $compnay->name;

        $redirectRoute = route('company_capital_structure.index') . '?company_id=' . $companyId . '&company_name=' . $companyName;

        return redirect()->to($redirectRoute)->with('success',__('keywords.deleted_successfully'));
    }

}
