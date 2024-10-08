@extends('admin.master')

@section('title' ,__('keywords.add_new_fin_states'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.add_new_fin_states')}}</h2>

            </div>

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('fin-states.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="name"></x-form-label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="{{__('keywords.name')}}">
                      </div>
                      <x-validation-error field="name"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                       <x-form-label title="code"></x-form-label>
                        <input type="text" id="code" name="code" class="form-control" placeholder="{{__('keywords.code')}}">
                      </div>
                      <x-validation-error field="code"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="fin_stat_type"></x-form-label>
                          <select id="inputState5" class="form-control" name="fin_stat_type">
                              <option value= "0">    قائمة شركات</option>
                              <option value= "1">  قائمة مجمعة </option>
                              <option value= "2">  بيان تحليلي</option>
                              <option value= "3">  بيان تفصيلي</option>

                            </select>

                      </div>
                      <x-validation-error field="fin_stat_type"></x-validation-error>
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
