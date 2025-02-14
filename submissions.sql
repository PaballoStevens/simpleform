CREATE TABLE `submissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `submissions` (`fname`, `email`) VALUES
('Paballo', 'Paballo@gmail.com');