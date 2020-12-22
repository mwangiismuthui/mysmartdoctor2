@extends('layouts.app',['pageTitle' => __(' Prescription')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Prescription') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Prescription List') }}</h6>

        <div class="card-body">

            <br />
            <br />
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover" id="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th width='30'>#</th>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Prescription</th>
                            <th width='300'>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prescription as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->doctor->user->name }}</td>
                            <td>{{ $item->patient->user->name }}</td>
                            <td>{{ $item->prescription }}</td>
                            <td>
                                <a href="{{ url('/admin/prescription/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="feather-16"
                                            data-feather="eye"></i></button></a>
                                @if (Helper::authCheck('prescription-edit'))
                                <a href="{{ url('/admin/prescription/' . $item->id . '/edit') }}" title="Edit"><button
                                        class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                                    </button></a>
                                @endif
                                @if (Helper::authCheck('prescription-delete'))
                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/prescription' . '/' . $item->id) }}" accept-charset="UTF-8"
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
