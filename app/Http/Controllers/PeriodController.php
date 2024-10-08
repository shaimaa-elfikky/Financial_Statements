<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Models\Period;
//use Illuminate\Http\Request;

class periodController extends Controller
{



    public function index()
    {

        $periods= Period::paginate(5);
        return view('admin.periods.index',get_defined_vars());
    }


    public function create()
    {
        return view('admin.periods.create', get_defined_vars());
    }



    public function store(StorePeriodRequest $request)
    {
        //dd($request);
        $data = $request->validated();

        $period = new Period;
        $period->date_from = $data['date_from'];
        $period->date_to = $data['date_to'];
        $period->fin_year = $data['fin_year'];
        $period->save();
        return redirect()->route('periods.index')->with('success', __('keywords.created_successfully'));
    }



    public function show($id)
    {
        //
    }


    public function edit(Period $period)
    {
        return view('admin.periods.edit', get_defined_vars());
    }


    public function update(UpdatePeriodRequest $request, Period $period)
    {

        //dd($period);
        $data = $request->validated();

        $period->update($data);
        return redirect()->route('periods.index')->with('success', __('keywords.updated_successfully'));
    }


    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('periods.index')->with('success', __('keywords.deleted_successfully'));
    }
}
