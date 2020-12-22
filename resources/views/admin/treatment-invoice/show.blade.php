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
            <br />
            <br />
            <button class="btn btn-warning btn-sm" id="print" style="right: 0px;float: right;"><i class="feather-16"
                    data-feather="printer"></i>
                {{ __(' Print') }}</button>

            <div id="doc">
                <div class="row">
                    <div class="col-4 border p-2 m-1">
                        <h6>Billing Information</h6>
                        {{ $treatmentinformation->patient->account->first_name  }}
                        {{ $treatmentinformation->patient->account->last_name  }},<br>

                        {{ $treatmentinformation->patient->account->street_address  }},
                        {{ $treatmentinformation->patient->account->city  }},<br>
                        {{ $treatmentinformation->patient->account->country  }},<br>
                        Post code: {{ $treatmentinformation->patient->account->post_code  }},<br>
                        Phone no: {{ $treatmentinformation->patient->account->phone_number  }},<br>
                        Email: {{ $treatmentinformation->patient->account->email  }},
                        {{-- {{ $treatmentinformation->patient->account->card  }},
                        {{ $treatmentinformation->patient->account->expiry_date  }}, --}}

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
                            <th>Treatment Name</th>
                            <th>Doctor Name</th>
                            <th>Date and time</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $treatmentinformation->treatment }} </td>
                            <td> {{ $treatmentinformation->doctor->given_name }} </td>
                            <td> {{ $treatmentinformation->created_at }} </td>
                            <td> {{ $treatmentinformation->cost }} </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total Paid</td>
                            <td> {{ $treatmentinformation->total_paid }}</td>
                        </tr>
                        <tr>
                            <td>balance</td>
                            <td></td>
                            <td></td>
                            <td> {{ $treatmentinformation->balance }}</td>
                        </tr>

                    </tbody>
                </table>
                <div class="col-4 offset-4" style="font-weight: 700">
                    Aussie medics PVT lTd 54/2 C,3rd Lane Hansagiri Road Gampha Sri lanka Compnay Regist No- PV00214645
                    International office Smarty Online , Magill Road ,South Australia, Australia
                </div>
            </div>

            {{-- <div class="table-responsive">
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
        </div> --}}

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
