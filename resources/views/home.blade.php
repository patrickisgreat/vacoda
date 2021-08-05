@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container dashboard">
        <!-- Application Dashboard -->
        <div class="row">
            {{--@include('nav')--}}

            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body dashboard-body">
                        <div class="base-panel-heading">
                            <h3 class="page-title">Dashboard</h3>
                        </div>

                        @include('components.dashboard.alerts-widget')

                        @include('components.dashboard.calendar-widget')

                        @include('components.dashboard.needs-review-widget')

                        @include('components.dashboard.activity-widget')

                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
