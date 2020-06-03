// Gulp.js configuration
"use strict";

// options for src and build folders
const dir = {
    src: "./assets/src/",
    build: "./assets/build/",
    vendor: "./assets/vendor/",
    root: "./",
    // Replace with URL of your local site
    localDevURL: "dev-colab.test/"
  },
  // gulp plugins etc
  gulp = require("gulp"),
  gutil = require("gulp-util"),
  sass = require("gulp-sass"),
  cssnano = require("cssnano"),
  autoprefixer = require("gulp-autoprefixer"),
  sourcemaps = require("gulp-sourcemaps"),
  //NOTE: commenting this out because it's whining about something or other and I don't even use this thing. its another thing from a previous dev
//   jshint = require("gulp-jshint"),
//   stylish = require("jshint-stylish"),
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
var scss = {
  src: dir.src + "scss/*.scss",
  watch: dir.src + "scss/**/*.scss", //*/
  build: dir.build + "scss/",
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

// SCSS processing
gulp.task(
  "scss",
  gulp.series(() => {
    return gulp
      .src(scss.src)
      .pipe(sourcemaps.init())
      .pipe(sass(scss.sassOpts))
      .pipe(postcss(scss.processors))
      .pipe(sourcemaps.write("./"))
      .pipe(gulp.dest(scss.build))
      .pipe(
        browsersync
          ? browsersync.reload({
              stream: true
            })
          : gutil.noop()
      );
  })
);

//- Javascript
//config
var js = {
src: dir.src + "js/*.js",
watch: dir.src + "js/**/*.js",
foundation: dir.vendor + "foundation-sites/js/",
build: dir.build + "js/",
};

// concat and minify JavaScript
gulp.task(
  "site-js",
  gulp.series(() => {
    return gulp
      .src(js.src)
      .pipe(plumber())
      .pipe(sourcemaps.init())
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

// concat, and minify Foundation JavaScript
gulp.task(
  "foundation-js",
  gulp.series(() => {
    return gulp
      .src([
        // Foundation core - needed if you want to use any of the components below
        dir.vendor + "foundation.cor*.js",
        dir.vendor + "foundation.util.*.js",

        // Pick the components you need in your project
        dir.vendor + "foundation.abid*.js",
        dir.vendor + "foundation.accordi*n.js",
        dir.vendor + "foundation.accordionMen*.js",
        dir.vendor + "foundation.dr*lldown.js",
        dir.vendor + "foundation.drop*own.js",
        dir.vendor + "foundation.dro*downMenu.js",
        dir.vendor + "foundation.equ*lizer.js",
        dir.vendor + "foundation.int*rchange.js",
        dir.vendor + "foundation.mage*lan.js",
        dir.vendor + "foundation.offca*vas.js",
        dir.vendor + "foundation.orb*t.js",
        dir.vendor + "foundation.res*onsiveMenu.js",
        dir.vendor + "foundation.respon*iveToggle.js",
        dir.vendor + "foundation.rev*al.js",
        dir.vendor + "foundation.sli*er.js",
        dir.vendor + "foundation.stick*.js",
        dir.vendor + "foundation.t*bs.js",
        dir.vendor + "foundation.t*ggler.js",
        dir.vendor + "foundation.tool*ip.js"
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

// Browser-Sync watch files and inject changes
gulp.task(
  "dev",
  gulp.series(() => {
    // Watch files
    var files = [
      "./assets/build/scss/*.css",
      "./assets/build/js/*.js",
      "**/*.php",
      "assets/images/**/*.{png,jpg,gif,svg,webp}"
    ];

    browserSync.init(files, {

      proxy: dir.localDevURL
    });

    //watch scss
      gulp.watch(scss.watch, gulp.series("scss"));

    // watch js
    gulp
      .watch("./assets/src/js/*.js", gulp.series("site-js"))
      .on("change", browserSync.reload);
  })
);

// Watch files for changes (without Browser-Sync)
gulp.task(
    "watch",
    gulp.series(() => {
        // Watch .scss files
        gulp.watch(["./assets/src/scss/**/*.scss"], gulp.series("scss"));

        // Watch site-js files
        gulp.watch("./assets/src/js/*.js", gulp.series("site-js"));
    })
);

// Run styles, site-js and foundation-js
gulp.task(
  "default",
    gulp.series("scss", "site-js", "foundation-js")

);
