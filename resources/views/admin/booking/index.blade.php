@extends('layouts.app',['pageTitle' => __(' Booking Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Booking') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Booking List') }}</h6>

        <div class="card-body">
            @if (Helper::authCheck('booking-create'))
            <a href="{{ url('/admin/booking/create') }}" class="btn btn-success btn-sm" title="Add New  Booking">
                <i class="feather-16" data-feather="plus"></i> {{ __('Add New') }}
            </a>
            @endif

            <br />
            <br />
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover" id="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th width='30'>#</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Booking no</th>
                            <th {{Auth::user()->role == 'doctor' ? 'hidden' :''}}>Time</th>
                            <th>Date</th>
                            <th {{Auth::user()->role == 'patient' ? 'hidden' :''}}
                                {{ Request::is("admin/booking") ? "hidden":""}}>Set Time</th>
                            <th>Video Call</th>
                            <th>X Ray info</th>
                            <th>Lab report info</th>
                            <th>Medication info</th>
                            <th>Prescription </th>
                            <th width=''>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ url('/admin/patient/'.$item->patient->id) }}"
                                    target="_blank">{{ $item->patient->user->name }}</a>
                            </td>
                            <td>{{ $item->doctor->user->name }}</td>
                            <td>{{ $item->booking_no }}</td>
                            <td {{Auth::user()->role == 'doctor' ? 'hidden' :''}}>{{ $item->time }}</td>
                            <td>{{$item->date.' '.$item->time}}</td>
                            <td {{Auth::user()->role == 'patient' ? 'hidden' :''}}
                                {{ Request::is("admin/booking") ? "hidden":""}}>
                                <form method="POST" id="oneTimeSubmit" action="{{ url('/admin/booking/' . $item->id) }}"
                                    accept-charset="UTF-8" class="form-horizontal needs-validation" novalidate=""
                                    enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }}
                                    <input type="time" name="time" value="{{ $item->time }}">
                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                </form>
                            </td>
                            <td>
                                @if (Auth::user()->role == 'patient')

                                {{-- @dd(\App\Booking::where('call_status','1')->first()->call_status ) --}}
                                <a href="{{asset($item->video_call_url.'/'.$item->id.'?from='.$item->doctor->user->id.'&to='.$item->patient->user->id)}}"
                                    class="btn btn-success
                                    btn-sm @if (\App\Booking::find($item->id)->call_status != '1')
                                    {{'disabled'}}
                                    @endif">
                                    <i class="fa fa-phone"></i></a>
                                @else
                                <a href="{{asset($item->video_call_url.'/'.$item->id.'?from='.$item->doctor->user->id.'&to='.$item->patient->user->id)}}"
                                    class="btn btn-success btn-sm">
                                    <i class="fa fa-phone"></i></a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/x-ray/'.$item->patient_id) }}" target="_blank"
                                    class="btn btn-success btn-sm">click</a>
                            </td>
                            <td>
                                <a href="{{ url('/labreport/'.$item->patient_id) }}" target="_blank"
                                    class="btn btn-success btn-sm">click</a>
                            </td>
                            <td>
                                <a href="{{ url('/medication/'.$item->patient_id) }}" target="_blank"
                                    class="btn btn-success btn-sm">click</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/prescription/create?patient_id='.$item->patient->user->id) }}"
                                    target="_blank" class="btn btn-success btn-sm">click</a>
                            </td>
                            <td>
                                <a href="{{ url('/admin/booking/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="feather-16"
                                            data-feather="eye"></i></button></a>
                                @if (Helper::authCheck('booking-edit'))
                                <a href="{{ url('/admin/booking/' . $item->id . '/edit') }}" title="Edit"><button
                                        class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                                    </button></a>
                                @endif
                                @if (Helper::authCheck('booking-delete'))
                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/booking' . '/' . $item->id) }}" accept-charset="UTF-8"
                                    style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                        onclick="sweetalertDelete({{$item->id}})"><i class="feather-16"
                                            data-feather="trash-2"></i></button>
                                </form>
                                @endif
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
