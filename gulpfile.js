'use strict';
let gulp = require('gulp'),
    browserSync = require('browser-sync').create(),
    sass = require('gulp-sass');

gulp.task('test', function () {
    console.log('Gulp works!');
});

// Static server
gulp.task('server', function () {
    browserSync.init({
        server: {
            baseDir: './public'
        }
    });
    gulp.watch("public/css/sass/sass/styles.sass", ['sass']);
    gulp.watch("public/css/styles.css".on('change', browserSync.reload));
    gulp.watch("public/index.html").on('change', browserSync.reload);
});

gulp.task('sass', function() {
    return gulp.src("public/css/sass/sass/styles.sass")
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest("public/css"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['server']);