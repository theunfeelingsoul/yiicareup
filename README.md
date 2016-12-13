Yii 2 Basic Project Template Careup Website
===========================================

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => 'your_password',
    'charset' => 'utf8',
];
```

You can find the database in the config folder. 

~~~
yiicareup\config
~~~

The name of the database is called  `careup_server.sql`




INSTALLATION
------------

Download this archive to your loacl host computer. Then set up the database. This has to be done manually. 
Then go to this URL http://localhost/yiicareup/web/index.php?r=office%2Fhome. 

You will be asked to log in. The credentaisl are :

Username : v
Password : 123

You can then naviaget to other pages from there.



PAGE NAVIGATION
---------------

The pages are :

### Office Home
```
http://localhost/yiicareup/web/index.php?r=office%2Fhome
``` 

Here ypu can :

- See the office information.
- Add and remove the serveces or appeal tags that an office has by clicking on the service or appeal tag.
- Chnage the status of the office and employee timetable by clicking on the symbol.

###Update an Office 
```
http://localhost/yiicareup/web/index.php?r=office%2Fupdate&id=9
``` 

###View
```
http://localhost/yiicareup/web/index.php?r=office%2Findex
``` 

- Here you can view all the offices belonging to one user.

###Create
```
http://localhost/yiicareup/web/index.php?r=office%2Fcreate
``` 

- Here you create an office




