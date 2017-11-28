@extends('admin.index')
@section('content_header')
    <h1>Felhasználók</h1>
@stop

@section('content')
    <div data-ng-app="Admin" data-ng-controller="User" data-ng-init="init()">
        @include('admin.user.search')
        @include('admin.user.table')
        @include('admin.user.form')
    </div>
@stop