module.exports = function(grunt) {
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			files: ['*.css', '!*.min.css'],
			tasks: ['cssmin']
		},
		cssmin : {
            css:{
                src: 'style.css',                
    			dest: 'style.min.css'
            }
        },
        version: {
            css: {
                options: {
                    prefix: 'Version\\:\\s'
                },
                src: [ 'style.css' ],
            },
            php: {
                options: {
                    prefix: '\@version\\s+'
                },
                src: [ 'functions.php' ],
            }
        },
        clean: {
            build: {
                    src: ['build/']
            }
        },
        copy: {
            build: {
                    src: ['**', '!releases/**', '!readme.md', '!.gitignore', '!node_modules/**', '!Gruntfile.js', '!gruntfile.js', '!package.json'],
                    dest: 'build/',
            }
        },
	    makepot: {
	        target: {
	            options: {
	                type: 'wp-theme',
                	domainPath: '/languages'            
	            }
	        }
		},
        compress: {
            build: {
                options: {
                    archive: 'releases/<%= pkg.name %>-<%= pkg.version %>.zip'
                },
                expand: true,
                cwd: 'build/',
                src: '**',
                dest: '<%= pkg.name %>'
            }
    	}
	});
	grunt.registerTask('build', ['clean','cssmin','version','makepot','copy','compress','clean']);
}