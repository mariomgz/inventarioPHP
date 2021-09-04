@extends('layout')
@section('content')

<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a href="{{route('category.form')}}" class="btn btn-primary">Nueva Categoría</a>
    </div>

</div>
@if (Session:: has('message'))
<p class="alert alert-success">
    {{Session::get('message')}}

</p>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>

    </thead>
    <tbody>

        @foreach($miListaDeCategorias as $category)

        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a href="{{ route('category.form',['id' => $category->id]) }}" class="btn btn-warning">Editar</a>
                <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger">Borrar</a>
            </td>

        </tr>

        @endforeach

    </tbody>
</table>
@endsection