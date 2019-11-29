// Gulp.js configuration
"use strict";

//source and build folders
const dir = {
    src: "./assets/",
    build: "./",
    root: "./"
  },
  // Gulp and plugins
  gulp = require("gulp"),
  gutil = require("gulp-util"),
  sass = require("gulp-sass"),
  postcss = require("gulp-postcss"),
  sourcemaps = require("gulp-sourcemaps");

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
      // baseUrl: "/wp-content/themes/jackalope/"
    }),
    require("autoprefixer")(),
    require("css-mqpacker"),
    require("cssnano")
  ]
};

// CSS processing
gulp.task(
  "css",
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

//- Watch

gulp.task(
  "watch",
  gulp.series("css", done => {
    gulp.watch(css.watch, gulp.series("css"));

    done();
  })
);
