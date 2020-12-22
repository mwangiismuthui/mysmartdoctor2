@extends('layouts.app',['pageTitle' => __(' Booking Fee Add')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Booking Fee') }}
    @endslot
@endcomponent
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __(' Booking Fee') }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/booking-fee') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
                        @if (Helper::authCheck('bookingfee-edit'))
                        <a href="{{ url('/admin/booking-fee/' . $bookingfee->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> {{ __('Edit') }}</button></a>
                        @endif

                        @if (Helper::authCheck('bookingfee-delete'))
                        <form method="POST" id="deleteButton{{$bookingfee->id}}" action="{{ url('admin/bookingfee' . '/' . $bookingfee->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$bookingfee->id}})"><i class="feather-16" data-feather="trash-2"></i> {{ __('Delete') }}</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $bookingfee->id }}</td>
                                    </tr>
                                    <tr><th> Fee </th><td> {{ $bookingfee->fee }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
