const miniCss = require("mini-css-extract-plugin");

module.exports = {
    mode: 'production',
    entry: {
        "main": ["./src/js/main.js", "./src/scss/main.scss"]
    },
    output: {
        path: __dirname + "/dist/js/",
        filename: "[name].js"
    },
    watch: true,
    module: {
        rules: [{
            test:/\.(s*)css$/,
            use: [
                {
                    loader: miniCss.loader,
                    options: {
                        publicPath: ''
                    }
                },
                'css-loader',
                'sass-loader',
            ]
        }]
    },
    plugins: [
        new miniCss({
            filename: "../css/[name].min.css"
        }),
    ]
};
