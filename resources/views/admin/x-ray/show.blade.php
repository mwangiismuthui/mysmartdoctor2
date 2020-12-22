@extends('layouts.app',['pageTitle' => __(' X Ray Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' X Ray') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' X Ray') }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/x-ray') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
            @if (Helper::authCheck('xray-edit'))
            <a href="{{ url('/admin/x-ray/' . $xray->id . '/edit') }}" title="Edit"><button
                    class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                    {{ __('Edit') }}</button></a>
            @endif

            @if (Helper::authCheck('xray-delete'))
            <form method="POST" id="deleteButton{{$xray->id}}" action="{{ url('admin/xray' . '/' . $xray->id) }}"
                accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                    onclick="sweetalertDelete({{$xray->id}})"><i class="feather-16" data-feather="trash-2"></i>
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
                            <td>{{ $xray->id }}</td>
                        </tr>
                        <tr>
                            <th> Name </th>
                            <td> {{ $xray->name }} </td>
                        </tr>
                        <tr>
                            <th> File </th>
                            <td><a href="{{Storage::url($xray->file)}}">Show/Download</a></td>
                        </tr>
                        {{-- <tr>
                            <th> Patient Id </th>
                            <td> {{ $xray->patient_id }} </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
