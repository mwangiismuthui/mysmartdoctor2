@extends('layouts.app',['pageTitle' => __(' Medication Show')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Medication') }}
@endslot
@endcomponent
<div class="col-md-12">
    <div class="card">
        <div class="card-header">{{ __(' Medication') }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/medication') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                        class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
            @if (Helper::authCheck('medication-edit'))
            <a href="{{ url('/admin/medication/' . $medication->id . '/edit') }}" title="Edit"><button
                    class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                    {{ __('Edit') }}</button></a>
            @endif

            @if (Helper::authCheck('medication-delete'))
            <form method="POST" id="deleteButton{{$medication->id}}"
                action="{{ url('admin/medication' . '/' . $medication->id) }}" accept-charset="UTF-8"
                style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                    onclick="sweetalertDelete({{$medication->id}})"><i class="feather-16" data-feather="trash-2"></i>
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
                            <td>{{ $medication->id }}</td>
                        </tr>
                        <tr>
                            <th> Medication </th>
                            <td> {{ $medication->medication }} </td>
                        </tr>
                        {{-- <tr>
                            <th> Patient Id </th>
                            <td> {{ $medication->patient_id }} </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
