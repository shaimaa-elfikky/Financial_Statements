<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemFinStatRequest;
use App\Models\FinState;
use App\models\Item;
use App\Models\ItemFinStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemFinStatController extends Controller
{


    public function index(Request $request)
    {

        $financialStateId = $request->input('fin_state');
        // dd($financialStateId);
        $item_fin_stats = ItemFinStat::with('item') // Eager load item relationship
            ->where('fin_stat_id', $financialStateId)
            ->get();

        // dd($itemFinStats);
        return view('admin.item-fin-stats.index', get_defined_vars());
    }





    public function create()
    {
        $items = Item::all();
        // dd($items);
        return view('admin.item-fin-stats.create', get_defined_vars());
    }

    


    public function store(StoreItemFinStatRequest $request)
    {

        // Check if the combination of 'fin_stat_id' and 'item_id' already exists
        try {
            $existingRecord = ItemFinStat::where('fin_stat_id', $request->input('fin_stat_id'))
                ->where('item_id', $request->input('item_id'))
                ->exists();


            if ($existingRecord) {
                return redirect()->back()->withErrors(['message' => 'Duplicate entry found.']);
            }

            $data = $request->validated();

            $financialStateId = $request->input('fin_stat_id');

            ItemFinStat::create($data);

            $redirectUrl = route('item-fin-stats.index') . '?fin_state=' . $financialStateId;

            return redirect()->to($redirectUrl)->with('success', __('keywords.created_successfully'));
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }


    public function destroy(ItemFinStat $item_fin_stat)
    {
        $financialStateId = request()->input('fin_state');
        //dd($financialStateId);
        $item_fin_stat->delete();
        $redirectUrl = route('item-fin-stats.index') . '?fin_state=' . $financialStateId;
        return redirect()->to($redirectUrl)->with('success', __('keywords.deleted_successfully'));
    }
}
