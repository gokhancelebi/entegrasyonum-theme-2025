/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./assets/js/**/*.js",
    "./assets/css/**/*.css",
  ],
  // Tailwind'in reset stillerini devre dışı bırak - style.css'deki default stilleri korur
  corePlugins: {
    preflight: false,
  },
  theme: {
    extend: {},
  },
  plugins: [],
};
