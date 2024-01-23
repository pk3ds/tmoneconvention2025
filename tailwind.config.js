import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'media',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                title: ['HKGroteskWide-Black'],
            },
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'white': '#ffffff',
            'black': '#000000',
            'ultramarine': '#2362DD',
            'light-blue': '#99B6FF',
            'cobalt-blue': '#1800E7',
            'grey': '#E6E6E6',
            'navy-blue': '#180092',
            'dark-blue': '#06013A',
            'orange': '#FF7A00',
            'light-orange': '#F7B986',
            'accent-orange': '#FF5E00',
            'red': '#D82E00',
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
    ],
};
