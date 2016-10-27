var gulp          = require('gulp');
var runSequence   = require('run-sequence');
var manifest      = require('asset-builder')('./custom/manifest.json');

// `path` - Paths to base asset directories. With trailing slashes.
// - `path.source` - Path to the source files. Default: `assets/`
// - `path.dist` - Path to the build directory. Default: `dist/`
var path = manifest.paths;

// `config` - Store arbitrary configuration values here.
var config = manifest.config || {};

gulp.task('styles', function(){
  return gulp.src(['custom/scss/*.scss'])
    .pipe(gulp.dest(path.dist + 'blog-' + config.blogID + '/scss'));
});

gulp.task('images', function(){
  return gulp.src(['custom/images/**/*'])
    .pipe(gulp.dest(path.dist + 'blog-' + config.blogID + '/images'));
});

gulp.task('watch', function(){
  gulp.watch([path.source + 'scss/**/*'], ['styles']);
  gulp.watch([path.source + 'images/**/*'], ['images']);
});

gulp.task('default', function(callback){
  runSequence('styles',
              'images',
              callback);
});
