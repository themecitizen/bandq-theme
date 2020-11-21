module.exports = function(grunt) 
{
	// Project configuration
	grunt.initConfig(
	{
		pkg: grunt.file.readJSON('package.json'),

		replace: {
			start: {
				src: [
					'*.php',
					'inc/*.php',
					'inc/**/*.php',
					'templates/*.php',
					'templates/*/*.php',
				],
				overwrite: true,
				replacements: [
					{
						from: 'wpfunc_',
						to: '<%= pkg.prefix.func %>'
					},
					{
						from: 'wptext',
						to: '<%= pkg.prefix.text %>'
					},
					{
						from: 'WPCLASS_',
						to: '<%= pkg.prefix.class %>'
					},
					{
						from: 'WPWIDGET - ',
						to: '<%= pkg.prefix.widget %>'
					},
					{
						from: 'wpf_domain',
						to: "<%= pkg.name %>"
					},
					{
						from: 'WPF_VERSION',
						to: "<%= pkg.constant.version %>"
					},
					{
						from: 'WPF_DATE',
						to: "'<%= pkg.date %>'"
					},
					{
						from: 'WPF_DIR',
						to: "<%= pkg.constant.path %>"
					},
					{
						from: 'WPF_URL',
						to: "<%= pkg.constant.url %>"
					},
					{
						from: '@package Themecitizen Start Theme',
						to: "@package <%= pkg.pkgname %>"
					}
				]

			},
			upgrade: {
				src: [
					'functions.php'
				],
				overwrite: true,
				replacements: [
					{
						from: /define\( 'WPFSS_VERSION', '(.*)' \)/g,
						to: "define( 'WPFSS_VERSION', '<%= pkg.version %>' )"
					}
				]
			}
		},

		less: {
			start: {
				options: {
					paths: ["css/","css/*"],
					banner: '/*\n' +
					'Theme Name: <%= pkg.pkgname %>\n' +
					'Theme URI: <%= pkg.author.demo %>/<%= pkg.name %>\n' +
					'Author: <%= pkg.author.name %>\n' +
					'Author URI: <%= pkg.author.website %>\n' +
					'Description: <%= pkg.description %>\n' +
					'Version: <%= pkg.version %>\n' +
					'License: GNU General Public License v2+\n' +
					'License URI: http://www.gnu.org/licenses/gpl-2.0.html\n' +
					'Text Domain: <%= pkg.name %>\n' +
					'Domain Path: /lang/\n' +
					'Tags: one-column, two-columns, left-sidebar, right-sidebar, full-width-template, post-formats, theme-options, threaded-comments, translation-ready\n' +
					'*/\n\n'
				},				
				files: {
					'style.css': ['css/style.less'],
				}
			},
			admin: {
				files: {
					'css/admin/admin.css': ['css/admin/admin.less']
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ['Android >= 2.1', 'Chrome >= 21', 'Explorer >= 8', 'Firefox >= 17', 'Opera >= 12.1', 'Safari >= 6.0']
			},
			start: {
				expand: true,
				src: ['style.css']
			}
		},


		jshint: {
			options: {
				"boss": true,
				"curly": true,
				"eqeqeq": false,
				"eqnull": true,
				"es3": true,
				"expr": true,
				"immed": true,
				"noarg": true,
				"onevar": true,
				"quotmark": "single",
				"trailing": true,
				"undef": true,
				"unused": true,
				"ignores": ['js/plugins/'],
				"browser": true,

				"globals": {
					"jQuery": false,
					"google": true,
					"YT": true,
					"WOW": true,
					"Waypoint": true,
					"Sly": true
				}
			},
			core: {
				expand: true,
				cwd: 'js/',
				src: [
					'scripts.js'
				]
			}
		},

		uglify: {
			core: {
				expand: true,
				cwd: 'js/',
				dest: 'js/',
				ext: '.min.js',
				src: [
					'*.js',
					'*.*.js',
					'!*.min.js',
					'admin/*.js',
					'!admin/*.min.js'
				]
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'img/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'img/'
				}]
			}
		},

		watch: {
			jsdev: {
				options: { livereload: true },
				files: ['js/scripts.js'],
				tasks: ['jshint', 'uglify']
			},
			css: {
				files: ['css/*.less','css/*/*.less'],
				tasks: ['less', 'autoprefixer']
			},
			core: {
				options: { livereload: true },
				files: ['*.php', '*/*.php', 'templates/*.php', 'inc/*.php', 'inc/*/*.php', '!inc/backend/*.php'],
				tasks: []
			},
			livereload: {
				options: { livereload: true },
				files: ['style.css', 'css/admin/admin.css']
			}

		}
	});

	// Load tasks.
	require('matchdep').filterDev('grunt-*').forEach( grunt.loadNpmTasks );
	// Register makepot task
	grunt.registerTask('generate', ['replace:start']);
	grunt.registerTask('upgrade', ['replace:upgrade', 'less']);

	grunt.registerTask( 'default', ['less', 'jshint', 'uglify', 'imagemin', 'watch'] );
}