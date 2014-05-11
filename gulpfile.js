var gulp = require('gulp');
var livereload = require('gulp-livereload');
var watch = require('gulp-watch');

gulp.task('livereload', function()
{
	var server = livereload();

	gulp.watch('app/DLP/**/*.php', function(evt) {
		server.changed(evt.path);
	});

    gulp.watch('app/views/**/*.php', function(evt) {
		server.changed(evt.path);
	});

    gulp.watch('public/**/*.js', function(evt) {
		server.changed(evt.path);
	});

	
});

gulp.task('default', function() {
	gulp.run('livereload');
});