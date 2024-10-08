@extends('admin.master')

@section('title' ,__('keywords.edit_periods'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-periods-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.edit_periods')}}</h2>

            </div>

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('periods.update',['period'=>$period])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="date_from"></x-form-label>
                        <input type="date" id="date_from" name="date_from" value={{$period->date_from}} class="form-control" placeholder="{{__('keywords.date_from')}}">
                      </div>
                      <x-validation-error field="date_from"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                       <x-form-label title="date_to"></x-form-label>
                        <input type="date" id="date_to" name="date_to" value={{$period->date_to}} class="form-control" placeholder="{{__('keywords.date_to')}}">
                      </div>
                      <x-validation-error field="date_to"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="fin_year"></x-form-label>
                        <input type="text" id="fin_year" name="fin_year" value={{$period->fin_year}}  class="form-control" placeholder="{{__('keywords.fin_year')}}">
                      </div>
                      <x-validation-error field="fin_year"></x-validation-error>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.edit_periods')}}</button>
                </form>

            </div>

            </div>
        </div>
    </div>
</div>

@endsection
