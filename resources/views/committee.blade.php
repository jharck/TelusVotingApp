@extends('layouts.default')

@section('content')

    <h1>{{ $committee->committee_name }}</h1>
    <p>
        {{ $committee->body  }}
    </p>
@stop

