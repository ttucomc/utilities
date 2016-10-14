const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {

    // This comment is a test
    mix.copy('resources/assets/js/materialize.min.js', 'public/js');

    mix.sass('app.scss');

    mix.webpack('app.js');

    mix.browserSync({
      proxy: 'ttucomc-utilities.app'
    })

});
