DROP DATABASE IF EXISTS `lms`;
CREATE DATABASE `lms`;

CREATE TABLE `users` (
--     `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email_verified_at` timestamp NULL DEFAULT NULL,
--   `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
--   UNIQUE KEY `users_email_unique` (`email`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'user id',
    `name` VARCHAR(255) COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT 'user name',
    `email` VARCHAR(255) COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT 'user email',
    `email_verified_at` DATETIME NULL DEFAULT NULL COMMENT 'verified date',
    `password` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'user password',
    `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `role` TINYINT(3) NOT NULL DEFAULT 0 COMMENT 'user role',
    `status` TINYINT(3) NOT NULL DEFAULT 0 COMMENT 'user status',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'created date',
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'updated date',
    PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `roles` (
    `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'role id',
    `identifier` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'role identifier',
    `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'role name',
    `status` TINYINT(3) NOT NULL DEFAULT 0 COMMENT 'role status',
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'created date',
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'updated date',
    PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
    UNIQUE KEY `roles_identifier_unique` (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `statuses` (
    `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'status id',
    `identifier` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'status identifier',
    `name` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'status name'
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'created date',
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'updated date',
    PRIMARY KEY (`id`) /*T![clustered_index] CLUSTERED */,
    UNIQUE KEY `statuses_identifier_unique` (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
