# Joomla Template Webpack Starter

This repository contains a Webpack-based asset pipeline for Joomla templates. It handles bundling JavaScript, compiling SCSS to CSS, autoprefixing, and generating optimized production builds.

## Features

- Webpack 5 bundling
- SCSS → CSS pipeline with source maps
- Autoprefixer via PostCSS
- Bootstrap 5 & jQuery ready
- Swiper & Owl Carousel support
- Clean build directory on each compilation
- Critical CSS generation (via `critical` npm package)

## Tech stack

- Webpack 5
- ES6+ JavaScript
- Sass (SCSS)
- PostCSS + Autoprefixer
- Bootstrap 5.3, jQuery 3.7, Swiper 11, Owl Carousel 2.3

## File structure

```
template/
  assets/
    js/
      app.js
    scss/
      main.scss
  build/
package.json
webpack.config.js
postcss.config.js
generate-critical.js
README.md
```

## Installation

```
npm install
```

## Scripts

```
npm run dev     // watch mode with source maps
npm run prod    // production build
npm run critical
npm run postprod
```

## License

MIT License.
