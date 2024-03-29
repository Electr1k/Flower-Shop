@extends('layouts.main')
@section('content')
    <div>
        <span class="badge text-bg-primary">{{ $flower->category != null ? $flower->category->title : '' }}</span>
        <h1>{{ $flower->title }}</h1>
        <div>{{ $flower->description }}</div>
        <h4>Картинки</h4>
        <div class="row">
            <div class="col-sm-4">
            @foreach($flower->images as $image)

                <div><a href="#"><img src="{{$image->image}}"></a></div>

                <div class="btn-group" role="group" aria-label="Actions">
                    <h5>{{ $image->id }}. {{$image->image}}</h5>
                    <form action="{{ route('image.destroy', [$flower->id, $image->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </div>
                <br>
                <br>
            @endforeach
            </div>
        </div>
        @foreach($flower->tags as $tag)
            <span class="badge text-bg-primary">{{ $tag->title }}</span>
        @endforeach
    </div>
    <br>
    <div class="btn-group" role="group" aria-label="Actions">
        <a href="{{ route('flower.index') }}" class="btn btn-secondary mx-1 rounded-2">Back</a>
        <a href="{{ route('flower.edit', $flower) }}" class="btn btn-primary mx-1 rounded-2">Edit</a>
        <form action="{{ route('flower.destroy', $flower->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
@endsection
