'use strict';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    prefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    //sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    cssmin = require('gulp-minify-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    rimraf = require('rimraf'),
    browserSync = require("browser-sync"),
    reload = browserSync.reload;
    var env = process.env.GULP_ENV;

var url = 'example.symfony.com';
var basePath = 'src/AppBundle/Resources/public';
var path = {
    assets: {
        js: basePath + '/js/**/*.js',
        sass: basePath + '/css/*.scss',
        css: basePath + '/css/*.css'
    },
    bulid: {
        js: 'bulid/js',
        css: 'build/css'
    },
    watch:{
        js: basePath + '/js/**/*.js',
        sass: basePath + '/css/*.scss',
        css: basePath + '/css/*.css'
    },
    clean:'./build'
};
var config = {
    server: {
        baseDir: "./build"
    },
    tunnel: true,
    host: 'localhost',
    port: 9000,
    logPrefix: "Frontend_Devil"
};
gullp.task('js:build', function(){
    gulp.src(path.assets.js)
            .pipe(rigger())
            .pipe(sourcemaps.init())
            .pipe(uglify())
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(path.bulid.js))
            .pipe(reload({stream:true}))
    
});

gulp.task('build', ['js:build']);
