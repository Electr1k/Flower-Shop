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
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" aria-describedby="Image" value="{{$flower->image}}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
