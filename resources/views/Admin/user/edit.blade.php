@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Изменить польователя</h1>
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

                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <label>Имя</label>

                    <div class="form-group">
                        <label>
                            <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Имя">
                        </label>
                        @error('name')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <label>Фамилия</label>

                    <div class="form-group">
                        <label>
                            <input type="text" value="{{$user->surname}}" name="surname" class="form-control" placeholder="Фамилия">
                        </label>
                        @error('surname')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <label>Админ</label>
                    <div class="form-group">
                        <select class="custom-select form-control" id="isAdmin" name="isAdmin">
                            <option disabled selected>Админ</option>
                            <option {{ $user->isAdmin || old('isAdmin') ? ' selected' : ''}} value="1">Да</option>
                            <option {{ !$user->isAdmin ? ' selected' : '' }} value="0">Нет</option>
                        </select>
                        @error('isAdmin')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <label>Возраст</label>
                    <div class="form-group">
                        <label>
                            <input type="number" value="{{$user->age}}" name="age" class="form-control" placeholder="Возраст">
                        </label>
                        @error('age')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <label>Баланс</label>
                    <div class="form-group">
                        <label>
                            <input type="number" value="{{$user->balance}}" name="balance" class="form-control" placeholder="Баланс">
                        </label>
                        @error('balance')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <label>Адрес</label>

                    <div class="form-group ">
                        <label>
                            <input type="text" value="{{$user->address}}" name="address" class="form-control" placeholder="Адресс">
                        </label>
                        @error('address')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <label for="gender">Пол</label>
                    <div class="form-group">
                        <select class="custom-select form-control" id="gender" name="gender">
                            <option disabled selected>Пол</option>
                            <option {{ $user->gender || old('gender') ? ' selected' : '' }} value="1">Мужской</option>
                            <option {{ !$user->gender ? ' selected' : '' }} value="0">Женский</option>
                        </select>
                        @error('gender')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Редактировать">
                    </div>
                </form>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
