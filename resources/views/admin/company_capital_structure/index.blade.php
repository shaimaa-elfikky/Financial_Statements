@extends('admin.master')

@section('title', __('keywords.company_capital_structure'))
@section('content')




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
                    <h2 class="page-title">{{ __('keywords.company_capital_structure') }}</h2>
                    <div class="page-title-right">

                        <x-action-component href="{{ route('company_capital_structure.create',['company_id'=>request()->input('company_id')]) }}" type="create" text="__('keywords.add')"
                            color="primary"></x-action-component>
                    </div>
                </div>
            <div>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="form-group mb-6 text-center">
                                <label class="form-label" style="font-weight: bold; color: #333;">{{__('keywords.company_has_structure')}}</label>
                                <span class="d-block font-weight-bold text-dark">{{request()->input('company_name')}}</span>
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
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.apply_date') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.total_stock_num') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.total_stock_val') }}</th>
                                    <th></th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.actions') }}</th>


                                </tr>
                            </thead>
                            <tbody>
                                 @if (count($company_capital_structures) > 0)
                                    @foreach ($company_capital_structures as $key => $company_capital_structure)
                                        <tr>
                                            <td style="background-color:lightgrey;">
                                                {{ $company_capital_structures->firstItem() + $loop->index }}</td>
                                            <td>{{ $company_capital_structure->apply_date }}</td>
                                            <td>{{ $company_capital_structure->total_stock_num }}</td>
                                            <td>{{ $company_capital_structure->total_stock_val }}</td>

                                            <td><a class="btn btn-primary"
                                                    href="{{ route('company_capital_structure_details.index',['apply_date'=>$company_capital_structure->apply_date,
                                                   'id'=>$company_capital_structure->id,
                                                   'total_stock_num'=>$company_capital_structure->total_stock_num,
                                                   'total_stock_val'=>$company_capital_structure->total_stock_val,
                                                   'company_id'=>request()->input('company_id') ]) }}">هيكل رأس المال لشركة (تفاصيل)</a>
                                            </td>


                                            <td style="white-space: nowrap;">
                                                <x-action-component
                                                    href="{{ route('company_capital_structure.edit', ['company_capital_structure'=>$company_capital_structure]) }}"
                                                    type="edit" text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="success"></x-action-component>

                                                <x-action-component href="#" type="show"
                                                    text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="warning"></x-action-component>
                                                <x-button-component
                                                    href="{{ route('company_capital_structure.destroy', ['company_capital_structure'=>$company_capital_structure]) }}"
                                                    id="{{ $company_capital_structure->id }}"></x-button-component>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif
                            </tbody>
                        </table>
                   {{ $company_capital_structures->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
