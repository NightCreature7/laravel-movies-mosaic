@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movies') }}</div>

                <div class="card-body">
                    <form action="{{ route('movies.search') }}" method="GET">
                        @csrf
                        <div class="form-group mb-3"> <!-- Add margin-bottom for spacing -->
                            <label for="query">Search for a Movie:</label>
                            <input type="text" name="query" id="query" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if (isset($results))
    <div class="container mt-4"> 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Movies') }}</div>

                    <div class="card-body">
                        <h2 class="mb-3">Search Results</h2> 
                        <ul>
                            @foreach ($results as $category => $items)
                                @if (count($items) > 0)
                                    <h3 class="mb-3 {{ str_contains(strtolower($category), 'names') ? 'hidden' : '' }}"> 
                                        {{ ucfirst($category) }}
                                    </h3>
                                    <ul class="{{ str_contains(strtolower($category), 'names') ? 'hidden' : '' }}"> 
                                        @foreach ($items as $item)
                                            @if (isset($item['name'])) 
                                                <li>
                                                    <a href="{{ route('movies.names', ['id' => $item['id']]) }}">{{ $item['name'] }}</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ route('movies.details', ['id' => $item['id']]) }}">{{ $item['title'] }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<style>
    .hidden {
        display: none; 
    }
</style>

@endsection
