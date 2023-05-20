CREATE DATABASE `crud`;
CREATE TABLE `student` (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    class INT NOT NULL,
    phone VARCHAR(10) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (class) REFERENCES class_details (class_id)
);
INSERT INTO `student`(`name`, `address`, `class`, `phone`)
VALUES ('Jenish', 'surat', 5, ''),
    ('Vinay Bhai', 'rajkot', 3, ''),
    ('Yash', 'mumbai', 1, '7048325668'),
    ('Ankit Bhai', 'agra', 2, '7894516230'),
    ('Hardik Bhai', 'delhi', 3, '');
SELECT `student`.`id`,
    `student`.`name`,
    `student`.`address`,
    `class_details`.`class_name` AS `classname`,
    `student`.`phone`
FROM `student`
    JOIN `class_details`
WHERE `student`.`class` = `class_details`.`class_id`;
SELECT *
FROM `student`
    JOIN `class_details`
WHERE `student`.`class` = `class_details`.`class_id`;