/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        screens: {
            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        },
        extend: {
            colors: {
                edu: '#F67080',
                lightBlue: '#DADAF7',
                lightYellow: '#E4E2AA',
                blueish: '#5A7CB0',
                backgroundBlue:'#BBBAF5',
                greenbluish:'#398186',
                'greenDark':'#6D750F',
                softBlueBackground:'#5A7CB0'
            }
        },
    },
    plugins: [
        require('daisyui'),
    ],
}