const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                square: ["Nova\\ Square"],
            },
            colors: {
                ffGray: {
                    DEFAULT: "#BBB3AF",
                },
                ffGreen: {
                    DEFAULT: "#92F663",
                    black: "#070801",
                    white: "#E4FDD8",
                },
                ffRed: {
                    DEFAULT: "#F6503A",
                    black: "#140301",
                    white: "#FDDCD8",
                },
                ffYellow: {
                    DEFAULT: "#F8C81E",
                    black: "#141001",
                    white: "#FEF5D7",
                },
                ffBlack: {
                    DEFAULT: "#07070A",
                    mid: "#272A31",
                    high: "#202020",
                },
                ffWhite: {
                    DEFAULT: "#FCFCFC",
                    mid: "#E6E6E6",
                },
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
