@extends('admin.master')

@section('title' ,__('keywords.item_comp_prd_val'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.item_comp_prd_val')}}</h2>
                <div class="page-title-right">

                    <x-action-component href="{{route('item_comp_prd_val.create')}}" type="create" text="__('keywords.add')" color="primary"></x-action-component>
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
                            <th style="font-weight: bold;color:black;">{{__('keywords.periods')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.companies')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.items')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.arbitrage_value')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.initial_budget_value')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.approved_budget_value')}}</th>

                            <th></th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.actions')}}</th>


                        </tr>
                        </thead>
                        <tbody>
                        @if(count($item_comp_prd_vals)> 0 )
                        @foreach($item_comp_prd_vals as $key=>$item_comp_prd_val )
                        <tr>
                            <td style="background-color:lightgrey;">{{$item_comp_prd_vals->firstItem() + $loop->index}}</td>
                            <td style="color:black; font-weight:bold; white-space: nowrap;"> من:{{$item_comp_prd_val->period->date_from}} الى : {{$item_comp_prd_val->period->date_to}}</td>
                            <td style="color:black; font-weight:bold; white-space: nowrap;">{{$item_comp_prd_val->company->name}}</td>
                            <td style="color:black; font-weight:bold; white-space: nowrap;">{{$item_comp_prd_val->item->name}}</td>
                            <td>{{$item_comp_prd_val->arbitrage_value}}</td>
                            <td>{{$item_comp_prd_val->initial_budget_value}}</td>
                            <td>{{$item_comp_prd_val->approved_budget_value}}</td>

                            <td> <a class="btn btn-primary"
                                href="{{route('item_analize_comp.index' ,['item_comp_prd_val_id'=>$item_comp_prd_val->id])}}" style="white-space: nowrap;">   تحليل قيمة البند  </a>
                            </td>
                            <td style="white-space: nowrap;">
                            <x-action-component href="{{route('item_comp_prd_val.edit',['item_comp_prd_val'=>$item_comp_prd_val])}}" type="edit" text="<i class='fe fe-edit fa-2x'></i>" color="success"></x-action-component>

                            <x-action-component href="#" type="show" text="<i class='fe fe-edit fa-2x'></i>" color="warning"></x-action-component>
                            <x-button-component href="{{route('item_comp_prd_val.destroy',['item_comp_prd_val'=>$item_comp_prd_val])}}" id="{{$item_comp_prd_val->id}}"></x-button-component>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <x-empty-alert></x-empty-alert>
                        @endif
                        </tbody>
                    </table>
                        {{$item_comp_prd_vals->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

