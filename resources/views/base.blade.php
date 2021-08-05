@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <!-- Resource Show -->
        <div class="row">
            {{--@include('nav')--}}

            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body">
                        <div class="base-panel-heading">
                            <h3 class="page-title"> @yield('component-headline')</h3>

                            @hasSection ('resource-name')
                            <div class="panel-heading-button">
                                <a class="btn btn-primary" href="/@yield('resource-name')">Create New</a>
                                @yield ('secondary-buttons')
                            </div>
                            @endif
                        </div>

                        @yield('component')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
