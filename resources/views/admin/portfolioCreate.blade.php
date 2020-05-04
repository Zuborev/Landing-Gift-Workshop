@extends('layouts.admin')
@section('header')
    @include('admin.header')
@endsection
@section('content')
    <div class="wrapper container-fluid">
        <form action="{{ route('portfolios.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="col-xs-2 control-label">Название:</label>
                <div class="col-xs-8">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Введите название элемента порфолио" required>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-xs-2 control-label">Имя фильтра:</label>
                <div class="col-xs-8">
                    <input type="text" name="filter" value="{{old('filter')}}" class="form-control" placeholder="Введите имя фильтра" required>
                </div>
            </div>
            <div class="form-group">
                <label for="images" class="col-xs-2 control-label">Изображение:</label>
                <div class="col-xs-8">
                    <input type="file" class="filestyle" name="images" value="{{old('text')}}" data-placeholder="Файла нет" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
