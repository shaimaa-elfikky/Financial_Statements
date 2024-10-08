@extends('admin.master')

@section('title' ,__('keywords.edit_item'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.edit_item')}}</h2>

            </div>

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('items.update',['item'=>$item])}}" method="post" enctype="multipart/form-data">
                  @method('PUT')
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="name"></x-form-label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$item->name}}" placeholder="{{__('keywords.name')}}">
                      </div>
                      <x-validation-error field="name"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="code"></x-form-label>
                        <input type="text" id="code" name="code" class="form-control"value="{{$item->code}}" placeholder="{{__('keywords.code')}}">
                      </div>
                      <x-validation-error field="code"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                          <x-form-label title="follow_item_id"></x-form-label>
                           <select class="form-control" name="follow_item_id">
                                <option value="">اختر</option>
                            @foreach($follow_item_id as $follow)
                                    <option value="{{ $follow->code }}"{{$follow->code  == $item->follow_item_id? 'selected' : '' }}>{{ $follow->name }}</option>
                            @endforeach
                        </select>

                      </div>
                      <x-validation-error field="follow_item_id"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="calc_fl"></x-form-label>
                        <select id="inputState5" class="form-control" name="calc_fl">
                              <option value="0" {{ $item->calc_fl == 0 ? 'selected' : '' }}>تجميع لنفس البند من الشركات</option>
                              <option value="1" {{ $item->calc_fl == 1 ? 'selected' : '' }}>قيمة نفس البند للقابضة</option>
                              <option value="2" {{ $item->calc_fl == 2 ? 'selected' : '' }}>من بنود اخرى</option>

                        </select>

                      </div>
                      <x-validation-error field="calc_fl"></x-validation-error>
                    </div>
                               <div class="col-md-6">
                      <div class="form-group mb-3">
                          <x-form-label title="analize_fl"></x-form-label>
                           <select class="form-control" name="analize_fl">
                            <option value="0" {{ $item->analize_fl == 0 ? 'selected' : '' }}>   لا   </option>
                            <option value="1" {{ $item->analize_fl == 1 ? 'selected' : '' }}>   له</option>
                        </select>

                      </div>
                      <x-validation-error field="analize_fl"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="show_fl"></x-form-label>
                        <select id="inputState5" class="form-control" name="show_fl">
                              <option value="0" {{ $item->show_fl == 0 ? 'selected' : '' }}>  لا يظهر  </option>
                              <option value="1" {{ $item->show_fl == 1 ? 'selected' : '' }}>  يظهر </option>


                        </select>

                      </div>
                      <x-validation-error field="calc_fl"></x-validation-error>
                    </div>
                    <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.edit_item')}}</button>
                </form>


            </div>

            </div>
        </div>
    </div>
</div>

@endsection
