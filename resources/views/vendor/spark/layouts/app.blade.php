<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Vacoda')</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="//fast.fonts.net/jsapi/95ed7a3b-1194-4e3d-8552-b06661486719.js"></script>

    <!-- CSS -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
            Spark::scriptVariables(), []
        )); ?>;

        window.Vacoda = <?php echo json_encode(array_merge(
            $vacoda_settings, []
        )); ?>;
    </script>
</head>
<body class="with-navbar" v-cloak>
    <div id="spark-app">
        <!-- Navigation -->
        @if (Auth::check())
            @include('spark::nav.user')
        @else
            @include('spark::nav.guest')
        @endif

        <!-- Main Content -->
        @yield('content')

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif

        <!-- JavaScript -->
        <script src="/js/app.js"></script>
        <script src="/js/sweetalert.min.js"></script>
    </div>
    <script type="text/x-handlebars-template" id="taxonomy_terms">

        <div class="miller--terms--container">

            @{{#if parent}}
            <div class="miller--terms--selection">
                @{{#each parent}} @{{#if @index}} &raquo; @{{/if}}
                <a href="#" class="crumb" data-depth="@{{depth}}">@{{name}}</a>
                @{{/each}}
            </div>
            @{{/if}}

            <ul class="terms">
                @{{#each taxonomies}}
                <li class="term @{{#if childrenCount}}has-children@{{/if}}" data-id="@{{id}}">
                    <a href="@{{url}}" id="@{{id}}">
                        <span class="title">@{{label}}</span><span class="child-count"><sup>@{{childCount}}</sup></span>
                        <em class="icon icon-arrow"></em> <em class="icon icon-search" title="Search for @{{label}}"></em>
                        @{{#if description}}<span class="description">@{{description}}</span>@{{/if}}
                    </a>
                </li>
                @{{/each}}
            </ul>

        </div>

    </script>
</body>
</html>
