@extends('layouts.main')
@section('content')
    <div>
        @foreach($flowers as $flower)
            <a href="{{ route('flower.show', $flower->id) }}"><div>{{ $flower->id }}. {{ $flower->title }}</div></a>
        @endforeach

        <div>
            {{ $flowers->links() }}
        </div>
    </div>
@endsection
