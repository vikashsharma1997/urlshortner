@extends('layout.app')
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-content-title mb-2">Invite</h2>
                        <p class="az-dashboard-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="az-content-header-right">
                        <a href="{{ route('clients') }}" class="btn btn-purple">Back</a>
                    </div>
                </div>
                <div class="">
                    @if (session('success'))
                        <div class="alert alert-success my-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger my-3">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <form action="{{ route('clients.sendInvitation') }}" class="row" method="POST">
                        @csrf
                        <div class="col-lg-4 mb-3" data-select2-id="21">
                            <p class="mg-b-10">Name</p>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-lg-4 mb-3" data-select2-id="21">
                            <p class="mg-b-10">Email</p>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="col-lg-4 mb-3" data-select2-id="21">
                            <p class="mg-b-10">Company</p>
                            <select class="form-control select2" required name="company">
                                <option label="Choose one"></option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <button class="btn btn-purple" type="submit">Send Invitation</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
