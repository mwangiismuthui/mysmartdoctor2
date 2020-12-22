@extends('layouts.app',['pageTitle' => __(' Doctor Add')])
@section('content')

@component('layouts.parts.breadcrumb')
@slot('title')
{{ __(' Doctor') }}
@endslot
@endcomponent

<div class="col-md-12">
    <div class="card">
        <h6 class="card-header">{{ __(' Doctor List') }}</h6>

        <div class="card-body">
            @if (Helper::authCheck('doctor-create'))
            <a href="{{ url('/admin/doctor/create') }}" class="btn btn-success btn-sm" title="Add New  Doctor">
                <i class="feather-16" data-feather="plus"></i> {{ __('Add New') }}
            </a>
            @endif

            <form method="GET" action="{{ url('/admin/doctor') }}" accept-charset="UTF-8"
                class="form-inline my-2 my-lg-0 float-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search..."
                        value="{{ request('search') }}">
                    <span class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <i class="feather-16" data-feather="search"></i>
                        </button>
                    </span>
                </div>
            </form>

            <br />
            <br />
            <div class="table-responsive mt-3">
                <table class="table table-striped table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th width='30'>#</th>
                            <th>Given Name</th>
                            <th>Family Name</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Doctor Charge</th>
                            <th>Languages Spoken</th>
                            <th>Education</th>
                            <th>Mobile No</th>
                            <th>Alternative Mobile No</th>
                            <th>Private Practice Address</th>
                            <th>Qualification</th>
                            <th>Professional Experiences</th>
                            <th width='300'>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctor as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->given_name }}</td>
                            <td>{{ $item->family_name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->Doctor_charge }}</td>
                            <td>{{ $item->languages_spoken }}</td>
                            <td>{{ $item->education }}</td>
                            <td>{{ $item->mobile_no }}</td>
                            <td>{{ $item->alternative_mobile_no }}</td>
                            <td>{{ $item->private_practice_address }}</td>
                            <td>{{ $item->qualification }}</td>
                            <td>{{ $item->professional_experiences }}</td>
                            <td>
                                <a href="{{ url('/admin/doctor/' . $item->id) }}" title="View"><button
                                        class="btn btn-info btn-sm"><i class="feather-16"
                                            data-feather="eye"></i></button></a>
                                @if (Helper::authCheck('doctor-edit'))
                                <a href="{{ url('/admin/doctor/' . $item->id . '/edit') }}" title="Edit"><button
                                        class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i>
                                    </button></a>
                                @endif
                                @if (Helper::authCheck('doctor-delete'))
                                <form method="POST" id="deleteButton{{$item->id}}"
                                    action="{{ url('/admin/doctor' . '/' . $item->id) }}" accept-charset="UTF-8"
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
                <div class="pagination-wrapper"> {!! $doctor->appends(['search' => Request::get('search')])->render()
                    !!} </div>
            </div>

        </div>
    </div>
</div>

@endsection
