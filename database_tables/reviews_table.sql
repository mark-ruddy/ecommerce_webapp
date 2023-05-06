CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `item_name` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `value` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
