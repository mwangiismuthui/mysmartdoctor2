@extends('layouts.app',['pageTitle' => __(' Booking Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Booking Invoice') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Booking Invoice List') }}</h6>

        <div class="card-body">


            <br />
            <br />
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover" id="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th width='30'>#</th>
                            <th {{Auth::user()->role == 'patient' ? 'hidden' :''}}>Patient</th>
                            <th {{Auth::user()->role == 'doctor' ? 'hidden' :''}}>Doctor</th>
                            <th>Booking no</th>
                            <th>Date</th>
                            <th width=''>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td {{Auth::user()->role == 'patient' ? 'hidden' :''}}>
                                {{ $item->patient->first_name.' '.$item->patient->surname }} </td>
                            <td {{Auth::user()->role == 'doctor' ? 'hidden' :''}}>{{ $item->doctor->given_name }} </td>
                            <td>{{ $item->booking_no }}</td>
                            <td>{{ $item->date }}</td>
                            <td>
                                <a href="{{ url('/admin/invoice/booking/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="feather-16"
                                            data-feather="eye"></i></button></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

@endsection
