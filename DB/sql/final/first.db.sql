BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `userInfo` (
	`uid`	INTEGER PRIMARY KEY AUTOINCREMENT,
	`name`	TEXT,
	`email`	TEXT,
	`phone`	TEXT
);
INSERT INTO `userInfo` VALUES (1,'navneet','8955676711','navneet@gmail.com');
INSERT INTO `userInfo` VALUES (2,'kaivan','9999887788','kaivan@gmail.com');
INSERT INTO `userInfo` VALUES (3,'aeshani','8888889890','aeshani@gmail.com');
INSERT INTO `userInfo` VALUES (4,'yash','8434323435','yash@gmail.com');
INSERT INTO `userInfo` VALUES (5,'bharat','9912345678','bharat@gmail.com');
INSERT INTO `userInfo` VALUES (6,'saumya','9991234567','saumya@gmail.com');
CREATE TABLE IF NOT EXISTS `shop` (
	`sid`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`name`	TEXT,
	`desc`	TEXT,
	`open`	TEXT,
	`close`	TEXT,
	`uid `	INTEGER
);
INSERT INTO `shop` VALUES (1,'cafeteria',NULL,'9','18',1);
INSERT INTO `shop` VALUES (2,'campus store',NULL,'9','23',2);
INSERT INTO `shop` VALUES (3,'MFC',NULL,'9','21',5);
CREATE TABLE IF NOT EXISTS `offers` (
	`oid`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`value`	INTEGER,
	`promo`	TEXT,
	`validity`	INTEGER
);
CREATE TABLE IF NOT EXISTS `login` (
	`uid`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`uname`	TEXT,
	`password`	TEXT,
	`type`	INTEGER,
	FOREIGN KEY(`uid`) REFERENCES `userInfo`(`uid`) ON DELETE CASCADE
);
INSERT INTO `login` VALUES (1,'navneet','navneet',1);
INSERT INTO `login` VALUES (2,'kaivan','kaivan',1);
INSERT INTO `login` VALUES (3,'aeshani','aeshani',0);
INSERT INTO `login` VALUES (4,'yash','yash',0);
INSERT INTO `login` VALUES (5,'bharat','bharat',1);
INSERT INTO `login` VALUES (6,'saumya','saumya',0);
CREATE TABLE IF NOT EXISTS `location` (
	`sid`	INTEGER NOT NULL,
	`lat`	TEXT,
	`long`	TEXT,
	`place`	TEXT,
	FOREIGN KEY(`sid`) REFERENCES `shop`(`sid`)
);
CREATE TABLE IF NOT EXISTS `item` (
	`iid`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	`sid`	INTEGER NOT NULL,
	`name`	TEXT,
	`value`	INTEGER,
	`stock`	INTEGER,
	`desc`	TEXT
);
COMMIT;
