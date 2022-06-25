# Install

### Install PHP (tested with v8.0.12)
- Install on OSX with [Homebrew](https://github.com/shivammathur/homebrew-php) or [MAMP](https://www.mamp.info/en/windows/)
- Install on Windows with [WAMP](https://www.wampserver.com/en/)
- Install on Linux with `apt-get install php` or similar.

### Install PHPUnit (for tests)
```
$ wget -O phpunit https://phar.phpunit.de/phpunit-9.phar
$ chmod +x phpunit
```

# Run Application
```
$ php AnimalProject.php "Mr Pickles" cat
```

# Test
```
$ ./phpunit --bootstrap src/autoload.php tests
```