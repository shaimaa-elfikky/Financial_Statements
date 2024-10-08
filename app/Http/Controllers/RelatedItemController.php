<?php

namespace App\Http\Controllers;

use App\Http\Requests\RelatedItemRequestStore;
use App\Http\Requests\RelatedItemRequestUpdate;
//use App\models\Company;
use App\models\Item;
use App\Models\RelatedItem;
use Illuminate\Http\Request;

class RelatedItemController extends Controller
{



    public function index(Request $request)
    {

       // $itemName = $request->input('name');

        $itemDisplay = Item::where('id' ,$request->item_id )->firstOrfail();

        $related_items = RelatedItem::with('item')->where('item_id' , $request->input('item_id'))->paginate(5);


        return view('admin.related_item.index' , get_defined_vars());
    }




    public function create(Request $request)
    {


        $itemId = $request->input('item_id');

        $items = Item::select('id', 'name')->where('id', '!=', $itemId)->get();

        $itemDisplay = Item::where('id' ,$request->item_id )->firstOrfail();

        return view('admin.related_item.create' ,get_defined_vars());
    }




    public function store(RelatedItemRequestStore $request)
    {
        //dd(123);
        $dataValdated = $request->validated()['data'];



        foreach ($request->input('data', []) as $dataItem) {

            $itemExsits = RelatedItem::where('item_related_id', $dataItem['item_related_id'])->exists();


            if($itemExsits){

                return redirect()->back()->withErrors(['item_related_id' => 'لقد تم اختيار هذا البند من قبل']);

            }else{

                RelatedItem::create([
                    'item_id' => $dataItem['item_id'],
                    'item_related_id' => $dataItem['item_related_id'],
                    'add_subtrsct_fl' => $dataItem['add_subtrsct_fl']

                ]);

            }

        }


       return redirect()->route('related_item.index',['item_id'=> $dataItem['item_id']])->with('success',__('keywords.created_successfully'));
    }




    public function show($id)
    {
        //
    }




    public function edit(RelatedItem $related_item)
    {

        $itemId = $related_item->item_id;

        $relatedItems = Item::select('id', 'name')->where('id', '!=', $itemId)->get();
        //dd($relatedItems);
        return view('admin.related_item.edit',get_defined_vars());
    }




    public function update(RelatedItemRequestUpdate $request, RelatedItem $related_item)
    {

        $relatedDatavalidated = $request->validated();
        //dd($relatedDatavalidated);
        $relatedItemDoublicateCkeck = RelatedItem::where('item_related_id', $relatedDatavalidated['item_related_id'])
                                                        ->where('id' ,'!=', $related_item->id)->exists();

        if($relatedItemDoublicateCkeck)
        {
            return redirect()->back()->withErrors(['item_related_id' => 'لقد تم اختيار هذا البند من قبل']);

        }else{
            $related_item->update($relatedDatavalidated);
            return redirect()->route('related_item.index', ['item_id' => $related_item->item_id])->with('success', __('keywords.updated_successfully'));
        }


    }




    public function destroy(RelatedItem $related_item)
    {
        $related_item->delete();

        return redirect()->route('related_item.index', ['item_id' => $related_item->item_id])->with('success',__('keywords.deleted_successfully'));


    }
}
