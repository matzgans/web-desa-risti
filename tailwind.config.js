import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#922a2a",
                secondary: "#DE7C7D",
            },
            keyframes: {
                zoomInOut: {
                    "0%, 100%": { transform: "scale(1)" },
                    "50%": { transform: "scale(1.1)" },
                },
            },
            animation: {
                zoomInOut: "zoomInOut 10s ease-in-out infinite",
            },
        },
    },

    plugins: [forms],
};
