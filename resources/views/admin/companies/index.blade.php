@extends('admin.master')

@section('title' ,__('keywords.companies'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-companies-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.companies')}}</h2>
                <div class="page-title-right">

                    <x-action-component href="{{route('companies.create')}}" type="create" text="__('keywords.add')" color="primary"></x-action-component>
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
                            <th style="font-weight: bold;color:black;">{{__('keywords.name')}}</th>
                            {{-- <th style="font-weight: bold;color:black;">{{__('keywords.address')}}</th> --}}
                            <th style="font-weight: bold;white-space: nowrap;color:black;">{{__('keywords.aff_or_not')}}</th>
                            <th style="font-weight: bold;white-space: nowrap;color:black;">{{__('keywords.owner_or_not')}}</th>
                            <th style="font-weight: bold;white-space: nowrap;color:black;">{{__('keywords.is_active')}}</th>
                            {{-- <th style="font-weight: bold;white-space: nowrap;color:black;">{{__('keywords.email')}}</th>
                            <th style="font-weight: bold;white-space: nowrap;color:black;">{{__('keywords.telephone')}}</th> --}}
                            <th style="font-weight: bold;white-space: nowrap;color:black;">{{__('keywords.code')}}</th>
                            {{-- <th style="font-weight: bold;white-space: nowrap;color:black;">{{__('keywords.website')}}</th> --}}
                            <th></th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.actions')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($companies)> 0 )
                        @foreach($companies as $key=>$company )
                        <tr>
                           <td style="background-color:lightgrey;">{{$companies->firstItem() + $loop->index}}</td>
                            <td  style="font-weight: bold;white-space: nowrap;color:black;">{{$company->name}}</td>
                            {{-- <td>{{$company->address}}</td> --}}
                            @if($company->aff_or_not == 0)
                            <td>   تابعة </td>
                            @elseif($company->aff_or_not == 1)
                            <td>   شقيقة </td>
                            @else
                            <td>   أخرى </td>
                            @endif
                            @if($company->owner_or_not == 0)
                            <td>  مالكة </td>
                            @else
                            <td>  غير مالكة </td>
                            @endif
                            @if($company->is_active == 0)
                            <td>  مسموح </td>
                            @else
                            <td>  غير مسموح </td>
                            @endif
                            {{-- <td>{{$company->email}}</td>
                            <td>{{$company->telephone}}</td> --}}
                            <td>{{$company->code}}</td>
                            {{-- <td>{{$company->web_site}}</td> --}}
                           <td> <a class="btn btn-primary"
                                                    href="{{ route('company_capital_structure.index', ['company_id' => $company->id, 'company_name' =>$company->name]) }}">هيكل رأس المال</a>
                                                </td>
                            <td style="white-space: nowrap;">
                            <x-action-component href="{{route('companies.edit',['company'=>$company])}}" type="edit" text="<i class='fe fe-edit fa-2x'></i>" color="success"></x-action-component>

                            <x-action-component href="#" type="show" text="<i class='fe fe-edit fa-2x'></i>" color="warning"></x-action-component>
                            <x-button-component href="{{route('companies.destroy',['company'=>$company])}}" id="{{$company->id}}"></x-button-component>
                            </td>
                        </tr>
                        @endforeach
                        @else
                          <x-empty-alert></x-empty-alert>
                        @endif
                        </tbody>
                    </table>
                          {{$companies->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
