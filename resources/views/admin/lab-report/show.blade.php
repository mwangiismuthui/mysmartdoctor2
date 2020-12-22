@extends('layouts.app',['pageTitle' => __(' Lab Report Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Lab Report') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' Lab Report') }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/lab-report') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
            @if (Helper::authCheck('labreport-edit'))
            <a href="{{ url('/admin/lab-report/' . $labreport->id . '/edit') }}" title="Edit"><button
                    class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                    {{ __('Edit') }}</button></a>
            @endif

            @if (Helper::authCheck('labreport-delete'))
            <form method="POST" id="deleteButton{{$labreport->id}}"
                action="{{ url('admin/labreport' . '/' . $labreport->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                    onclick="sweetalertDelete({{$labreport->id}})"><i class="feather-16" data-feather="trash-2"></i>
                    {{ __('Delete') }}</button>
            </form>
            @endif
            <br />
            <br />

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $labreport->id }}</td>
                        </tr>
                        <tr>
                            <th> Report Name </th>
                            <td> {{ $labreport->report_name }} </td>
                        </tr>
                        <tr>
                            <th> File </th>
                            <td><a href="{{Storage::url($labreport->file)}}">Show/Download</a></td>
                        </tr>
                        <tr>
                            <th> Patient Id </th>
                            {{-- <td> {{ $labreport->patient->name }} </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
