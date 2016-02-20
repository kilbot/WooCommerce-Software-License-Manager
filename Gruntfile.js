module.exports = function(grunt) {

  // load all grunt tasks matching the `grunt-*` pattern
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({

    // watch for changes and trigger sass, jshint etc
    watch: {
      php: {
        files: ['/**/*.php' ],
        tasks: ['shell:phpunit']
      }
    },

    shell: {
      phpshell: {
        multiple: {
          command: [
            'phpunit',
            'phpunit'
          ].join('&&')
        }
      }
    }

  });

  // test
  grunt.registerTask('test', 'Run unit tests', ['shell']);

  // dev
  grunt.registerTask('dev', 'Development build', ['test', 'watch']);

  // deploy
  grunt.registerTask('deploy', 'Production build', ['']);

  // default = test
  grunt.registerTask('default', ['test']);

};