/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      colors:{
        "blue-ceha":"hsl(225,46%,32%)"
      },
      fontFamily:{
        ruda:[ "Ruda", "sans-serif"]
      }
    },
  },
  plugins: [],
}