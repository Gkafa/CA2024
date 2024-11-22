import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            animation: {
                marquee: 'marquee 15s linear infinite',  // 10s is the duration of the scroll
            },
            keyframes: {
                marquee: {
                    '0%': {transform: 'translateX(100%)'},
                    '100%': {transform: 'translateX(-100%)'},
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
