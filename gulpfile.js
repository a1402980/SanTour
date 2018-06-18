var gulp = require('gulp');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
//var concat = require('gulp-concat');
var notify = require("gulp-notify");
//var compass = require("gulp-compass");
var minify = require('gulp-minifier');



gulp.task('sass', function() {

	gulp.src('assets/scss/*.scss')
	.pipe(sourcemaps.init())
	.pipe(sass({outputStyle: 'compact'}).on("error", notify.onError({
		message: "Error: <%= error.message %>",
		title: "Gulp compilation failed."
	})))
	.pipe(autoprefixer({
		browsers: ['last 2 versions']
	}))
	.pipe(sourcemaps.write('./'))
	.pipe(minify({
		minify: true,
		collapseWhitespace: true,
		conservativeCollapse: true,
		minifyJS: true,
		minifyCSS: true,
		getKeptComment: function (content, filePath) {
			var m = content.match(/\/\*![\s\S]*?\*\//img);
			return m && m.join('\n') + '\n' || '';
		}
	}))
	.pipe(rename({ suffix: '.min' }))
	.pipe(gulp.dest('./assets/minified/css'));
});

gulp.task('minifyJS', function() {

	gulp.src('assets/js/*.js')
	.pipe(minify({
		minify: true,
		collapseWhitespace: true,
		conservativeCollapse: true,
		minifyJS: true,
		minifyCSS: true,
		getKeptComment: function (content, filePath) {
			var m = content.match(/\/\*![\s\S]*?\*\//img);
			return m && m.join('\n') + '\n' || '';
		}
	}))
	.pipe(rename({ suffix: '.min' }))
	.pipe(gulp.dest('./assets/minified/js'));
});

gulp.task('watch', function () {
	gulp.watch('assets/scss/*.scss', [ "sass" ]);
	gulp.watch('assets/js/*.js', [ "minifyJS" ]);
});

gulp.task('default', ["sass", "minifyJS"]);
