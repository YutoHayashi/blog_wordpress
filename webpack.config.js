'use strict';
const webpack = require( 'webpack' );
let config = {
    mode: 'development',
    devtool: 'source-map',
    entry: {
        app: './assets/ts/index.ts'
    },
    output: {
        path: __dirname + '/dist/js/',
        filename: 'bundle.js'
    },
    resolve: {
        extensions: [ '.ts', '.js' ],
    },
    module: {
        rules: [
            {
                test: /\.ts$/,
                loader: 'ts-loader'
            },
        ],
    },
    plugins: [
        new webpack.ProvidePlugin( {
            process: 'process/browser',
        } ),
    ],
}
module.exports = config;
