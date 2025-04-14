// tailwind.config.js
module.exports = {
  content: ["./**/*.html", "./**/*.php"],
  theme: {
    extend: {
      colors: {
        bluePrimary: '#0066cc',
        bluePrimary_hover: '#005bb5',
        orangePrimary: '#ff7f32',
        softYellow: '#fffbdd',
        white2: '#f9f9f9',
      }
    }
  },
  safelist: [
    'bg-bluePrimary',
    'bg-bluePrimary_hover',
    'bg-orangePrimary',
    'bg-softYellow',
    'bg-white2'
  ],
  plugins: [],
}
