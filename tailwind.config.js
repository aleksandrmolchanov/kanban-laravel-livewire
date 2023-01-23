/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      './vendor/wire-elements/modal/resources/views/*.blade.php',
      './storage/framework/views/*.php'
  ],
  theme: {
      fontFamily: {
          'roboto': ['"Roboto", sans-serif']
      },
    extend: {},
  },
  plugins: [],
}
