/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                lato: ["Lato", "sans-serif"],
                playfair: ['Playfair Display', 'serif'],
            },
        },
    },
    plugins: [],
};
