@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создать цветок</h1>
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
                <form action="{{ route('flower.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>
                            <input type="text" name="title" class="form-control" placeholder="Наименование">
                        </label>
                        @error('title')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание"></textarea>
                        </label>
                        @error('description')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="number" name="price" class="form-control" placeholder="Цена">
                        </label>
                        @error('price')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="number" name="count" class="form-control" placeholder="Количество">
                        </label>
                        @error('count')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Теги</label>
                        <select class="tags" name="tags[]" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                        @error('tags')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Загрузка картинок</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile" multiple>
                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('images')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Добавить">

                    </div>
                </form>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection
