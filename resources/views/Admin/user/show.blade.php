@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Пользователи</li>
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
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Изменить</a>
                            </div>
                            <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Имя</td>
                                        <td>{{ $user->name.' '.$user->surname}}</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Возраст</td>
                                        <td>{{ $user->age }}</td>
                                    </tr>
                                    <tr>
                                        <td>Пол</td>
                                        <td>{{ isset($user->gender) ? $user->getGenderTitleAttribyte() : ""}}</td>
                                    </tr>
                                    <tr>
                                        <td>Баланс</td>
                                        <td>{{ $user->balance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Админ</td>
                                        <td>@if($user->isAdmin) Да @else Нет @endif</td>
                                    </tr>
                                </tbody>
                            </table>
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
