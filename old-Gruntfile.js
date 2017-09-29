module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      compile:{
        options:{
          style:'expanded'
        },
        files:{
          "assets/css/project.css": ["assets/css/sass/project.scss"] ,
        }
      }
    },

    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: 'assets/css',
          src: ['project.css'],
          dest: 'assets/css',
          ext: '.min.css'
        }]
      }
    },

    concat: {
      options: {
        separator: '\n\n',
        },
        dist: {
          src: [  "assets/js/src/jquery.easing.min.js",
                  "assets/js/src/parallax.min.js",
                  "assets/js/src/jquery.fancybox.pack.js",
                  "assets/js/src/jquery.gridder.min.js",
                  "assets/js/src/main.js"],
          dest: "assets/js/src/project-full.js"
        },
      },

    uglify: {
      options: {
          sourceMap: false
      },
      build: {
          files: {
            "assets/js/project.min.js": "assets/js/src/project-full.js"
          }
      }
    },

    jshint: {
      options: {
        jshintrc: '.jshintrc',
          "force": true
        },
      all: ["Gruntfile.js","assets/js/src/project-full.js" ]
    },
    // browserSync: {
    //   default_options: {
    //     bsFiles: {
    //       src: [
    //         "assets/css/project.min.css"
    //       ]
    //     },
    //     options: {
    //       proxy: "corporate.dev",
    //       online: true,
    //       ghostmode:false,
    //       port:8080,
    //       tunnel:"testing",
    //       watchTask: true
    //     }
    //   }
    // },
    watch:{
       html:{
        files:["*.html", "**/*.php"],
        options:{  livereload:true, }
        },
      sass:{
        files:["assets/css/sass/*.scss","assets/css/sass/*/*.scss"],
        tasks:["sass", "cssmin"],
        options:{  livereload:true, }
        },
      js:{
        files:['assets/js/src/*.js'],
        tasks:["concat","uglify","jshint"],
        options:{  livereload:true, }
       }
    },
  });

  // Load the plugin that provides the "sass" task.
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  // grunt.loadNpmTasks('grunt-browser-sync');
  //grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default',['watch']);
};