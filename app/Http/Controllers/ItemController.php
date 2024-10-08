<?php

namespace App\Http\Controllers;

use App\Http\Helpers;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

class ItemController extends Controller
{




    public function index()
    {
        $items = Item::with('following')->paginate(7);


        return view('admin.items.index' ,get_defined_vars());
    }




    public function create()
    {

        $follow_item_id = Item::with('following')->get();
        //dd($follow_item_id);
        return view('admin.items.create' ,get_defined_vars());
    }



    public function store(StoreItemRequest $request)
    {
       // dd($request->all() );
        $data = $request->validated();

        $data['name'] = Helpers::arabicCharacters($data['name']);


        $existingItem = Item::whereRaw('LOWER(name) = ?', [strtolower($data['name'])])->first();

        if ($existingItem)
           {

             return redirect()->back()->withErrors(['name' => __('keywords.name_already_exists')]);
            }

        Item::create($data);


        return redirect()->route('items.index')->with('success',__('keywords.created_successfully'));

    }



    public function show(Item $item)
    {
        //
    }



    public function edit(Item $item)
    {

        $follow_item_id = Item::select('id','code','follow_item_id','name')->get();
        //dd($follow_item_id);
        return view('admin.items.edit',get_defined_vars());
    }



    public function update(UpdateItemRequest $request , Item $item)
    {
        $data = $request->validated();


        $data['name'] = Helpers::arabicCharacters($data['name']);


        $existingItem = Item::whereRaw('LOWER(name) = ?', [strtolower($data['name'])])->first();

        if ($existingItem)
           {

             return redirect()->back()->withErrors(['name' => __('keywords.name_already_exists')]);
            }

        $item->update($data);

        return redirect()->route('items.index')->with('success',__('keywords.updated_successfully'));
    }



    public function destroy(Item $item)
    {

        // Check if the item has any following items or has items in ItemCopmPrdVal
        if ($item->following()->exists() || $item->itemCopmPrdVals()->exists() ) {
            return redirect()->route('items.index')->with('error', __('keywords.cannot_delete_followed_item'));
        }

        if (Item::where('follow_item_id', $item->code)->exists()) {
            return redirect()->route('items.index')->with('error', __('keywords.cannot_delete_followed_item'));
        }
        $item->delete();

        return redirect()->route('items.index')->with('success', __('keywords.deleted_successfully'));


    }
}
