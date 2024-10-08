@extends('admin.master')

@section('title', __('keywords.edit_fin_states'))
@section('content')




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
                    <h2 class="page-title">{{ __('keywords.edit_fin_states') }}</h2>

                </div>

                <div class="card shadow" style="background-color:lightgrey;">
                    <div class="card-body">
                        <form action="{{ route('fin-states.update', ['fin_state' => $fin_state]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label title="name"></x-form-label>
                                        <input type="text" id="name" name="name" value="{{ $fin_state->name }}"
                                            class="form-control" placeholder="{{ __('keywords.name') }}">
                                    </div>
                                    <x-validation-error field="name"></x-validation-error>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label title="code"></x-form-label>
                                        <input type="text" id="code" name="code" value="{{ $fin_state->code }}"
                                            class="form-control" placeholder="{{ __('keywords.code') }}">
                                    </div>
                                    <x-validation-error field="code"></x-validation-error>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label title="fin_stat_type"></x-form-label>
                                        <select id="inputState5" class="form-control" name="fin_stat_type">
                                            <option value= "0" {{ $fin_state->fin_stat_type == 0 ? 'selected' : '' }}>
                                                قائمة شركات</option>
                                            <option value= "1" {{ $fin_state->fin_stat_type == 1 ? 'selected' : '' }}>
                                                قائمة مجمعة </option>
                                            <option value= "2" {{ $fin_state->fin_stat_type == 2 ? 'selected' : '' }}>
                                                بيان تحليلي</option>
                                            <option value= "3" {{ $fin_state->fin_stat_type == 3 ? 'selected' : '' }}>
                                                بيان تفصيلي</option>

                                        </select>

                                    </div>
                                    <x-validation-error field="fin_stat_type"></x-validation-error>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.edit_fin_states')}}</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
