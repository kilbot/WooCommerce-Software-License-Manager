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

You now should have a WordPress install available at `http://local.wordpress.dev` with a dummy WooCommerce store at `http://local.wordpress.dev`. Now it's time to clone the WooCommerce Software License Manager project and start developing!

```bash
# make sure you're in the plugins folder
$ cd wp-content/plugins/

# clone the project
$ git clone https://github.com/kilbot/WooCommerce-Software-License-Manager.git woocommerce-software-license-manager

# move into the project folder and install any dependencies
$ cd woocommerce-software-license-manager
$ npm install

# run development tasks
$ grunt dev
```
