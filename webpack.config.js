
// For instructions about this file refer to
// webpack documentation: https://webpack.github.io/docs/
// var webpack = require('webpack');
var path = require('path');
var CopyWebpackPlugin = require('copy-webpack-plugin');
// var ExtractTextPlugin = require("extract-text-webpack-plugin");
// var WriteFilesPlugin = require('write-file-webpack-plugin');

module.exports = {
    // context: path.join(__dirname, 'app'),
    entry: {
        'js/common': ['jquery']
        
    },
    output: {
        path: path.resolve(__dirname, 'public/build'),
        filename: '[name].js',
        // publicPath: '/ct/jeremy/apps/3PEP/web/build/',
        // pathinfo: false 
    },
    devServer: {
        // This is required for older versions of webpack-dev-server
        // if you use absolute 'to' paths. The path should be an
        // absolute path to your build destination.
        outputPath: path.join(__dirname, 'build')
    },
    plugins: [
        new CopyWebpackPlugin([
            // {output}/to/directory/file.txt
            // { from: 'node_modules/patternfly/dist/css/patternfly.min.css', to: 'css/' },
            // { from: 'node_modules/patternfly/dist/css/patternfly-additions.min.css', to: 'css/' },
            // { from: 'node_modules/patternfly/dist/js/patternfly.min.js', to: 'js/' }
            {
                from: { glob: './node_modules/patternfly/dist/img/*.*'},
                to: 'img',
                flatten: true
            },
            {
                from: { glob: './node_modules/patternfly/dist/fonts/*.*'},
                to: 'fonts',
                flatten: true
            },
            {
                from: { glob: './node_modules/patternfly/dist/css/*.*'},
                to: 'css',
                flatten: true
            }
            ]
        )
    ]
};

/*module.exports = {
    entry: {
        'js/common': ['jquery'],
        'js/app': './assets/js/app.js',
        'css/app': ['./assets/scss/app.scss']
    },
    output: {
        path: path.resolve(__dirname, 'public/build'),
        filename: '[name].js',
        // publicPath: '/ct/jeremy/apps/3PEP/web/build/',
        // pathinfo: false 
    },
    module: {
        rules: [
            {
                test: /\.jsx?$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {    
                        cacheDirectory: true,
                        presets: [
                            ['env', {
                                modules: false,
                                targets: {
                                    browsers: '> 1%',
                                    uglify: true
                                },
                                useBuiltIns: true
                            }]
                        ]
                    }
                }
                
            },
            {
                test: /\.(png|jpg|jpeg|gif|ico|svg)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'images/[name].[ext]',
                            // publicPath: '/ct/jeremy/apps/3PEP/web/build/' 
                        }
                    }
                ]
            },
            {
                test: /\.(woff|woff2|ttf|eot|otf)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options:
                            {
                                name: 'fonts/[name].[ext]',
                                //publicPath: '/ct/jeremy/apps/3PEP/web/build/'
                            }
                    }
                ]
            },
            {
                test: /\.s[ac]ss$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                // If you are having trouble with urls not resolving add this setting.
                                // See https://github.com/webpack-contrib/css-loader#url
                                url: false,
                                minimize: true,
                                sourceMap: true
                            }
                        },
                        {
                            loader: 'sass-loader',
                            options: {
                                sourceMap: true,
                                includePaths: [ 
                                    path.resolve(__dirname, "node_modules"), 
                                    path.resolve(__dirname, "node_modules/patternfly/node_modules") 
                                ]
                            }
                        }
                    ]
                }) 
            }
        ]
    },
    plugins: [
        new ExtractTextPlugin({ // define where to save the file
            filename: '[name].css',
            allChunks: true,
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        })
    ]
};*/
        
