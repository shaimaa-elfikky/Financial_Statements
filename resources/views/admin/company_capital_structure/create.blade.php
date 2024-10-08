@extends('admin.master')

@section('title' ,__('keywords.add_new_fin_states'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.company_capital_structure')}}</h2>

            </div>


                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group mb-6 text-center">
                                <label class="form-label" style="font-weight: bold; color: #333;">{{__('keywords.company_has_structure')}}</label>
                                <span class="d-block font-weight-bold text-dark">{{$companyName}}</span>


                            </div>
                        </div>
                    </div>
                </div>

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('company_capital_structure.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="text" value="{{request()->input('company_id')}}" name="company_id" hidden/>

                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                    <x-form-label title="apply_date"></x-form-label>
                        <input type="date" id="name" name="apply_date" class="form-control" placeholder="{{__('keywords.apply_date')}}">
                    </div>
                    <x-validation-error field="apply_date"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                        <x-form-label title="total_stock_num"></x-form-label>
                        <input type="text" id="code" name="total_stock_num" class="form-control" placeholder="{{__('keywords.total_stock_num')}}">
                    </div>
                        <x-validation-error field="total_stock_num"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group mb-3">
                        <x-form-label title="total_stock_val"></x-form-label>
                        <input type="text" id="code" name="total_stock_val" class="form-control" placeholder="{{__('keywords.total_stock_val')}}">
                    </div>
                        <x-validation-error field="total_stock_val"></x-validation-error>
                    </div>
                    </div>
                    <x-button-submit></x-button-submit>
                </form>

            </div>

            </div>
        </div>
    </div>
</div>

@endsection
