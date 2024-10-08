@extends('admin.master')

@section('title', __('keywords.related_item'))
@section('content')




    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
                    <h2 class="page-title">{{ __('keywords.related_item') }}</h2>
                    <div class="page-title-right">

                        <x-action-component
                            href="{{ route('related_item.create', ['item_id' => request()->input('item_id')]) }}" type="create"
                            text="__('keywords.add')" color="primary"></x-action-component>
                    </div>
                </div>
                <div class="container mt-6">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group mb-6 text-center">
                                <label class="form-label" style="font-weight: bold; color: #333;">{{__('keywords.name')}}</label>
                                <span class="d-block font-weight-bold text-dark">{{$itemDisplay->name}}</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-6 text-center">
                                <label class="form-label" style="font-weight: bold; color: #333;">{{__('keywords.code')}}</label>
                                <span class="d-block font-weight-bold text-dark">{{$itemDisplay->code}}</span>
                            </div>
                        </div>


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
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.item_related_id') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.add_subtrsct_fl') }}</th>
                                    <th style="font-weight: bold;color:black;">{{ __('keywords.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($related_items) > 0)
                                    @foreach ($related_items as $key => $related_item)
                                        <tr>
                                            <td style="background-color:lightgrey;">
                                                {{ $related_items->firstItem() + $loop->index }}</td>
                                            <td style="color:black; font-weight:bold; white-space: nowrap;">
                                                {{ $related_item->item->name }}</td>
                                            @if ($related_item->add_subtrsct_fl == 0)
                                                <td> جمعه </td>
                                            @elseif($related_item->add_subtrsct_fl == 1)
                                                <td> طرحة</td>
                                            @endif

                                            <td>
                                                <x-action-component
                                                    href="{{ route('related_item.edit', ['related_item' => $related_item, 'item_id' => request()->input('item_id')]) }}"
                                                    type="edit" text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="success"></x-action-component>

                                                <x-action-component href="#" type="show"
                                                    text="<i class='fe fe-edit fa-2x'></i>"
                                                    color="warning"></x-action-component>
                                                <x-button-component
                                                    href="{{ route('related_item.destroy', ['related_item' => $related_item]) }}"
                                                    id="{{ $related_item->id }}"></x-button-component>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif
                            </tbody>
                        </table>
                        {{ $related_items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
