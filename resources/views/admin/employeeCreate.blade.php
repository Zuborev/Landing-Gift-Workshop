@extends('layouts.admin')
@section('header')
    @include('admin.header')
@endsection
@section('content')
    <div class="wrapper container-fluid">
        <form action="{{ route('employees.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="col-xs-2 control-label">Имя:</label>
                <div class="col-xs-8">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Введите имя сотрудника" required>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-xs-2 control-label">Должность:</label>
                <div class="col-xs-8">
                    <input type="text" name="position" value="{{old('position')}}" class="form-control" placeholder="Введите должность сотрудника" required>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-xs-2 control-label">Описание:</label>
                <div class="col-xs-8">
                    <input type="text" name="text" value="{{old('text')}}" class="form-control" placeholder="Введите описание сотрудника" required>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-xs-2 control-label">Ссылка на инстаграмм:</label>
                <div class="col-xs-8">
                    <input type="text" name="instagram_link" value="{{old('instagram_link')}}" class="form-control" placeholder="Вставьте ссылку на инстаграм" required>
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-xs-2 control-label">Фото:</label>
                <div class="col-xs-8">
                    <input type="file" class="filestyle" name="images" value="{{old('images')}}" data-placeholder="Файла нет" required>
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
