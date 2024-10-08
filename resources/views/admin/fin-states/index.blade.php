@extends('admin.master')

@section('title', __('keywords.fin-states'))
@section('content')




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
                    <h2 class="page-title">{{ __('keywords.fin-states') }}</h2>
                    <div class="page-title-right">

                        <x-action-component href="{{ route('fin-states.create') }}" type="create" text="__('keywords.add')"
                            color="primary"></x-action-component>
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
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.name') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.code') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.fin_stat_type') }}</th>
                                    <th style="font-weight: bold;color:black;"></th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.actions') }}</th>


                                </tr>
                            </thead>
                            <tbody>
                                @if (count($fin_states) > 0)
                                    @foreach ($fin_states as $key => $fin_state)
                                        <tr>
                                            <td style="background-color:lightgrey;">
                                                {{ $fin_states->firstItem() + $loop->index }}</td>
                                            <td>{{ $fin_state->name }}</td>
                                            <td>{{ $fin_state->code }}</td>
                                            @if ($fin_state->fin_stat_type == 0)
                                                <td> قائمة شركات </td>
                                            @elseif($fin_state->fin_stat_type == 1)
                                                <td>قائمة مجمعة</td>
                                            @elseif($fin_state->fin_stat_type == 2)
                                                <td> بيان تحليلي</td>
                                            @elseif($fin_state->fin_stat_type == 3)
                                                <td> بيان تفصيلي</td>
                                            @endif
                                            <td><a class="btn btn-primary"
                                                    href="{{ route('item-fin-stats.index', ['fin_state' => $fin_state->id, 'fin_state_name' =>$fin_state->name]) }}">البند</a>
                                            </td>


                                            <td style="white-space: nowrap;">
                                                <x-action-component
                                                    href="{{ route('fin-states.edit', ['fin_state' => $fin_state]) }}"
                                                    type="edit" text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="success"></x-action-component>

                                                <x-action-component href="#" type="show"
                                                    text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="warning"></x-action-component>
                                                <x-button-component
                                                    href="{{ route('fin-states.destroy', ['fin_state' => $fin_state]) }}"
                                                    id="{{ $fin_state->id }}"></x-button-component>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif
                            </tbody>
                        </table>
                        {{ $fin_states->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
