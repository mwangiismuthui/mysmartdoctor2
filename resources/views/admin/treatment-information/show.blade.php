@extends('layouts.app',['pageTitle' => __(' Treatment Information Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Treatment Information') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' Treatment Information') }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/treatment-information') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
            @if (Helper::authCheck('treatmentinformation-edit'))
            <a href="{{ url('/admin/treatment-information/' . $treatmentinformation->id . '/edit') }}"
                title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                    {{ __('Edit') }}</button></a>
            @endif

            @if (Helper::authCheck('treatmentinformation-delete'))
            <form method="POST" id="deleteButton{{$treatmentinformation->id}}"
                action="{{ url('admin/treatmentinformation' . '/' . $treatmentinformation->id) }}"
                accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                    onclick="sweetalertDelete({{$treatmentinformation->id}})"><i class="feather-16"
                        data-feather="trash-2"></i> {{ __('Delete') }}</button>
            </form>
            @endif
            <br />
            <br />
            <button class="btn btn-warning btn-sm" id="print" style="right: 0px;float: right;"><i class="feather-16"
                    data-feather="printer"></i>
                {{ __(' Print') }}</button>

            <div class="table-responsive">
                <table class="table" id="doc">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $treatmentinformation->id }}</td>
                        </tr>
                        <tr>
                            <th> Patient</th>
                            <td> {{ $treatmentinformation->patient->first_name.' '.$treatmentinformation->patient->surname }}
                            </td>
                        </tr>
                        <tr>
                            <th> Doctor </th>
                            <td> {{ $treatmentinformation->doctor->given_name }} </td>
                        </tr>
                        <tr>
                            <th> Treatment </th>
                            <td> {{ $treatmentinformation->treatment }} </td>
                        </tr>
                        <tr>
                            <th> Time </th>
                            <td> {{ $treatmentinformation->time }} </td>
                        </tr>
                        <tr>
                            <th> Cost </th>
                            <td> {{ $treatmentinformation->cost }} </td>
                        </tr>
                        <tr>
                            <th> Total Paid </th>
                            <td> {{ $treatmentinformation->total_paid }} </td>
                        </tr>
                        <tr>
                            <th> Balance </th>
                            <td> {{ $treatmentinformation->balance }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection

@push('js')

<script src="{{ asset('assets') }}/js/jQuery.print.min.js"></script>
<script>
    $("#print").on('click', function () {
        //Print ele4 with custom options
        $("#doc").print({
            //Use Global styles
            globalStyles: false,
            //Add link with attrbute media=print
            mediaPrint: false,
            //Custom stylesheet
            stylesheet: "{{ asset('assets') }}/css/app.min.css",
            //Print in a hidden iframe
            iframe: true,
            //Don't print this
            noPrintSelector: ".avoid-this",
            //Add this at top
            prepend: " ",
            //Add this on bottom
            append: "<span><br/> Bye!</span>",
            //Log to console when printing is done via a deffered callback
            deferred: $.Deferred().done(function () {
                console.log('Printing done', arguments);
            })
        });
    });

</script>
@endpush
