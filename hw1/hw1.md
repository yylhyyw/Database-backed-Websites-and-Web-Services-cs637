#### Assignment 1<br>Yiwei Yao

1. a. I know HTML very well, so I skip it.   
   b. HTTP request to www.cs.umb.edu/cs637/hw1.html:      
    ```
    GET /cs637/hw1.html HTTP/1.1  
    Host: www.cs.umb.edu
    ```
    HTTP response from www.cs.umb.edu/cs637/hw1.html:

    ```
    HTTP/1.1 200 OK
    Date: Fri, 13 Sep 2019 16:45:42 GMT
    Server: Apache/2.4.18 (Ubuntu) OpenSSL/1.0.2g mod_wsgi/4.3.0 Python/2.7.12

    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
            <meta name="generator" content="HTML Tidy for Windows (vers 25 March 2009), see www.w3.org">
            <title>CS637 hw1</title>
        </head>
        <body>
        ***
        ***
        ***
        </body>
    </html>
    ```
2. 1-4: 
   ```
    SELECT winner
    FROM nobel
    WHERE  yr>= 2000
        AND subject = 'Peace'
   ```
   1-7:
    ```
    SELECT winner
    FROM nobel
    WHERE winner LIKE 'john%'
    ```
    2-2:
    ```
    SELECT NAME 
    FROM   world 
    WHERE  gdp / population > (SELECT gdp / population 
                                FROM world 
                                WHERE NAME = 'United Kingdom') 
       AND continent = 'Europe' 
    ```
    2-4:
    ```
    SELECT name, population
    FROM   world
    WHERE  population > (SELECT population
                            FROM   world
                            WHERE  name = 'Canada')
        AND population < (SELECT population
                            FROM   world
                            WHERE  name = 'Poland')
    ```
    2-6:
    ```
    SELECT name FROM world
	WHERE gdp > ALL(
		SELECT gdp FROM world
			WHERE continent = 'Europe' AND
				gdp IS NOT NULL
	)
    ```
    3-2:
    ```
    SELECT DISTINCT continent
    FROM world
    ```
    3-4:
    ```
    SELECT Count(name)
    FROM world
    WHERE area >= 1000000
    ```
    3-6:
    ```
    SELECT continent , Count(name) FROM world GROUP BY continent
    ```
    4-3:
    ```
    SELECT id, title, yr FROM movie
	WHERE title LIKE '%Star Trek%'
	ORDER BY yr
    ```
    4-6:
    ```
    SELECT name
    FROM   actor
        join casting
            ON actor.id = casting.actorid
        join movie
            ON movie.id = casting.movieid
    WHERE  casting.movieid = 11768 
    ```
    4-7:
    ```
    SELECT name
    FROM   actor
        join casting
            ON actor.id = casting.actorid
        join movie
            ON movie.id = casting.movieid
    WHERE  movie.title = 'Alien' 
    ```
    4-9:
    ```
    SELECT title
    FROM   movie
    WHERE  id IN (SELECT movieid
                FROM   actor
                        join casting
                        ON ( id = actorid )
                WHERE  name = 'Harrison Ford'
                        AND ord != 1) 
    ```
3. a. Script:
   ```
   Script started on Sun 15 Sep 2019 09:24:34 PM EDT
    yiweiyao@topcat:~/cs637$ mysql -u yiweiyao -o[Kp
    Enter password: 
    Welcome to the MySQL monitor.  Commands end with ; or \g.
    Your MySQL connection id is 4602
    Server version: 5.6.33-0ubuntu0.14.04.1 (Ubuntu)

    Copyright (c) 2000, 2016, Oracle and/or its affiliates. All rights reserved.

    Oracle is a registered trademark of Oracle Corporation and/or its
    affiliates. Other names may be trademarks of their respective
    owners.

    Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

    mysql> use yiweiyaodb
    Database changed
    mysql> CREATE TAN[KBLE t1 (id INT , message VARCHAR(40));
    Query OK, 0 rows affected (0.37 sec)

    mysql> INSERT INTO TABL[K[K[K[Kt1 (1, [K[K[KVALUES(1, fi[K[K'first  row ');
    Query OK, 1 row affected (0.06 sec)

    mysql> INSERT INTO t1 VALUES(2, 'second row ');
    Query OK, 1 row affected (0.06 sec)

    mysql> SELECT * FROM t1[K[Kt1
        -> ;
    +------+------------+
    | id   | message    |
    +------+------------+
    |    1 | first row  |
    |    2 | second row |
    +------+------------+
    2 rows in set (0.00 sec)

    mysql> exit
    Bye
    yiweiyao@topcat:~/cs637$ exit
    exit

    Script done on Sun 15 Sep 2019 09:26:53 PM EDT
    ```
    b.  I have loaded your mysql database on topcat with the script successfully. Here is my script:
    ```
    Script started on Sun 15 Sep 2019 09:38:27 PM EDT
    yiweiyao@topcat:~/cs637/hw1$ mysql -u yiweiyao -p
    Enter password: 
    Reading table information for completion of table and column names
    You can turn off this feature to get a quicker startup with -A

    Welcome to the MySQL monitor.  Commands end with ; or \g.
    Your MySQL connection id is 4606
    Server version: 5.6.33-0ubuntu0.14.04.1 (Ubuntu)

    Copyright (c) 2000, 2016, Oracle and/or its affiliates. All rights reserved.

    Oracle is a registered trademark of Oracle Corporation and/or its
    affiliates. Other names may be trademarks of their respective
    owners.

    Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

    mysql> source my[K[Kmy_guitar_shop1.sql [K[K[K[K[K[K[K[K[K[K[K[K[K[K[K[K[K[K[K my_guitar_shop1.sql;
    Database changed
    Query OK, 0 rows affected (0.34 sec)

    Query OK, 0 rows affected (0.37 sec)

    Query OK, 0 rows affected (0.29 sec)

    Query OK, 3 rows affected (0.09 sec)
    Records: 3  Duplicates: 0  Warnings: 0

    Query OK, 10 rows affected (0.16 sec)
    Records: 10  Duplicates: 0  Warnings: 0

    mysql> exit
    Bye
    yiweiyao@topcat:~/cs637/hw1$ exit
    exit

    Script done on Sun 15 Sep 2019 09:39:14 PM EDT
    ```
4. a. Here is my program:
   ```
    <?php
        $investment = 1000;
        $interest_rate = .1;
        $years = 25;
        $future_value = $investment;

        for ($i = 1; $i <= $years; $i++) {
            $future_value = ( $future_value + ($future_value * $interest_rate)); 
        }

        echo "future value: ".$future_value;
    ?>
    ```
    I have run it successfully. Here is my result:
    ```
    Script started on Mon 16 Sep 2019 11:51:55 AM EDT
    yiweiyao@topcat:~/cs637/hw1$ php future_value.php 
    future value: 10834.705943388

    yiweiyao@topcat:~/cs637/hw1$ exit
    exit

    Script done on Mon 16 Sep 2019 11:52:06 AM EDT
    ```
    b. By changing the variable `$error_message` in the following code block, it can display a different error message. for example
    ```
        11     if ($investment === FALSE ) {
        12         $error_message = 'Please reenter a vaild number at Investment filed.';
        13     }
    ```
   Now if a user does not enter a number at Investment filed, it will display a new error message 'Please reenter a valid number at Investment filed' rather than 'Investment must be a valid number.'

5. I have set up my DevelopmentSetup successfully and no problems encountered.

