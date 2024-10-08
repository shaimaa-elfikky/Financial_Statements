@extends('admin.master')

@section('title' ,__('keywords.edit_item_comp_prd_val'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
            <h2 class="page-title">{{__('keywords.edit_item_comp_prd_val')}}</h2>

            </div>

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('item_comp_prd_val.update',['item_comp_prd_val'=>$item_comp_prd_val])}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <x-form-label title="periods"></x-form-label>
                        <select class="form-control" name="period_id">
                                <option value="">اختر</option>
                            @foreach($periods as $item)
                                    <option value="{{ $item->id }}"{{ $item->id  == $item_comp_prd_val->period_id ? 'selected' : '' }}>{{ $item->date_from }} - {{ $item->date_to}}</option>
                            @endforeach
                        </select>
                    </div>
                        <x-validation-error field="period_id"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <x-form-label title="companies"></x-form-label>
                        <select class="form-control" name="company_id">
                                <option value="">اختر</option>
                            @foreach($companies as $item)
                                    <option value="{{ $item->id }}"{{ $item->id   == $item_comp_prd_val->company_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                        <x-validation-error field="company_id"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <x-form-label title="items"></x-form-label>
                        <select class="form-control" name="item_id">
                                <option value="">اختر</option>
                            @foreach($items as $item)
                                    <option value="{{ $item->id }}"{{$item->id   ==  $item_comp_prd_val->item_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                        <x-validation-error field="item_id"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <x-form-label title="arbitrage_value"></x-form-label>
                        <input type="text" id="arbitrage_value" name="arbitrage_value" value="{{$item_comp_prd_val->arbitrage_value}}" class="form-control" placeholder="{{__('keywords.arbitrage_value')}}">

                    </div>
                    <x-validation-error field="arbitrage_value"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <x-form-label title="initial_budget_value"></x-form-label>
                        <input type="text" id="initial_budget_value" name="initial_budget_value" value="{{$item_comp_prd_val->initial_budget_value}}" class="form-control" placeholder="{{__('keywords.initial_budget_value')}}">

                    </div>
                    <x-validation-error field="initial_budget_value"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <x-form-label title="approved_budget_value"></x-form-label>
                        <input type="text" id="approved_budget_value" name="approved_budget_value" value="{{$item_comp_prd_val->approved_budget_value}}" class="form-control" placeholder="{{__('keywords.approved_budget_value')}}">

                    </div>
                    <x-validation-error field="approved_budget_value"></x-validation-error>
                    </div>
                    <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.edit_item_comp_prd_val')}}</button>
                </form>


            </div>

            </div>
        </div>
    </div>
</div>

@endsection
