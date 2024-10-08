@extends('admin.master')

@section('title' ,__('keywords.add_item_comp_prd_val'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.add_new_items')}}</h2>

            </div>

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('item_comp_prd_val.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                        <table id="detail" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="font-weight: bold;color:black;">{{__('keywords.periods')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.companies')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.items')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.arbitrage_value')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.initial_budget_value')}}</th>
                            <th style="font-weight: bold;color:black;">{{__('keywords.approved_budget_value')}}</th>
                            <th>
                                <a id="aadd"><i class="fe fe-plus" style="color:black;font-size:24px;"></i></a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                <select class=" form-control"  data-live-search="true"
                                    name="data[0][period_id]" data-size="10" title="أختر">
                                    @foreach ($periods as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == old('date_from') ? 'selected' : '' }}>{{ $item->date_from }} - {{ $item->date_to }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-validation-error field="data.0.period_id"></x-validation-error>
                                </td>

                                <td>
                                <select class=" form-control"  data-live-search="true"
                                    name="data[0][company_id]" data-size="10" title="أختر">
                                    @foreach ($companies as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == old('name') ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-validation-error field="data.0.company_id"></x-validation-error>
                                </td>

                                <td>
                                <select class=" form-control"  data-live-search="true"
                                    name="data[0][item_id]" data-size="10" title="أختر">
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == old('name') ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-validation-error field="data.0.item_id"></x-validation-error>
                                </td>

                                <td>
                                <input type="text" id="name" name="data[0][arbitrage_value]" class="form-control" placeholder="{{__('keywords.arbitrage_value')}}">
                                <x-validation-error field="data.0.arbitrage_value"></x-validation-error>
                                </td>


                                <td>
                                <input type="text" id="name" name="data[0][initial_budget_value]" class="form-control" placeholder="{{__('keywords.initial_budget_value')}}">
                                <x-validation-error field="data.0.initial_budget_value"></x-validation-error>
                                </td>

                                <td>
                                 <input type="text" id="name" name="data[0][approved_budget_value]" class="form-control" placeholder="{{__('keywords.approved_budget_value')}}">
                                <x-validation-error field="data.0.approved_budget_value"></x-validation-error>
                                </td>
                                    <x-validation-error field="data.0.invest_stock_val"></x-validation-error>
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
            <td>
                <select class="form-control" name="data[${counter}][period_id]" required>
                    @foreach ($periods as $item)
                        <option value="{{ $item->id }}">{{ $item->date_from }}-{{ $item->date_to }}</option>
                    @endforeach
                </select>
                <x-validation-error field="data.${counter}.period_id"></x-validation-error>
            </td>
            <td>
                <select class="form-control" name="data[${counter}][company_id]" required>
                    @foreach ($companies as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-validation-error field="data.${counter}.company_id"></x-validation-error>
            </td>
            <td>
                <select class="form-control" name="data[${counter}][item_id]" required>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-validation-error field="data.${counter}.item_id"></x-validation-error>
            </td>
            <td>
                <input type="text" class="form-control" name="data[${counter}][arbitrage_value]" required>
                <x-validation-error field="data.${counter}.arbitrage_value"></x-validation-error>
            </td>
            <td>
                <input type="text" class="form-control" name="data[${counter}][initial_budget_value]" required>
                <x-validation-error field="data.${counter}.initial_budget_value"></x-validation-error>
            </td>
            <td>
                <input type="text" class="form-control" name="data[${counter}][approved_budget_value]" required>
                <x-validation-error field="data.${counter}.approved_budget_value"></x-validation-error>
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




