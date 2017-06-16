# WPNonce 

WordPress Nonce object.

## Table Of Contents

* [Installation](#installation)
* [Usage](#usage)
* [License](#license)
* [Contributing](#contributing)

## Installation

The best way to use this package is through Composer:

```BASH
$ composer require christian/wp_nonce dev-master
```

### Requirements

This package requires PHP 5.4 or higher.

## Usage

```php
<?php

//namespace
use Christian\WPNonce\Nonce;

// create nonce object
$nonce = new Nonce();

// getter and setter for attributes
$nonce->set_attributname('attribute_content');

// get nonce url
$nonce->nonce_url();

// get nonce form field
$nonce->nonce_field();

// get nonce create
$nonce->create();

// nonce are you sure message
$nonce->ays();

// verify nonce
$nonce->verify($value);

// check admin referer
$nonce->verify_admin();

// check ajax referer
$nonce->verify_ajax();

// get nonce referer field
$nonce->referer_field();
```

## License

Copyright (c) 2017 Spiri

## Contributing

All feedback / bug reports / pull requests are welcome.
