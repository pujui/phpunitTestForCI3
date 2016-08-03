# phpunitTestForCI3
phpunitTestForCI3

CodeIgniter3 to running phpunit

1. git clone https://github.com/kenjis/ci-phpunit-test.git

2. install composer

3. install phpunit

4. run
    :cd [your project]/application/tests;
    :phpunit controllers/Welcome_test.php
        ...                                                                3 / 3 (100%)
        Time: 346 ms, Memory: 12.75MB
        OK (3 tests, 3 assertions)


5. 產生HTML報表
    phpunit --coverage-html [create report] [your project]/application/tests/controllers/Welcome_test.php

注意事項

    1.phpunit 需再有phpunit.xml 下才可執行
    
    2.CI3 下執行需要透過本身CI3下Bootstrap.php執行, 設定於phpunit.xml內bootstrap="./Bootstrap.php"