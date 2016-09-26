var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss', elixir.config.publicDir + '/css')
    .copy(
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        elixir.config.publicDir + '/js'
    )
    .copy(
        'node_modules/jquery/dist/jquery.min.js',
        elixir.config.publicDir + '/js'
    );
});
