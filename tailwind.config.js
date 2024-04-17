/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./node_modules/flowbite/**/*.js"],
    theme: {
        extend: {
            colors: {
                "primary": '#000000',
                "primary-dark": '#000000',
                "primary-light": '#000000',
                "primary-superlight":"#FFFFFF",
                "secondary": "#A66933",
                "secondary-dark": "#A66933",
                "secondary-light": "#A66933",
                "dark": "#071A2A",
                "dark-medium": "#555555",
                "dark-light": "#F5F5F5",
            },
            borderColor: {
                orange: '#FFA500',
            },
            fontFamily: {
                sans: ['Arial', 'sans-serif'],
            },
        },
        borderColor: {
            "custom-border-color": "#FF5900",
            "focus-border-color": "#FF5900", // Define el color de borde enfocado personalizado aquí
        },   
        ringColor: {
            "custom-ring-color": "#FF5900", // Define el color de anillo personalizado aquí
        },

    },
    plugins: [require("flowbite/plugin")],
    variants: {
        extend: {
            borderColor: ['focus'], // Habilita las clases de borde enfocado
        },
    },

};
