const path = require('path'); // Import the path package from npm

const postCSSPlugins = [
   require('postcss-import'),
   require('postcss-simple-vars'),
   require('postcss-nested'),
   require('autoprefixer'),
];

// Hit Ctrl + c to stop Webpack from watching
module.exports = {
   entry: './scripts/js/App.js', // starting file
   output: {
      filename: 'bundled.js',
      path: path.resolve(__dirname, 'scripts'), // where bundled.js goes
   },
   mode: 'development',
   watch: true, // tell Webpack to rebundle on save
   module: {
      rules: [
         {
            test: /\.css$/i,
            use: [
               'style-loader',
               'css-loader?url=false',
               {
                  loader: 'postcss-loader',
                  options: {
                     postcssOptions: {
                        plugins: [postCSSPlugins],
                     },
                  },
               },
            ],
         },
      ],
   },
};
