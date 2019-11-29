// Gulp.js configuration
"use strict";

// options for src and build folders
const dir = {
    src: "./assets/src/",
    build: "./assets/build/",
    root: "./"
  },
  // gulp plugins etc
  gulp = require("gulp"),
  gutil = require("gulp-util"),
  sass = require("gulp-sass"),
  cssnano = require("cssnano"),
  autoprefixer = require("gulp-autoprefixer"),
  sourcemaps = require("gulp-sourcemaps"),
  //NOTE: commenting this out becuase it's whining about something or other and I don't even use this thing. its another thing from a previous dev
  // jshint = require("gulp-jshint"),
  stylish = require("jshint-stylish"),
  uglify = require("gulp-uglify"),
  concat = require("gulp-concat"),
  rename = require("gulp-rename"),
  plumber = require("gulp-plumber"),
  //NOTE: I have commented out bower because it's something left over from the previous dev and I don't really use the command that uses it and from what I can tell that command is better handled with npm but yeah that's it for now.
  // bower = require("gulp-bower"),
  babel = require("gulp-babel"),
  postcss = require("gulp-postcss"),
  browserSync = require("browser-sync").create();

// Browser-sync
var browsersync = false;

//- CSS
//config
var css = {
  src: dir.src + "scss/*.scss",
  watch: dir.src + "scss/**/*.scss", //*/
  build: dir.build,
  sassOpts: {
    outputStyle: "expanded",
    //   imagePath       : images.build,
    precision: 3,
    errLogToConsole: true
  },
  processors: [
    require("postcss-assets")({
      // loadPaths: ['images/'],
      basePath: dir.build
    }),
    require("autoprefixer")(),
    require("css-mqpacker"),
    require("cssnano")
  ]
};

// CSS processing
gulp.task(
  "scss",
  gulp.series(() => {
    return gulp
      .src(css.src)
      .pipe(sourcemaps.init())
      .pipe(sass(css.sassOpts))
      .pipe(postcss(css.processors))
      .pipe(sourcemaps.write("./"))
      .pipe(gulp.dest(css.build))
      .pipe(
        browsersync
          ? browsersync.reload({
              stream: true
            })
          : gutil.noop()
      );
  })
);

//- CSS
//config
var js = {
  src: dir.src + "scss/*.scss",
  watch: dir.src + "scss/**/*.scss", //*/
  build: dir.build,
  sassOpts: {
    outputStyle: "expanded",
    //   imagePath       : images.build,
    precision: 3,
    errLogToConsole: true
  },
  processors: [
    require("postcss-assets")({
      // loadPaths: ['images/'],
      basePath: dir.build
      // baseUrl: "/wp-content/themes/jackalope/"
    }),
    require("autoprefixer")(),
    require("css-mqpacker"),
    require("cssnano")
  ]
};

// JSHint, concat, and minify JavaScript
gulp.task(
  "site-js",
  gulp.series(() => {
    return gulp
      .src(js.src)
      .pipe(plumber())
      .pipe(sourcemaps.init())
      .pipe(jshint())
      .pipe(jshint.reporter("jshint-stylish"))
      .pipe(concat("scripts.js"))
      .pipe(gulp.dest(js.build))
      .pipe(
        rename({
          suffix: ".min"
        })
      )
      .pipe(uglify())
      .pipe(sourcemaps.write(".")) // Creates sourcemap for minified JS
      .pipe(gulp.dest(js.build))
      .pipe(
        browsersync
          ? browsersync.reload({
              stream: true
            })
          : gutil.noop()
      );
  })
);

// JSHint, concat, and minify Foundation JavaScript
gulp.task(
  "foundation-js",
  gulp.series(() => {
    return gulp
      .src([
        // Foundation core - needed if you want to use any of the components below
        "./vendor/foundation-sites/js/foundation.core.js",
        "./vendor/foundation-sites/js/foundation.util.*.js",

        // Pick the components you need in your project
        "./vendor/foundation-sites/js/foundation.abide.js",
        "./vendor/foundation-sites/js/foundation.accordion.js",
        "./vendor/foundation-sites/js/foundation.accordionMenu.js",
        "./vendor/foundation-sites/js/foundation.drilldown.js",
        "./vendor/foundation-sites/js/foundation.dropdown.js",
        "./vendor/foundation-sites/js/foundation.dropdownMenu.js",
        "./vendor/foundation-sites/js/foundation.equalizer.js",
        "./vendor/foundation-sites/js/foundation.interchange.js",
        "./vendor/foundation-sites/js/foundation.magellan.js",
        "./vendor/foundation-sites/js/foundation.offcanvas.js",
        "./vendor/foundation-sites/js/foundation.orbit.js",
        "./vendor/foundation-sites/js/foundation.responsiveMenu.js",
        "./vendor/foundation-sites/js/foundation.responsiveToggle.js",
        "./vendor/foundation-sites/js/foundation.reveal.js",
        "./vendor/foundation-sites/js/foundation.slider.js",
        "./vendor/foundation-sites/js/foundation.sticky.js",
        "./vendor/foundation-sites/js/foundation.tabs.js",
        "./vendor/foundation-sites/js/foundation.toggler.js",
        "./vendor/foundation-sites/js/foundation.tooltip.js"
      ])
      .pipe(
        babel({
          presets: ["es2015"],
          compact: true
        })
      )
      .pipe(sourcemaps.init())
      .pipe(concat("foundation.js"))
      .pipe(gulp.dest("./assets/build/js"))
      .pipe(
        rename({
          suffix: ".min"
        })
      )
      .pipe(uglify())
      .pipe(sourcemaps.write(".")) // Creates sourcemap for minified Foundation JS
      .pipe(gulp.dest("./assets/build/js"));
  })
);

// Update Foundation with Bower and save to /vendor
// gulp.task("bower",
// gulp.series(() => {
//   return bower({
//     cmd: "update"
//   }).pipe(gulp.dest("vendor/"));
//   })
// );

// Browser-Sync watch files and inject changes
gulp.task(
  "browsersync",
  gulp.series(() => {
    // Watch files
    var files = [
      "./assets/build/scss/*.css",
      "./assets/build/js/*.js",
      "**/*.php",
      "assets/images/**/*.{png,jpg,gif,svg,webp}"
    ];

    browserSync.init(files, {
      // Replace with URL of your local site
      proxy: "http://localhost/"
    });

    gulp.watch("./assets/src/scss/**/*.scss", ["scss"]);
    gulp
      .watch("./assets/src/js/*.js", ["site-js"])
      .on("change", browserSync.reload);
  })
);

// Watch files for changes (without Browser-Sync)
gulp.task(
  "watch",
  gulp.series(() => {
    // Watch .scss files
    gulp.watch("./assets/src/scss/**/*.scss", ["scss"]);

    // Watch site-js files
    gulp.watch("./assets/src/js/*.js", ["site-js"]);

    // Watch foundation-js files
    gulp.watch("./vendor/foundation-sites/js/*.js", ["foundation-js"]);
  })
);

// Run styles, site-js and foundation-js
gulp.task(
  "default",
  gulp.series(() => {
    gulp.start("scss", "site-js", "foundation-js");
  })
);
