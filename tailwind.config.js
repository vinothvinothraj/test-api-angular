import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'yellow': '#FA991C',
                'lightwhite': '#FBF3F2',
                'lightblue': '#1C768F',
                'darkblue': '#032539',
                'bgblack': '#111111',
                'adminbody':'#101316',
            },
        },
    },

    plugins: [
        require('flowbite/plugin'),
        forms,
        typography],
};
