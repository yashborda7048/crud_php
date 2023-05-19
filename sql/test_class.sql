CREATE TABLE `class` (
    class_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (class_id)
);
-- add some data 
INSERT INTO `class`(`name`)
VALUES ('BCOM'),
    ('BBA'),
    ('BCA'),
    ('MBA'),
    ('MCOM'),
    ('MSC');