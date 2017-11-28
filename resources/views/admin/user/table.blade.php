<div data-ng-if="pager.data && selected == null" class="box">
    <table class="table table-hover dataTable">
        <thead>
        <tr>
            <th>Név</th>
            <th>E-mail</th>
            <th>Munkakörök</th>
            <th class="text-right">
                <button data-ng-click="edit()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                <button data-ng-click="pager.load()" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            </th>
        </tr>
        </thead>

        <tbody>
            <tr data-ng-if="!pager.data.length">
                <td colspan="4" class="text-center">Nincs megjeleníthető elem.</td>
            </tr>
            <tr data-ng-if="pager.data.length" data-ng-repeat="user in pager.data">
                <td>[[user.name]]</td>
                <td>[[user.email]]</td>
                <td>[[user.jobs_title]]</td>
                <th class="text-right">
                    <button data-ng-click="edit(user)" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button data-ng-click="remove(user)" class="btn btn-default btn-sm"><i class="fa fa-remove"></i></button>
                </th>
            </tr>
        </tbody>
    </table>
    @include('layouts.paginator')
</div>