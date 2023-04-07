-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2023 at 09:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gnbakery-t`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comments` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name_receiver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address_receiver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_receiver` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0:Mới đặt; 1:Đã duyệt; 2: Đã hủy',
  `id_status` int DEFAULT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name_receiver`, `address_receiver`, `phone_receiver`, `status`, `id_status`, `total_price`, `created_at`) VALUES
(12, 4, 'Dat', 'Hà Nội', '0397170118', 1, 1, 220000, '2023-04-07 06:26:15'),
(13, 4, 'Dat', 'Hà Nội', '0397170118', 1, 10, 440000, '2023-04-07 07:00:16'),
(14, 11, 'Đạt', 'Hà Nội', '0397170118', 2, 10, 220000, '2023-04-07 07:27:17'),
(15, 11, 'Đạt', 'Hà Nội', '0397170118', 2, 1, 300000, '2023-04-07 07:27:28'),
(16, 11, 'Đạt', 'Hà Nội', '0397170118', 1, 1, 660000, '2023-04-07 07:27:40'),
(17, 11, 'Đạt', 'Hà Nội', '0397170118', 0, NULL, 220000, '2023-04-07 07:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `size` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `size`, `price`, `quantity`) VALUES
(12, 15, 18, 220000, 1),
(13, 16, 18, 220000, 2),
(14, 15, 18, 220000, 1),
(15, 16, 26, 300000, 1),
(16, 15, 18, 220000, 2),
(16, 16, 18, 220000, 1),
(17, 15, 18, 220000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `category_detail_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `status`, `category_detail_id`, `user_id`) VALUES
(1, 'GREENTEA CAKE LOVE', 'cake_1646466680.jpg', 'Thành phần chính:\r\n- Gato,\r\n- Kem tươi trà xanh ,  vị rượu rum,\r\n- bột Trà xanh.\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi trà xanh  vị rượu rum (nho). Bên ngoài bánh phủ 1 LỚP BỘT TRÀ XANH VÀ TRANG TRÍ HOA QUẢ.', 1, 1, 1),
(2, 'TIRAMISU', 'cake_1646493570.jpg', '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 1, 1),
(3, 'DELI CAKE HEART', 'cake_1646493662.jpg', '- Gato\r\n- Kem tươi\r\n- Socola\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem. Bên trên phủ 1 lớp kem tươi phomai vị cafe và được trang trí bằng hoa quả theo mùa.', 1, 2, 1),
(4, 'HAPPY HEART CAKE', 'cake_1646493720.jpg', '- Gato,\r\n- Kem tươi phomai vị cafe,\r\n- Socola,\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem . Bên trên phủ 1 lớp kem tươi phomai vị cafe và được trang trí bằng socola đen.', 1, 1, 1),
(5, 'RED VELVET CAKE', 'cake_1646493888.jpg', '- Gato,\r\n- Bột mỳ đỏ,\r\n- Kem tiramisu.\r\nBánh làm từ 3 lớp gato đỏ xen lẫn 3 lớp kem tươi. Bên trên bánh phủ 1 lớp kem tiramisu rắc bột mỳ đỏ.', 1, 2, 1),
(6, 'TIRAMISU CAKE MOUSSE', 'cake_1646493948.jpg', '- Gato\r\n- Kem phomai vị coffee\r\n- Cacao.\r\nBánh làm từ 4 lớp gato TRẮNG xen giữa 4 lớp kem TƯƠI PHOMAI, VỊ COFFEE. Bên ngoài phủ 1 lớp socola chảy VÀ DECOR HOA QUẢ.', 1, 2, 1),
(7, 'HAWAII MOUSSE', 'cake_1646493994.jpg', '- Gato\r\n- Kem tươi vị tira\r\n- Hoa quả theo mùa\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi vị tiramisu. Trên mặt bánh được trang trí bằng hoa quả tươi theo mùa.', 1, 2, 1),
(8, 'PASSION FRUIT MOUSSE', 'cake_1646494165.jpg', '- Gato\r\n- Kem tươi vị rượu rum\r\n- Hoa quả\r\n- Dừa khô.\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi vị rượu rum (nho). Trên mặt bánh được trang trí bằng hoa quả với dừa khô kết xung quanh.', 1, 4, 1),
(9, 'CARAMEL MOIST', 'cake_1646494205.jpg', '- Gato,\r\n- Kem bơ,\r\n- Socola,\r\n- Dâu tây.\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem bơ. Bên trên trang trí bằng hoa quả, socola đen.', 1, 4, 1),
(10, 'CARAMEL CHOCOLATE', 'cake_1646494251.jpg', '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 4, 1),
(11, 'CARAMEL VELVET HEART CAKE', 'cake_1646494297.jpg', '- GATO \r\n-  CARAMEL SOCOLA \r\nBÁNH ĐƯỢC LÀM TỪ 3 LỚP GATO KẾT HỢP VỚI LỚP CREAM CHEESE, CHANH LEO và CHOCOLATE . PHỦ MẶT BÁNH 1 LỚP SỐT CARAMEL VÀ TRANG TRÍ HOA QUẢ.', 1, 5, 1),
(12, 'SPECIAL HEART CAKE', 'cake_1646494343.jpg', '- Kem chesse socola,\r\n- Chanh leo tươi,\r\nBánh làm từ kem tươi nhiều trứng với 1 lớp socola và 1 lớp sốt chanh leo tươi. Vị bánh rất thanh và mát lạnh', 1, 5, 1),
(13, 'TIRAMISU CAKE', 'cake_1646494401.jpg', '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 5, 1),
(14, 'OPERA', 'cake_1646494444.jpg', '- Gato,\r\n- Kem bơ vị coffee,\r\n- Socola.\r\nBánh được làm từ 3 lớp gato trắng xen giữa 3 lớp kem bơ vị coffee. Bánh phủ 1 lớp socola ở trên mặt.', 1, 1, 1),
(15, 'FRUIT CAKE', 'cake_1646494500.jpg', '- Gato\r\n- Kem TƯƠI, vị coffee\r\nBánh làm từ 3 lớp gato TRẮNG xen giữa 3 lớp kem TƯƠI. Bên ngoài phủ 1 lớp chocolate đen, TRANG TRÍ HOA QUẢ.', 1, 1, 1),
(16, 'CAPUCCINO', 'cake_1646494566.jpg', '- Gato,\r\n- Bột mỳ đỏ,\r\n- Kem tươi vị Tiramisu\r\nBánh làm từ 3 lớp gato đỏ xen lẫn 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp BỘT GATO ĐỎ VÀ TRANG TRÍ HOA QUẢ.', 1, 1, 1),
(17, 'COCONUT CAKE', 'cake_1646494617.jpg', '- Thành phần chính:\r\n- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 5, 1),
(18, 'CARAMEL MOIST CHOCOLATE CAKE', 'cake_1646494665.jpg', '- Gato\r\n- Sốt caramel\r\n- Kem tươi\r\nBánh làm từ 3 lớp gato socola xen giữa 3 lớp kem tươi vị socola. Phủ bên ngoài là 1 lớp sốt caramel có vị đắng nhẹ.', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_size`
--

CREATE TABLE `products_size` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `size` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_size`
--

INSERT INTO `products_size` (`id`, `product_id`, `size`, `price`) VALUES
(1, 1, 18, 220000),
(2, 2, 18, 220000),
(3, 3, 18, 220000),
(4, 4, 18, 220000),
(5, 5, 18, 220000),
(6, 6, 18, 220000),
(7, 7, 18, 220000),
(8, 8, 18, 220000),
(9, 9, 18, 220000),
(10, 10, 18, 220000),
(11, 11, 18, 220000),
(12, 12, 18, 220000),
(13, 13, 18, 220000),
(14, 14, 18, 220000),
(15, 15, 18, 220000),
(16, 16, 18, 220000),
(17, 17, 18, 230000),
(18, 18, 18, 220000),
(19, 1, 22, 260000),
(20, 2, 22, 260000),
(21, 3, 22, 260000),
(22, 4, 22, 260000),
(23, 5, 22, 260000),
(24, 6, 22, 260000),
(25, 7, 22, 260000),
(26, 8, 22, 260000),
(27, 9, 22, 260000),
(28, 10, 22, 260000),
(29, 11, 22, 260000),
(30, 12, 22, 260000),
(31, 13, 22, 260000),
(32, 14, 22, 260000),
(33, 15, 22, 260000),
(34, 16, 22, 260000),
(35, 17, 22, 260000),
(36, 18, 22, 260000),
(37, 1, 26, 300000),
(38, 2, 26, 300000),
(39, 3, 26, 300000),
(40, 4, 26, 300000),
(41, 5, 26, 300000),
(42, 6, 26, 300000),
(43, 7, 26, 300000),
(44, 8, 26, 300000),
(45, 9, 26, 300000),
(46, 10, 26, 300000),
(47, 11, 26, 300000),
(48, 12, 26, 300000),
(49, 13, 26, 300000),
(50, 14, 26, 300000),
(51, 15, 26, 300000),
(52, 16, 26, 300000),
(53, 17, 26, 300000),
(54, 18, 26, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  `deleted` date DEFAULT NULL,
  `level` int NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `gender`, `birthday`, `created`, `deleted`, `level`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$VGER95D9GaqeanD4mfTeuO2eKhfqYvV410CUU8CYbesNlK302LhR2', '0397170118', 'Thái Bình', NULL, NULL, '2023-03-15', NULL, 1, 1),
(4, 'Dat', 'dat123@gmail.com', '$2y$10$poztTf2ykdqtJZhQ4sA/yO.sHznq4s3t95ur.MiBTLe3SKNveAVwC', '0397170118', 'Hà Nội', NULL, NULL, '2023-04-06', NULL, 0, 1),
(5, 'Dat', 'maitiendat011@gmail.com', '$2y$10$EEDZVBFgODyx1PN7uiogS.lMKU.eQQVEGXZGMpkkpfJgYvrAJ0ZKG', '0397170118', 'Thái Bình', NULL, NULL, NULL, NULL, 0, 1),
(10, 'Nhan Vien', 'nhanvientest@gmail.com', '$2y$10$poztTf2ykdqtJZhQ4sA/yO.sHznq4s3t95ur.MiBTLe3SKNveAVwC', '0397170118', 'Hà Nội', NULL, NULL, '2023-04-06', NULL, 2, 1),
(11, 'Đạt', 'dat1234@gmail.com', '$2y$10$cVBvkMxEmSJgAs6nhRxTd.dcCg2lVxV7QPmUVas2Yp6zO4glPzfL.', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products_size`
--
ALTER TABLE `products_size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD CONSTRAINT `category_detail_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_detail_id`) REFERENCES `category_detail` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`level`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products_size`
--
ALTER TABLE `products_size`
  ADD CONSTRAINT `products_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
