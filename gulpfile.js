/**
 * Declare variables from dependencies
 */
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify-es').default;
var plumber = require('gulp-plumber');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();

var tbxdevSubdomain = "tbx-theme";
var browserSyncProxy = "localhost";

/**
 * Plumber Error function
 */
var onError = function(error) {
    gutil.beep();
}

/**
 * SASS compiling
 */
gulp.task('sass', function(done) {
    gulp.src(['scss/main.scss'])
        .pipe(plumber({ errorHandler: notify.onError("Sass error: <%= error.message %>") }))
        .pipe(sourcemaps.init())
        .pipe(sass({
        outputStyle: 'compressed',
        }))
        .pipe(autoprefixer())
        .pipe(concat('main.min.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./dist/css'))
        .pipe(browserSync.stream({match: '**/*.css'}));
    done();
});

/**
 * JS compiling
 */
gulp.task('js', function(done) {
    gulp.src(['js/vendor.js', 'js/front.js', 'js/*.js'])
        .pipe(plumber({ errorHandler: notify.onError("JS error: <%= error.message %>") }))
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .pipe(uglify())
        .pipe(concat('front.min.js'))
        .pipe(gulp.dest('./dist/js'))
        .pipe(browserSync.stream({match: 'dist/js/front.min.js'}));
    done();
});

/**
 * BrowserSync reload task
 */
gulp.task('reload', function(done) {
    browserSync.reload();
    done();
});

/**
 * Watch files for changes
 * Init BrowserSync
 */
gulp.task('watch', function() {
    browserSync.init({
        proxy: browserSyncProxy
    });

    gulp.watch(['scss/main.scss', 'scss/**/*.scss'], gulp.series('sass'));
    gulp.watch(['js/*.js'], gulp.series('js', 'reload'));
    gulp.watch(['*.html'], gulp.series('reload'));
});

/**
 * This is the task that will run when calling "gulp" in terminal
 */
gulp.task('default', gulp.series('watch'));
