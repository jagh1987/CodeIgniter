###################
Backend App CodeIgniter Implementation
###################

First than all, this is an application for learning purposes. Knowing That... now:

This is a code igniter app implementation, please DON'T USE THIS for your developing purposes, 
use the the original from https://github.com/bcit-ci/CodeIgniter or download it from the original 
website https://codeigniter.com/download

*******************
Demo
*******************

This Backend app contains an operative [DashBoard Demo](http://jagh1987.000webhostapp.com/DashBoard)
The application allow to register user, and after that user can answer son easy questions. The purpose issues
to fill that questions, and the app will save the user questions, after that the application allow to see
a list of users in the [DashBoard Demo](http://jagh1987.000webhostapp.com/DashBoard) and can see a list
of registered users, and see the answers that has given.

**************************
API User
**************************

Ther is a link on the main menu that let you to see the API to get the json datas for post, get, delete etc.

* Get All Users: http://jagh1987.000webhostapp.com/user/      Method: Get
* Get User Data: http://jagh1987.000webhostapp.com/user/$id   Method: Get
* Insert a User: http://jagh1987.000webhostapp.com/user/$id   Method: Post
* Update a User: http://jagh1987.000webhostapp.com/user/      Method: Put
* Delete a User: http://jagh1987.000webhostapp.com/user/$id   Method: Put


*******************
API Answer
*******************

Ther is a link on the main menu that let you to see the API to get the json datas for post, get, delete etc.

* Get All Answer: http://jagh1987.000webhostapp.com/answer/      Method: Get
* Get Answer Data: http://jagh1987.000webhostapp.com/answer/$id   Method: Get
* Insert a Answer: http://jagh1987.000webhostapp.com/answer/$id   Method: Post
* Update a Answer: http://jagh1987.000webhostapp.com/answer/      Method: Put
* Delete a Answer: http://jagh1987.000webhostapp.com/answer/$id   Method: Put

************
Code Igniter Rest Server
************

This app use the https://github.com/chriskacerguis/codeigniter-restserver to create the REST_Controller controllers

************
How to download and implement?
************

1) It require php 5.6 or higther
2) Download the repositore and set it up into a local ampp, xamp, lamp or wampserver, etc.
3) Save the repositore into a folder inside your public apache www folder the name of the folder must be the same in
    application/config/config.php file, modify the base_url in this file, acording your apache folder name
    $config['base_url'] = 'http://localhost/NAME_OF_FOLDER/';
4) Create a new MySQL Database

```MySQL
CREATE DATABASE codeigniterDB;
use codeigniterDB;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `questionNumber` int(11) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answerConstraint` (`id`,`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TRIGGER userDeleted BEFORE DELETE ON user FOR EACH ROW DELETE FROM answer WHERE answer.userid = OLD.id;
```

5) Edit the application/config/database.php with the mysql database credencials hostname, database, user, password