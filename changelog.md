# Change Log for the PattonWebz Post Type Registration Class

All notable changes to this project will be documented in this file.

This projects tries to adhere to [Semantic Versioning](https://semver.org/) and [Keep a CHANGELOG](https://keepachangelog.com/).

## [Unreleased]

_No documentation available about unreleased changes as of yet._

## [0.1.0] - 2018

- Initial Version

## [0.2.0] - 2019-02-10

### Fixed

- Corrected reference to `$label` property in `get_labels()`.

### Changes

- When the `$name` property is used to backfill the `label` arg is has the first letter uppercased.
- Post Types now register as `public` by default.

## [0.2.1] - 2019-02-10

- Changed where the uppercase first letter when backfilling is done for 'label'

## [0.2.2] - 2019-02-26

### Added

- Added a class constructor method to handle setup of properties at instantiation for overriding defaults.
- Add menu_icon option to class.
