/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        screens: {
            'xs':'384px',
            'sm': '640px',
            'md': '1024px',
            'lg': '1536px',
        },
        extend: {
            colors: {
                'title-gray': 'rgb(112, 112, 112)',
                'gray-50w': 'rgb(119, 118, 109)',
                'gray-75w': 'rgb(181, 181, 174)',
                'gray-100w': 'rgb(147, 147, 147)',
                'gray-links':'#777777',
                'gray-links-hover':'#B5B5AE'
            }
        },
    },
    plugins: [],
}