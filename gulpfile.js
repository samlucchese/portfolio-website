// gulpfile.js
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const esbuild = require('gulp-esbuild');

const paths = {
  // Styles
  scss: 'assets/styles/scss/**/*.scss',
  scssEntry: 'assets/styles/scss/style.scss',
  cssOutput: 'assets/styles/css',

  // Local domain
  proxy: 'http://local.samlucchese.com',

  // Scripts
  jsEntry: 'assets/scripts/custom.js',         // entry
  jsWatch: [
    'assets/scripts/**/*.js',                  // watch sources
    '!assets/scripts/dist/**/*.js',            // ⛔ don't watch build output
    '!assets/scripts/vendor/**/*.js'           // ⛔ don't watch vendor copies
  ],
  jsOutputDir: 'assets/scripts/dist',
  jsOutputFile: 'custom.bundle.js'
};

function compileSCSS() {
  return gulp
    .src(paths.scssEntry, { allowEmpty: true })
    .pipe(sourcemaps.init())
    .pipe(sass.sync({ outputStyle: 'expanded' }).on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.cssOutput))
    .pipe(browserSync.stream());
}

function scripts() {
  return gulp
    .src(paths.jsEntry, { allowEmpty: true })
    .pipe(esbuild({
      bundle: true,
      sourcemap: true,
      minify: true,
      target: ['es2017'],
      format: 'iife',
      outfile: paths.jsOutputFile,
      loader: { '.css': 'css' },
      external: ['jquery', 'swiper'] // enqueued by WP
    }))
    .pipe(gulp.dest(paths.jsOutputDir))
    .pipe(browserSync.stream());
}

function serve() {
  browserSync.init({
    proxy: paths.proxy,
    open: false,
    notify: false
  });

  gulp.watch(paths.scss, { delay: 150 }, compileSCSS);
  gulp.watch(paths.jsWatch, { delay: 150 }, scripts);  // ✅ excludes dist/vendor
  gulp.watch('./**/*.php', { delay: 150 }).on('change', browserSync.reload);
}

exports.default = gulp.series(gulp.parallel(compileSCSS, scripts), serve);
exports.styles = compileSCSS;
exports.scripts = scripts;
exports.build = gulp.series(compileSCSS, scripts);
