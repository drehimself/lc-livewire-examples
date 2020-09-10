module.exports = {
  purge: [],
  theme: {
    extend: {},
  },
  variants: {
      opacity: ['responsive', 'hover', 'focus', 'disabled'],
  },
  plugins: [
      require('@tailwindcss/ui'),
  ],
}
