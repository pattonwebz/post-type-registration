# PattonWebz Post Type Registration Class
A simple abstract class to encapsulate registering post types and their arguments.

## Using the class

The intention is that you setup the extended class with a name and some values then trigger the registration with a call to the `protected` method `register()`.

You can pass in an array for `$labels` and `$args` prior to you calling `register` if you are generating the parameters for the CPT on-the-fly.

## Extending the class

In the child class set the `$name` property to the slug to be used for the CPT then override the `get_labels` and `get_args` methods with your values.

# Licence Information
This package is licensed under GNU GPLv2 or later licence.

Help Section contained in the package is based on and inspired by Justin Tadlock's Customizer Upsell Section - https://github.com/justintadlock/trt-customizer-pro - GPLv2 licence.

Copyright 2018 © William Patton.
