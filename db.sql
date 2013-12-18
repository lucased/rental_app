CREATE TABLE `category` (
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category`) VALUES
('accessories'),
('desktop'),
('email'),
('laptop'),
('networking'),
('printer'),
('server');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pName` varchar(100) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `week_price` int(11) NOT NULL,
  `month_price` int(11) NOT NULL,
  `three_month_price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `asset_number` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_fk` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `pName`, `description`, `category`, `week_price`, `month_price`, `three_month_price`, `stock`, `asset_number`) VALUES
(1, '4 port switch', 'cisco 4 port gigabit network switch', 'networking', 10, 30, 900, 4, ''),
(3, 'Macbook Pro 13', 'Macbook Pro 15", 2.0GHz quad-core Intel Core i7, 4GB 1333DDR3, 500GB 5400RPM SATA, Intel HD Graphics 3000, AMD Radeon HD 6490M, OSX 10.7 Lion', 'laptop', 50, 200, 500, 10, ''),
(100, 'Cisco wireless router', 'Cisco WR-4440N - multi SSID', 'networking', 15, 40, 110, 4, ''),
(101, 'Dell Optiplex 390', 'Dell Optiplex 390 SFF, Intel Core i5-2400 3.1GHz, 4GB 1333DDR3, 500GB 7200RPM SATA HDD, 8x Slimline DVD+/-RW, Windows 7 Professional, Microsft Office 2010, 20" WLED Widescreen Monitor, Keyboard, Mouse', 'desktop', 55, 165, 450, 12, ''),
(102, 'Dell Vostro 1540', 'Dell Vostro 3550, Core i5-2410M 2.3Ghz, 4GB 1333DDR3, 320GB 7200RPM SATA, 8X DVD+/-RW drive, 15.6" HD WLED Anti-Glare, Intel Centrino, Wireless-N, Windows 7 Professional, Microsoft Office 2010', 'laptop', 65, 200, 500, 22, ''),
(103, 'Black & white printer', 'HP Laserjet P2055 Black & White Printer', 'printer', 45, 135, 400, 5, ''),
(104, 'Colour printer', 'Brother 3040CN', 'printer', 60, 170, 550, 8, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
ADD CONSTRAINT `category_fk` FOREIGN KEY (`category`) REFERENCES `category` (`category`);