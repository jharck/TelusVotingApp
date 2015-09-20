@extends('layouts.default')

@section('content')
    <h1>Listado de Partidos</h1>
    <hr>
    <ul class="list-unstyled">
    @foreach($committees as $committee)
        <li>
            <p class="lead">
                <a href="{{ route('committee_show_path', $committee->id) }}">
                    {{ $committee->committee_name }}
                </a>
            </p>
            <hr>
        </li>
    @endforeach
    </ul>

    <!-- Counter -->
    <div><img src="http://simplehitcounter.com/hit.php?uid=1953975&f=16777215&b=255" border="0" height="18" width="83" alt="web counter"></a><br></div>
    <!-- End Counter -->
@stop