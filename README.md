# Alphabeterator

Tutorial on PHP's ArrayAccess, Countable and Iterator interfaces.

## Setup

1. Check out this repo
2. From within the repo, run `$ composer install`

## Tasks

1. On the `English` class, implement the [Countable](http://php.net/countable) interface. Verify that your implementation
works by running `$ ./vendor/bin/phpunit --filter testCount`
2. On the `English` class, implement the [ArrayAccess](http://php.net/arrayaccess) interface. Verify that your implementation
works by running `$ ./vendor/bin/phpunit --filter testOffset`
3. On the `English` class, implement the [Iterator](http://php.net/iterator) interface. Verify that your implementation
works by running `$ ./vendor/bin/phpunit --filter testIterator`
4. Verify that everything works by running `$ ./vendor/bin/phpunit`

## Bonus

- Implement a new Alphabeterator class that represents the Greek alphabet
- Implement a function on the English class that transforms the array into uppercase

## Solution

One potential solution to the Tasks can be found on the `solution` branch.
