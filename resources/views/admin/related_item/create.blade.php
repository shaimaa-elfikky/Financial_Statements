@extends('admin.master')

@section('title' ,__('keywords.related_item'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.add_new_related_item')}}</h2>

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

            @if ($errors->has('item_related_id'))
                <div class="alert-danger">
                <span>{{$errors->first('item_related_id')}}</span>
                </div>
            @endif

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('related_item.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input value="{{ request()->input('item_id') }}" name="data[0][item_id]"hidden/>

                    <div class="row">
                        <table id="detail" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="font-weight: bold;color:black;">{{__('keywords.item_related_id')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.add_subtrsct_fl')}}</th>
                            <th>
                                <a id="aadd"><i class="fe fe-plus" style="color:black;font-size:24px;"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                <select class=" form-control"  data-live-search="true"
                                    name="data[0][item_related_id]" data-size="10" title="أختر">
                                     @foreach ($items as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == old('name') ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-validation-error field="data.0.item_related_id"></x-validation-error>
                                </td>
                                <td>
                                <select class="form-control"   data-live-search="true"
                                        name="data[0][add_subtrsct_fl]" data-size="10" title="أختر" >
                                        <option value="1"> اختر</option>
                                        <option value="1">طرحه</option>
                                        <option value="0">جمعه</option>
                                </select>
                                    <x-validation-error field="data.0.add_subtrsct_fl"></x-validation-error>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <x-button-submit></x-button-submit>
                </form>

            </div>

            </div>
        </div>
    </div>
</div>

@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    let counter = 1;
    document.getElementById('aadd').addEventListener('click', function() {
        let tr = `<tr>
            <input value="{{ request()->input('item_id') }}" name="data[${counter}][item_id]" hidden />
            <td>
                <select class="form-control" name="data[${counter}][item_related_id]" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-validation-error field="data.${counter}.item_related_id"></x-validation-error>
            </td>

            <td>
                <select class="form-control" name="data[${counter}][add_subtrsct_fl]" required>
                    <option value="1">اختر</option>
                    <option value="1">طرحه</option>
                    <option value="0">جمعه</option>
                </select>
                <x-validation-error field="data.${counter}.add_subtrsct_fl"></x-validation-error>
            </td>
            <td style="width:85px;">
                <button type="button" class="btn btn-danger remove"><i class="fe fe-trash"></i></button>
            </td>
        </tr>`;
        counter++;
        document.querySelector('#detail tbody').insertAdjacentHTML('beforeend', tr);
    });

    $("#detail").on("click", ".remove", function () {
      $(this).closest("tr").remove();
      });
});

</script>
