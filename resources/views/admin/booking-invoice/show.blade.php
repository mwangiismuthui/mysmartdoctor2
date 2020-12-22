@extends('layouts.app',['pageTitle' => __(' Booking')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Booking') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' Booking invoice') }}</div>
        <div class="card-body">


            <br />
            <br />
            <button class="btn btn-warning btn-sm" id="print" style="right: 0px;float: right;"><i class="feather-16"
                    data-feather="printer"></i>
                {{ __(' Print') }}</button>

            <div id="doc">
                <div class="row">
                    <div class="col-4 border p-2 m-1">
                        <h6>Billing Information</h6>
                        {{ $booking->patient->account->first_name  }}
                        {{ $booking->patient->account->last_name  }},<br>

                        {{ $booking->patient->account->street_address  }},
                        {{ $booking->patient->account->city  }},<br>
                        {{ $booking->patient->account->country  }},<br>
                        Post code: {{ $booking->patient->account->post_code  }},<br>
                        Phone no: {{ $booking->patient->account->phone_number  }},<br>
                        Email: {{ $booking->patient->account->email  }},
                        {{-- {{ $booking->patient->account->card  }},
                        {{ $booking->patient->account->expiry_date  }}, --}}

                    </div>
                    <div class="col-4 border p-2 m-1">
                        <h6>Payement details</h6>
                    </div>
                    <div class="col-3 border p-2 m-1">
                        <h6>Receipt details</h6>
                    </div>
                </div>

                <table class="table mt-4" border="1">
                    <thead>
                        <tr>
                            <th>Booking no</th>
                            <th>Doctor Name</th>
                            <th>Date and time</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $booking->booking_no }} </td>
                            <td> {{ $booking->doctor->given_name }} </td>
                            <td> {{ $booking->created_at }} </td>
                            <td> {{ $booking->professional_fee }} </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Service fee</td>
                            <td> {{ $booking->service_fee }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td> {{ $booking->total }}</td>
                        </tr>

                    </tbody>
                </table>
                <div class="col-4 offset-4" style="font-weight: 700">
                    Aussie medics PVT lTd 54/2 C,3rd Lane Hansagiri Road Gampha Sri lanka Compnay Regist No- PV00214645
                    International office Smarty Online , Magill Road ,South Australia, Australia
                </div>
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
