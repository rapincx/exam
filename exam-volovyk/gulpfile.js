var gulp = require('gulp'),
    data = require('gulp-data'),
    stylus = require('gulp-stylus'),
    jade = require('gulp-jade'),
    cssnano = require('gulp-cssnano'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglifyjs'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    cache = require('gulp-cache'),
    del = require('del'),
    browserSync = require('browser-sync'),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber');

gulp.task('stylus', function () {
    return gulp.src([
        'stylus/main.styl',
        '!stylus/**/_*'
        ])
        .pipe(plumber())
        .pipe(stylus())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('css'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('sass-foundation', function () {
    return gulp.src([
            'libs/foundation-sites/assets/foundation-flex.scss'
        ])
        .pipe(plumber())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('libs/foundation-sites/css/'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('jade', function () {
    return gulp.src([
        'jade/**/*.jade',
        '!jade/**/_*'
        ])
        .pipe(plumber())
        .pipe(jade({pretty: true}))
        .pipe(gulp.dest('site'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('js', function () {
    return gulp.src([
            'libs/jquery/dist/jquery.min.js',
            'libs/what-input/dist/what-input.min.js',
            'libs/foundation-sites/dist/js/foundation.min.js'
        ])
        .pipe(concat('libs.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('js'));
});

gulp.task('css-libs', ['stylus'], function () {
    return gulp.src([
            'libs/foundation-sites/css/foundation-flex.css'
        ])
        .pipe(concat('libs.css'))
        .pipe(cssnano())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('css'));
});

gulp.task('img', function () {
    return gulp.src('img/**/*')
        .pipe(cache(imagemin({
            interlaced: true,
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        })))
        .pipe(gulp.dest('img'));
});

gulp.task('clean', function () {
    return del.sync('dist');
});

gulp.task('clear', function () {
    return cache.clearAll();
});

gulp.task('browser-sync', function () {
    browserSync({
        server: {
            baseDir: 'site'
        },
        notify: false
    });
});

gulp.task('watch', ['browser-sync', 'css-libs', 'js'], function () {
    gulp.watch('stylus/**/*.styl', ['stylus']);
    gulp.watch('jade/**/*.jade', ['jade']);
    gulp.watch('*.php', browserSync.reload);
    gulp.watch('js/**/*.js', browserSync.reload);
});

gulp.task('build', ['clean', 'img', 'jade', 'stylus', 'js'], function () {

    var buildCss = gulp.src([
            'site/css/main.min.css',
            'site/css/libs.min.css',
            'site/css/**/*.gif'
        ])
        .pipe(gulp.dest('dist/css'));

    var buildFonts = gulp.src('site/fonts/**/*')
        .pipe(gulp.dest('dist/fonts'));

    var buildHSlider = gulp.src('site/highslide/**/*')
        .pipe(gulp.dest('dist/highslide'));

    var buildJs = gulp.src('site/js/**/*')
        .pipe(gulp.dest('dist/js'));

    var buildHtml = gulp.src([
        'site/*.html',
        'site/*.php'
        ])
        .pipe(gulp.dest('dist'));

});
