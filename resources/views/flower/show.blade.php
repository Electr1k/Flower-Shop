@extends('layouts.main')
@section('content')
    <div>
        <h1>{{ $flower->title }}</h1>
        <div>{{ $flower->description }}</div>
    </div>
    <div class="btn-group" role="group" aria-label="Actions">
        <a href="{{ route('flower.index') }}" class="btn btn-secondary mx-1 rounded-2" >Back</a>
        <a href="{{ route('flower.edit', $flower) }}" class="btn btn-primary mx-1 rounded-2">Edit</a>
        <form action="{{ route('flower.destroy', $flower->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
@endsection
