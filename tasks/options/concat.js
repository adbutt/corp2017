module.exports = {
	options: {
		stripBanners: true,
			banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%= pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPL-2.0+' +
		' */\n'
	},
	main: {
		src: [
			'assets/js/vendor/jquery.easing.min.js',
			'assets/js/vendor/parallax.min.js',
			'assets/js/vendor/jquery.fancybox.pack.js',
			'assets/js/vendor/jquery.gridder.min.js',
			'assets/js/src/main.js'
		],
		dest: 'assets/js/project-full.js'
	}
};
