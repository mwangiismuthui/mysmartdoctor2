@extends('layouts.app',['pageTitle' => __(' Medication')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Medication') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Medication List') }}</h6>

        <div class="card-body">
            @if (Helper::authCheck('medication-create'))
            <a href="{{ url('/admin/medication/create') }}" class="btn btn-success btn-sm" title="Add New  Medication">
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
                            <th>Medication</th>
                            <th>File</th>
                            <th>Created At</th>
                            {{-- <th>Patient Id</th> --}}
                            <th width='300'>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medication as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->medication }}</td>
                            <td><a href="{{Storage::url($item->file)}}">Show/Download</a></td>
                            <td> {{Helper::globalDateTime($item->created_at)}} </td>
                            {{-- <td>{{ $item->patient_id }}</td> --}}
                            <td>
                                <a href="{{ url('/admin/medication/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="feather-16"
                                            data-feather="eye"></i></button></a>
                                @if (Helper::authCheck('medication-edit'))
                                <a href="{{ url('/admin/medication/' . $item->id . '/edit') }}" title="Edit"><button
                                        class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                                    </button></a>
                                @endif
                                @if (Helper::authCheck('medication-delete'))
                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/medication' . '/' . $item->id) }}" accept-charset="UTF-8"
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
                {{-- <div class="pagination-wrapper"> {!! $medication->appends(['search' => Request::get('search')])->render() !!} </div> --}}
            </div>

        </div>
    </div>
</div>

@endsection
