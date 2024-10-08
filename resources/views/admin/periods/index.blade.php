@extends('admin.master')

@section('title' ,__('keywords.periods'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-periods-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.periods')}}</h2>
                <div class="page-title-right">

                    <x-action-component href="{{route('periods.create')}}" type="create" text="__('keywords.add')" color="primary"></x-action-component>
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
                            <th style="font-weight: bold;color:black;">{{__('keywords.date_from')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.date_to')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.fin_year')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.actions')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($periods)> 0 )
                        @foreach($periods as $key=>$period )
                        <tr>
                           <td style="background-color:lightgrey;">{{$periods->firstItem() + $loop->index}}</td>
                            <td>{{$period->date_from}}</td>
                            <td>{{$period->date_to}}</td>
                            <td>{{$period->fin_year}}</td>

                            <td style="white-space: nowrap;">
                            <x-action-component href="{{route('periods.edit',['period'=>$period])}}" type="edit" text="<i class='fe fe-edit fa-2x'></i>" color="success"></x-action-component>

                            <x-action-component href="#" type="show" text="<i class='fe fe-edit fa-2x'></i>" color="warning"></x-action-component>
                            <x-button-component href="{{route('periods.destroy',['period'=>$period])}}" id="{{$period->id}}"></x-button-component>
                            </td>
                        </tr>
                        @endforeach
                        @else
                          <x-empty-alert></x-empty-alert>
                        @endif
                        </tbody>
                    </table>
                          {{$periods->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
