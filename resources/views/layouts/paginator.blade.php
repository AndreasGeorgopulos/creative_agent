<div data-ng-if="pager.steps.length > 1">
    <div class="text-right">
        <div class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <li class="paginate_button previous" data-ng-class="pager.index == 0 ? 'disabled' : ''"><a data-ng-click="pager.prev()" href="#">Előző</a></li>
                <li data-ng-repeat="step in pager.steps" class="paginate_button" data-ng-class="pager.index == $index ? 'active' : ''"><a data-ng-click="pager.select($index)" href="#">[[$index+1]]</a></li>
                <li class="paginate_button next" data-ng-class="pager.index >= pager.steps.length - 1 ? 'disabled' : ''"><a data-ng-click="pager.next()" href="#">Következő</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"></div>