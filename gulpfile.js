var gulp = require('gulp'),
        sass = require('gulp-sass'),
        autoprefixer = require('gulp-autoprefixer')
        minifyCss = require('gulp-clean-css'),
        rename = require('gulp-rename'),
        concat = require('gulp-concat'),
        uglify = require('gulp-uglify'),
        browserSync = require('browser-sync').create();



gulp.task('sass', function () {
    // sass directory
    return gulp.src('./public_html/src/sass/*scss')
            .pipe(sass())
            //outputstyle (nested, compact, expanded, compressed)
            .pipe(sass({outputStyle: 'compact'}).on('error', sass.logError))
            .pipe(minifyCss())
            .pipe(rename('style.min.css'))
            .pipe(gulp.dest('./public_html/dist/css')),
            // watch file
            gulp.watch('./public_html/src/sass/**/*.scss', ['sass']);
});    

//script paths
gulp.task('scripts', function() {
    return gulp.src('./public_html/src/js/custom/*js')
        .pipe(concat('scripts.js'))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public_html/dist/js')),
        gulp.watch('./public_html/src/js/custom/*.js', ['scripts']);
});




// minify css (merge + autoprefix + rename)
//gulp.task('minify-css', function () {
//    return gulp.src('./css/style.css')
//            .pipe(minifyCss())
//            // autoprefixer
//            .pipe(autoprefixer({
//                browsers: ['last 15 versions'],
//                cascade: false
//            }))
//            // minify css rename
//            .pipe(rename('style.min.css'))
//            // minify css output directory
//            .pipe(gulp.dest('./css'))
//            // browser sync
//            .pipe(browserSync.reload({stream: true})),
//            // watch file
//            gulp.watch('./css/style.css', ['minify-css']);
//});

 //sass/css browser tracking
//gulp.task('browser-sync', function () {
//    browserSync.init({
//        server: {
//            baseDir: './public_html'
//        }
//    });
//    // watch html
//    gulp.watch('./public_html*.html').on('change', browserSync.reload);
//});


// gulp default (sass, minify-css, browser-sync) method
//gulp.task('default', ['sass', 'minify-css', 'browser-sync']);