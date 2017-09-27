# Laravel PHP_CodeSniffer
### This is a custom Sniff to detect violations and reformat PHP source code based on [Laravel Coding Standard](http://laravel.com/docs/4.2/contributions#coding-style).

Your source code will be checked for PSR-1 & the Laravel "flavor" of PSR-2.

### Usage wih git

Clone this repository

    git clone http://github.com/antonioribeiro/laravelcs LaravelCodeSniffer

Execute CodeSniffer

    phpcs --standard=LaravelCodeSniffer/Standards/Laravel/  /path/to/your/project/files

### Usage with [Composer](https://getcomposer.org/doc/00-intro.md#installation-nix)

The recommended way is to install it globally with the following command:

    composer global require pragmarx/laravelcs

Make sure you have `~/.composer/vendor/bin/` in your PATH.

You will then be able to run PHP Code Sniffer with the Laravel Standard:

    phpcs --standard=$HOME/.composer/vendor/pragmarx/laravelcs/Standards/Laravel/ /path/to/your/project/files

### Testing the Sniff

This Sniff was tested using the Laravel Framework source code and some changes, to comply with PSR-2, were required, [click here to see them](http://github.com/antonioribeiro/laravelcs/compare/096884846fa385e54a7e4eeb43547a9137fdf047...d78508f9e5633bc0f776f730dcc6f1e0a9c8daec). Those were the violations found and fixed in Filesystem.php:

```
 --------------------------------------------------------------------------------
 FOUND 14 ERRORS AFFECTING 11 LINES
 --------------------------------------------------------------------------------
   29 | ERROR | [x] Inline control structures are not allowed
   44 | ERROR | [x] Inline control structures are not allowed
  113 | ERROR | [x] Expected 1 new line after closing parenthesis; found " "
  113 | ERROR | [x] Expected 1 newline after opening brace; 0 found
  113 | ERROR | [x] Inline control structures are not allowed
  113 | ERROR | [x] Closing brace must be on a line by itself
  241 | ERROR | [x] Inline control structures are not allowed
  247 | ERROR | [ ] Opening brace should be on the same line as the declaration
  249 | ERROR | [x] Closing brace indented incorrectly; expected 2 spaces, found 3
  310 | ERROR | [x] Inline control structures are not allowed
  335 | ERROR | [x] Inline control structures are not allowed
  343 | ERROR | [x] Inline control structures are not allowed
  361 | ERROR | [x] Inline control structures are not allowed
  384 | ERROR | [x] Inline control structures are not allowed
 --------------------------------------------------------------------------------
 PHPCBF CAN FIX THE 13 MARKED SNIFF VIOLATIONS AUTOMATICALLY
 --------------------------------------------------------------------------------
```

### Contributing

There are probably still a lot to do here, so please, open issues and send pull requests.
