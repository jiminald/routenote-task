module.exports = {
    lintOnSave: false,

    devServer: {
        proxy: {
            '^/api/': {
                target: 'http://localhost:8000',
                changeOrigin: true, // so CORS doesn't bite us.
            }
        }
    }
};
