<activity-widget :team="team" :user="user" inline-template>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Activity (most recent)
                {{--<span class="pull-right"><a href="{{ route('activity-list') }}">see more Activity</a></span>--}}
            </div>

            <div class="panel-body panel-list">
                <ul class="activity-widget">
                    <li v-for="(activity, index) in firstSixActivity">
                        <span class="activity-widget-date">@{{dateTime(activity.created_at)}}</span>
                        <a href="@{{ resourceRoute(activity.auditable_type, activity.auditable_id) }}">
                            @{{ activity.user.name }} @{{ activity.type }} @{{ resourceName(activity.auditable_type) }} @{{ activity.auditable_id }}
                        </a>
                        <span v-if="user.last_seen_activity_at <= activity.created_at" class="icon-icon_new_notification"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
 </activity-widget>
