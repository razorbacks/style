var webpack = require('webpack');
var inProduction = (process.env.NODE_ENV === 'production');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

module.exports = {
    entry: {
        uark: [
            './sass/main.scss',
        ]
    },
    output: {
        path: __dirname + '/dist',
        filename: '[name].[chunkhash].js'
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
        new ExtractTextPlugin('[name].[contenthash].css'),
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
