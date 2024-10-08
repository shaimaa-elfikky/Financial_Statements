@extends('admin.master')

@section('title' ,__('keywords.add_new_item-fin-stats'))
@section('content')


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.add_new_item-fin-stats')}}</h2>

            </div>
                <x-error-alert></x-error-alert>
        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('item-fin-stats.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input  value="{{request()->input('fin_state')}}" name="fin_stat_id" hidden/>

                    <div class="row">
                    <div class="col-md-6">
                       <div class="form-group mb-3">
                        <x-form-label title="items"></x-form-label>
                        <select class="form-control" name="item_id">
                                <option value="">اختر</option>
                            @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                      </div>
                      <x-validation-error field="follow_item_id"></x-validation-error>
                    </div>

                    </div>
                <x-button-submit></x-button-submit>
                </form>

            </div>

            </div>
        </div>
    </div>
</div>

@endsection
