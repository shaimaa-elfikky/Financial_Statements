<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorefinStateRequest;
use App\Http\Requests\UpdateFinStateRequest;
use App\Models\finState;
use Illuminate\Http\Request;

class FinStateController extends Controller
{




    public function index()
    {

        $fin_states = finState::paginate(5);
        return view('admin.fin-states.index',get_defined_vars());
    }



    public function create()
    {
        return view('admin.fin-states.create',get_defined_vars());
    }



    public function store(StorefinStateRequest $request)
    {
        $data = $request->validated();
        FinState::create($data);

        return redirect()->route('fin-states.index')->with('success', __('keywords.created_successfully'));
    }



    public function show($id)
    {
       //
    }



    public function edit(FinState $fin_state)
    {


        return view('admin.fin-states.edit', get_defined_vars());
    }


    public function update(UpdateFinStateRequest $request, FinState $fin_state)
    {

        $data = $request->validated();
        $fin_state->update($data);

        return  redirect()->route('fin-states.index')->with('success', __('keywords.updated_successfully'));
    }



    public function destroy(FinState $fin_state)
    {
        $fin_state->delete();
        return redirect()->route('fin-states.index')->with('success', __('keywords.deleted_successfully'));
    }
}
