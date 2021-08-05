<needs-review-widget :team="team" inline-template>
    <!-- Needs Review Widget -->


    <div class="col-md-6">
        <div class="panel panel-default">

            <div class="panel-heading">Banners Awaiting Approval
                <!-- Example single danger button -->

                <div class="tabular-dropdown dropdown needsreview-widget-sort">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="needsReviewWidgetSort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        @{{ sortOrder }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="needsReviewWidgetSort">
                        <li><a @click="needsReviewSort = -1">Most Recent</a></li>
                        <li><a @click="needsReviewSort = 1">Oldest</a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body panel-list">
                <ul class="needs-review-widget">
                    <li v-for="pendingResource in pendingResources | orderBy 'updated_at' needsReviewSort | limitBy 10">
                       <a href="/banner/@{{ pendingResource.id }}"> @{{ pendingResource.name }}</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>


</needs-review-widget>