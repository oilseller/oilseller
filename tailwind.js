module.exports = {
  purge: [
    './app/**/*.php',
    './resources/**/*.php',
  ],
  theme: {
    extend: {
        spacing: {
            '44': '11rem',
        },
        width: {
            '16': '4rem',
        },
        top: {
            '4': '0.4rem',
        }
    }
  },
  variants: {}
}
