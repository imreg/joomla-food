-- $Id: install.mysql.utf8.sql 24 2014-04-27 22:56:31Z  $

DROP TABLE IF EXISTS `#__foodbranches`;

CREATE TABLE `#__foodbranches` (
    `id` int(11) NOT NULL auto_increment,
    `companyname` varchar(50) NOT NULL,	
    `firstname` varchar(50) NOT NULL,
    `secondname` varchar(50) NOT NULL,
    `telephone` varchar(50) DEFAULT NULL,
    `mobile` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `address_city` varchar(255) NOT NULL,
    `address_street` varchar(255) NOT NULL,    
    `address_postcode` varchar(255) NOT NULL,
    `comment` varchar(255) DEFAULT NULL,
    `latitude` float(10,3) unsigned DEFAULT '0.000',
    `longitude` float(10,3) unsigned DEFAULT '0.000', 
    `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
) AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__foodbranches` 
(`companyname`,`firstname`,`secondname`,`telephone`,`mobile`,`email`,
`address_city`,`address_street`,`address_postcode`,`latitude`, `longitude`) VALUES
('Long Sausages','Imre','Geczy','0123213','0789678','faszom@jl.com',
'Leeds','23 High Street','TW18 1PR','123.000','21.000');
