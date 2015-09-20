@extends('layouts.default')

@section('content')
    <h1>Crear Partido</h1>
    @include('partials.errors')
    <form action="{{ route('committee_create_path') }}" method="post">
        {{ csrf_field() }}
        <label for="title">Nombre del Partido</label>
        <input class="form-control" type="text" name="title" value="{{ old('committee_name') }}">
        <label for="body">Descripción</label>
        <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ old('committee_name') }}</textarea>
        <input class="btn btn-success" type="submit" value="Crear">
    </form>
@stop