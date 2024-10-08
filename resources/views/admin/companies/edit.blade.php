@extends('admin.master')

@section('title' ,__('keywords.edit_companies'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-companies-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.edit_companies')}}</h2>

            </div>

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('companies.update',['company'=>$company])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="name"></x-form-label>
                        <input type="text" id="name" name="name" value="{{$company->name}}" class="form-control" placeholder="{{__('keywords.name')}}">
                      </div>
                      <x-validation-error field="name"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                       <x-form-label title="address"></x-form-label>
                        <input type="text" id="address" name="address" value="{{$company->address}}"class="form-control" placeholder="{{__('keywords.address')}}">
                      </div>
                      <x-validation-error field="address"></x-validation-error>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="aff_or_not"></x-form-label>
                        <select id="inputState5" class="form-control"  name="aff_or_not">
                              <option value= "0"{{ $company->aff_or_not == 0 ? 'selected' : '' }}>   تابعة </option>
                              <option value= "1" {{ $company->aff_or_not == 1 ? 'selected' : '' }}>    شقيقة</option>
                              <option value= "2" {{ $company->aff_or_not == 2 ? 'selected' : '' }}>    أخرى</option>
                        </select>

                      </div>
                      <x-validation-error field="aff_or_not"></x-validation-error>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="owner_or_not"></x-form-label>
                        <select id="inputState5" class="form-control" name="owner_or_not">
                              <option value= "0" {{ $company->owner_or_not == 0 ? 'selected' : '' }}>   مالكة </option>
                              <option value= "1" {{ $company->owner_or_not == 1 ? 'selected' : '' }}>   غير مالكة</option>
                        </select>

                      </div>
                      <x-validation-error field="owner_or_not"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="is_active"></x-form-label>
                        <select id="inputState5" class="form-control" name="is_active">
                              <option value= "0" {{ $company->is_active == 0 ? 'selected' : '' }}>   مسموح </option>
                              <option value= "1" {{ $company->is_active == 1 ? 'selected' : '' }}>   غير مسموح</option>
                        </select>

                      </div>
                      <x-validation-error field="is_active"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="code"></x-form-label>
                        <input type="text" id="code" name="code" value="{{$company->code}}" class="form-control" placeholder="{{__('keywords.code')}}">
                      </div>
                      <x-validation-error field="code"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="email"></x-form-label>
                        <input type="text" id="email" name="email" value="{{$company->email}}" class="form-control" placeholder="{{__('keywords.email')}}">
                      </div>
                      <x-validation-error field="email"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="telephone"></x-form-label>
                        <input type="text" id="telephone" name="telephone" value="{{$company->telephone}}" class="form-control" placeholder="{{__('keywords.telephone')}}">
                      </div>
                      <x-validation-error field="telephone"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="website"></x-form-label>
                        <input type="text" id="website" name="web_site" value="{{$company->web_site}}"  class="form-control" placeholder="{{__('keywords.website')}}">
                      </div>
                      <x-validation-error field="website"></x-validation-error>
                    </div>
                    </div>
                      <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.edit_companies')}}</button>
                </form>

            </div>

            </div>
        </div>
    </div>
</div>

@endsection
