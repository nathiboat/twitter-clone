module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
        'md': '640px',
        'lg': '768px',
        'xl': '1024px'
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
