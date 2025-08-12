@extends('layout.app')
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-content-title mb-2">@if(auth()->user()->roleid !== 1){{'Team'}}@endif Members</h2>
                        <p class="az-dashboard-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    @if(!isAdmin())
                    <div class="az-content-header-right">
                        <a href="{{ route('members.invite') }}" class="btn btn-purple">Invite</a>
                    </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mg-b-0">
                        <thead>
                            <tr>
                                @if(auth()->user()->roleid === 1) <th>Company</th> @endif
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Total Generated URLs</th>
                                <th>Total URL Hits</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                @if(auth()->user()->roleid === 1) 
                                <th scope="row">{{ $user->company ? $user->company->name : '' }}</th>
                                <th>{{ $user->name }}</th>
                                @else
                                <th scope="row">{{ $user->name }}</th>
                                @endif
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role ? $user->role->name : '' }}</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="py-3">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
