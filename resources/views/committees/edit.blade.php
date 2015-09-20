@extends('layouts.default')

@section('content')
    <h1>Editar Partido</h1>
    @include('partials.errors')
    <form action="{{ route('committee_patch_path', $committee->id) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="patch">
        <label for="title">Nombre del Partido</label>
        <input class="form-control" type="text" name="title" value="{{ $committee->committee_name }}">
        <label for="body">Descripción</label>
        <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ $committee-> committee_name}}</textarea>
        <input class="btn btn-success" type="submit" value="Guardar">
    </form>
@stop