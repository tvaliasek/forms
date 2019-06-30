Nextras Forms Fork - only DatePicker and DateTimePicker, compatible with Nette 3
=============

List of components:
- **DatePicker** - date picker, represented by DateTime object
- **DateTimePicker** - date & time picker, represented by DateTime object

For BS4 renderer and custom form elements see repo [YABSForm](https://github.com/tvaliasek/yabsform/)

### Installation

The best way to install is using [Composer](http://getcomposer.org/):

```sh
$ composer require tvaliasek/nextras-forms-fork
```

For Date(Time)Picker we recommend use [Tempus Dominus](https://tempusdominus.github.io/bootstrap-4/) for Bootstrap.
See JS init script.

### Documentation

Add in your `config.neon`:

```php
extensions:
    tvaliasek.nextrasFormsFork: Tvaliasek\NextrasFormsFork\Bridges\NetteDI\FormsExtension
```
