/*
Enter your query here.
*/

CREATE TABLE `Student` (
  `id` int(11) NOT NULL,
    `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    CREATE TABLE `Course` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
            `title` VARCHAR(32) NOT NULL ,
                `description` VARCHAR(256) NOT NULL , 
                    `lecturer` VARCHAR(32) NOT NULL , PRIMARY KEY (`id`)
                    ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

                    CREATE TABLE `Comments` ( 
                        `id` INT(11) NOT NULL AUTO_INCREMENT , 
                            `courseID` INT(11) NOT NULL , 
                                `studentID` INT(11) NOT NULL , 
                                    `comments` VARCHAR(1024) NOT NULL , PRIMARY KEY (`id`)
                                    ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

                                    INSERT INTO `Student` (`id`, `name`) VALUES 
                                    (NULL, 'Peter'), 
                                    (NULL, 'Stamat');

                                    SELECT COUNT(id) FROM `Student`;

                                    INSERT INTO `Course` (`id`, `title`, `description`, `lecturer`) VALUES (NULL, 'www-tech', 'Introduction to web technologies', 'Petrov');

                                    INSERT INTO `Course` (`id`, `title`, `description`, `lecturer`) VALUES (NULL, 'artificial intelligence', 'Intro to AI', 'Koichev');

                                    SELECT DISTINCT lecturer FROM `Course`;
