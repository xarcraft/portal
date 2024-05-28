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
        },
        // colors: {
        //     transparent: "transparent",
        //     current: "currentColor",
        //     white: "#ffffff",
        //     stratos: {
        //         50: "#e4efff",
        //         100: "#cfe0ff",
        //         200: "#a8c4ff",
        //         300: "#749dff",
        //         400: "#3e61ff",
        //         500: "#1328ff",
        //         600: "#0010ff",
        //         700: "#0010ff",
        //         800: "#000ee4",
        //         900: "#0005b0",
        //         950: "#000035",
        //     },
        // },
    },

    plugins: [forms],
};
