@extends('admin.master')

@section('title', __('keywords.company_capital_structure'))
@section('content')




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
                    <h2 class="page-title">{{ __('keywords.company_capital_structure') }}</h2>

                </div>

                <div class="card shadow" style="background-color:lightgrey;">
                <div class="card-body">
                <form action="{{ route('company_capital_structure.update', ['company_capital_structure' => $company_capital_structure]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                            <input class="text" value="{{$company_capital_structure->company_id}}" name="company_id" hidden/>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                    <x-form-label title="apply_date"></x-form-label>
                        <input type="date" id="name" name="apply_date" value="{{$company_capital_structure->apply_date}}"  class="form-control" placeholder="{{__('keywords.apply_date')}}">
                    </div>
                    <x-validation-error field="apply_date"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                        <x-form-label title="total_stock_num"></x-form-label>
                        <input type="text" id="code" name="total_stock_num" value="{{$company_capital_structure->total_stock_num}}" class="form-control" placeholder="{{__('keywords.total_stock_num')}}">
                    </div>
                        <x-validation-error field="total_stock_num"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <x-form-label title="total_stock_val"></x-form-label>
                        <input type="text" id="code" name="total_stock_val" value="{{$company_capital_structure->total_stock_val}}" class="form-control" placeholder="{{__('keywords.total_stock_val')}}">
                    </div>
                        <x-validation-error field="total_stock_val"></x-validation-error>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.edit.company_capital_structure')}}</button>
                </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
