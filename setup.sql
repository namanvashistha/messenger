create database italk;

use italk;

CREATE TABLE `messenger` (
  `from_name` varchar(40) NOT NULL,
  `to_name` varchar(40) NOT NULL,
  `message` longtext NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `users` (
  `name` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(255) NOT NULL,
  `online` tinyint(10) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
