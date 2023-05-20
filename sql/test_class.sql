CREATE TABLE `class` (
    class_id INT NOT NULL AUTO_INCREMENT,
    class_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (class_id)
);
-- add some data 
INSERT INTO `class`(`class_name`)
VALUES ('BCOM'),
    ('BBA'),
    ('BCA'),
    ('MBA'),
    ('MCOM'),
    ('MSC');
-- change table name 
ALTER TABLE `class`
    RENAME TO `class_details`;
-- rename column name 
ALTER TABLE `class_details` CHANGE `name` `class_name` VARCHAR(50) NOT NULL;