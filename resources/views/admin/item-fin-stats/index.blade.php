@extends('admin.master')

@section('title' ,__('keywords.item-fin-stats'))
@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-item-fin-stats-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.item-fin-stats')}}</h2>
                <div class="page-title-right">

                    <x-action-component href="{{route('item-fin-stats.create', ['fin_state' => request()->input('fin_state')])}}" type="create" text="__('keywords.add')" color="primary"></x-action-component>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-body">
                 <x-error-alert></x-error-alert>
                 <x-success-alert></x-success-alert>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="font-weight: bold;color:black;"> {{request()->input('fin_state_name')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.name')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.actions')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($item_fin_stats)> 0 )

                        @foreach($item_fin_stats as $item_fin_stat)
                        <tr>
                            <td></td>
                            <td> {{  $item_fin_stat->item->name}} </td>
                            <td style="white-space: nowrap;">

                            <x-action-component href="#" type="show" text="<i class='fe fe-edit fa-2x'></i>" color="warning"></x-action-component>
                            <x-button-component href="{{route('item-fin-stats.destroy',['item_fin_stat'=>$item_fin_stat,'fin_state'=>request()->input('fin_state')])}}" id="{{$item_fin_stat->id}}"></x-button-component>
                            </td>

                        </tr>
                        @endforeach
                        @else
                          <x-empty-alert></x-empty-alert>
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
