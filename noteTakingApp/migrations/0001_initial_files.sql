CREATE TABLE `notes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT, 
  `body` text, 
  `userId` int DEFAULT NULL, 
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (`id`), 
  KEY `userNotes` (`userId`), 
  CONSTRAINT `userNotes` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT, 
  `title` varchar(255) NOT NULL, 
  `contents` varchar(255) NOT NULL, 
  `userId` int NOT NULL, 
  PRIMARY KEY (`id`), 
  KEY `userPost` (`userId`), 
  CONSTRAINT `userPost` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT, 
  `name` varchar(45) DEFAULT NULL, 
  `email` varchar(45) NOT NULL, 
  PRIMARY KEY (`id`), 
  UNIQUE KEY `email` (`email`), 
  UNIQUE KEY `email_2` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci
