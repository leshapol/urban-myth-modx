let { src, dest } = require("gulp");
let fs = require("fs");
let gulp = require("gulp");
let autoprefixer = require("gulp-autoprefixer");
let scss = require("gulp-sass")(require("sass"));
let group_media = require("gulp-group-css-media-queries");
let plumber = require("gulp-plumber");
let del = require("del");
let imagemin = require("gulp-imagemin");
let uglify = require("gulp-uglify-es").default;
let rename = require("gulp-rename");
let fileinclude = require("gulp-file-include");
let clean_css = require("gulp-clean-css");
let newer = require("gulp-newer");
let webp = require("imagemin-webp");
let notify = require("gulp-notify");

let browsersync = require("browser-sync").create();

let project_name = "build";
let src_folder = "src";

let path = {
  build: {
    html: project_name + "/",
    js: project_name + "/js/",
    css: project_name + "/css/",
    images: project_name + "/img/",
    fonts: project_name + "/fonts/",
    videos: project_name + "/video/",
  },
  src: {
    html: [src_folder + "/**/*.html", "!" + src_folder + "/**/_*.html"],
    js: src_folder + "/js/*.js",
    css: src_folder + "/scss/*.scss",
    images: src_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}",
    fonts: src_folder + "/fonts/*.{ttf,otf,woff,woff2}",
    videos: src_folder + "/video/*.*",
  },
  watch: {
    html: src_folder + "/**/*.html",
    js: src_folder + "/**/*.js",
    css: src_folder + "/scss/**/*.scss",
    images: src_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}",
  },
  clean: "./" + project_name + "/",
};
function browserSync(done) {
  browsersync.init({
    server: {
      baseDir: "./" + project_name + "/",
    },
    notify: false,
    port: 3000,
  });
}
function html() {
  return src(path.src.html, {})
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(fileinclude())
    .pipe(dest(path.build.html))
    .pipe(browsersync.stream());
}
function css() {
  return (
    src(path.src.css, {})
      // .pipe(plumber())
      .pipe(
        plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
      )
      .pipe(
        scss({
          outputStyle: "expanded",
        })
      )
      .pipe(group_media())
      .pipe(
        autoprefixer({
          grid: true,
          overrideBrowserslist: ["last 5 versions"],
          cascade: true,
        })
      )
      //.pipe(dest(path.build.css))
      .pipe(clean_css())
      .pipe(
        rename({
          extname: ".min.css",
        })
      )
      .pipe(dest(path.build.css))
    // .pipe(notify())
  );
}

function js() {
  return src(path.src.js, {})
    .pipe(plumber())
    .pipe(fileinclude())
    .pipe(gulp.dest(path.build.js))
    .pipe(uglify(/* options */))
    .on("error", function (err) {
      console.log(err.toString());
      this.emit("end");
    })
    .pipe(
      rename({
        suffix: ".min",
        extname: ".js",
      })
    )
    .pipe(dest(path.build.js));
}

function images() {
  return (
    src(path.src.images)
      // .pipe(newer(path.build.images))
      // .pipe(
      //   imagemin([
      //     webp({
      //       quality: 75,
      //     }),
      //   ])
      // )
      // .pipe(
      //   rename({
      //     extname: ".webp",
      //   })
      // )
      .pipe(dest(path.build.images))
      .pipe(src(path.src.images))
  );
  // .pipe(newer(path.build.images))
  // .pipe(
  //   imagemin({
  //     progressive: true,
  //     svgoPlugins: [{ removeViewBox: false }],
  //     interlaced: true,
  //     optimizationLevel: 3, // 0 to 7
  //   })
  // )
  // .pipe(dest(path.build.images));
}

function videos() {
  return src(path.src.videos).pipe(plumber()).pipe(dest(path.build.videos));
}

function fonts() {
  return src(path.src.fonts).pipe(plumber()).pipe(dest(path.build.fonts));
}

function infofile() {}
function cb() {}
function clean() {
  return del(path.clean);
}
function watchFiles() {
  gulp.watch([path.watch.html], html);
  gulp.watch([path.watch.css], css);
  gulp.watch([path.watch.js], js);
  gulp.watch([path.watch.images], images);
}
let build = gulp.series(clean, gulp.parallel(css, js, images, videos, fonts));
let watch = gulp.parallel(build, watchFiles);

exports.css = css;
exports.js = js;
exports.videos = videos;
exports.infofile = infofile;
exports.images = images;
exports.clean = clean;
exports.build = build;
exports.watch = watch;
exports.default = watch;
