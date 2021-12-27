const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"', ...defaultTheme.fontFamily.sans],   
            },

            textColor: ['active'],

            colors:{
              primaryyellow:'#ffff00',
              accentyellow:'#f5f3eb',
              primarygreen: '#4fc47f',
              lightgrey:'#f0f2f5',
              darkgrey:'#a6a6a6',
              darkergrey: '#737373',
              purple: '#5e17eb',
            },
            
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
