<alerts-widget :team="team" inline-template>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Alerts (most recent)
                {{--<span class="pull-right"><a href="{{ route('alerts-list') }}">see more Alerts</a></span>--}}
            </div>

            <div class="panel-body panel-list">
                <ul class="alerts-widget">
                    <li v-for="(index, alert) in firstSixAlerts">
                        <span class="alerts-widget-date">@{{dateTime(alert.created_at)}}</span>
                        <a v-if="alert.type == 'sfmc_banner'" href="https://trust.marketingcloud.com/">
                            @{{ alert.label }}
                        </a>
                        <span v-if="index <= 2" class="icon-icon_new_notification"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
 </alerts-widget>