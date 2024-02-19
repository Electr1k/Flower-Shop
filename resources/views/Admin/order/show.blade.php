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
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{ $order->user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Статус</td>
                                        <td>
                                            <form action="{{ route('order.update', $order->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <select class="status" name="status" data-placeholder="Выберите тег" style="width: 100%;">
                                                        @foreach(\App\Enums\OrderStatus::cases() as $status)
                                                            <option
                                                                    {{ $order->status == $status ? ' selected' : '' }}
                                                                value="{{$status->name}}">
                                                                {{ $status }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('status')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" value="Изменить">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Сумма</td>
                                        <td>{{ $order->total_price }} рублей</td>
                                    </tr>
                                    <tr>
                                        <td>Имя</td>
                                        <td>{{ $order->user->name.' '.$order->user->surname}}</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес</td>
                                        <td>{{ $order->user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $order->user->email }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach(json_decode($order->products) as $product)
                                    <div class="col-sm-2" style="text-align: center">
                                        <a href="{{ route('flower.show', $product->flower->id) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                            <img src="{{ count($product->flower->images) ? $product->flower->images[0]->title : "" }}" class="img-fluid mb-2" alt="">
                                        </a>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$product->flower->title}}</font></font>
                                        <br>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$product->flower->price}} руб. * {{$product->count}}</font></font>
                                    </div>
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
