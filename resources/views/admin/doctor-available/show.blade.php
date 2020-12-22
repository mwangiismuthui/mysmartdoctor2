@extends('layouts.app',['pageTitle' => __(' Doctor Available Show')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Doctor Available') }}
    @endslot
@endcomponent
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __(' Doctor Available') }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/doctor-available') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
                        @if (Helper::authCheck('doctoravailable-edit'))
                        <a href="{{ url('/admin/doctor-available/' . $doctoravailable->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> {{ __('Edit') }}</button></a>
                        @endif

                        @if (Helper::authCheck('doctoravailable-delete'))
                        <form method="POST" id="deleteButton{{$doctoravailable->id}}" action="{{ url('admin/doctoravailable' . '/' . $doctoravailable->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$doctoravailable->id}})"><i class="feather-16" data-feather="trash-2"></i> {{ __('Delete') }}</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $doctoravailable->id }}</td>
                                    </tr>
                                    <tr><th> Starting Time </th><td> {{ $doctoravailable->starting_time }} </td></tr><tr><th> Ending Time </th><td> {{ $doctoravailable->ending_time }} </td></tr><tr><th> Date </th><td> {{ $doctoravailable->date }} </td></tr><tr><th> Doctor Id </th><td> {{ $doctoravailable->doctor_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
