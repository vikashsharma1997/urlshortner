@extends('layout.app')
@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-content-title mb-2">Generated Short URLs</h2>
                        <p class="az-dashboard-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="az-content-header-right">
                        <form action="{{ route('export') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <select name="type" id="" class="form-control select2-no-search">
                                <option value="this_month">This Month</option>
                                <option value="last_month">Last Month</option>
                                <option value="last_week">Last Week</option>
                                <option value="today">Today</option>
                            </select>
                            <button type="submit" class="btn btn-purple">Download</button>
                        </form>
                        @if (!isSuperAdmin())
                        <a href="{{ route('generateshorturl') }}" class="btn btn-primary text-white">Generate New</a>
                        @endif
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mg-b-0">
                        <thead>
                            <tr>
                                @if (isSuperAdmin())
                                <th>Company</th>
                                @endif
                                <th>Short URL</th>
                                <th>Long URL</th>
                                <th>Hits</th>
                                <th>User</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($urls as $url)
                            <tr>
                                @if (isSuperAdmin())
                                <th scope="row">{{ $url->company ? $url->company->name : '' }}</th>
                                <th>{{ $url->shorten_url }}</th>
                                @else
                                <th scope="row">{{ $url->shorten_url }}</th>
                                @endif
                                <td>{{ $url->original_url }}</td>
                                <td>{{ $url->analytics_count }}</td>
                                <td>{{ $url->user ? $url->user->name : '' }}</td>
                                <td>{{ \Carbon\Carbon::parse($url->created_at)->format("d M 'y") }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No Data Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="py-3">
                        {{ $urls->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
