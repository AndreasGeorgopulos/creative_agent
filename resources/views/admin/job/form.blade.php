<div data-ng-if="pager.data && selected !== null" class="box box-info col-md-6">
    <div class="box-header with-border">
        <h3>[[selected.id ? 'Munkakör módosítása' : 'Új munkakör']]</h3>
    </div>

    <form class="form-horizontal" name="jobFrm">
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Név:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" required="true" data-ng-model="selected.name" maxlength="100" />
                    <span data-ng-if="jobFrm.name.$touched && jobFrm.name.$invalid">A mező kitöltése kötelező.</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Leírás:</label>
                <div class="col-sm-10">
                    <textarea required name="description" class="form-control" data-ng-model="selected.description" maxlength="500"></textarea>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <button data-ng-click="cancel()" class="btn btn-default">Mégsem</button>
            <button data-ng-click="save()" class="btn btn-info pull-right" data-ng-disabled="jobFrm.$invalid">Rendben</button>
        </div>
    </form>
</div>
<div class="clearfix"></div>