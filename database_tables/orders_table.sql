CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `order_no` varchar(100) NOT NULL,
  `items` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
