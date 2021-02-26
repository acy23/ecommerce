-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Oca 2021, 21:35:13
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cs306_v2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `add_to_basket`
--

CREATE TABLE `add_to_basket` (
  `Product_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Basket_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `add_to_basket`
--

INSERT INTO `add_to_basket` (`Product_ID`, `Customer_ID`, `Basket_ID`) VALUES
(5, 10, NULL),
(4, 10, NULL),
(6, 10, NULL),
(4, 10, NULL),
(3, 2, NULL),
(6, 2, NULL),
(5, 2, NULL),
(3, 2, NULL),
(3, 5, NULL),
(3, 1, NULL),
(5, 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `add_to_basket_v2`
--

CREATE TABLE `add_to_basket_v2` (
  `Product_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Basket_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `add_to_basket_v2`
--

INSERT INTO `add_to_basket_v2` (`Product_ID`, `Customer_ID`, `Basket_ID`) VALUES
(1, 3, NULL),
(5, 3, NULL),
(5, 3, NULL),
(2, 3, NULL),
(3, 3, NULL),
(5, 3, NULL),
(4, 3, NULL),
(5, 3, NULL),
(6, 3, NULL),
(8, 3, NULL),
(9, 3, NULL),
(5, 4, NULL),
(2, 4, NULL),
(3, 4, NULL),
(4, 4, NULL),
(7, 4, NULL),
(4, 4, NULL),
(4, 2, NULL),
(6, 2, NULL),
(2, 2, NULL),
(4, 2, NULL),
(3, 2, NULL),
(4, 2, NULL),
(10, 2, NULL),
(1, 2, NULL),
(5, 2, NULL),
(7, 2, NULL),
(8, 2, NULL),
(9, 2, NULL),
(11, 2, NULL),
(7, 2, NULL),
(8, 2, NULL),
(5, 2, NULL),
(7, 2, NULL),
(5, 1, NULL),
(4, 1, NULL),
(5, 1, NULL),
(4, 1, NULL),
(5, 1, NULL),
(5, 9, NULL),
(9, 9, NULL),
(11, 9, NULL),
(2, 9, NULL),
(5, 9, NULL),
(2, 9, NULL),
(6, 9, NULL),
(7, 9, NULL),
(3, 1, NULL),
(6, 1, NULL),
(5, 6, NULL),
(6, 6, NULL),
(3, 7, NULL),
(4, 7, NULL),
(4, 8, NULL),
(6, 8, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket`
--

CREATE TABLE `basket` (
  `Basket_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `basket`
--

INSERT INTO `basket` (`Basket_ID`, `User_ID`) VALUES
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `buy`
--

CREATE TABLE `buy` (
  `Basket_ID` int(11) DEFAULT NULL,
  `Order_Number` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `buy`
--

INSERT INTO `buy` (`Basket_ID`, `Order_Number`, `Customer_ID`) VALUES
(3, 1, 1009),
(5, 2, 2),
(6, 3, 1008),
(15, 4, 8),
(7, 5, 4),
(2, 6, 1004),
(2, 7, 5),
(2, 8, 5),
(2, 9, 5),
(3, 10, 5),
(13, 11, 10),
(13, 12, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment_rate`
--

CREATE TABLE `comment_rate` (
  `Product_ID` int(11) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL,
  `Comments` varchar(40) DEFAULT NULL,
  `Rating` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `comment_rate`
--

INSERT INTO `comment_rate` (`Product_ID`, `Customer_ID`, `Comments`, `Rating`) VALUES
(2, 3, 'cok guzel', '9'),
(9, 3, 'guzel', '6'),
(10, 2, 'good', '8'),
(4, 2, '', '6'),
(6, 2, '', '5'),
(2, 2, '', '4'),
(3, 2, '', '8'),
(2, 2, '', '8'),
(10, 2, '', '6'),
(1, 2, '', '7'),
(5, 2, '', '6'),
(7, 2, '', '8'),
(8, 2, '', '8'),
(9, 2, '', '7'),
(11, 2, '', '10'),
(11, 2, '', '6');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `customer`
--

INSERT INTO `customer` (`Customer_ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(1001),
(1002),
(1003),
(1004),
(1005),
(1006),
(1007),
(1008),
(1009),
(1010);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `edit_basket`
--

CREATE TABLE `edit_basket` (
  `Customer_ID` int(11) DEFAULT NULL,
  `Basket_ID` int(11) DEFAULT NULL,
  `Explaination` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `edit_basket`
--

INSERT INTO `edit_basket` (`Customer_ID`, `Basket_ID`, `Explaination`) VALUES
(1009, 3, 'Delete'),
(2, 5, 'Add'),
(1008, 6, 'Delete'),
(8, 15, 'Add'),
(4, 7, 'Erase'),
(1004, 2, 'Add'),
(1, 13, 'Add'),
(10, 13, 'Delete'),
(5, 3, 'Erase'),
(5, 2, 'Delete'),
(5, 2, 'Add'),
(5, 2, 'Add');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `edit_order`
--

CREATE TABLE `edit_order` (
  `S_Manager_ID` int(11) DEFAULT NULL,
  `Order_Number` int(11) DEFAULT NULL,
  `Explanation` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `edit_order`
--

INSERT INTO `edit_order` (`S_Manager_ID`, `Order_Number`, `Explanation`) VALUES
(1, 1, 'change status'),
(1, 2, 'cancel'),
(2, 3, 'change status'),
(3, 4, 'change status'),
(4, 4, 'change status'),
(4, 3, 'change status'),
(5, 3, 'chage status'),
(8, 7, 'chage status'),
(8, 5, 'cancel'),
(9, 3, 'chage status'),
(1, 1, 'cancel'),
(7, 2, 'chage Status');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `edit_product`
--

CREATE TABLE `edit_product` (
  `Product_ID` int(11) DEFAULT NULL,
  `P_Manager_ID` int(11) DEFAULT NULL,
  `Explanation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `edit_product`
--

INSERT INTO `edit_product` (`Product_ID`, `P_Manager_ID`, `Explanation`) VALUES
(1, 1, 'photo edit'),
(2, 1, 'price edit'),
(5, 3, 'size update'),
(4, 8, 'stock update'),
(6, 7, 'stock update'),
(7, 7, 'price edit'),
(10, 9, 'stock update'),
(9, 6, 'price edit'),
(8, 7, 'photo edit'),
(6, 5, 'price edit'),
(3, 2, 'photo edit'),
(4, 2, 'discount updated'),
(6, 5, 'price edit'),
(1, 3, 'stock updated'),
(7, 6, 'stock updated'),
(3, 8, 'photo updated'),
(8, 2, 'discount updated'),
(1, 6, 'price updated'),
(1, 4, 'edited product information'),
(11, 4, 'insertion');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `non_user`
--

CREATE TABLE `non_user` (
  `NonUser_ID` int(11) NOT NULL,
  `Customer_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `non_user`
--

INSERT INTO `non_user` (`NonUser_ID`, `Customer_ID`) VALUES
(1001, 1001),
(1002, 1002),
(1003, 1003),
(1004, 1004),
(1005, 1005),
(1006, 1006),
(1007, 1007),
(1008, 1008),
(1009, 1009),
(1010, 1010);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `Order_Number` int(11) NOT NULL,
  `NonUser_Information` varchar(40) DEFAULT NULL,
  `Invoice_ID` int(11) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`Order_Number`, `NonUser_Information`, `Invoice_ID`, `Location`) VALUES
(1, 'David P. Thompson', 51455136, '3720 Cost Avenue Laurel, MD 20707'),
(2, '-', 53678075, '-'),
(3, 'Doris L. McMillan', 23955783, '289 Giraffe Hill Drive Dallas, TX 75287'),
(4, '-', 45399978, '-'),
(5, '-', 20351251, '-'),
(6, 'Christopher A. Nissen', 54724169, '3698 Bee Street\r\nMuskegon, MI 49470'),
(10, '-', 72235492, '-'),
(11, '-', 45395490, '-'),
(12, '-', 20901813, '-');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(50) DEFAULT NULL,
  `Price` varchar(20) DEFAULT NULL,
  `Average_Rating` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Price`, `Average_Rating`) VALUES
(1, 'DJI Mavic Mini Fly More Combos', '3200', 7),
(2, 'GDL Retro Çanta Pikap T317 - Vip', '417 TL', 9),
(3, 'Havana Maun Concert Ukulele', '243 TL', 8),
(4, 'Plak Bar?? Manço - Mançoloji 1', '95 TL', 6),
(5, 'Bershka Diki? Detayl? Spor Ayakkab?', '118 TL', 6),
(6, 'Emporio Armani Erkek Kol Saati', '1152 TL', 5),
(7, 'Pierre Cardin Erkek Siyah Logolu Cüzdan', '198 TL', 8),
(8, 'VOX Amplug 2 Clean Headphone Guitar Amp Kulakl?k A', '412 TL', 8),
(9, 'Epiphone Les Paul Standart Outfit Elektro Gitar', '7537 TL', 7),
(10, 'KÖHNER Dk-460 Dijital Beyaz Piyano KÖH-DK460W', '8549 TL', 7),
(11, 'ComputerX', '11000', 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_manager`
--

CREATE TABLE `product_manager` (
  `P_Manager_ID` int(11) NOT NULL,
  `P_Manager_Name` varchar(30) DEFAULT NULL,
  `P_Manager_Password` varchar(30) DEFAULT NULL,
  `P_Manager_Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `product_manager`
--

INSERT INTO `product_manager` (`P_Manager_ID`, `P_Manager_Name`, `P_Manager_Password`, `P_Manager_Email`) VALUES
(1, 'Perry ', 'Pruitt', 'PerryEPruitt@rhyta.com'),
(2, 'Patrick', 'Mack', 'PatrickKMack@teleworm.us'),
(3, 'Mildred', 'Baldwin', 'MildredRBaldwin@armyspy.com'),
(4, 'Kelly', 'Shaw', 'KellyRShaw@teleworm.us'),
(5, 'Gladys', 'Espinoza', 'GladysEEspinoza@teleworm.us'),
(6, 'Carol', 'Whitlow', 'CarolRWhitlow@dayrep.com'),
(7, 'Ken', 'Uecker', 'KenMUecker@jourrapide.com'),
(8, 'Charlie', 'Cruce', 'CharlieTCruce@armyspy.com'),
(9, 'Aaron', 'Diaz', 'AaronODiaz@jourrapide.com'),
(10, 'June', 'Davis', 'JuneJDavis@teleworm.us');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales_manager`
--

CREATE TABLE `sales_manager` (
  `S_Manager_ID` int(11) NOT NULL,
  `S_Manager_Name` varchar(30) DEFAULT NULL,
  `S_Manager_Password` varchar(30) DEFAULT NULL,
  `S_Manager_Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `sales_manager`
--

INSERT INTO `sales_manager` (`S_Manager_ID`, `S_Manager_Name`, `S_Manager_Password`, `S_Manager_Email`) VALUES
(1, 'Amanda ', 'Harms', 'AmandaDHarms@armyspy.com'),
(2, 'Lisa', 'Neilsen', 'LisaTNeilsen@jourrapide.com'),
(3, 'Kari', 'Haugland', 'KariSHaugland@rhyta.com'),
(4, 'Justin', 'Peterson', 'JustinRPeterson@dayrep.com'),
(5, 'Stephen', 'Distefano', 'StephenADistefano@rhyta.com'),
(6, 'Gary', 'Ingle', 'GaryVIngle@dayrep.com'),
(7, 'Linda', 'Pavon', 'LindaHPavon@armyspy.com'),
(8, 'Coral', 'Ortega', 'CoralDOrtega@teleworm.us'),
(9, 'Jay', 'Cooper', 'JayBCooper@jourrapide.com'),
(10, 'Kelly', 'Barnes', 'KellyKBarnes@rhyta.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `Phone_Number` varchar(10) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Customer_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `Password`, `Phone_Number`, `Email`, `Address`, `Customer_ID`) VALUES
(1, 'Kimberley', 'Cree', '954-567-91', 'KimberleyMCree@jourrapide.com', '473 Sussex Court Copperas Cove', 1),
(2, 'Terry', 'Mathis', '216-678-42', 'TerryLMathis@rhyta.com', '1365 Parker Drive\r\nWarrensvill', 2),
(3, 'Nancy ', 'Edwards', '315-768-56', 'NancyJEdwards@jourrapide.com', '4760 Saint Marys Avenue Whites', 3),
(4, 'Lynn  ', 'Milner', '609-969-76', 'LynnJMilner@jourrapide.com', '3034 Whiteman Street\r\nCamden, ', 4),
(5, 'William', 'Battaglia', '301-654-70', 'WilliamPBattaglia@armyspy.com', '4632 Adams Avenue Chevy Chase,', 5),
(6, 'Michael ', 'Hatchett', '936-257-73', 'MichaelLHatchett@dayrep.com', '3223 Woodrow Way Dayton, TX 77', 6),
(7, 'Jay', 'Adams', '658-521-64', 'JayAddams@jourrapide.com', '95 Aviation Way Los Angeles, C', 7),
(8, 'Kevin', 'Jones', '219-902-40', 'KevinGJones@rhyta.com', '3849 Duffy Street Bridgeview, ', 8),
(9, 'Theodore ', 'Moore', '310-698-09', 'TheodoreLMoore@armyspy.com', '2165 Jett Lane Bellflower, CA ', 9),
(10, 'Michelle', 'Bowles', '928-460-33', 'MichelleTBowles@jourrapide.com', '598 Skips Lane\r\nPhoenix, AZ 85', 10);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `add_to_basket`
--
ALTER TABLE `add_to_basket`
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Product_ID` (`Product_ID`),
  ADD KEY `Basket_ID` (`Basket_ID`);

--
-- Tablo için indeksler `add_to_basket_v2`
--
ALTER TABLE `add_to_basket_v2`
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Product_ID` (`Product_ID`),
  ADD KEY `Basket_ID` (`Basket_ID`);

--
-- Tablo için indeksler `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`Basket_ID`);

--
-- Tablo için indeksler `buy`
--
ALTER TABLE `buy`
  ADD KEY `Basket_ID` (`Basket_ID`),
  ADD KEY `Order_Number` (`Order_Number`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Tablo için indeksler `comment_rate`
--
ALTER TABLE `comment_rate`
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Tablo için indeksler `edit_basket`
--
ALTER TABLE `edit_basket`
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Basket_ID` (`Basket_ID`);

--
-- Tablo için indeksler `edit_order`
--
ALTER TABLE `edit_order`
  ADD KEY `S_Manager_ID` (`S_Manager_ID`),
  ADD KEY `Order_Number` (`Order_Number`);

--
-- Tablo için indeksler `edit_product`
--
ALTER TABLE `edit_product`
  ADD KEY `P_Manager_ID` (`P_Manager_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Tablo için indeksler `non_user`
--
ALTER TABLE `non_user`
  ADD PRIMARY KEY (`NonUser_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Tablo için indeksler `product_manager`
--
ALTER TABLE `product_manager`
  ADD PRIMARY KEY (`P_Manager_ID`);

--
-- Tablo için indeksler `sales_manager`
--
ALTER TABLE `sales_manager`
  ADD PRIMARY KEY (`S_Manager_ID`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `add_to_basket`
--
ALTER TABLE `add_to_basket`
  ADD CONSTRAINT `add_to_basket_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `add_to_basket_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`),
  ADD CONSTRAINT `add_to_basket_ibfk_3` FOREIGN KEY (`Basket_ID`) REFERENCES `basket` (`Basket_ID`);

--
-- Tablo kısıtlamaları `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`Basket_ID`) REFERENCES `basket` (`Basket_ID`),
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`Order_Number`) REFERENCES `orders` (`Order_Number`),
  ADD CONSTRAINT `buy_ibfk_3` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);

--
-- Tablo kısıtlamaları `comment_rate`
--
ALTER TABLE `comment_rate`
  ADD CONSTRAINT `comment_rate_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `comment_rate_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`);

--
-- Tablo kısıtlamaları `edit_basket`
--
ALTER TABLE `edit_basket`
  ADD CONSTRAINT `edit_basket_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `edit_basket_ibfk_2` FOREIGN KEY (`Basket_ID`) REFERENCES `basket` (`Basket_ID`);

--
-- Tablo kısıtlamaları `edit_order`
--
ALTER TABLE `edit_order`
  ADD CONSTRAINT `edit_order_ibfk_1` FOREIGN KEY (`S_Manager_ID`) REFERENCES `sales_manager` (`S_Manager_ID`),
  ADD CONSTRAINT `edit_order_ibfk_2` FOREIGN KEY (`Order_Number`) REFERENCES `orders` (`Order_Number`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `edit_product`
--
ALTER TABLE `edit_product`
  ADD CONSTRAINT `edit_product_ibfk_1` FOREIGN KEY (`P_Manager_ID`) REFERENCES `product_manager` (`P_Manager_ID`),
  ADD CONSTRAINT `edit_product_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `non_user`
--
ALTER TABLE `non_user`
  ADD CONSTRAINT `non_user_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
