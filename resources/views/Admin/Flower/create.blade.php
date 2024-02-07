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

                <form action="{{ route('flower.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>
                            <input type="text" name="title" class="form-control" placeholder="Наименование">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="description" class="form-control" placeholder="Описание">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="number" name="price" class="form-control" placeholder="Цена">
                        </label>
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
