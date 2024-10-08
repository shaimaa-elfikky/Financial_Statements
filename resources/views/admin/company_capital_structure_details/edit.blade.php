@extends('admin.master')

@section('title', __('keywords.company_capital_structure_details'))
@section('content')




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
                    <h2 class="page-title">{{ __('keywords.company_capital_structure_details') }}</h2>

                </div>
                       @if ($errors->has('stock_values'))
                <div class="alert-danger">
                   <span>{{$errors->first('stock_values')}}</span>
                </div>
            @endif
                {{-- <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group mb-6 text-center">
                                <label class="form-label" style="font-weight: bold; color: #333;">{{__('keywords.company_has_structure')}}</label>
                                <span class="d-block font-weight-bold text-dark">{{$companyName}}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-6 text-center">
                                <label class="form-label" style="font-weight: bold; color: #333;">{{__('keywords.apply_date')}}</label>
                                <span class="d-block font-weight-bold text-dark">{{$companyData['apply_date'] }}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-6 text-center">
                                <label class="form-label" style="font-weight: bold; color: #333;">{{__('keywords.total_stock_num')}}</label>
                                <span class="d-block font-weight-bold text-dark">{{$companyData['total_stock_num']}}</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-6 text-center">
                                <label class="form-label" style="font-weight: bold; color: #333;">{{__('keywords.total_stock_val')}}</label>
                                <span class="d-block font-weight-bold text-dark">{{$companyData['total_stock_val']}}</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="card shadow" style="background-color:lightgrey;">
                <div class="card-body">
                <form action="{{ route('company_capital_structure_details.update', $companyCapitalStructureDetail) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                            <input class="text" value="{{$companyCapitalStructureDetail->comp_cap_struct_id}}" name="comp_cap_struct_id" hidden />
                                    {{-- <input value="{{$companyCapitalStructureDetail->id}}" name="id"  /> --}}
                               <input value="{{request()->input('company_id')}}" name="company_id"  hidden/>
                            <div class="row">
                         <div class="col-md-3">
                        <div class="form-group mb-3">
                        <x-form-label title="invest_company_id"></x-form-label>
                        <select class=" form-control"  data-live-search="true"
                                    name="invest_company_id" data-size="10" title="أختر">
                                     @foreach ($companies as $item)
                                        <option value="{{ $item->id }}"
                                           {{ $item->id  == $companyCapitalStructureDetail->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                        </select>
                        <x-validation-error field="invest_company_id"></x-validation-error>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group mb-3">
                    <x-form-label title="invest_stock_num"></x-form-label>
                        <input type="text" id="name" name="invest_stock_num" value="{{$companyCapitalStructureDetail->invest_stock_num}}"  class="form-control" placeholder="{{__('keywords.apply_date')}}">
                    </div>
                    <x-validation-error field="invest_stock_num"></x-validation-error>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                        <x-form-label title="invest_stock_val"></x-form-label>
                        <input type="text" id="code" name="invest_stock_val" value="{{$companyCapitalStructureDetail->invest_stock_val}}" class="form-control" placeholder="{{__('keywords.total_stock_num')}}">
                    </div>
                        <x-validation-error field="invest_stock_val"></x-validation-error>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                        <x-form-label title="minority_fl"></x-form-label>
                        <select id="inputState5" class="form-control" name="minority_fl">
                            <option value="0" {{ $item->minority_fl == 0 ? 'selected' : '' }}>  لا  </option>
                            <option value="1" {{ $item->minority_fl == 1 ? 'selected' : '' }}>   أقليه</option>


                        </select>

                        </div>
                        <x-validation-error field="calc_fl"></x-validation-error>
                    </div>

                    </div>
                     <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.edit.company_capital_structure_details')}}</button>
                </form>

                </div>

                </div>
            </div>
        </div>
    </div>

@endsection
