CREATE TABLE `users`
(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100),
  `email` varchar(150),
  `password` text,
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_logout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_logged` boolean
);

CREATE TABLE `images`
(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `page_id` int,
  `title` varchar(100),
  `type` int,
  `association` int,
  `path` varchar(100),
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `menus`
(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` varchar(50)
);

CREATE TABLE `pages`
(
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `menu_id` int,
  `label` varchar(100),
  `link` varchar(100),
  `parent` int,
  `sort` int,
  `type` int,
  `active` int,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `content`
(
  `id` int NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `body` varchar(150),
  `page_id` int,
  `type` int,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `page_types`
(
  `id` int NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `name` varchar(50)
);

CREATE TABLE `image_types`
(
  `id` int NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `name` varchar(50)
);

CREATE TABLE `content_types`
(
  `id` int NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `name` varchar(50)
);

ALTER TABLE `pages` ADD FOREIGN KEY (`type`) REFERENCES `page_types` (`id`);

ALTER TABLE `pages` ADD FOREIGN KEY (`id`) REFERENCES `content` (`page_id`);

ALTER TABLE `images` ADD FOREIGN KEY (`type`) REFERENCES `image_types` (`id`);

ALTER TABLE `content` ADD FOREIGN KEY (`type`) REFERENCES `content_types` (`id`);

ALTER TABLE `menus` ADD FOREIGN KEY (`id`) REFERENCES `pages` (`menu_id`);

ALTER TABLE `pages` ADD FOREIGN KEY (`id`) REFERENCES `images` (`page_id`);
