CREATE DATABASE `crud`;
CREATE TABLE `student` (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    class VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    PRIMARY KEY (id) FOREIGN KEY (class) REFERENCES class (class_id)
);
ALTER TABLE `student`
MODIFY class INT NOT NULL;
INSERT INTO `student`(`name`, `address`, `class`, `phone`)
VALUES ('Jenish', 'surat', 5, ''),
    ('Vinay Bhai', 'rajkot', 3, ''),
    ('Yash', 'mumbai', 1, '7048325668'),
    ('Ankit Bhai', 'agra', 2, '7894516230'),
    ('Hardik Bhai', 'delhi', 3, '');
SELECT *
FROM `student`
    INNER JOIN `class` ON `student`.`class` = `class`.`class_id`;