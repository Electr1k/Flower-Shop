@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('flower.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input value="{{ old('title') }}" type="text" class="form-control" name="title" id="title" aria-describedby="Title">
                @error('title')
                <p class="text-danger">{{$message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input value="{{ old('description') }}" type="text" class="form-control" name="description" id="description" aria-describedby="description">
            </div>

            <div class="form-group">
                <label for="category">Категория</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option {{ old('category_id') == $category->id ? ' selected' : ''}}
                                value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
