# database-method-chaining-in-php

use this file in your project to get database results very fluent and easy way.
---------------- Installation ----------------
step-1: download this file and install it in your project.
step-2: create database object 
step-3: now it is ready to use its methods.

---------------- End installation ----------------

---------------- Example ----------------

$db = new DB(); // create object of DB class

$result = $db->select('name,mobile') // you can leave it empty by default it select all comuns
            ->from('students') // provide you table name
            ->where("class","=","9th") //apply where condition
            ->orderBy('id','DESC') // set order by to get order in acending or desending order
            ->limit(3,2) // set limit if you want
            // ->toSql() // helps to print sql query
            // ->get() // returns all the rows found in result.
            ->first(); // returns only first founded result.

prx($result);

---------------- End Example ----------------

---------------- NOTE ----------------

- In the DB class there are methods that can help you to get result in single line because it use method chaining concept.
- select() method: In this method, you can send string of your table columns with (,) comma or if you not provide table columns it will use (*) by default.
- from() method: In this method, parameter is required, you can pass you table name in this method.
- where() method: This method use 3 parameters as arguments first parameter is column name, second parameter is condition and third parameter is value.
- limit() method: limit method contains 2 parameters first parameter is max limit and it is required and the second parameter is optional by default it is 0.
- orderBy() method: this methods contains 2 required parameter, 1st paramter is column name and second parameter is ASC or DESC.
- get() method: this method helps you to get all the rows from database table according to the condition used.
- first() method: this methods also helps you to get database rows but it returns only top most row.
- toSql() method: This is amazing method for you. you can use this method before using get(), first() method. it will return the actual database query prepared by you. you can use it you find any error while executing sql query. it helps you to see sql query build by you with the help of method chaining.

Upcomming: 
    - insert(), update() and destroy() these methods are not working yet. it will updated soon.
    
in this file you can find global method name is prx() it cantain 1 parameter as array. it helps you to print your code as pretty print.


---------------- End Note ----------------
