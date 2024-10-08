<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=  Company::paginate(10);

        return view('admin.companies.index' ,get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create' ,get_defined_vars());
    }



    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        Company::create($data);
        return redirect()->route('companies.index')->with('success',__('keywords.created_successfully'));
    }



    
    public function show(Company $company)
    {
        //
    }


    public function edit(Company $company)
    {


        return view('admin.companies.edit',get_defined_vars());
    }


    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        $company->update($data);
        return redirect()->route('companies.index')->with('success',__('keywords.updated_successfully'));
    }


    public function destroy(Company $company)
    {

        $company->delete();
        return redirect()->route('companies.index')->with('success', __('keywords.deleted_successfully'));
    }
}
