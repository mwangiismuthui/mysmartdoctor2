@extends('layouts.app',['pageTitle' => __(' Booking Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Booking') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' Booking') }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/booking') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
            @if (Helper::authCheck('booking-edit'))
            <a href="{{ url('/admin/booking/' . $booking->id . '/edit') }}" title="Edit"><button
                    class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                    {{ __('Edit') }}</button></a>
            @endif

            @if (Helper::authCheck('booking-delete'))
            <form method="POST" id="deleteButton{{$booking->id}}"
                action="{{ url('admin/booking' . '/' . $booking->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                    onclick="sweetalertDelete({{$booking->id}})"><i class="feather-16" data-feather="trash-2"></i>
                    {{ __('Delete') }}</button>
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
                            <td>{{ $booking->id }}</td>
                        </tr>
                        <tr>
                            <th> Patient </th>
                            <td> {{ $booking->patient->user->fname  }} </td>
                        </tr>
                        <tr>
                            <th> Doctor </th>
                            <td> {{ $booking->doctor->user->fname }} </td>
                        </tr>
                        <tr>
                            <th> Booking no </th>
                            <td> {{ $booking->booking_no }} </td>
                        </tr>
                        <tr>
                            <th> Date </th>
                            <td> {{ $booking->date }} </td>
                        </tr>
                        <tr>
                            <th> Urgency </th>
                            <td> {{ $booking->urgency }} </td>
                        </tr>
                        <tr>
                            <th> Specialty </th>
                            <td> {{ $booking->specialty }} </td>
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
