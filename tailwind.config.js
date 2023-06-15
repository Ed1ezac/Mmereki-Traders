/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        'primary': {
          '100': '#ABFDE9', '200': '#06E0BE', '300': '#09A38F',
          '400': '#078370', '500': '#066C61', '600': '#065E51',
          '700': '#06544A', '800': '#064438', '900': '#05372E',
        }
      },
      fontFamily:{
        'headings':['system-ui', '-apple-system', 'ui-sans-serif'],
        'body':['Niramit','system-ui', '-apple-system', 'ui-sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

