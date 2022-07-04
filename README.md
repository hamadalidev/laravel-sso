# Introduction
If you have a large ecosystem with multiple applications, it’s nice to have a common user account which you can use to authenticate in these separate applications. So when a user authenticates any of these apps, they will be logged in everywhere.

# What you’ll need to do
Share the cookies, sessions and users between the applications
Use the same encryption key

# Create your common database
Here you will only store your common data like your users, sessions, subscriptions etc. Make sure that all your applications can access this database.


## Update the database configurations
Add a new database connection
You need to do this in all of your applications.

In your config/database.php in the connections array specify your “common” connection. Just copy one of your existing configs.

'common' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_COMMON', '127.0.0.1'),
            'port' => env('DB_PORT_COMMON', '3306'),
            'database' => env('DB_DATABASE_COMMON', 'common_sso'),
            'username' => env('DB_USERNAME_COMMON', 'forge'),
            'password' => env('DB_PASSWORD_COMMON', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

## Configure your common models
Edit the models you want to store in the common database and set the connection property.

protected $connection = 'common';

## Add User and Session table in common database.

### users
-- common_sso.users definition

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


### sessions
-- common_sso.sessions definition

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


## Added session variable in .env

SESSION_DRIVER=database
SESSION_CONNECTION=common



