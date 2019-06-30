Nextras Forms Fork - only DatePicker and DateTimePicker, compatible with Nette 3
=============

List of components:
- **DatePicker** - date picker, represented by DateTime object
- **DateTimePicker** - date & time picker, represented by DateTime object

### Installation

The best way to install is using [Composer](http://getcomposer.org/):

```sh
$ composer require tvaliasek/nextras-forms-fork
```

For Date(Time)Picker we recommend use [DateTime Picker](http://www.malot.fr/bootstrap-datetimepicker/) for Bootstrap.
See JS init script.

### Documentation

Add in your `config.neon`:

```php
extensions:
    tvaliasek.nextrasFormsFork: Tvaliasek\NextrasFormsFork\Bridges\NetteDI\FormsExtension
```
