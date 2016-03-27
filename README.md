# WooCommerce Software License Manager

[![Build Status](https://travis-ci.org/kilbot/WooCommerce-Software-License-Manager.svg)](https://travis-ci.org/kilbot/WooCommerce-Software-License-Manager)
[![Join the chat at https://gitter.im/kilbot/WooCommerce-Software-License-Manager](https://badges.gitter.im/kilbot/WooCommerce-Software-License-Manager.svg)](https://gitter.im/kilbot/WooCommerce-Software-License-Manager?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

A license management solution for selling software with WooCommerce

## Developing locally

WooCommerce Software License Manager is a WordPress plugin which requires [WordPress](http://wordpress.org) and [WooCommerce](wordpress.org/plugins/woocommerce).

To develop the plugin locally you will first have to set up a local server with WordPress and WooCommerce installed. It is recommended that you first follow the installation steps at [Varying Vagrant Vagrants (VVV)](https://github.com/Varying-Vagrant-Vagrants/VVV#the-first-vagrant-up), this will give you a local virtual server environment with everything you need to develop WordPress plugins. You do not *have* to use VVV, but if you are capable of managing your own local server you probably don't need these instructions.

Once you have successfully installed VVV, step through the following commands to install WooCommerce:
```bash
# start the virtual machine
$ vagrant up

# access the server
$ vagrant ssh

# move to the stable WordPress directory
$ cd /srv/www/wordpress-default/

# install and activate WooCommerce
$ wp plugin install woocommerce --activate

# install and activate WordPress importer
$ wp plugin install wordpress-importer --activate

# import dummy data into WooCommerce
$ wp import wp-content/plugins/woocommerce/dummy-data/dummy-data.xml --authors=create
```

You now should have a WordPress install available at `http://local.wordpress.dev` with a dummy WooCommerce store at `http://local.wordpress.dev/shop`. Now it's time to clone the WooCommerce Software License Manager project and start developing!

```bash
# make sure you're in the plugins folder
$ cd wp-content/plugins/

# clone and activate the project
$ git clone https://github.com/kilbot/WooCommerce-Software-License-Manager.git woocommerce-software-license-manager
$ wp plugin activate woocommerce-software-license-manager

# move into the project folder and install any dependencies
$ cd woocommerce-software-license-manager
$ npm install
$ composer install

# run development tasks (use --force if you are fixing a test)
$ grunt dev
```

## Requirements

[VVV](https://github.com/Varying-Vagrant-Vagrants/VVV) comes with [all the requirements](https://github.com/Varying-Vagrant-Vagrants/VVV#what-do-you-get) for developing this plugin, this is why it is the recommended development environment for beginners. 
If you already have a local server please ensure it has the following requirements to successfully build and test the project.

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP 5.5+        | `php --version` | [php.net](http://php.net/manual/en/install.php) |
| PHPUnit         | `phpunit --version` | [phpunit.de](https://phpunit.de/) |
| composer        | `composer --version` | [getcomposer.org](https://getcomposer.org/doc/00-intro.md) |
| node            | `node --version` | [nodejs.org](https://nodejs.org) |
| grunt           | `grunt --version` | `npm install -g grunt-cli` |