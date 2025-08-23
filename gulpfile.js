const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();

const paths = {
  scss: 'assets/styles/scss/**/*.scss',
  scssEntry: 'assets/styles/scss/style.scss',
  cssOutput: 'assets/styles/css',
  proxy: 'local.samlucchese.com'
};


function compileSCSS() {
  return gulp
	.src(paths.scssEntry)
	.pipe(sourcemaps.init())
	.pipe(sass().on('error', sass.logError))
	.pipe(postcss([autoprefixer()]))
	.pipe(sourcemaps.write('.'))
	.pipe(gulp.dest(paths.cssOutput))
	.pipe(browserSync.stream());
}

function serve() {
  browserSync.init({
	proxy: paths.proxy
  });

  gulp.watch(paths.scss, compileSCSS);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
  gulp.watch('./assets/scripts/**/*.js').on('change', browserSync.reload);
}

exports.default = gulp.series(compileSCSS, serve);
