@extends('admin.master')

@section('title', __('keywords.item_analize_comp'))
@section('content')




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="page-title">{{ __('keywords.item_analize_comp') }}</h2>
                    <div class="page-title-right">

                        <x-action-component
                            href="{{ route('item_analize_comp.create', ['item_comp_prd_val_id' => request()->input('item_comp_prd_val_id')]) }}"
                            type="create" text="__('keywords.add')" color="primary"></x-action-component>
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
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.item_analize_company') }}
                                    </th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.arbitrage_value') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.initial_budget_value') }}
                                    </th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.approved_budget_value') }}
                                    </th>

                                    <th></th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.actions') }}</th>


                                </tr>
                            </thead>
                            <tbody>
                                @if (count($item_analize_comps) > 0)
                                    @foreach ($item_analize_comps as $key => $item_analize_comp)
                                        <tr>


                                            <td style="background-color:lightgrey;">
                                                {{ $item_analize_comps->firstItem() + $loop->index }}</td>
                                            <td>{{ $item_analize_comp->company->name }}</td>
                                            <td>{{ $item_analize_comp->arbitrage_value }}</td>
                                            <td>{{ $item_analize_comp->initial_budget_value }}</td>
                                            <td>{{ $item_analize_comp->approved_budget_value }}</td>
                                            <td></td>

                                            <td style="white-space: nowrap;">
                                                <x-action-component
                                                    href="{{ route('item_analize_comp.edit', ['item_analize_comp' => $item_analize_comp ,'item_comp_prd_val_id' =>$item_analize_comp->item_comp_prd_val_id]) }}"
                                                    type="edit" text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="success"></x-action-component>

                                                <x-action-component href="#" type="show"
                                                    text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="warning"></x-action-component>
                                                <x-button-component
                                                    href="{{ route('item_analize_comp.destroy', ['item_analize_comp' => $item_analize_comp]) }}"
                                                    id="{{ $item_analize_comp->id }}"></x-button-component>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif
                            </tbody>
                        </table>
                        {{ $item_analize_comps->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
