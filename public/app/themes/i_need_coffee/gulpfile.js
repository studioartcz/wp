const fs            = require('fs');
var gulp            = require('gulp');
var sass            = require('gulp-sass');
var prefixer        = require("gulp-autoprefixer");
var uglify		    = require('gulp-uglify');
var sourcemaps      = require('gulp-sourcemaps');
var concat		    = require('gulp-concat');
var pixrem          = require('gulp-pixrem');
var readlineSync    = require('readline-sync');
var browserSync     = require('browser-sync');
var reload          = browserSync.reload;


// Static Server + watching scss/html files
gulp.task('watch', ['sass'], function()
{
    var browserStackConfig = './gulp-local-config.json';

    fs.stat(browserStackConfig, function(err, stat) {
        if(err == null) {
            browserSync.init(require(browserStackConfig));
        }
        else
        {
            browserSync.init({
                proxy: readlineSync.question('Virtual host (e.g. http://wordpress.local:8888): ')
            });
        }
    });

    gulp.watch('./scss/**/*.s+(a|c)ss', ['sass']);
    gulp.watch("./templates/*.twig").on('change', reload);
});


// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function()
{
    return gulp.src("scss/style.scss")
        .pipe(sourcemaps.init())
        .pipe(sass())
        .on('error', function(err){
            browserSync.notify(err.message, 3000);
            this.emit('end');
        })
        .pipe(prefixer({
            browsers: ['last 3 versions', 'IE 9'],
            cascade: false
        }))
        .pipe(pixrem({
            rootValue: '100%',
            replace: true
        }))
        .pipe(sourcemaps.write())
        .pipe(concat('style.css'))
        .pipe(gulp.dest("build/css"))
        .pipe(reload({stream:true}));
});


gulp.task('ugly', function ()
{
    return gulp.src(
        [
            './node_modules/bootstrap.native/dist/bootstrap-native-v4.min.js'
        ])
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./build/js'));
});


gulp.task('copy-fonts', function ()
{
    return gulp
        .src(["./node_modules/font-awesome/fonts/*"])
        .pipe(gulp.dest('./build/fonts/font-awesome/'));
});


gulp.task('default', ['sass', 'ugly', 'copy-fonts']);