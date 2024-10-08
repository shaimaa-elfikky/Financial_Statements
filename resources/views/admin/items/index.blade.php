@extends('admin.master')

@section('title' ,__('keywords.items'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.items')}}</h2>
                <div class="page-title-right">

                    <x-action-component href="{{route('items.create')}}" type="create" text="__('keywords.add')" color="primary"></x-action-component>
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
                            <th style="font-weight: bold;color:black;white-space: nowrap;">{{__('keywords.name')}}</th>
                            <th style="font-weight: bold;color:black;white-space: nowrap;">{{__('keywords.code')}}</th>
                            <th style="font-weight: bold;color:black;white-space: nowrap;">{{__('keywords.follow_item_id')}}</th>
                            <th style="font-weight: bold;color:black;white-space: nowrap;">{{__('keywords.calc_fl')}}</th>
                            <th style="font-weight: bold;color:black;white-space: nowrap;">{{__('keywords.analize_fl')}}</th>
                            <th style="font-weight: bold;color:black;white-space: nowrap;">{{__('keywords.show_fl')}}</th>
                            <th style="white-space: nowrap;"></th>
                            <th style="font-weight: bold;color:black;white-space: nowrap;">{{__('keywords.actions')}}</th>


                        </tr>
                        </thead>
                        <tbody>
                        @if(count($items)> 0 )
                        @foreach($items as $key=>$item )
                        <tr>
                            <td style="background-color:lightgrey;">{{$items->firstItem() + $loop->index}}</td>
                            <td style="color:black; font-weight:bold; white-space: nowrap;">{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            @if ($item->following)
                            <td>{{$item->following->name }}</td> @else
                            <td>-</td> @endif
                            @if(!isset($item->calc_fl))
                            <td>-</td>
                            @elseif($item->calc_fl == 0)
                            <td>تجميع لنفس البند من الشركات</td>
                            @elseif($item->calc_fl == 1)
                            <td>قيمة نفس البند للقابضة</td>
                            @elseif($item->calc_fl == 2)
                            <td> من بنود اخرى</td>
                            @endif
                            @if($item->analize_fl == 0)
                            <td>   لا </td>
                            @else
                            <td>   له </td>
                            @endif
                            @if($item->show_fl == 0)
                            <td>   لا يظهر </td>
                            @else
                            <td>   يظهر </td>
                            @endif
                            <td> <a class="btn btn-primary"
                                href="{{route('related_item.index' ,['item_id'=>$item->id])}}">بند مرتبط ببند فى احتساب الميزانية</a>
                            </td>
                            <td>
                            <x-action-component href="{{route('items.edit',['item'=>$item])}}" type="edit" text="<i class='fe fe-edit fa-2x'></i>" color="success"></x-action-component>

                            <x-action-component href="#" type="show" text="<i class='fe fe-edit fa-2x'></i>" color="warning"></x-action-component>
                            <x-button-component href="{{route('items.destroy',['item'=>$item])}}" id="{{$item->id}}"></x-button-component>
                            </td>
                        </tr>
                        @endforeach
                        @else
                          <x-empty-alert></x-empty-alert>
                        @endif
                        </tbody>
                    </table>
                          {{$items->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
