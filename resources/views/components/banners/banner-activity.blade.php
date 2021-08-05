<banner-activities :resource-id="{{ $resource_id }}" inline-template>
    <div class="col-sm-4 banner-activity-widget">
        <h4>Banner Audit Trail</h4>
    <div class="banner-activity-list col-sm-12">
        <ul class="banner-activity-feed">
            <li class="banner-activity-feed banner-activity-@{{ index }}-li no-bullet" v-for="(index, activity) in activities" v-on:mouseOver="toggleShareLink(index, 1)" v-on:mouseOut="toggleShareLink(index, 0)">
                <a class="banner-activity-@{{index}}">@{{ activity.type }} <span v-if="activity.type != 'Unarchived'">@{{ activity.action }}</span> by @{{ activity.user }} on @{{ activity.pretty_date }}</a>
                <span class="banner-activity-time">@{{ activity.time_elapsed  }}</span>
                <a v-on:click="copyShareLink(index)" href="#" data-share-link="@echo(Request::url())/banner-activity-@{{index}}" class="activity-share-link banner-activity-share-@{{index}}">Share link</a>
            </li>
        </ul>
    </div>
    </div>
    <div class="copied">Copied to Clipboard</div>
    <div class="overlay">
    </div>
</banner-activities>
