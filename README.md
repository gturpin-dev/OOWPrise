# OOWPrise
OOWPrise is a WordPress starter theme that heavily employs object-oriented programming techniques.

[![Packagist](https://img.shields.io/packagist/v/gturpin-dev/oowprise.svg)](https://packagist.org/packages/gturpin-dev/oowprise)
[![Packagist](https://img.shields.io/packagist/dt/gturpin-dev/oowprise.svg)](https://packagist.org/packages/gturpin-dev/oowprise)

<p align="center">
  <img width="300" src="./screenshot.png" alt="OOWPrise Logo">
</p>

## Installation

You can install OOWPrise using the following methods:

### via Composer CLI

```sh
composer create-project gturpin-dev/oowprise
```

## Usage

You have a built-in development environment that you can use to develop your theme without a WP installation.

It requires [Docker](https://www.docker.com/) and [wp-env](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/) to be installed on your machine.

You have access to the following commands :

```sh
wp-env start # Start the development environment
wp-env stop # Stop the development environment
```

Install dependencies :

```sh
composer install
npm install
```

You can wrap everything above with the provided Makefile :

```sh
make install # Install dependencies
make server:start # Start the development environment
make server:stop # Stop the development environment
```

## Contributing

TODO: Write contribution guidelines

## Credits

TODO: Write credits

## License

The OOWPrise theme is open-sourced software licensed under the [MIT license](LICENSE.md).
