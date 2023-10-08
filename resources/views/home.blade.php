@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="text-center mt-4">
                        <p>Automatic Redirection in 3 seconds...</p>
                        <script>
                            setTimeout(function() {
                                window.location.href = "{{ route('movies.search') }}";
                            }, 3000);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
