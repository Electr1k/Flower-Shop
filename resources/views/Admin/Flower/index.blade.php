@extends('layouts.admin')
@section('content')
    <div>
        @foreach($flowers as $flower)
            <a href="{{ route('flower.show', $flower->id) }}"><div>{{ $flower->id }}. {{ $flower->title }}</div></a>
        @endforeach

        <div>
            {{ $flowers->withQueryString()->links() }}
        </div>
    </div>
@endsection
