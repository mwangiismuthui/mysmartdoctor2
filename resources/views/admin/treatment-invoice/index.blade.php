@extends('layouts.app',['pageTitle' => __(' Treatment Invoice')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Treatment Invoice') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Treatment Invoice List') }}</h6>

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
                            <th>Treatment</th>
                            <th>Time</th>
                            <th>Cost</th>
                            <th>Total Paid</th>
                            <th>Balance</th>
                            <th width=''>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($treatmentinformation as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td {{Auth::user()->role == 'patient' ? 'hidden' :''}}>
                                {{ $item->patient->first_name.' '.$item->patient->surname  }}</td>
                            <td {{Auth::user()->role == 'doctor' ? 'hidden' :''}}>{{ $item->doctor->given_name }}</td>
                            <td>{{ $item->treatment }}</td>
                            <td>{{ $item->time }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->total_paid }}</td>
                            <td>{{ $item->balance }}</td>
                            <td>
                                <a href="{{ url('admin/invoice/treatment/' . $item->id) }}" title="View"><button
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
