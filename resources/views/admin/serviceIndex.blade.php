@extends('layouts.admin')
@section('header')
    @include('admin.header')
@endsection
@section('content')
    <div style="margin:0px 50px 0px 50px;">
        @if($services)
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Текст</th>
                    <th>Иконка</th>
                    <th>Удаление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $k => $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td><a href="{{ route('services.edit', ['service'=>$service->id]) }}" alt="{{$service->name}}">{{$service->name}}</a></td>
                        <td>{{ $service->text }}</td>
                        <td>{{ $service->icon }} <i class="fa {{ $service->icon }}"></i></td>
                        <td>
                            <form action="{{route('services.destroy', ['service'=>$service->id])}}" class="form-horizontal" method="POST">
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
        <a href="{{ route('services.create') }}">Новый элемент</a>
    </div>
    <br><br>
@endsection
