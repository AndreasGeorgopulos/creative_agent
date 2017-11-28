<div data-ng-if="pager.data && selected !== null" class="box box-info col-md-6">
    <div class="box-header with-border">
        <h3>[[selected.id ? 'Dolgozó módosítása' : 'Új dolgozó']]</h3>
    </div>

    <form class="" name="userFrm">
        <div class="box-body">
            <div class="form-group col-md-4 col-sm-4">
                <label for="name">Név*</label>
                <input required ng-model="selected.name" type="text" class="form-control" name="name" />
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="email">E-mail cím*</label>
                <input required ng-model="selected.email" type="text" class="form-control" name="email" />
            </div>
            <div class="clearfix"></div>

            <div class="form-group col-md-3 col-sm-3">
                <label for="password">
                    <span ng-if="!selected.id">Jelszó*</span>
                    <span ng-if="selected.id">Új jelszó</span>
                </label>
                <input ng-if="password_is_visible == 0" ng-model="selected.password" type="password" class="form-control" name="password" />
                <input ng-if="password_is_visible == 1" ng-model="selected.password" type="text" class="form-control" name="password" />
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label for="password_confirmation">Jelszó megerősítése<span ng-if="!selected.id">*</span></label>
                <input ng-if="password_is_visible == 0" ng-model="selected.password_confirmation" type="password" class="form-control" name="password_confirmation" />
                <input ng-if="password_is_visible == 1" ng-model="selected.password_confirmation" type="text" class="form-control" name="password_confirmation" />
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <label for="password_confirmation">Erősség</label>
                <br />
                <meter min="0" max="4" value="[[password_strength]]" low="2" high="3.1" optimum="4" style="width: 100px; height: 34px;"></meter>
            </div>
            <div class="form-group col-md-2 col-sm-2">
                <br />
                <button ng-click="password_visible(password_is_visible == 1 ? 0 : 1)" class="btn btn-default"><span ng-class="password_is_visible == 1 ? 'glyphicon glyphicon-check' : 'glyphicon glyphicon-unchecked'"></span> Jelszó látható</button>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
                <label>Munkakörök:</label>
                <div class="row">
                    <div class="col-lg-2 col-md-3" data-ng-repeat="job in jobs">
                        <button class="btn btn-default" data-ng-click="setJob(job.id)"><span data-ng-class="selected.job_ids.indexOf(job.id) > -1 ? 'glyphicon glyphicon-check' : ''"></span> [[job.name]]</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <button data-ng-click="cancel()" class="btn btn-default">Mégsem</button>
            <button data-ng-click="save()" class="btn btn-info pull-right" data-ng-disabled="userFrm.$invalid || !selected.job_ids.length || selected.password != selected.password_confirmation">Rendben</button>
        </div>
    </form>
</div>
<div class="clearfix"></div>