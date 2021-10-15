module.exports = {
  lintOnSave: 'warning',
  css: {
    loaderOptions: {
      scss: {
        additionalData: `
          @import "@/scss/variables.scss";
        `
      }
    }
  },
  chainWebpack: (config) => {
    config.plugin('html').tap((args) => {
      args[0].title = 'Civitatis'
      args[0].meta = { description: 'SPA using Vue.js 3' }
      return args
    })
  },
  devServer: {
    proxy: {
      '^/api': {
        target: 'http://localhost:80',
        changeOrigin: true,
        pathRewrite: {
          '^/api': ''
        },
      },
    }
   }
 
}
