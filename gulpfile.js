const gulp = require( 'gulp' );
const del = require ('del');
const plumber = require ('gulp-plumber');
const sass = require( 'gulp-sass' )( require( 'sass' ) );
const cleanCSS = require ('gulp-clean-css');
const postcss = require( 'gulp-postcss' );
const autoprefixer = require( 'autoprefixer' );
const tailwindcss = require( 'tailwindcss' );
const webpackStream = require( 'webpack-stream' );
const webpack = require( 'webpack' );
const webpackConfig = require( './webpack.config.js' );
const concat = require( 'gulp-concat' );
const css2txt = require( 'gulp-css2txt' );
const fontmin = require( 'gulp-fontmin' );
gulp.task( 'clean', (  ) => {
    del( [ './dist/js/**', './dist/css/**' ] );
} );
gulp.task( 'webpack', (  ) => {
    return gulp
        .src( './assets/ts/**/*.ts' )
        .pipe( plumber(  ) )
        .pipe( webpackStream( webpackConfig, webpack ) )
        .pipe( gulp.dest( './dist/js' ) );
} );
gulp.task( 'scss', (  ) => {
    const plugins = [
        tailwindcss( './tailwind.config.js' ),
        autoprefixer,
    ];
    return gulp
        .src( './assets/scss/style.scss' )
        .pipe( sass( {
            includePaths: [ 'node_modules' ],
        } )
            .on( 'error', sass.logError ) )
        .pipe( gulp.dest( './dist/css' ) )
        .pipe( postcss( plugins ) )
        .pipe( concat( { path: 'style.css' } ) )
        .pipe( gulp.dest( './dist/css' ) );
} );
gulp.task( 'subset', cb => {
    const texts = [  ];
    return gulp
        .src( './assets/scss/font.scss' )
        .pipe( css2txt(  ) )
        .on( 'data', file => texts.push( file.contents.toString(  ) ) )
        .on( 'end', (  ) => {
            const text = texts.join( '' );
            const formats = [ 'eot', 'ttf', 'woff', 'svg', ];
            gulp
                .src( './node_modules/@mdi/font/fonts/materialdesignicons-webfont.ttf' )
                .pipe( fontmin( {
                    text,
                    formats,
                } ) )
                .pipe( gulp.dest( './dist/fonts' ) )
                .on( 'end', cb );
        } );
} );
gulp.task( 'minify', (  ) => {
    return gulp
        .src( './dist/css/*.css' )
        .pipe( plumber(  ) )
        .pipe( cleanCSS( {
            compatibility: 'ie8',
            debug: true,
        }, details => {
            console.log( `${ details.name } OriginalSize: ${ details.stats.originalSize }; MinifiedSize: ${ details.stats.minifiedSize }` );
        } ) )
        .pipe( gulp.dest( './dist/css' ) );
} );
gulp.task( 'watch', (  ) => {
    gulp.watch( [ './assets/scss/**/*.scss', './**/*.php' ], gulp.series( 'scss', 'minify' ) );
    gulp.watch( './assets/ts/**/*.ts', gulp.series( 'webpack' ) );
} );
gulp.task( 'default', gulp.parallel(
    'clean',
    [
        'webpack',
        'subset',
        gulp.series( 'scss', 'minify' ),
    ],
    'watch',
) );
