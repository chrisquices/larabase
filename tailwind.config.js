/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
    ],

    darkMode: 'class',
    plugins: [
        require('@tailwindcss/forms'),
        require("@tailwindcss/typography"),
        require("daisyui"),
    ],
    daisyui: {
        themes: [
            {
                "light": {
                    "primary": "#0ea2e3",
                    "secondary": "#00f0c8",
                    "accent": "#1dcdbc",
                    "neutral": "#2b3440",
                    "base-100": "#eff4f9",
                    "info": "#06b6d4",
                    "success": "#059669",
                    "warning": "#f59e0b",
                    "error": "#dc2626",
                },
                "dark": {
                    "primary": "#0ea2e3",
                    "secondary": "#00f0c8",
                    "accent": "#1dcdbc",
                    "neutral": "#2b3440",
                    "base-100": "#101626",
                    "info": "#06b6d4",
                    "success": "#059669",
                    "warning": "#f59e0b",
                    "error": "#dc2626",
                }
            }
        ],
    },
};
