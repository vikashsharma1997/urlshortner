@extends('layout.app')
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-content-title mb-2">Generate Short URL</h2>
                        <p class="az-dashboard-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="az-content-header-right">
                        <a href="{{ route('generatedshorturls') }}" class="btn btn-purple">Back</a>
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
                    <form action="{{ route('generateshorturl.post') }}" class="row" method="POST">
                        @csrf
                        <div class="col-12 mb-3" data-select2-id="21">
                            <p class="mg-b-10">Long URL</p>
                            <input type="url" class="form-control" name="url" placeholder="eg: https://sembark.com/travel-software/features/best-itinerary-builder" required>
                        </div>
                        <div class="col-12 mb-3">
                            <button class="btn btn-purple" type="submit">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
