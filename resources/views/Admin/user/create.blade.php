@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создать пользователя</h1>
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

                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>
                            <input type="text" name="name" class="form-control" placeholder="Имя" value="{{old('name')}}">
                        </label>
                        @error('name')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="surname" class="form-control" placeholder="Фамилия" value="{{old('surname')}}">
                        </label>
                        @error('surname')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('Email')}}">
                        </label>
                        @error('email')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="password" class="form-control" placeholder="Пароль" value="{{old('password')}}">
                        </label>
                        @error('password')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control" id="isAdmin" name="isAdmin">
                            <option disabled selected>Админ</option>
                            <option {{ old('isAdmin') ? ' selected' : '' }} value="1">Да</option>
                            <option {{ old('isAdmin') === 0 ? ' selected' : ''}} value="0">Нет</option>
                        </select>
                        @error('isAdmin')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="number" name="age" class="form-control" placeholder="Возраст" value="{{old('age')}}">
                        </label>
                        @error('age')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text" name="address" class="form-control" placeholder="Адресс" value="{{old('address')}}">
                        </label>
                        @error('address')
                        <p class="text-danger">{{$message }}</p>
                        @enderror
                    </div>
                    <label for="gender">Пол</label>
                    <div class="form-group">
                        <select class="custom-select form-control" id="gender" name="gender" value="{{old('gender')}}">
                            <option disabled selected>Пол</option>
                            <option {{ old('gender') ? ' selected' : '' }} value="1">Мужской</option>
                            <option {{ old('gender') === 0 ? ' selected' : ''}} value="0">Женский</option>
                        </select>
                        @error('gender')
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
