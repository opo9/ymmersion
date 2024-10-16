/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php", "./**/*.php"],
  theme: {
    extend: {
      colors: {
        primary: "#233E3C",
        secondary: "#C07239",
        tertiary: "#578480",
        background: "#FFF7F1",
        button: {
          light: "#FFFFFF",
          dark: "#000000",
        }
      },
      padding: {
        btn: "20px 40px",
      },
    },
  },
  plugins: [],
};
