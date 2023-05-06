CREATE DATABASE ecommerce;

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `item_name` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `value` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- `items` of orders is a serialized array(array turned to text) of items with their quantity/size
-- the array can later be unserialized back into a PHP array object with the same data
CREATE TABLE `orders` (
 `order_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `order_no` varchar(100) NOT NULL,
 `items` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `username` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- NULL is used as product_id will auto increment itself
INSERT INTO `products` (`product_id`, `name`, `quantity`)
VALUES (NULL, 'adidas-shoes', '235'), (NULL, 'adidas-tops', '340'),
       (NULL, 'airforce-womens', '345'), (NULL, 'asos-skirt', '550'),
       (NULL, 'asos-trench-coat', '220'), (NULL, 'billabong-sweat', '180'),
       (NULL, 'columbia-sweat', '200'), (NULL, 'columbia-top', '150'),
       (NULL, 'converse-womens', '215'), (NULL, 'daisystreet-dress', '80'),
       (NULL, 'daisystreet-sweat', '98'), (NULL, 'daisystreet-top', '120'),
       (NULL, 'dickies-sweat', '150'), (NULL, 'drmartens-womens', '88'),
       (NULL, 'element-top', '160'), (NULL, 'fredperry-shoes', '99'),
       (NULL, 'jack-and-jones-jeans', '200'), (NULL, 'levi-jeans', '220'),
       (NULL, 'motelrocks-dress', '250'), (NULL, 'neonrose-denim-jacket', '250'),
       (NULL, 'newbalance-coat', '330'), (NULL, 'newlook-jeans', '190'),
       (NULL, 'nike-airforce', '175'), (NULL, 'nike-sweat', '195'),
       (NULL, 'nike-womens', '122'), (NULL, 'nikecourt-top', '440'),
       (NULL, 'northface-coat', '110'), (NULL, 'northface-sweat', '115'),
       (NULL, 'northface-top', '160'), (NULL, 'pull-and-bear-coat', '80'),
       (NULL, 'pull-and-bear-jeans', '210'), (NULL, 'reebok-sweat', '90'),
       (NULL, 'river-jeans', '115'), (NULL, 'stradivarius-dress', '95'),
       (NULL, 'stradivarius-jeans', '120'), (NULL, 'stradivarius-top', '70'),
       (NULL, 'topman-coat', '135'), (NULL, 'topman-jeans', '190'),
       (NULL, 'topshop-jeans', '255'), (NULL, 'urbanbliss-jeans', '245'),
       (NULL, 'vans-top', '55'), (NULL, 'vans-trainer', '75'),
       (NULL, 'vintage-sweat', '150'), (NULL, 'women-leather-jacket', '85')
