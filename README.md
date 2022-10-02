# Yana Backend Challenge

## Stacks

- [Grocery CRUD.](https://codeigniter.com/userguide3/) v 3.1 (PHP 74 or 73 + MySQL), MVC.
- [Grocery CRUD.](https://www.grocerycrud.com/v1.x/documentation)
- [macports](https://ports.macports.org/)
  - [php74](https://ports.macports.org/port/php74/)
  - [php74-mysql](https://ports.macports.org/port/php74-mysql/)

## Data Base configurations

Check file [application/config/database.php](application/config/database.php)

Data

```mysql
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
  PRIMARY KEY (`id`),
  KEY `email_user_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;

CREATE TABLE IF NOT EXISTS `user_activities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `message_text` mediumtext NOT NULL,
  `message_from` varchar(100) NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `activities_user_index` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
```

## Start a Web Server With One Terminal Command on OS X

```shell

php74 -S localhost:2222

```

# Challenge Endpoints

- [GET] http://localhost:2222
![Screen Shot 2022-10-02 at 16 30 48](https://user-images.githubusercontent.com/12787927/193477123-efea26b4-7008-4ab9-b2b6-11ea1ad92d2c.png)


- [GET,POST] http://localhost:2222/login
![Screen Shot 2022-10-02 at 16 30 12](https://user-images.githubusercontent.com/12787927/193477095-9ed027bf-13b5-4967-bd3c-4d81ca5e14ed.png)

- [POST] http://localhost:2222/usuarios/new

```josn
{ 
  "email": "xxxxxx@gmail.com",
  "password": "23123dsasdfs"
}

```

- [GET] http://localhost:2222/usuarios/get_conversations/:idUser

![Screen Shot 2022-10-02 at 16 33 14](https://user-images.githubusercontent.com/12787927/193477232-9f03ec29-f0c0-4b85-96d8-73c838730157.png)

