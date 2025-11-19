const path = require('path');
const webpack = require('webpack');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const isProduction = process.argv[process.argv.indexOf('--mode') + 1] === 'production';
const compilationVersion = isProduction ? 'production' : 'development';

// const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
	mode: compilationVersion,
	entry: {
		script: "./assets/js/app.js"
	},
	output: {
		// filename: "[contenthash:6][name].bundle.js", // [name] - klucz z entry app.js
		filename: "[name].bundle.js", // [name] - klucz z entry app.js
		path: path.resolve(__dirname + "/build"),
	},
	module: {
		rules: [
				{
					test: /\.js$/,
					loader: "babel-loader",
					exclude: /node_modules/,
					options: {
						presets: [
							"@babel/preset-env"
						],
						plugins: []
					}
				},
				{
					test: [/\.css$/, /\.s[ac]ss$/i],
					use: [
						MiniCssExtractPlugin.loader,
						{
								loader: "css-loader",
								options: {
										sourceMap: true
								}
						},
						{
								loader: "postcss-loader",
								options: {
										sourceMap: true
								}
						},
						{
								loader: "sass-loader",
								options: {
										sourceMap: true,
										// sassOptions: {
										//     outputStyle: "compressed",
										// },
								}
						},
					],
				},
		]
	},
	plugins: [
			new CleanWebpackPlugin(), // clear files in build
			new MiniCssExtractPlugin({
					filename: "style.css",
			}),
			new webpack.ProvidePlugin({
				$: 'jquery',
				jQuery: 'jquery',
				'window.jQuery': 'jquery'
			}),
	],
	devtool : isProduction ? 'source-map' : 'inline-source-map'
}