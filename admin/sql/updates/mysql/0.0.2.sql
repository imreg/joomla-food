-- $Id: install.mysql.utf8.sql 24 2014-04-27 22:56:31Z  $

DROP TABLE IF EXISTS `#__foodbranches`;

CREATE TABLE `#__foodbranches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_postcode` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `is_comment` tinyint(4) NOT NULL DEFAULT '0',
  `latitude` double DEFAULT '0',
  `longitude` double DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
) AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__foodbranches` 
( `companyname`, `firstname`, `secondname`,
 `telephone`, `mobile`, `email`, `address_city`, 
 `address_street`, `address_postcode`, `comment`, 
 `is_comment`, `latitude`, `longitude`, `date`) 
 VALUES( 'Private', 'John', 'Smith', '02812345678', '07812345678', 
 'john.smith@yahoo.co.uk', 'Birmingham', '54 Bishop', 'B26 3QJ', 
 'Test Private', 1, 52.4512848, -1.731062599999973, '2014-05-06 17:46:36');