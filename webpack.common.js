const path = require( 'path' );
const assets = './assets/src/';
const miniExtract = require( 'mini-css-extract-plugin' );
const autoprefixer = require( 'autoprefixer' );
const externals = {
	'@eventespresso/eejs': 'eejs',
	'@eventespresso/i18n': 'eejs.i18n',
	'@eventespresso/components': 'eejs.components',
	'@eventespresso/editor': 'eejs.editor',
	'@wordpress/components': 'wp.components',
	'@wordpress/data': 'wp.data',
	'@wordpress/compose': 'wp.compose',
	react: 'eejs.vendor.react',
	'react-dom': 'eejs.vendor.reactDom',
	classnames: 'eejs.vendor.classnames',
	lodash: 'eejs.vendor.lodash',
	moment: 'eejs.vendor.moment',
};
/** see below for multiple configurations.
 /** https://webpack.js.org/configuration/configuration-types/#exporting-multiple-configurations */
const config = [
	{
		configName: 'base',
		entry: {
			'example-form-app': [
				assets + 'example-form-app/index.js',
			],
		},
		externals,
		output: {
			filename: 'eea-[name].[chunkhash].dist.js',
			path: path.resolve( __dirname, 'assets/dist' ),
		},
		module: {
			rules: [
				{
					test: /\.js$/,
					exclude: /node_modules/,
					use: 'babel-loader',
				},
				{
					test: /\.css$/,
					use: [
						miniExtract.loader,
						{
							loader: 'css-loader',
							query: {
								modules: true,
								localIdentName: '[local]',
							},
							//can't use minimize because cssnano (the
							// dependency) doesn't parser the browserlist
							// extension in package.json correctly, there's
							// a pending update for it but css-loader
							// doesn't have the latest yet.
							// options: {
							//     minimize: true
							// }
						},
						{
							loader: 'postcss-loader',
							options: {
								plugins: function() {
									return [ autoprefixer ];
								},
								sourceMap: true,
							},
						},
					],
				},
			],
		},
		watchOptions: {
			poll: 1000,
		},
	},
];
module.exports = config;
