<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemCompPeriodValUpdateRequest;
use App\Http\Requests\ItemCompPrdValStoreRequest;
use App\models\Company;
use App\models\Item;
use App\Models\ItemCopmPrdVal;
use App\Models\Period;
use Illuminate\Http\Request;

class ItemCompPrdValController extends Controller
{


    public function index()
    {
        //dd($request);
        $item_comp_prd_vals = ItemCopmPrdVal::with('period', 'item', 'company')->paginate(5);

        return view('admin.item_comp_prd_val.index', get_defined_vars());
    }


    public function create()
    {
        $periods = Period::get();

        $companies = Company::get();

        $items = Item::get();

        return view('admin.item_comp_prd_val.create', get_defined_vars());
    }




    public function store(ItemCompPrdValStoreRequest $request)
    {

        $itemCopmPrdValidated = $request->validated()['data'];


        foreach ($request->input('data', []) as $dataItemPrd) {

            ItemCopmPrdVal::create([

                'item_id' => $dataItemPrd['item_id'],
                'period_id' => $dataItemPrd['period_id'],
                'company_id' => $dataItemPrd['company_id'],
                'arbitrage_value' => $dataItemPrd['arbitrage_value'],
                'initial_budget_value' => $dataItemPrd['initial_budget_value'],
                'approved_budget_value' => $dataItemPrd['approved_budget_value'],

            ]);
        }

        return redirect()->route('item_comp_prd_val.index')->with('success', __('keywords.created_successfully'));
    }




    public function show($id)
    {
        //
    }




    public function edit(ItemCopmPrdVal $item_comp_prd_val)
    {

        $periods = Period::get();

        $companies = Company::get();

        $items = Item::get();

        return view('admin.item_comp_prd_val.edit', get_defined_vars());
    }




    public function update(ItemCompPeriodValUpdateRequest  $request, ItemCopmPrdVal  $item_comp_prd_val)
    {
        $data = $request->validated();

        $item_comp_prd_val->update($data);

       return redirect()->route('item_comp_prd_val.index')->with('success',__('keywords.updated_successfully'));
    }




    public function destroy(ItemCopmPrdVal  $item_comp_prd_val)
    {

        $item_comp_prd_val->delete();
        
        return redirect()->route('item_comp_prd_val.index')->with('success', __('keywords.deleted_successfully')) ;
    }
}
