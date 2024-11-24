/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./template-parts/**/*.{php,html,js}",
    "./*.{php,html,js}"
  ],
  theme: {
    extend: {
      colors: {
        'deep-red': '#8B0000',
        'bright-red': '#FF0000',
        'alt-red': '#ff4a54',
        'dark-maroon': '#4B0000',
        'dark-grey': '#1C1C1C',
        'crimson': '#DC143C',
        'dark-crimson': '#A52A2A'
      },
    },
  },
  plugins: [],
};

