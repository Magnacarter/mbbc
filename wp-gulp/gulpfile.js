"use strict";

var gulp         = require( 'gulp' ),
    maps         = require( 'gulp-sourcemaps' ),
    autoprefixer = require( 'gulp-autoprefixer' ),
    concat       = require( 'gulp-concat' ),
    uglify       = require( 'gulp-uglify' ),
    rename       = require( 'gulp-rename' ),
    sass         = require( 'gulp-sass' ),
    cleanCSS     = require( 'gulp-clean-css' ),
    del          = require( 'del' ),
    browserSync  = require( 'browser-sync' );

var path = {
  JS       : '../js',
  JS_FILES : [ '../js/jquery.main.js', '../js/theme.js', '../js/bootstrap.min.js', '../js/slick.min.js' ],
  APP_JS   : '../js/app.js',
  SCSS     : '../scss/main.scss',
  CSS      : '../css',
  CSS_APP  : '../css/application.css',
  CSS_ALL  : [ '../style.css', '../css/bootstrap.css', '../css/app.css' ],
  THEME_DIR: '../',
  BS       : '../scss/bootstrap.scss',
}

gulp.task( 'concatScripts', function() {
  return gulp.src( path.JS_FILES )
    .pipe( maps.init() )
    .pipe( concat( 'app.js' ) )
    .pipe( maps.write( './' ) )
    .pipe( gulp.dest( path.JS ) ); //note the .pipe method has a '.' before the name.
});

gulp.task( 'minifyScripts', [ 'concatScripts' ], function() {
  return gulp.src( path.APP_JS )
    .pipe( uglify() )
    .pipe( rename( 'app.min.js' ) )
    .pipe( gulp.dest( path.JS ) );
});

gulp.task( 'compileSass', function() {
  return gulp.src( path.SCSS )
    .pipe( maps.init() )
    .pipe( sass() )
    .pipe( autoprefixer({ browsers: ["> 0%"] }) )
    .pipe( rename( 'app.css' ) )
    .pipe( maps.write( './' ) )
    .pipe( gulp.dest( path.CSS ) )
});

gulp.task( 'compileBS', function() {
  return gulp.src( path.BS )
    .pipe( maps.init() )
    .pipe( sass() )
    .pipe( rename( 'bootstrap.css' ) )
    .pipe( maps.write( './' ) )
    .pipe( gulp.dest( path.CSS ) )
});

/*gulp.task( 'minifyCSS', [ 'compileSass', 'compileBS' ], function() {
  return gulp.src( path.CSS_ALL )
    .pipe(cleanCSS( { compatibility: 'ie8' } ) )
    .pipe(gulp.dest( path.CSS ) );
});*/

gulp.task( 'concatCSS', [ 'compileSass', 'compileBS' ], function() {
  return gulp.src( path.CSS_ALL )
    .pipe( cleanCSS( { compatibility: 'ie8' } ) )
    .pipe( concat( 'theme.css' ) )
    .pipe( gulp.dest( path.CSS ) );
});

gulp.task( 'cssWatch', [ 'concatCSS' ], browserSync.reload );

gulp.task( 'jsWatch', [ 'minifyScripts' ], browserSync.reload );

gulp.task( 'watchFiles', function() {
  browserSync({
    proxy: {
      target: 'http://local.mbfc.com/'
    }
  });
  gulp.watch([ '../scss/**/*.scss' ], [ 'cssWatch' ]);
  gulp.watch( '../js/theme.js', [ 'jsWatch' ]);
});

gulp.task( 'clean', function() {
  return del( [ '../js/app.js*', '../js/app.min.js', '../css/**' ], { force: true } );
});

gulp.task( 'build', [ 'minifyScripts', 'concatCSS' ], function() {
  return gulp.src([ 'img/**', 'fonts/**' ], 
    { base: './' })
      .pipe( gulp.dest( '../' ) );
});

gulp.task( 'serve', [ 'watchFiles' ] );

gulp.task( 'default', [ 'clean' ], function() {
  gulp.start( 'build' )
  console.log( 'The script is working!!!' );
});