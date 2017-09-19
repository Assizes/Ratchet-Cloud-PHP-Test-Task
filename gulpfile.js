var gulp = require('gulp');
var concatCss = require('gulp-concat-css');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var path = "C:/wamp/www/Ratchet-Cloud-PHP-Test-Task";

gulp.task('styles', function() {
    return gulp.src('_scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concatCss("site.css"))
        .pipe(gulp.dest(path+'/css/'));
});

gulp.task('html', function() {
    return gulp.src('./*.html')
        .pipe(gulp.dest(path+'/'));
});

gulp.task('php', function() {
    return gulp.src('./*.php')
        
        .pipe(gulp.dest(path+'/'));
});

gulp.task('js', function() {
    return gulp.src('js/**/*.js')
        .pipe(concat("site.js"))
        .pipe(gulp.dest(path+'/js/'));
});

//Watch task
gulp.task('default',['styles','html','php','js']);