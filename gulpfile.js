const elixir = require('laravel-elixir');

require('laravel-elixir-materialize-css');
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
    mix.materialize();

    mix.sass('app.scss');

    mix.webpack('app.js');

    mix.browserSync({
      proxy: 'ttucomc-utilities.app'
    })
});
