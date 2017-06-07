var webpack = require('webpack');
var inProduction = (process.env.NODE_ENV === 'production');
var outdir = __dirname + '/dist';
var publicPath = process.env.RAZORBACKS_STYLE_CDN || 'https://cdn.walton.uark.edu';
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin');

module.exports = {
    entry: {
        uark: [
            './sass/main.scss',
        ]
    },
    output: {
        path: outdir,
        publicPath: publicPath,
        filename: 'js/[name].[chunkhash].js'
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
        new ExtractTextPlugin('css/[name].[contenthash].css'),
        new webpack.LoaderOptionsPlugin({
            minimize: inProduction
        }),
        new CleanWebpackPlugin(outdir, {exclude:'images'}),
        function() {
            this.plugin('done', stats => {
                var dump = stats.toJson().assetsByChunkName.uark;
                var manifest = {};
                manifest.js  = dump[0];
                manifest.css = dump[1];
                require('fs').writeFileSync(
                    __dirname + '/manifest.json',
                    JSON.stringify(manifest, null, 2)
                );
            });
        }
    ]
};

if (inProduction) {
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin()
    );
}
