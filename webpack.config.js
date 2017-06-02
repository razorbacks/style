var webpack = require('webpack');
var inProduction = (process.env.NODE_ENV === 'production');
var PACKAGE = require('./package.json');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: {
        uark: [
            './sass/main.scss',
        ]
    },
    output: {
        path: __dirname + '/dist',
        filename: '[name].' + PACKAGE.version + '.js'
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/,
                use: ExtractTextPlugin.extract({
                    use: ['css-loader', 'sass-loader']
                })
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin('[name].' + PACKAGE.version + '.css'),
        new webpack.LoaderOptionsPlugin({
            minimize: inProduction
        }),
    ]
};

if (inProduction) {
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin()
    );
}
