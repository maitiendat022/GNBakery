-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2022 at 08:48 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gnbakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Bánh sinh nhật'),
(2, 'Bánh mỳ & Bánh mặn'),
(3, 'Cookies & minicake');

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE `category_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_detail`
--

INSERT INTO `category_detail` (`id`, `name`, `category_id`) VALUES
(1, 'Gateaux Kem Tươi', 1),
(2, 'Gateaux Kem Bơ', 1),
(3, 'Bánh mỳ', 2),
(4, 'Bánh Mousse', 1),
(5, 'Gateaux Mousse', 1),
(6, 'Cookies', 3),
(7, 'Mini Cake', 3),
(8, 'Bánh mặn', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_receiver` varchar(50) NOT NULL,
  `address_receiver` varchar(255) NOT NULL,
  `phone_receiver` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `total_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `size`, `price`, `description`, `status`, `category_detail_id`, `user_id`) VALUES
(23, 'GREENTEA CAKE LOVE', 'cake_1646466680.jpg', 21, 270000, 'Thành phần chính:\r\n- Gato,\r\n- Kem tươi trà xanh ,  vị rượu rum,\r\n- bột Trà xanh.\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi trà xanh  vị rượu rum (nho). Bên ngoài bánh phủ 1 LỚP BỘT TRÀ XANH VÀ TRANG TRÍ HOA QUẢ.', 1, 1, 1),
(24, 'TIRAMISU', 'cake_1646493570.jpg', 23, 270000, '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 1, 1),
(25, 'DELI CAKE HEART', 'cake_1646493662.jpg', 24, 270000, '- Gato\r\n- Kem tươi\r\n- Socola\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem. Bên trên phủ 1 lớp kem tươi phomai vị cafe và được trang trí bằng hoa quả theo mùa.', 1, 2, 1),
(26, 'HAPPY HEART CAKE', 'cake_1646493720.jpg', 23, 270000, '- Gato,\r\n- Kem tươi phomai vị cafe,\r\n- Socola,\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem . Bên trên phủ 1 lớp kem tươi phomai vị cafe và được trang trí bằng socola đen.', 1, 1, 1),
(27, 'RED VELVET CAKE', 'cake_1646493888.jpg', 23, 300000, '- Gato,\r\n- Bột mỳ đỏ,\r\n- Kem tiramisu.\r\nBánh làm từ 3 lớp gato đỏ xen lẫn 3 lớp kem tươi. Bên trên bánh phủ 1 lớp kem tiramisu rắc bột mỳ đỏ.', 1, 2, 1),
(28, 'TIRAMISU CAKE MOUSSE', 'cake_1646493948.jpg', 23, 300000, '- Gato\r\n- Kem phomai vị coffee\r\n- Cacao.\r\nBánh làm từ 4 lớp gato TRẮNG xen giữa 4 lớp kem TƯƠI PHOMAI, VỊ COFFEE. Bên ngoài phủ 1 lớp socola chảy VÀ DECOR HOA QUẢ.', 1, 2, 1),
(29, 'HAWAII MOUSSE', 'cake_1646493994.jpg', 23, 300000, '- Gato\r\n- Kem tươi vị tira\r\n- Hoa quả theo mùa\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi vị tiramisu. Trên mặt bánh được trang trí bằng hoa quả tươi theo mùa.', 1, 2, 1),
(30, 'PASSION FRUIT MOUSSE', 'cake_1646494165.jpg', 24, 300000, '- Gato\r\n- Kem tươi vị rượu rum\r\n- Hoa quả\r\n- Dừa khô.\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi vị rượu rum (nho). Trên mặt bánh được trang trí bằng hoa quả với dừa khô kết xung quanh.', 1, 4, 1),
(31, 'CARAMEL MOIST', 'cake_1646494205.jpg', 24, 300000, '- Gato,\r\n- Kem bơ,\r\n- Socola,\r\n- Dâu tây.\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem bơ. Bên trên trang trí bằng hoa quả, socola đen.', 1, 4, 1),
(32, 'CARAMEL CHOCOLATE', 'cake_1646494251.jpg', 23, 300000, '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 4, 1),
(33, 'CARAMEL VELVET HEART CAKE', 'cake_1646494297.jpg', 23, 300000, '- GATO \r\n-  CARAMEL SOCOLA \r\nBÁNH ĐƯỢC LÀM TỪ 3 LỚP GATO KẾT HỢP VỚI LỚP CREAM CHEESE, CHANH LEO và CHOCOLATE . PHỦ MẶT BÁNH 1 LỚP SỐT CARAMEL VÀ TRANG TRÍ HOA QUẢ.', 1, 5, 1),
(34, 'SPECIAL HEART CAKE', 'cake_1646494343.jpg', 23, 350000, '- Kem chesse socola,\r\n- Chanh leo tươi,\r\nBánh làm từ kem tươi nhiều trứng với 1 lớp socola và 1 lớp sốt chanh leo tươi. Vị bánh rất thanh và mát lạnh', 1, 5, 1),
(35, 'TIRAMISU CAKE', 'cake_1646494401.jpg', 23, 540000, '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 5, 1),
(36, 'OPERA', 'cake_1646494444.jpg', 23, 540000, '- Gato,\r\n- Kem bơ vị coffee,\r\n- Socola.\r\nBánh được làm từ 3 lớp gato trắng xen giữa 3 lớp kem bơ vị coffee. Bánh phủ 1 lớp socola ở trên mặt.', 1, 1, 1),
(37, 'FRUIT CAKE', 'cake_1646494500.jpg', 23, 220000, '- Gato\r\n- Kem TƯƠI, vị coffee\r\nBánh làm từ 3 lớp gato TRẮNG xen giữa 3 lớp kem TƯƠI. Bên ngoài phủ 1 lớp chocolate đen, TRANG TRÍ HOA QUẢ.', 1, 1, 1),
(38, 'CAPUCCINO', 'cake_1646494566.jpg', 23, 220000, '- Gato,\r\n- Bột mỳ đỏ,\r\n- Kem tươi vị Tiramisu\r\nBánh làm từ 3 lớp gato đỏ xen lẫn 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp BỘT GATO ĐỎ VÀ TRANG TRÍ HOA QUẢ.', 1, 1, 1),
(39, 'COCONUT CAKE', 'cake_1646494617.jpg', 23, 220000, '- Thành phần chính:\r\n- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 5, 1),
(40, 'CARAMEL MOIST CHOCOLATE CAKE', 'cake_1646494665.jpg', 24, 220000, '- Gato\r\n- Sốt caramel\r\n- Kem tươi\r\nBánh làm từ 3 lớp gato socola xen giữa 3 lớp kem tươi vị socola. Phủ bên ngoài là 1 lớp sốt caramel có vị đắng nhẹ.', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$VGER95D9GaqeanD4mfTeuO2eKhfqYvV410CUU8CYbesNlK302LhR2', '0986971670', 'Phú Xuyên - Hà Nội', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_detail_id` (`category_detail_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD CONSTRAINT `category_detail_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_detail_id`) REFERENCES `category_detail` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
categories