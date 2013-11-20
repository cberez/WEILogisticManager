WEILogisticManager
================== 

[![Build Status](https://travis-ci.org/cesarBere/WEILogisticManager.png?branch=master)](https://travis-ci.org/cesarBere/WEILogisticManager)

Requirements
------------
[composer](http://getcomposer.org/)  
MySQL  
PHP 5.4  


Install and run project 
-----------------------

Download project and put it at the root of your www directory.  
At the root of the project, run the following commands:  
```  
composer install // This will install the dependencies  
php app/console doctrine:database:create // This will create the database  
php app/console doctrine:schema:create // This will generate the tables  
php app/console fos:user:create // This will allow you to create a valid user  
```  

Then go to `localhost:[your port]/WEILogisticManager/web/app_dev.php` and you will arrive on the login page.  
