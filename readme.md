# Laravel PHP_CodeSniffer
### This is a custom Sniff to detect violations and reformat PHP source code based on [Laravel Coding Standard](http://laravel.com/docs/5.0/contributions#coding-style).

### This is a fork from the Antonio Ribeiro's Project, which can be found [here](https://github.com/antonioribeiro/laravelcs).

It checks the same thing to the Antonio's original project, in additional this sniffer **allows inline control structures**
and **check the functions have docblocks**.

Your source code will be checked for PSR-1 & the Laravel "flavor" of PSR-2.

###Usage wih git

Clone this repository

    git clone http://github.com/lukzgois/laravelcs LaravelCodeSniffer

Execute CodeSniffer

    phpcs --standard=LaravelCodeSniffer/Standards/Laravel/  /path/to/your/project/files

###Usage with [Composer](https://getcomposer.org/doc/00-intro.md#installation-nix)

The recommended way is to install it globally with the following command:

    composer global require lukzgois/laravelcs

Make sure you have `~/.composer/vendor/bin/` in your PATH.

You will then be able to run PHP Code Sniffer with the Laravel Standard:

    phpcs --standard=$HOME/.composer/vendor/lukzgois/laravelcs/Standards/Laravel/ /path/to/your/project/files

###Contributing

There are probably still a lot to do here, so please, open issues and send pull requests.
