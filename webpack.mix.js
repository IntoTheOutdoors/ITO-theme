// webpack.mix.js
let mix = require("laravel-mix");

mix
  .js("assets/js/main.js", "dist")
  .setPublicPath("dist")
  .sass("assets/scss/main.scss", "dist")
  .setPublicPath("dist")
  .browserSync({
    files: [
      "*.php", 
      "template-parts/*.php", 
      "assets/scss/*.scss", 
      "assets/js/*.js"
    ],
    proxy: "https://ito.live/", // We need to use a proxy instead of the built-in server because WordPress has to do some server-side rendering for the theme to work
    host: "https://ito.live/",
    watchOptions: {
      debounceDelay: 1000, // This introduces a small delay when watching for file change events to avoid triggering too many reloads
    },
    injectChanges: false,
  });
