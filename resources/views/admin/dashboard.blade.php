@extends('admin.index')

@section('content_header')
    <h1>Üdv, {{Auth::user()->name}}!</h1>
@stop

@section('content')
    <section>
        <h2>Munkakörök eloszlása</h2>
        <ul>
        @foreach ($job_statistics as $stat)
                <li>{{$stat->name}}: {{$stat->user_percents}}%</li>
        @endforeach
        </ul>
    </section>

@stop
