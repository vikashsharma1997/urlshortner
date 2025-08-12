@extends('layout.app')
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-content-title mb-2">Clients</h2>
                        <p class="az-dashboard-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="az-content-header-right">
                        <a href="{{ route('clients.invite') }}" class="btn btn-purple">Invite</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mg-b-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Users</th>
                                <th>Total Generated URLs</th>
                                <th>Total URL Hits</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                            <tr>
                                <th scope="row">{{ $company->name }}</th>
                                <td>{{ $company->users ? $company->users->count() : 0 }}</td>
                                <td>{{ $company->urls ? $company->urls->count() : 0 }}</td>
                                <td>{{ $company->analytics()->count() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="py-3">
                        {{ $companies->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
