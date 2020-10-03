module.exports = {
  purge: [],
  theme: {

      backgroundColor: {
          page: 'var(--page-background-color)',

          secondary: 'var(--secondary-background-color)',
          ternary: 'var(--ternary-background-color)',

          button: 'var(--button-background-color)',

      },

      colors: {
          default: 'var(--text-default-color)',

          secondary: 'var(--text-secondary-color)',
          ternary: 'var(--ternary-color)',

          orange: 'var(--text-orange-color)',
      },

      fill: {
          search: 'var(--search-fill-color)',
          rating: 'var(--rating-fill-color)',

      },

      borderColor: {
          border: 'var(--border-color)',
          accent: 'var(--border-accent)'
      },
    extend: {



        spinner: (theme) => ({
            default: {
                color: '#dae1e7', // color you want to make the spinner
                size: '1em', // size of the spinner (used for both width and height)
                border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
                speed: '500ms', // the speed at which the spinner should rotate


            },
            // md: {
            //   color: theme('colors.red.500', 'red'),
            //   size: '2em',
            //   border: '2px',
            //   speed: '500ms',
            // },
        }),
        width: {
            '96': '24rem',
        },
    },
  },
  variants: {},
  plugins: [
      require('tailwindcss-spinner')(),
  ],
}
