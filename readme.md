# Laravel PHP_CodeSniffer
## This is a custom Sniff to check and reformat PHP source code based on [Laravel Coding Style](http://laravel.com/docs/4.2/contributions#coding-style).

###Usage

Clone this repository

```
git clone http://github.com/antonioribeiro/laravelcs LaravelCodeSniffer
```

Execute CodeSniffer

```
phpcs --standard=LaravelCodeSniffer/Standards/Laravel/  /path/to/your/project/files
```

####This Sniff was tested using a Laravel .php file and some changes, to comply with PSR2, were required, [click here to see them](http://github.com/antonioribeiro/laravelcs/compare/096884846fa385e54a7e4eeb43547a9137fdf047...d78508f9e5633bc0f776f730dcc6f1e0a9c8daec).
