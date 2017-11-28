@extends('adminlte::page')

@section('js')
    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <script type="text/javascript" src="{{asset('/js/admin/controller.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/admin/controller/jobs.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/admin/controller/users.js')}}"></script>

@stop

@section('title', 'Admin zone')

<!-- Modal -->
<div class="modal fade" id="modal_window" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>This is a large modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ok"><span class="glyphicon glyphicon glyphicon-ok"></span> Rendben</button>
                <button type="button" class="btn btn-default cancel"><span class="glyphicon glyphicon glyphicon-remove"></span> Mégsem</button>
            </div>
        </div>
    </div>
</div>

<!-- Alert Modal -->
<div class="modal fade" id="modal_alert" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-info-sign"></span> <span class="modal-title">Modal Header</span></h4>
            </div>
            <div class="modal-body">
                <p>This is a large modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary ok"><span class="glyphicon glyphicon glyphicon-ok"></span> Rendben</button>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Modal -->
<div class="modal fade" id="modal_confirm" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-question-sign"></span> <span class="modal-title">Modal Header</span></h4>
            </div>
            <div class="modal-body">
                <p>This is a large modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary yes"><i class="glyphicon glyphicon glyphicon-ok"></i> Igen</button>
                <button type="button" class="btn btn-default no"><i class="glyphicon glyphicon glyphicon-remove"></i> Nem</button>
            </div>
        </div>
    </div>
</div>