@extends('layout.app')

@section('content')
    <div class="az-signin-wrapper">
      <div class="az-card-signin">
        <div class="az-signin-header">
          <h2>Welcome back!</h2>
          <h4>Please sign in to continue</h4>
            @if($errors->any())
                <div class="alert alert-danger my-3">
                {{ $errors->first() }}
                </div>
            @endif
          <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter your email" value="" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter your password" value="" required>
            </div>
            <button class="btn btn-az-primary btn-block" type="submit">Sign In</button>
          </form>
        </div>
      </div>
    </div>
@endsection