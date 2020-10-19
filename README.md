# testZip24 - is a simple test for worker.
_task - source task from..

test1.sql -- SQL create table 'users'

test2.php -- simple test for PHP

test2a.php -- such as previous, added native assert() testing.

refactoring:
1. moved all files to zip24 folder
2. create unit test folder tests
3. add composer and install phpunit/phpunit last version
4. migrating to PHP7.4 and add more php7.4-xxx modules
5. creating /tests/TestZip24Tests.php It run from main folder: vendor/bin/phpunit vendor/bin/phpunit tests/TestZip24Tests.php

That's all now.. :)
