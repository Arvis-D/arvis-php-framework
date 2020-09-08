
const path = require('path');

module.exports = {
  entry: {
    addProduct: './assets/js/addProducts.ts',
    navbar: './assets/js/navbar.ts'
  },
  output: {
    path: path.join(__dirname, 'public/dist'),
    filename: '[name].bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.ts$/,
        exclude: /node_modules/,
        loader: 'ts-loader'
      }
    ]
  },
  resolve: {
    extensions: [ '.tsx', '.ts', '.js' ],
  },
  devServer: {
    host: 'localhost',
    port: 3000,
    historyApiFallback: true,
    open: true
  },
  optimization: {
    splitChunks: {
      chunks: 'all',
    },
  },
};