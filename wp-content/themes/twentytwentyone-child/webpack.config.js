const path = require('path');
const TerserPlugin = require('terser-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
module.exports = {
    mode: "production",
    entry: ['./assets/js/src/app.js', './assets/css/src/app.scss'],
    output: {
        filename: './assets/js/build/app.min.js',
        path: path.resolve(__dirname)
    },
    module: {
        rules: [
            {
                test: /\.js$/, exclude: /node_modules/,
                use: {
                    loader: "babel-loader", 
                    options: { presets: ['babel-preset-env'] } 
                }
            },
            {
                test: /\.(sass|scss)$/,
                use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
            } 
        ]
    },
    plugins: [new MiniCssExtractPlugin({ filename: './assets/css/build/main.min.css' }) ],
    optimization: {
        splitChunks: false,
        minimize: true,
        minimizer: [new TerserPlugin()]
      }
};