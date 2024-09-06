/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.ts",
        "./resources/**/*.vue",
        "./resources/**/*.svelte",
    ],
    theme: {
        extend: {
            colors: {
                laracasts: "rgb(50,138,241)",
            },
        },
    },
    plugins: [],
    darkMode: "class",
};
