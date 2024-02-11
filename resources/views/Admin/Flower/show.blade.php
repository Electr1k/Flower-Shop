@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Цветок</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Цветы</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('flower.edit', $flower->id) }}" class="btn btn-primary">Изменить</a>
                            </div>
                            <form action="{{ route('flower.destroy', $flower->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0 ml-3">
                            <div class="row card-header  align-items-center">
                                <h1>{{ $flower->title }}</h1>
                                <span class="badge bg-success ml-1">{{ $flower->category->title }}</span>
                            </div>
                            <div class="row">
                                @foreach($flower->images as $img)
                                    <img src="{{$img->image}}" style="width: 250px; height: 200px" class="mr-3">
                                @endforeach
                            </div>
                                <H4>Цена: {{ $flower->price }} рублей</H4>
                                <H4>Количество: {{ $flower->count }} штук</H4>
                            <p>{{ $flower->description }}</p>
                            <div class="row ml-1">
                                @foreach($flower->tags as $tag)
                                    <span class="badge bg-primary mr-2">{{ $tag->title }}</span>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection
