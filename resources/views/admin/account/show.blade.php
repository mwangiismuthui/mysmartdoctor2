@extends('layouts.app',['pageTitle' => __(' Account Show')])
@section('content')

@component('layouts.parts.breadcrumb')
    @slot('title')
        {{ __(' Account') }}
    @endslot
@endcomponent
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __(' Account') }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/account') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="feather-16" data-feather="arrow-left"></i> {{ __(' Back') }}</button></a>
                        @if (Helper::authCheck('account-edit'))
                        <a href="{{ url('/admin/account/' . $account->id . '/edit') }}" title="Edit"><button class="btn btn-primary btn-sm"><i class="feather-16" data-feather="edit"></i> {{ __('Edit') }}</button></a>
                        @endif

                        @if (Helper::authCheck('account-delete'))
                        <form method="POST" id="deleteButton{{$account->id}}" action="{{ url('admin/account' . '/' . $account->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="sweetalertDelete({{$account->id}})"><i class="feather-16" data-feather="trash-2"></i> {{ __('Delete') }}</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $account->id }}</td>
                                    </tr>
                                    <tr><th> First Name </th><td> {{ $account->first_name }} </td></tr><tr><th> Last Name </th><td> {{ $account->last_name }} </td></tr><tr><th> Street Address </th><td> {{ $account->street_address }} </td></tr><tr><th> City </th><td> {{ $account->city }} </td></tr><tr><th> Country </th><td> {{ $account->country }} </td></tr><tr><th> Post Code </th><td> {{ $account->post_code }} </td></tr><tr><th> Phone Number </th><td> {{ $account->phone_number }} </td></tr><tr><th> Email </th><td> {{ $account->email }} </td></tr><tr><th> Card </th><td> {{ $account->card }} </td></tr><tr><th> Expiry Date </th><td> {{ $account->expiry_date }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

@endsection
