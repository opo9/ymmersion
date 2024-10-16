/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php", "./**/*.php"],
  theme: {
    extend: {
      colors: {
        primary: "#233E3C",
        secondary: "#C07239",
        tertiary: "#578480",
        background: "#EBE7E4",
        button: {
          light: "#FFFFFF",
          dark: "#233E3C",
        },
        border: "10, 4, 60",
        cards: "#FFF7F1",
      },
      padding: {
        btn: "15px 30px",
      },
      space: {
        service: ["20px"],
      },
    },
  },
  plugins: [
    function ({ addBase, theme }) {
      const colors = theme("colors");
      const variables = Object.keys(colors)
        .map((color) => {
          if (typeof colors[color] === "string") {
            return `--color-${color}: ${colors[color]};`;
          } else {
            return Object.keys(colors[color])
              .map((shade) => {
                return `--color-${color}-${shade}: ${colors[color][shade]};`;
              })
              .join("\n");
          }
        })
        .join("\n");

      addBase({
        ":root": {
          [variables]: variables,
        },
      });
    },
  ],
};
