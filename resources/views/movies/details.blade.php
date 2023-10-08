@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movie Details') }}</div>

                <div class="card-body text-center"> <!-- Center align the content -->
                    <h1>{{ $movieData['title'] }}</h1>
                    <p><strong>Release Year:</strong> {{ $movieData['year'] }}</p>
                    <p><strong>Rating:</strong> {{ $movieData['rating'] }}</p>
                    <p><strong>Plot:</strong> {{ $movieData['plot'] }}</p>

                    <!-- Display the movie poster with max width and height -->
                    @if (isset($movieData['poster']))
                        <div class="mb-3"> <!-- Add margin to create space below the image -->
                            <img src="{{ $movieData['poster'] }}" alt="{{ $movieData['title'] }} Poster" 
                                 style="max-width: 100%; max-height: 400px; width: auto; height: auto;"
                                 class="img-fluid mx-auto"> <!-- Center align the image horizontally -->
                        </div>
                    @endif

                    <!-- Back button below the image -->
                    <a href="{{ route('movies.search') }}" class="btn btn-primary">Back to Search</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
