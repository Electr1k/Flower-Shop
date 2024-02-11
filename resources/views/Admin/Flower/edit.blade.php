@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Изменить цветок</h1>
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

                <form action="{{ route('flower.update', $flower->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label>
                            <input type="text" name="title" class="form-control" value="{{$flower->title}}" placeholder="Наименование">
                        </label>
                        @error('title')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание">{{$flower->description}}</textarea>
                        </label>
                        @error('description')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="number" name="price" value="{{$flower->price}}" class="form-control" placeholder="Цена">
                        </label>
                        @error('price')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="number" name="count" value="{{$flower->count}}" class="form-control" placeholder="Количество">
                        </label>
                        @error('count')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Теги</label>
                        <select class="tags" name="tags[]" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    @foreach($flower->tags as $flowerTag)
                                    {{ $tag->id == $flowerTag->id ? ' selected' : '' }}
                                    @endforeach
                                    value="{{$tag->id}}">{{ $tag->title }}</option>
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
                                <option value="{{$category->id}}" {{ $category->id === $flower->category_id ? ' selected' : '' }}>{{ $category->title }}</option>
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
                <div class="row">
                    @foreach($flower->images as $img)
                        <div class="col">
                            <img src="{{$img->image}}" style="width: 250px; height: 200px" class="mr-3">
                            <form action="{{ route('image.destroy', $img->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
