let mix = require('laravel-mix');

mix.styles(['public/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css',
			'public/admin/assets/global/css/components.min.css',
			'public/admin/assets/layouts/css/layout.min.css',
			'public/admin/assets/layouts/css/themes/darkblue.min.css'], 'public/css/app.css');

mix.scripts(['public/admin/assets/global/plugins/jquery.min.js',
			'public/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js',
			'public/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
			'public/admin/assets/global/scripts/app.min.js',
			'public/admin/assets/layouts/scripts/layout.min.js'], 'public/js/app.js')
