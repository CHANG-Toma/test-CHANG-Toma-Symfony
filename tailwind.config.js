
/** @type {import('tailwindcss').Config} */

module.exports = {
    content: ["./templates/*.html.twig"],
    theme: {
        extend: {},
        screens: {
            'sm': '576px',
            'md': '768px',
            'lg': '992px',
            'xl': '1200px',
        },
    },
    variants: {},
    plugins: [],
};