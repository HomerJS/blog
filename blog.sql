CREATE DATABASE `blog` /*!40100 DEFAULT CHARACTER SET utf8 */;


CREATE TABLE blog.`blog` (
  `ref` varchar(18) NOT NULL,
  `author` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `text` longtext,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE blog.`comments` (
  `ref_com` varchar(18) NOT NULL,
  `ref_blog` varchar(18) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `text` tinytext,
  PRIMARY KEY (`ref_com`),
  KEY `ref_idx` (`ref_blog`),
  CONSTRAINT `ref` FOREIGN KEY (`ref_blog`) REFERENCES blog.`blog` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;