<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemAnalizeCompStoreRequest;
use App\Http\Requests\ItemAnalizeCompUpdateRequest;
use App\models\Company;
use App\Models\ItemAnalizCopm;
use Illuminate\Http\Request;

class ItemAnalizCopmController extends Controller
{


    public function index(Request $request)
    {
        $item_analize_comps = ItemAnalizCopm::with('company')->where('item_comp_prd_val_id' , $request->item_comp_prd_val_id)->paginate(5);
        return view('admin.item_analize_comp.index' , get_defined_vars());
    }


    public function create()
    {
        $companies = Company::get();
        return view('admin.item_analize_comp.create' , get_defined_vars());
    }


    public function store(ItemAnalizeCompStoreRequest $request)
    {

        $itemAnalizComp = $request->validated()['data'];



        foreach($request->input('data' ,[]) as $itemAnalizeComp)
        {

            $companyExsits = ItemAnalizCopm::where('company_id', $itemAnalizeComp['company_id'])->exists();

            if($companyExsits)
            {
                return redirect()->back()->withErrors(['company_id'=>'لقد تم اختيار هذة الشركة من قبل !']);
            }else{
                ItemAnalizCopm::create([

                    'item_comp_prd_val_id' => $itemAnalizeComp['item_comp_prd_val_id'],
                    'company_id' => $itemAnalizeComp['company_id'],
                    'arbitrage_value' => $itemAnalizeComp['arbitrage_value'],
                    'initial_budget_value' => $itemAnalizeComp['initial_budget_value'],
                    'approved_budget_value' => $itemAnalizeComp['approved_budget_value'],

                ]);
            }

        }

        return redirect()->route('item_analize_comp.index',['item_comp_prd_val_id'=> $itemAnalizeComp['item_comp_prd_val_id']])->with('success' , __("keywords.created_successfully"));
    }


    public function show($id)
    {
        //
    }


    public function edit(ItemAnalizCopm $item_analize_comp)
    {

        $companies = Company::get();
        return view('admin.item_analize_comp.edit' ,get_defined_vars());
    }


    public function update(ItemAnalizeCompUpdateRequest $request, ItemAnalizCopm $item_analize_comp)
    {

        $data = $request->validated();

        $item_analize_comp->updated($data);

        return redirect()->route('item_comp_prd_val.index',['item_comp_prd_val_id' => $item_analize_comp->item_comp_prd_val_id])->with('success', __('keywords.updated_successfully'));
    }


    public function destroy(ItemAnalizCopm $item_analize_comp)
    {
        $item_analize_comp->delete();
        return redirect()->route('item_comp_prd_val.index', ['item_comp_prd_val_id' => $item_analize_comp->item_comp_prd_val_id])->with('success',__('keywords.deleted_successfully'));
    }
}
