;'use strict';

const {src, dest, watch} = require( 'gulp' ),
   sass = require( 'gulp-sass' )(require('sass')),
   csso = require( 'gulp-csso' ),
   gcmq = require( 'gulp-group-css-media-queries' ),
   sourcemaps = require( 'gulp-sourcemaps' ),
   autoprefixer = require( 'gulp-autoprefixer' ),
   concat = require( 'gulp-concat' ),
   livereload = require( 'gulp-livereload' );

const themeDir = "public/wp-content/themes/fim/",
   sassDir = "src/sass/",
   scriptDir = "src/js/";

const startWatch = () => {
  livereload.listen();
  watch( sassDir + '**/*.(sass|scss)', styles );
  watch( themeDir + '**/*.php' ).on( 'change', livereload.changed );
  watch( themeDir + 'css/*.css' ).on( 'change', livereload.changed );
  watch( themeDir + 'js/**/*.js' ).on( 'change', livereload.changed );
}
exports.default = startWatch;

const styles = () =>
   src( sassDir + 'styles.sass' )
      .pipe( sourcemaps.init() )
      .pipe( sass().on( 'error', sass.logError ) )
      .pipe( autoprefixer() )
      .pipe( sourcemaps.write( '.' ) )
      .pipe( dest( themeDir + 'css/' ) );

exports.styles = styles;

const productionStyles = () =>
   src( sassDir + 'styles.sass' )
      .pipe( sass().on( 'error', sass.logError ) )
      .pipe( autoprefixer() )
      .pipe( gcmq() )
      // .pipe(cleanCSS({compatibility: 'ie8'}))
      // .pipe(cssnano())
      .pipe( csso() )
      .pipe( dest( themeDir + 'css/' ) );

exports.productionStyles = productionStyles;
