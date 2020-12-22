@extends('layouts.app',['pageTitle' => __(' Account')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Account') }}
    @endslot
@endcomponent

        <div class="col-md-12">
            <div class="card">
                <h6 class="card-header">{{ __(' Account List') }}</h6>

                <div class="card-body">
                    @if (Helper::authCheck('account-create'))
                        <a href="{{ url('/admin/account/create') }}" class="btn btn-success btn-sm"
                            title="Add New  Account">
                            <i class="feather-16" data-feather="plus"></i> {{ __('Add New') }}
                        </a>
                     @endif

                    <form method="GET" action="{{ url('/admin/account') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="feather-16" data-feather="search"></i>
                                    </button>
                                </span>
                            </div>
                    </form>

                    <br/>
                    <br/>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-hover"  style="width:100%;">
                            <thead>
                                <tr>
                                    <th  width='30'>#</th><th>First Name</th><th>Last Name</th><th>Street Address</th><th>City</th><th>Country</th><th>Post Code</th><th>Phone Number</th><th>Email</th><th>Card</th><th>Expiry Date</th><th width='300'>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($account as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{ $item->street_address }}</td><td>{{ $item->city }}</td><td>{{ $item->country }}</td><td>{{ $item->post_code }}</td><td>{{ $item->phone_number }}</td><td>{{ $item->email }}</td><td>{{ $item->card }}</td><td>{{ $item->expiry_date }}</td>
                                    <td>
                                        <a href="{{ url('/admin/account/' . $item->id) }}" title="View"><button class="btn btn-info btn-sm"><i class="feather-16" data-feather="eye"></i></button></a>
                                    @if (Helper::authCheck('account-edit'))
                                        <a href="{{ url('/admin/account/' . $item->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> </button></a>
                                    @endif
                                    @if (Helper::authCheck('account-delete'))
                                        <form method="POST" id="deleteButton{{$item->id}}"
                                            action="{{ url('/admin/account' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                title="Delete"
                                                onclick="sweetalertDelete({{$item->id}})"><i class="feather-16" data-feather="trash-2"></i></button>
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $account->appends(['search' => Request::get('search')])->render() !!} </div>
                      </div>

                </div>
            </div>
        </div>

@endsection
