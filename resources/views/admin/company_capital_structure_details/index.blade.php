@extends('admin.master')

@section('title', __('keywords.company_capital_structure_details'))
@section('content')




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
                    <h2 class="page-title">{{ __('keywords.company_capital_structure_details') }}</h2>
                    <div class="page-title-right">

                        <x-action-component href="{!!route('company_capital_structure_details.create',['id'=>request()->input('id'),'company_id'=>request()->input('company_id')])!!}" type="create" text="__('keywords.add')"
                            color="primary"></x-action-component>
                    </div>
                </div>
            <div>
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


                <div class="card shadow">
                    <div class="card-body">
                        <x-error-alert></x-error-alert>
                        <x-success-alert></x-success-alert>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.invest_company_id') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.invest_stock_num') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.invest_stock_val') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.minority_fl') }}</th>

                                    <th style="font-weight: bold;color:black;">{{ __('keywords.actions') }}</th>


                                </tr>
                            </thead>
                            <tbody>
                                @if (count($company_capital_structure_details) > 0)
                                    @foreach ($company_capital_structure_details as $key => $company_capital_structure_detail)
                                        <tr>
                                            <td style="background-color:lightgrey;">
                                                {{ $company_capital_structure_details->firstItem() + $loop->index }}</td>
                                            <td>{{ $company_capital_structure_detail->companyName->name }}</td>
                                            <td>{{ $company_capital_structure_detail->invest_stock_num }}</td>
                                            <td>{{ $company_capital_structure_detail->invest_stock_val }}</td>
                                             @if ($company_capital_structure_detail->minority_fl  == 0)
                                              <td>
                                                لا


                                            </td>
                                               @else
                                               <td>
                                                أقليه
                                               </d>
                                              @endif

                                             <td style="white-space: nowrap;">
                                                <x-action-component
                                                    href="{{ route('company_capital_structure_details.edit', ['company_capital_structure_detail'=>$company_capital_structure_detail, 'company_id'=>request()->input('company_id')]) }}"
                                                    type="edit" text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="success"></x-action-component>

                                                <x-action-component href="#" type="show"
                                                    text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="warning"></x-action-component>
                                               <x-button-component
                                                    href="{{ route('company_capital_structure_details.destroy', ['company_capital_structure_detail'=>$company_capital_structure_detail, 'company_id'=>request()->input('company_id')]) }}"
                                                    id="{{ $company_capital_structure_detail->id }}"></x-button-component>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif
                            </tbody>
                        </table>
                     {{ $company_capital_structure_details->appends(request()->query())->links() }}
                    </div>
                </div>

                <div class="card-body">
                      <div class="alert alert-primary" role="alert">
                        <span class="fe fe-alert-circle fe-16 mr-2"></span>اجمالى عدد الاسهم :{{$investStockValSum }} </div>
                      <div class="alert alert-secondary" role="alert">
                        <span class="fe fe-alert-octagon fe-16 mr-2"></span>اجمالى قيمة الاسهم : {{$investStockValVal }} </div>
            </div>
            </div>
        </div>
    </div>


@endsection
