<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComapanyCapitaStructureDetailsStoreRequest;
use App\Http\Requests\CompanyCapitalStructureDetailsUpdateRequest;
use App\models\Company;
use App\Models\CompanyCapitalStructure;
use App\Models\CompanyCapitalStructureDetail;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CompanyCapitalStructureDetailsController extends Controller
{



    public function index(Request $request)
    {
       //dd($request);
        $companyId = $request->input('company_id');

        $companyCapitalStructureId = $request->input('id');

        $company = Company::find($companyId);


        //dd($company);
        $companyCapitalStructure = CompanyCapitalStructure::where('company_id', $companyId)->where('id', $companyCapitalStructureId)->firstOrFail();

        $companyData = [

            'apply_date'=> $companyCapitalStructure->apply_date ,

            'total_stock_num' => $companyCapitalStructure->total_stock_num,

            'total_stock_val' => $companyCapitalStructure->total_stock_val
        ];

        $companyName = $companyCapitalStructure->company->name;

        $company_capital_structure_details = CompanyCapitalStructureDetail::with('structureCompany' , 'companyName')->where('comp_cap_struct_id', $companyCapitalStructureId)->paginate(5);
        $compnyCapitalStructurDetails = CompanyCapitalStructureDetail::with('structureCompany', 'companyName')->where('comp_cap_struct_id', $companyCapitalStructureId)->get();
        $investStockValSum =   $compnyCapitalStructurDetails->sum('invest_stock_num');
        $investStockValVal =   $compnyCapitalStructurDetails->sum('invest_stock_val');
        // dd($company_capital_structure_details);

        return view('admin.company_capital_structure_details.index', get_defined_vars());
    }



    public function create(Request $request)
    {


        $companyId = $request->input('company_id');

        $companyCapitalStructureId = $request->input('id');

        $company = Company::find($companyId);

        $companyName = $company->name;

        $companyCapitalStructure = CompanyCapitalStructure::where('company_id', $companyId)->where('id', $companyCapitalStructureId)->first();

        $companyData = [

            'apply_date' => $companyCapitalStructure->apply_date,

            'total_stock_num' => $companyCapitalStructure->total_stock_num,

            'total_stock_val' => $companyCapitalStructure->total_stock_val
        ];
        $companies = Company::select('id','name')->where('id' ,'!=', $companyId)->get();
       // dd($company);

        return view('admin.company_capital_structure_details.create', get_defined_vars());
    }




    public function store(ComapanyCapitaStructureDetailsStoreRequest $request)
    {

        $company_id = $request->input('company_id');

        $rowId = $request->input('id');

        $data = $request->validated()['data'];

        //dd($request);

         $totalInvestStockNum = 0 ;
         $totalInvestStockVal = 0 ;

        foreach ($request->input('data', []) as $data) {

            $companyExsits = CompanyCapitalStructureDetail::where('invest_company_id',$data['invest_company_id'])
                                                            ->where('comp_cap_struct_id', $data['comp_cap_struct_id'])
                                                            ->exists();
                if($companyExsits)
                {
                return redirect()->back()->withErrors(['invest_company_id'=>'لقد تم اختيار هذه الشركة من قبل ']);

                }else{

                    $totalInvestStockNum  += $data['invest_stock_num'];
                    $totalInvestStockVal  += $data['invest_stock_val'];

                    $companyCapitalStructure = CompanyCapitalStructure::find($company_id);

                        if ($totalInvestStockNum > $companyCapitalStructure->total_stock_num || $totalInvestStockVal >  $companyCapitalStructure->total_stock_val) {
                            return redirect()->back()->withErrors(['stock_values' => 'اجمالى الاسهم او قيمتها يتجاوز الحد المسموح به']);
                        }

                CompanyCapitalStructureDetail::create([
                    'comp_cap_struct_id'         => $data['comp_cap_struct_id'],
                    'invest_company_id'          => $data['invest_company_id'],
                    'invest_stock_num'           => $data['invest_stock_num'],
                    'invest_stock_val'           => $data['invest_stock_val'],
                    'minority_fl' => $data['minority_fl'],
                ]);
                }

        }



        return redirect()->route('company_capital_structure_details.index',['id'=> $rowId , 'company_id' => $company_id])->with('success' ,__('keywords.created_successfully'));

    }




    public function show($id)
    {
        //
    }





    public function edit(CompanyCapitalStructureDetail $companyCapitalStructureDetail)
    {


        $companyId = $companyCapitalStructureDetail->comp_cap_struct_id;


        $companyCapitalStructureId = $companyCapitalStructureDetail->id;


        $company = Company::find($companyId);


        $companies = Company::select('id', 'name')->where('id', '!=', $companyId)->get();


        return view('admin.company_capital_structure_details.edit',compact('companyCapitalStructureDetail' , 'companies'));
    }




    public function update(CompanyCapitalStructureDetailsUpdateRequest $request, CompanyCapitalStructureDetail $companyCapitalStructureDetail)
    {

      // dd($request);

        $data = $request->validated();

        $companyId = $request->comp_cap_struct_id;

        $companyCapitalStructure = CompanyCapitalStructure::find($companyId);

        $companyExsits = CompanyCapitalStructureDetail::where('invest_company_id', $data['invest_company_id'])
        ->where('comp_cap_struct_id', $data['comp_cap_struct_id'])
        ->exists();
        if ($companyExsits) {
            return redirect()->back()->withErrors(['invest_company_id' => 'لقد تم اختيار هذه الشركة من قبل ']);
        } else {

                if ($request->invest_stock_num > $companyCapitalStructure->total_stock_num || $request->invest_stock_val >  $companyCapitalStructure->total_stock_val) {

                    return redirect()->back()->withErrors(['stock_values' => 'اجمالى الاسهم او قيمتها يتجاوز الحد المسموح به']);
                }


        $companyCapitalStructureDetail->update($data);
            }

        return redirect()->route('company_capital_structure_details.index',['id'=> $request->comp_cap_struct_id, 'company_id' =>  $request->company_id])->with('success',(__('keywords.updated_successfully')));
    }



    public function destroy(CompanyCapitalStructureDetail $companyCapitalStructureDetail ,Request $request)
    {


        $companyCapitalStructureDetail->delete();


        return redirect()->route('company_capital_structure_details.index', ['id' => $companyCapitalStructureDetail->comp_cap_struct_id, 'company_id' =>  $request->company_id])->with('success', (__('keywords.deleted_successfully')));
    }
}
