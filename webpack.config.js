var webpack = require('webpack');
var inProduction = (process.env.NODE_ENV === 'production');
var outdir = __dirname + '/dist';
var bladedir = __dirname + '/php/laravel/blade/dist';
var publicPath = process.env.RAZORBACKS_STYLE_CDN || 'https://cdn.walton.uark.edu';
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CleanWebpackPlugin = require('clean-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
    entry: {
        uark: [
            './js/main.js',
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
        new CleanWebpackPlugin([outdir, bladedir], {exclude:'images'}),

        new HtmlWebpackPlugin({
            cdn: publicPath,
            template: './php/laravel/blade/src/layout.blade.php',
            filename: 'blade/layout.blade.php',
            minify: {
                collapseWhitespace: inProduction,
                removeComments: inProduction
            }
        }),
        new HtmlWebpackPlugin({
            template: './php/laravel/blade/src/layout-auth.blade.php',
            filename: 'blade/layout-auth.blade.php',
            inject: false,
            minify: {
                collapseWhitespace: inProduction,
                removeComments: inProduction
            }
        }),
        new HtmlWebpackPlugin({
            template: './php/laravel/blade/src/navbar-auth.blade.php',
            filename: 'blade/navbar-auth.blade.php',
            inject: false,
            minify: {
                collapseWhitespace: inProduction,
                removeComments: inProduction
            }
        }),
        new HtmlWebpackPlugin({
            template: './php/laravel/blade/src/notice-banner.blade.php',
            filename: 'blade/notice-banner.blade.php',
            inject: false,
            minify: {
                collapseWhitespace: inProduction,
                removeComments: inProduction
            }
        }),

        function() {
            this.plugin('done', stats => {
                // create hash manifest file
                var dump = stats.toJson().assetsByChunkName.uark;
                var manifest = {};
                manifest.js  = dump[0];
                manifest.css = dump[1];
                require('fs').writeFileSync(
                    __dirname + '/manifest.json',
                    JSON.stringify(manifest, null, 2)
                );

                // move blade dist
                require('mv')(outdir+'/blade', bladedir, function(err){});
            });
        }
    ]
};

if (inProduction) {
    module.exports.plugins.push(
        new webpack.optimize.UglifyJsPlugin()
    );
}
