var gulp = require('gulp');
var concatCss = require('gulp-concat-css');
var concat = require('gulp-concat');
var sass = require('gulp-sass');

gulp.task('styles', function() {
    return gulp.src('_scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concatCss("site.css"))
        .pipe(gulp.dest('C:/wamp/www/Ratchet-Cloud-PHP-Test-Task/css/'));
});

gulp.task('html', function() {
    return gulp.src('./*.html')
        .pipe(gulp.dest('C:/wamp/www/Ratchet-Cloud-PHP-Test-Task/'));
});

gulp.task('php', function() {
    return gulp.src('./*.php')
        
        .pipe(gulp.dest('C:/wamp/www/Ratchet-Cloud-PHP-Test-Task/'));
});

gulp.task('js', function() {
    return gulp.src('js/**/*.js')
        .pipe(concat("site.js"))
        .pipe(gulp.dest('C:/wamp/www/Ratchet-Cloud-PHP-Test-Task/js/'));
});

//Watch task
gulp.task('default',['styles','html','php','js']);