var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less')
       .browserify('app.js', null, null, { paths: 'vendor/laravel/spark/resources/assets/js' })
       .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js/sweetalert.min.js')

        .copy('resources/assets/css/jstree/themes/default/32px.png', 'public/css/32px.png')
        .copy('resources/assets/css/jstree/themes/default/40px.png', 'public/css/40px.png')
        .copy('resources/assets/css/jstree/themes/default/throbber.gif', 'public/css/throbber.gif');


});

elixir(function(mix) {
    mix.copy('node_modules/bootstrap/fonts', 'public/fonts')
});