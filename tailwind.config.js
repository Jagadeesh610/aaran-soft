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
    ],

    theme: {
        extend: {
            colors: {
                'alice-blue': '#F6F9FC',
                'bubble':'#E4F2FE'

            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                Don:[ "Donegal One", "serif"],
                gab:[ "Gabriela", "serif"],
                Ram:["Ramaraja", "serif"]
            },
        },
    },

    plugins: [forms, typography],
};
