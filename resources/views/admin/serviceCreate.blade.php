@extends('layouts.admin')
@section('header')
    @include('admin.header')
@endsection
@section('content')
    <div class="wrapper container-fluid">
        <form action="{{ route('services.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="col-xs-2 control-label">Название:</label>
                <div class="col-xs-8">
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Введите название сервиса" required>
                </div>
            </div>
            <div class="form-group">
                <label for="icon" class="col-xs-2 control-label">Обозначение иконки:</label>
                <div class="col-xs-8">
                    <input type="text" name="icon" value="{{old('icon')}}" class="form-control" placeholder="Введите название иконки" required>
                </div>
            </div>
            <div class="form-group">
                <label for="text" class="col-xs-2 control-label">Текст:</label>
                <div class="col-xs-8">
                    <textarea name="text"  id="editor" class="form-control" placeholder="Введите текст страницы" required>{{old('text')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection
