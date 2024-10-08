@extends('admin.master')

@section('title' ,__('keywords.edit_item_related_id'))
@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
            <h2 class="page-title">{{__('keywords.edit_item_related_id')}}</h2>
            </div>
    @if($errors->has('item_related_id'))
                <div class="alert-danger">
                <span>{{$errors->first('item_related_id')}}</span>
                </div>
    @endif
        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('related_item.update',['related_item'=>$related_item])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                       <input value="{{ request()->input('item_id') }}" name="item_id" hidden/>
        <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="item_related_id"></x-form-label>
                <select class="form-control" name="item_related_id">
                    <option value="">اختر</option>
                    @foreach($relatedItems as $item)
                        <option value="{{ $item->id }}"{{ $item->id  == $related_item->item_related_id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <x-validation-error field="item_related_id"></x-validation-error>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <x-form-label title="add_subtrsct_fl"></x-form-label>
                <select id="inputState5" class="form-control" name="add_subtrsct_fl">
                    <option value="1" {{ $related_item->add_subtrsct_fl == 1 ? 'selected' : '' }}>طرحه</option>
                    <option value="0" {{ $related_item->add_subtrsct_fl == 0 ? 'selected' : '' }}>جمعه</option>
                </select>
            </div>
            <x-validation-error field="add_subtrsct_fl"></x-validation-error>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-sm mt-2">{{ __('keywords.edit_item_related_id') }}</button>
</form>
</div>




@endsection
