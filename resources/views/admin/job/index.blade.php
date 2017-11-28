@extends('admin.index')
@section('content_header')
    <h1>Munkakörök</h1>
@stop

@section('content')
    <div data-ng-app="Admin" data-ng-controller="Job" data-ng-init="init()">
        @include('admin.job.table')
        @include('admin.job.form')
    </div>
@stop