module.exports = function(grunt) {

  // load all grunt tasks matching the `grunt-*` pattern
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({

    files: {
      php: ['**/*.php', '!vendor/**']
    },

    // watch for changes and trigger task
    watch: {
      php: {
        files: ['<%= files.php %>'],
        tasks: ['shell:unit_tests', 'shell:integration_tests']
      }
    },

    shell: {
      install: {
        command: 'bash tests/php/unit/bin/install.sh tests root root localhost latest'
      },
      unit_tests: {
        command: 'phpunit -c tests/php/unit/phpunit.xml'
      },
      integration_tests: {
        command: 'phpunit -c tests/php/integration/phpunit.xml'
      }
    }

  });

  // test
  grunt.registerTask('test', 'Run unit tests', ['shell:unit_tests', 'shell:integration_tests']);

  // dev
  grunt.registerTask('dev', 'Development build', ['shell:install', 'test', 'watch']);

  // deploy
  grunt.registerTask('deploy', 'Production build', ['']);

  // default = test
  grunt.registerTask('default', ['test']);

};