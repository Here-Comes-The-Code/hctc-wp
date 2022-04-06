const gulp = require( 'gulp' ),
	sass = require( 'gulp-sass' )(require('sass')),
	autoprefixer = require( 'gulp-autoprefixer' ),
	cssnano = require( 'gulp-cssnano' ),
	sourcemaps = require( 'gulp-sourcemaps' ),
	uglify = require( 'gulp-uglify' ),
	concat = require( 'gulp-concat' ),
	babel = require( 'gulp-babel' );

const paths = {
	styles: {
		src: 'sass/style.scss',
		dest: './dist/',
		watch: 'sass/**/*.scss',
	},
	script: {
		src: 'js/script.js',
		dest: './dist/',
		watch: '/js/**/*.js',
	},
};

function style() {
	return (
		gulp
			.src( paths.styles.src, {allowEmpty: true} )
			.pipe( sourcemaps.init() )
			.pipe( sass() )
			.on( 'error', function ( err ) {
				// eslint-disable-next-line no-console
				console.log( err.toString() );
				this.emit( 'end' );
			} )
			.pipe( autoprefixer( 'last 4 version' ) )
			.pipe( cssnano() )
		// .pipe(header(banner, { package : package }))
			.pipe( gulp.dest( paths.styles.dest ) )
	);
}

function script() {
	return (
		gulp
			.src( paths.script.src, { allowEmpty: true } )
		// .pipe(header(banner, { package : package }))
			.pipe(
				babel( {
					presets: ['@babel/env'],
				} )
			)
			.pipe( uglify() )
			.pipe( concat( 'scripts.js' ) )
			.pipe( gulp.dest( paths.script.dest ) )
	);
}

function watch() {
	gulp.watch( paths.styles.src, style );
	gulp.watch( paths.styles.watch, style );
	gulp.watch( paths.script.src, script );
	gulp.watch( paths.script.watch, script );
}

// eslint-disable-next-line no-undef
exports.style = style;
// eslint-disable-next-line no-undef
exports.script = script;

const build = gulp.parallel( style, script, watch );

gulp.task( 'default', build );
