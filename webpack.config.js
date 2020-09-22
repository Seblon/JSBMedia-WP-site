const currentTask = process.env.npm_lifecycle_event;
const path = require("path"); // Import the path package from npm

let config = {
   entry: "./app/scripts/App.js",
   module: {
      rules: [
         {
            test: /\.css$/i,
            use: [
               "style-loader",
               "css-loader?url=false",
               {
                  loader: "postcss-loader",
                  options: {
                     postcssOptions: {
                        plugins: [
                           require("postcss-import"),
                           require("postcss-mixins")(),
                           require("postcss-simple-vars")(),
                           require("postcss-nested")(),
                           require("autoprefixer")(),
                        ],
                     },
                  },
               },
            ],
         },
      ],
   },
};

if (currentTask == "dev") {
   config.output = {
      filename: "bundled.js",
      path: path.resolve(__dirname, "app"), // where bundled.js goes
   };
   config.devServer = {
      before: function (app, server) {
         server._watch("./app/**/*.html");
      },
      contentBase: path.join(__dirname, "app"),
      hot: true,
      port: 3000,
      host: "0.0.0.0",
   };
   config.mode = "development";
}
if (currentTask == "build") {
   config.output = {
      filename: "bundled.js",
      path: path.resolve(__dirname, "dist"), // where bundled.js goes
   };
   config.mode = "production";
}

module.exports = config;
