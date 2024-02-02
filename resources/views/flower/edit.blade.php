@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('flower.update', $flower->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="Title" value="{{$flower->title}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="description" value="{{$flower->description}}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            <form action="{{ route('image.store', $flower->id) }}" method="post">
                {{  $flower->id }}
                @csrf
                <label for="description">Image</label>
                <input type="text" class="form-control" name="image" id="image" aria-describedby="image">
                <button type="submit" class="btn btn-success">Set</button>
            </form>
    </div>
@endsection
