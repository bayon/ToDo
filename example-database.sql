CREATE TABLE IF NOT EXISTS `todo` (
  `id` varchar(3) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `todo` (`id`, `name`) VALUES
('1', 'wakeup'),
('2', 'breakfast'),
('3', 'code'),
('4', 'eat') ;
