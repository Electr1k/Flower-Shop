@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('flower.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="Title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="description">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" aria-describedby="Image">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
