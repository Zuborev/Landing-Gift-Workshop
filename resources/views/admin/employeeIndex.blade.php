@extends('layouts.admin')
@section('header')
    @include('admin.header')
@endsection
@section('content')
    <div style="margin:0px 50px 0px 50px;">
        @if($employees)
            <a href="{{ route('employees.create') }}">Новый сотрудник</a>
            <br><br>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Должность</th>
                    <th>Описание</th>
                    <th>Инстаграм</th>
                    <th>Фото</th>
                    <th>Удаление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $k => $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td><a href="{{ route('employees.edit', ['employee'=>$employee->id]) }}" alt="{{$employee->name}}">{{$employee->name}}</a></td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->text }}</td>
                        <td><a href="{{ $employee->instagram_link }}">{{ $employee->instagram_link }}</a></td>
                        <td><img src="/img/{{ $employee->images }}" class="img-thumbnail img-responsive" width="75px"></td>
                        <td>
                            <form action="{{route('employees.destroy', ['employee'=>$employee->id])}}" class="form-horizontal" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
