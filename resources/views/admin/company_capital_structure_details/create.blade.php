@extends('admin.master')

@section('title' ,__('keywords.company_capital_structure_details'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.company_capital_structure_details')}}</h2>

            </div>

                <div class="container mt-5">
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
                </div>

            @if ($errors->has('invest_company_id'))
                <div class="alert-danger">
                   <span>{{$errors->first('invest_company_id')}}</span>
                </div>
            @endif

            @if ($errors->has('stock_values'))
                <div class="alert-danger">
                <span>{{$errors->first('stock_values')}}</span>
                </div>
            @endif

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('company_capital_structure_details.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <input value="{{request()->input('id')}}" name="data[0][comp_cap_struct_id]" hidden/>
                <input value="{{request()->input('id')}}" name="id" hidden />
                <input value="{{request()->input('company_id')}}" name="company_id" hidden/>

                    <div class="row">
                        <table id="detail" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="font-weight: bold;color:black;">{{__('keywords.invest_company_id')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.invest_stock_num')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.invest_stock_val')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.minority_fl')}}</th>
                            <th>
                                <a id="aadd"><i class="fe fe-plus" style="color:black;font-size:24px;"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>
                                <select class=" form-control"  data-live-search="true"
                                    name="data[0][invest_company_id]" data-size="10" title="أختر">
                                    @foreach ($companies as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == old('name') ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-validation-error field="data.0.invest_company_id"></x-validation-error>
                                </td>

                                <td>
                                <input type="text" id="name" name="data[0][invest_stock_num]" class="form-control" placeholder="{{__('keywords.invest_stock_num')}}">
                                <x-validation-error field="data.0.invest_stock_num"></x-validation-error>
                                </td>


                                <td>
                                <input type="text" id="name" name="data[0][invest_stock_val]" class="form-control" placeholder="{{__('keywords.invest_stock_val')}}">
                                <x-validation-error field="data.0.invest_stock_val"></x-validation-error>
                                </td>

                                <td>
                                <select class="form-control"   data-live-search="true"
                                        name="data[0][minority_fl]" data-size="10" title="أختر" >
                                        <option value="0"> اختر</option>
                                        <option value="1">أقليه</option>
                                        <option value="0">لا</option>
                                </select>
                                    <x-validation-error field="data.0.invest_stock_val"></x-validation-error>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <x-button-submit></x-button-submit>

                </form>

            </div>

        </div>

@endsection



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    let counter = 1;
    document.getElementById('aadd').addEventListener('click', function() {
        let tr = `<tr>
            <input value="{{ request()->input('id') }}" name="data[${counter}][comp_cap_struct_id]" hidden />
            <td>
                <select class="form-control" name="data[${counter}][invest_company_id]" required>
                    @foreach ($companies as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-validation-error field="data.${counter}.invest_company_id"></x-validation-error>
            </td>
            <td>
                <input type="text" class="form-control" name="data[${counter}][invest_stock_num]" required>
                <x-validation-error field="data.${counter}.invest_stock_num"></x-validation-error>
            </td>
            <td>
                <input type="text" class="form-control" name="data[${counter}][invest_stock_val]" required>
                <x-validation-error field="data.${counter}.invest_stock_val"></x-validation-error>
            </td>
            <td>
                <select class="form-control" name="data[${counter}][minority_fl]" required>
                    <option value="0">اختر</option>
                    <option value="1">أقليه</option>
                    <option value="0">لا</option>
                </select>
                <x-validation-error field="data.${counter}.minority_fl"></x-validation-error>
            </td>
            <td style="width:85px;">
                <button type="button" class="btn btn-danger remove"><i class="fe fe-trash"></i></button>
            </td>
        </tr>`;
        counter++;
        document.querySelector('#detail tbody').insertAdjacentHTML('beforeend', tr);
    });

    $("#detail").on("click", ".remove", function () {
      $(this).closest("tr").remove();
      });
});

</script>



