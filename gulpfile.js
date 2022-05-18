const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const cssnano = require('gulp-cssnano');
const sourcemaps = require('gulp-sourcemaps');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');

const rollup = require('gulp-better-rollup');
const babel = require('rollup-plugin-babel');
const resolve = require('rollup-plugin-node-resolve');
const commonjs = require('rollup-plugin-commonjs');

const paths = {
  styles: {
    src: 'build/styles/style.scss',
    dest: './dist/',
    watch: 'build/styles/**/*.scss',
  },
  script: {
    src: 'build/scripts/script.js',
    dest: './dist/',
    watch: 'build/scripts/**/*.js',
  },
};

function style() {
  return (
    gulp
      .src(paths.styles.src, { allowEmpty: true })
      .pipe(sourcemaps.init())
      .pipe(sass())
      .on('error', function (err) {
        // eslint-disable-next-line no-console
        console.log(err.toString());
        this.emit('end');
      })
      .pipe(autoprefixer('last 4 version'))
      .pipe(cssnano())
      // .pipe(header(banner, { package : package }))
      .pipe(gulp.dest(paths.styles.dest))
  );
}

function script() {
  return (
    gulp
      .src(paths.script.src, { allowEmpty: true })
      // .pipe(header(banner, { package : package }))
      .pipe(
        rollup(
          {
            plugins: [babel(), resolve(), commonjs()],
          },
          'umd'
        )
      )
      .pipe(uglify())
      .pipe(concat('script.js'))
      .pipe(gulp.dest(paths.script.dest))
  );
}

function watch() {
  gulp.watch(paths.styles.src, style);
  gulp.watch(paths.styles.watch, style);
  gulp.watch(paths.script.src, script);
  gulp.watch(paths.script.watch, script);
}

// eslint-disable-next-line no-undef
exports.style = style;
// eslint-disable-next-line no-undef
exports.script = script;

const build = gulp.parallel(style, script, watch);

gulp.task('default', build);
