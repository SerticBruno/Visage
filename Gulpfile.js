// // Defining requirements
var gulp = require("gulp");
var sass = require("gulp-sass");
var autoprefixer = require("gulp-autoprefixer");
var cssnano = require("gulp-cssnano");
var rename = require("gulp-rename");
var replace = require("gulp-replace");
// var babel = require('gulp-babel');
var concat = require("gulp-concat");
// var uglify = require('gulp-uglify');
// var notify = require('gulp-notify');
// var sourcemaps = require('gulp-sourcemaps');
var readlineSync = require("readline-sync");
var imagemin = require("gulp-imagemin");
var imageminPngquant = require("imagemin-pngquant");
var imageminJpegRecompress = require("imagemin-jpeg-recompress");

gulp.task("install", function (done) {
  gulp.src(`./node_modules/jquery/**/*`).pipe(gulp.dest(`./src/vendor/jquery`));
  gulp
    .src(`./node_modules/popper.js/**/*`)
    .pipe(gulp.dest(`./src/vendor/popper.js`));
  gulp
    .src(`./node_modules/bootstrap/**/*`)
    .pipe(gulp.dest(`./src/vendor/bootstrap`));
  //    gulp.src( `./node_modules/bootstrap-icons/**/*` )
  //        .pipe( gulp.dest( `./src/vendor/bootstrap-icons` ) );
  //    gulp.src( `./node_modules/bootstrap-icons/icons/*.svg` )
  //        .pipe( gulp.dest( `./assets/img/icons` ) );
  //    gulp.src( `./node_modules/mdbootstrap/**/*` )
  //        .pipe( gulp.dest( `./src/vendor/mdbootstrap` ) );
  // gulp.src( `./node_modules/font-awesome/**/*` )
  //     .pipe( gulp.dest( `./src/vendor/FontAwesome` ) );
  gulp.src(`./node_modules/swiper/**/*`).pipe(gulp.dest(`./src/vendor/swiper`));
  // gulp.src( `./node_modules/chart.js/**/*` )
  //     .pipe( gulp.dest( `./src/vendor/chart.js` ) );
  gulp.src(`./node_modules/gsap/**/*`).pipe(gulp.dest(`./src/vendor/gsap`));
  gulp
    .src(`./node_modules/simplelightbox/dist/**/*`)
    .pipe(gulp.dest(`./src/vendor/simplelightbox`));
  // gulp.src( `./node_modules/readmore-js/**/*` )
  //     .pipe( gulp.dest( `./src/vendor/readmore-js` ) );
  //    gulp.src( `./node_modules/font-awesome/fonts/**/*.{ttf,woff,woff2,eot,svg}` )
  //        .pipe( gulp.dest( './assets/fonts/FontAwesome' ) );
  //    gulp.src( `./node_modules/owl.carousel/**/*` )
  //    .pipe( gulp.dest( `./src/vendor/owl` ) );

  var theme_name = readlineSync.question(
    "Please enter a name for your theme (Short)"
  );
  theme_name = theme_name.replace(/\s/g, "-").toLowerCase();
  console.log("Renaming theme strings and files with " + theme_name);

  gulp
    .src(
      [
        "./**/*.php",
        "./**/*.js",
        "./**/*.css",
        "!/node_modules/**",
        "!Gulpfile.js",
      ],
      { base: "./" }
    )
    .pipe(replace("'_visage'", "'" + theme_name + "'"))
    .pipe(replace("_visage_", theme_name + "_"))
    .pipe(replace(" _visage", " " + theme_name))
    .pipe(replace("_visage-", theme_name + "-"))
    .pipe(gulp.dest("./"));

  gulp
    .src("languages/_visage.pot", { allowEmpty: true })
    .pipe(rename(theme_name + ".pot"))
    .pipe(gulp.dest("languages"));

  done();
});

gulp.task("styles", function (done) {
  gulp
    .src("./src/sass/style.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(autoprefixer(["last 2 version", "IE 9"]))
    .pipe(cssnano({ discardComments: { removeAll: true } }))
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest("./assets/css"));
  done();
});

gulp.task("images", function (done) {
  gulp
    .src("./src/img/**/*.{png,jpeg,jpg,svg,gif}")
    .pipe(
      imagemin([
        imagemin.gifsicle(), //call default for imagemin
        imagemin.mozjpeg(), //call default for imagemin
        imagemin.optipng(), //call default for imagemin
        imagemin.svgo(), //call default for imagemin
        imageminPngquant(), //call the lossy compression for PNG
        imageminJpegRecompress(), //call the lossy compression for JPEG/JPG
      ])
    )
    .pipe(gulp.dest("./assets/img"));

  done();
});

gulp.task("script", function (done) {
  var scripts = [
    `./src/vendor/popper.js/dist/umd/popper.js`,
    `./src/vendor/bootstrap/dist/js/bootstrap.bundle.js`,
    `./src/vendor/swiper/swiper-bundle.js`,
    `./src/vendor/gsap/dist/CSSRulePlugin.js`,
    `./src/vendor/simplelightbox/simple-lightbox.jquery.js`,
    `./src/vendor/gsap/dist/gsap.js`,
    `./src/vendor/gsap/dist/ScrollTrigger.js`,
    `./src/vendor/gsap/dist/EasePack.js`,
    `./src/js/**/*.js`,
  ];

  gulp
    .src(scripts, { allowEmpty: true })
    .pipe(concat("script.min.js"))
    .pipe(gulp.dest("./assets/js"));

  done();
});

gulp.task("watch", function (done) {
  gulp.watch("./src/sass/**/*.scss", gulp.parallel(["styles"]));
  gulp.watch("./src/js/**/*.js", gulp.parallel(["script"]));
  gulp.watch(
    "./src/img/**/*.{png,jpeg,jpg,svg,gif}",
    gulp.parallel(["images"])
  );

  done();
});

gulp.task("default", gulp.parallel(["styles", "script", "images", "watch"]));
