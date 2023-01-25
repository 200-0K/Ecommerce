
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'cairo': ['Cairo', ...defaultTheme.fontFamily.sans]
      }
    },
  },
  plugins: [
    require("daisyui"),
  ],
}