@extends('layouts.app',['pageTitle' => __(' Treatment Information Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Treatment Information') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Treatment Information List') }}</h6>

        <div class="card-body">
            @if (Helper::authCheck('treatmentinformation-create'))
            <a href="{{ url('/admin/treatment-information/create') }}" class="btn btn-success btn-sm"
                title="Add New  Treatment Information">
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
                            <td>{{ $item->patient->first_name.' '.$item->patient->surname  }}</td>
                            <td>{{ $item->treatment }}</td>
                            <td>{{ $item->time }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->total_paid }}</td>
                            <td>{{ $item->balance }}</td>
                            <td>
                                <a href="{{ url('/admin/treatment-information/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="feather-16"
                                            data-feather="eye"></i></button></a>
                                @if (Helper::authCheck('treatmentinformation-edit'))
                                <a href="{{ url('/admin/treatment-information/' . $item->id . '/edit') }}"
                                    title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16"
                                            data-feather="edit"></i> </button></a>
                                @endif
                                @if (Helper::authCheck('treatmentinformation-delete'))
                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/treatment-information' . '/' . $item->id) }}"
                                    accept-charset="UTF-8" style="display:inline">
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
