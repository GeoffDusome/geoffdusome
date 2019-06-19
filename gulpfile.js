// Declare variables from dependencies
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var jshint = require('gulp-jshint');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var concat = require('gulp-concat');
var replace = require('gulp-replace');
var browserSync = require('browser-sync').create();
const metaBuilder = require('@geoffdusome/acf-meta-builder');

// Plumber Error function
var onError = function(error) {
    gutil.beep();
}

// Update version variable in functions.php automatically
// $theme_version = '1.00';
gulp.task('version', function(done) {
    gulp.src(['functions.php'])
        .pipe(replace(/\$theme_version = \'(.*)\';/g, function(match, p1) {
            p1 = parseFloat(p1) + 0.01;
            return '$theme_version = \'' + p1.toFixed(2) + '\';';
        }))
        .pipe(gulp.dest('./'));
    done();
});

gulp.task('buildMeta', function( done ) {
    metaBuilder.createMeta(['functions.php', 'header.php', 'footer.php'])
        .then(function(result) {
            console.log(result);
            done();
        }, function(err) {
            console.log(err);
            done();
        });
});

// SASS
gulp.task('sass', function(done) {
    gulp.src(['css/main.scss'])
        .pipe(plumber({ errorHandler: notify.onError("Sass error: <%= error.message %>") }))
        .pipe(sourcemaps.init())
        .pipe(sass({
        outputStyle: 'compressed',
        }))
        .pipe(autoprefixer())
        .pipe(concat('main.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./dist/css/'))
        .pipe(browserSync.stream({match: '**/*.css'}));
    done();
});

// JS
gulp.task('js', function(done) {
    gulp.src(['js/vendor.js', 'modules/**/js/*.js', 'js/front.js', 'js/*.js'])
        .pipe(plumber({ errorHandler: notify.onError("JS error: <%= error.message %>") }))
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .pipe(uglify())
        .pipe(concat('front.min.js'))
        .pipe(gulp.dest('./dist/js/'))
        .pipe(browserSync.stream({match: 'dist/js/front.min.js'}));
    done();
});

// Browser Sync Init
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost"
    });
});

// Watch Task
gulp.task('serve',function() {
    browserSync.init({
        proxy: "localhost"
    });

    gulp.watch(['css/**/*.scss', '!css/admin/*.scss', 'css/main.scss'], gulp.parallel('sass', 'version'));
    gulp.watch(['js/*.js'], gulp.parallel('js', 'version'));
    gulp.watch(['*.php'], gulp.series('buildMeta'));
    gulp.watch(['*.php', '!functions.php']).on("change", browserSync.reload);
});

// Default Task
gulp.task('default', gulp.series('serve'));
