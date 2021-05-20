// webpack.mix.js
let mix = require("laravel-mix");

mix
  .js("assets/js/main.js", "dist")
  .setPublicPath("dist")
  .sass("assets/scss/main.scss", "dist")
  .setPublicPath("dist")
  .browserSync({
    files: ["*.php", "assets/scss/*.scss", "assets/js/*.js"],
    proxy: "ito.watch", // We need to use a proxy instead of the built-in server because WordPress has to do some server-side rendering for the theme to work
    host: "ito.watch",
    watchOptions: {
      debounceDelay: 1000, // This introduces a small delay when watching for file change events to avoid triggering too many reloads
    },
    injectChanges: false,
  });
