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

Challenge Endpoints

- [GET] http://localhost:2222
- [GET,POST] http://localhost:2222/login
- [POST] http://localhost:2222/usuarios/new
- [GET] http://localhost:2222/usuarios/get_conversations/:idUser
