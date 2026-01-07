@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Articles</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @can('create articles')
            <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Create New Article</a>
        @endcan

        <ul class="list-group">
            @foreach ($articles as $article)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $article['title'] }}
                    <div>
                        @can('edit articles')
                            <a href="{{ route('articles.edit', $article['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endcan
                        @can('delete articles')
                            <form action="{{ route('articles.destroy', $article['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endcan
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
