-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 04:43 PM
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
-- Database: `gnbakery`
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `name_receiver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address_receiver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_receiver` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0:Mới đặt; 1:Đã duyệt; 2:Đã hủy; 3:Đang giao, 4: Đã nhận',
  `id_status` int DEFAULT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_status` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name_receiver`, `address_receiver`, `phone_receiver`, `status`, `id_status`, `total_price`, `created_at`, `time_status`) VALUES
(12, 4, 'Dat', 'Hà Nội', '0397170118', 1, 4, 220000, '2023-04-06 16:26:15', '2023-04-14 18:46:06'),
(13, 4, 'Dat', 'Hà Nội', '0397170118', 1, 4, 440000, '2023-04-06 17:00:16', '2023-04-14 20:25:12'),
(14, 11, 'Đạt', 'Hà Nội', '0397170118', 1, 1, 220000, '2023-04-06 17:27:17', '2023-04-14 16:08:11'),
(15, 11, 'Đạt', 'Hà Nội', '0397170118', 0, 1, 300000, '2023-04-06 17:27:28', '0000-00-00 00:00:00'),
(16, 11, 'Đạt', 'Hà Nội', '0397170118', 1, 11, 660000, '2023-04-06 17:27:40', '2023-04-14 15:46:12'),
(17, 11, 'Đạt', 'Hà Nội', '0397170118', 0, 11, 220000, '2023-04-06 17:39:41', '0000-00-00 00:00:00'),
(18, 11, 'MAI TIEN DAT', 'Hà Nội', '0397170118', 0, 1, 220000, '2023-04-10 13:18:56', '2023-04-14 15:51:00'),
(20, 4, 'Dat', 'Hà Nội', '0397170118', 0, 4, 780000, '2023-04-12 18:10:44', '0000-00-00 00:00:00'),
(21, 4, 'Dat', 'Hà Nội', '0397170118', 0, 4, 480000, '2023-04-12 18:24:12', '0000-00-00 00:00:00'),
(22, 11, 'Đạt', 'Sn 30 , Trần Hưng Đạo, Hoàn Kiếm, Hà Nội', '0397170118', 2, 11, 220000, '2023-04-14 08:16:17', '0000-00-00 00:00:00'),
(23, 17, 'Quan', 'sn 33, Tràng Tiền, Hoàn Kiếm, Hà Nội', '0366906172', 2, 17, 220000, '2023-04-14 15:53:30', '2023-04-14 15:54:41'),
(24, 17, 'Quan', 'sn33, Trần Hưng Đạo, Hoàn Kiếm, Hà Nội', '0366906172', 1, 17, 220000, '2023-04-14 15:54:07', '2023-04-14 17:16:41'),
(25, 17, 'MAI TIEN DAT', 'sn 50, Phố Huế, Hai Bà Trưng, Hà Nội', '0397170118', 1, 17, 440000, '2023-04-14 15:54:24', '2023-04-14 19:39:56'),
(26, 17, 'Quan', 'sn33, Trần Hưng Đạo, Hoàn Kiếm, Hà Nội', '0366906172', 1, 17, 220000, '2023-04-14 17:18:09', '2023-04-14 20:23:52'),
(27, 4, 'Ngan', 'Thái Bình, Trần Hưng Đạo, Hoàn Kiếm, Hà Nội', '0397170118', 1, 4, 220000, '2023-04-14 18:50:58', '2023-04-14 18:51:34'),
(28, 22, 'Ngan', 'sn 11, Láng Hạ, Đống Đa, Hà Nội', '0397170118', 4, 22, 220000, '2023-04-16 14:44:17', '2023-04-16 14:49:28'),
(29, 22, 'Ngan', 'sn11, Phố Huế, Hai Bà Trưng, Hà Nội', '0397170118', 3, 1, 260000, '2023-04-16 14:44:35', '2023-04-16 16:38:25'),
(30, 22, 'Ngan', 'sn11, Văn Miếu, Đống Đa, Hà Nội', '0397170118', 3, 1, 220000, '2023-04-16 14:50:54', '2023-04-16 16:35:20'),
(31, 22, 'Ngan', 'sn11, Ngọc Hà, Ba Đình, Hà Nội', '0397170118', 2, 1, 440000, '2023-04-16 15:41:36', '2023-04-16 16:38:16'),
(32, 4, 'Dat', 'Sn 31/3 Ngõ 236/18, đường Khương Đình, Khương Đình, Thanh Xuân, Hà Nội', '0397170118', 0, NULL, 780000, '2023-04-16 18:19:19', NULL),
(33, 11, 'Ngan', 'sn31/3, ngõ 236 Khương Đình, Khương Đình, Thanh Xuân, Hà Nội', '0366906111', 1, 11, 85000, '2023-04-18 16:39:30', '2023-04-18 16:41:57');

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
(17, 15, 18, 220000, 1),
(18, 6, 18, 220000, 1),
(20, 16, 18, 220000, 1),
(20, 16, 22, 260000, 1),
(20, 16, 26, 300000, 1),
(21, 15, 22, 260000, 1),
(21, 15, 18, 220000, 1),
(22, 15, 18, 220000, 1),
(23, 16, 18, 220000, 1),
(24, 15, 18, 220000, 1),
(25, 4, 18, 220000, 2),
(26, 14, 18, 220000, 1),
(27, 15, 18, 220000, 1),
(28, 16, 18, 220000, 1),
(29, 15, 22, 260000, 1),
(30, 16, 18, 220000, 1),
(31, 11, 18, 220000, 1),
(31, 16, 18, 220000, 1),
(32, 16, 22, 260000, 1),
(32, 19, 1, 260000, 2),
(33, 28, 1, 10000, 1),
(33, 31, 1, 75000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `category_detail_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `status`, `category_detail_id`, `user_id`, `status_id`) VALUES
(1, 'GREENTEA CAKE LOVE', 'cake_1646466680.jpg', 'Thành phần chính:\r\n- Gato,\r\n- Kem tươi trà xanh ,  vị rượu rum,\r\n- bột Trà xanh.\r\n\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi trà xanh  vị rượu rum (nho). Bên ngoài bánh phủ 1 LỚP BỘT TRÀ XANH VÀ TRANG TRÍ HOA QUẢ.', 1, 1, 1, NULL),
(2, 'TIRAMISU', 'cake_1646493570.jpg', '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 1, 1, NULL),
(3, 'DELI CAKE HEART', 'cake_1646493662.jpg', '- Gato\r\n- Kem tươi\r\n- Socola\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem. Bên trên phủ 1 lớp kem tươi phomai vị cafe và được trang trí bằng hoa quả theo mùa.', 1, 2, 1, NULL),
(4, 'HAPPY HEART CAKE', 'cake_1646493720.jpg', '- Gato,\r\n- Kem tươi phomai vị cafe,\r\n- Socola,\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem . Bên trên phủ 1 lớp kem tươi phomai vị cafe và được trang trí bằng socola đen.', 1, 1, 1, NULL),
(5, 'RED VELVET CAKE', 'cake_1646493888.jpg', '- Gato,\r\n- Bột mỳ đỏ,\r\n- Kem tiramisu.\r\nBánh làm từ 3 lớp gato đỏ xen lẫn 3 lớp kem tươi. Bên trên bánh phủ 1 lớp kem tiramisu rắc bột mỳ đỏ.', 1, 2, 1, NULL),
(6, 'TIRAMISU CAKE MOUSSE', 'cake_1646493948.jpg', '- Gato\r\n- Kem phomai vị coffee\r\n- Cacao.\r\nBánh làm từ 4 lớp gato TRẮNG xen giữa 4 lớp kem TƯƠI PHOMAI, VỊ COFFEE. Bên ngoài phủ 1 lớp socola chảy VÀ DECOR HOA QUẢ.', 1, 2, 1, NULL),
(7, 'HAWAII MOUSSE', 'cake_1646493994.jpg', '- Gato\r\n- Kem tươi vị tira\r\n- Hoa quả theo mùa\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi vị tiramisu. Trên mặt bánh được trang trí bằng hoa quả tươi theo mùa.', 1, 2, 1, NULL),
(8, 'PASSION FRUIT MOUSSE', 'cake_1646494165.jpg', '- Gato\r\n- Kem tươi vị rượu rum\r\n- Hoa quả\r\n- Dừa khô.\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem tươi vị rượu rum (nho). Trên mặt bánh được trang trí bằng hoa quả với dừa khô kết xung quanh.', 1, 4, 1, NULL),
(9, 'CARAMEL MOIST', 'cake_1646494205.jpg', '- Gato,\r\n- Kem bơ,\r\n- Socola,\r\n- Dâu tây.\r\nBánh làm từ 3 lớp gato trắng xen giữa 3 lớp kem bơ. Bên trên trang trí bằng hoa quả, socola đen.', 1, 4, 1, 0),
(10, 'CARAMEL CHOCOLATE', 'cake_1646494251.jpg', '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 4, 1, NULL),
(11, 'CARAMEL VELVET HEART CAKE', 'cake_1646494297.jpg', '- GATO \r\n-  CARAMEL SOCOLA \r\nBÁNH ĐƯỢC LÀM TỪ 3 LỚP GATO KẾT HỢP VỚI LỚP CREAM CHEESE, CHANH LEO và CHOCOLATE . PHỦ MẶT BÁNH 1 LỚP SỐT CARAMEL VÀ TRANG TRÍ HOA QUẢ.', 1, 5, 1, NULL),
(12, 'SPECIAL HEART CAKE', 'cake_1646494343.jpg', '- Kem chesse socola,\r\n- Chanh leo tươi,\r\nBánh làm từ kem tươi nhiều trứng với 1 lớp socola và 1 lớp sốt chanh leo tươi. Vị bánh rất thanh và mát lạnh', 1, 5, 1, NULL),
(13, 'TIRAMISU CAKE', 'cake_1646494401.jpg', '- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 5, 1, NULL),
(14, 'OPERA', 'cake_1646494444.jpg', '- Gato,\r\n- Kem bơ vị coffee,\r\n- Socola.\r\nBánh được làm từ 3 lớp gato trắng xen giữa 3 lớp kem bơ vị coffee. Bánh phủ 1 lớp socola ở trên mặt.', 1, 1, 1, NULL),
(15, 'FRUIT CAKE', 'cake_1646494500.jpg', '- Gato\r\n- Kem TƯƠI, vị coffee\r\nBánh làm từ 3 lớp gato TRẮNG xen giữa 3 lớp kem TƯƠI. Bên ngoài phủ 1 lớp chocolate đen, TRANG TRÍ HOA QUẢ.', 1, 1, 1, NULL),
(16, 'CAPUCCINO', 'cake_1646494566.jpg', '- Gato,\r\n- Bột mỳ đỏ,\r\n- Kem tươi vị Tiramisu\r\nBánh làm từ 3 lớp gato đỏ xen lẫn 3 lớp kem tươi. Bên ngoài bánh phủ 1 lớp BỘT GATO ĐỎ VÀ TRANG TRÍ HOA QUẢ.', 1, 1, 1, 0),
(17, 'COCONUT CAKE', 'cake_1646494617.jpg', '- Thành phần chính:\r\n- Gato,\r\n- Kem tươi mặn vị coffee.\r\nBánh làm từ 3 lớp gato trắng kết hợp với 3 lớp kem mặn vị coffee. Bánh phủ bên ngoài bởi 1 lớp kem tươi trắng rắc bột cacao.', 1, 5, 1, 0),
(18, 'CARAMEL MOIST CHOCOLATE CAKE', 'cake_1646494665.jpg', '- Gato\r\n- Sốt caramel\r\n- Kem tươi\r\nBánh làm từ 3 lớp gato socola xen giữa 3 lớp kem tươi vị socola. Phủ bên ngoài là 1 lớp sốt caramel có vị đắng nhẹ.', 1, 5, 1, 0),
(19, 'PUFF PASTRY APPLE PIES', 'cake_1681832535.jpg', 'Thành phần: \r\n\r\n- Bột mỳ\r\n\r\n- Bơ\r\n\r\n- Đường\r\n\r\n- Kem\r\n\r\n- Táo xào\r\n\r\n- Hạt Almon', 1, 8, 1, 0),
(21, 'BÁNH HOTDOG', 'cake_1681832627.jpg', 'Bột mỳ, bơ, muối, phụ gia, xúc xích.', 1, 8, 1, NULL),
(22, 'BÁNH RUỐC', 'cake_1681832660.jpg', 'Bột mỳ, trứng, đường, sữa tươi, dầu ăn, bột sữa, chất ổn định, chà bông, sốt trứng.', 1, 8, 1, NULL),
(23, 'BÁNH MÌ HOA CÚC', 'cake_1681832694.jpg', '', 1, 3, 1, NULL),
(24, 'BÁNH MÌ BAGUETTE', 'cake_1681832762.jpg', 'Thành phần chính:\r\n\r\n- Bột mỳ\r\n\r\n- Muối\r\n\r\n- Phụ gia', 1, 3, 1, NULL),
(26, 'SOCOLA ĐEN', 'cake_1681833109.jpg', 'Socola đen, kem whipping, bơ, mật ong, hương bạc hà.', 1, 6, 1, NULL),
(27, 'SOCOLA TRắNG', 'cake_1681833155.jpg', 'Socola trắng, kem whipping, bơ, mật ong, hương  vani.', 1, 6, 1, NULL),
(28, 'SOCOLA', 'cake_1681833193.jpg', 'Socola đen, socola trắng, kem whipping, bơ, mật ong, các vị ( nước chanh leo, hương bạc hà, quả vani )', 1, 6, 1, NULL),
(29, 'RED VELVET COOKIES', 'cake_1681833227.jpg', 'Thành phần:\r\n\r\n- Bột mỳ đỏ,\r\n\r\n- Bơ,\r\n\r\n- Socola,\r\n\r\n- Trứng.', 1, 6, 1, NULL),
(30, 'GATO CUỘN TÁO XÀO', 'cake_1681833293.jpg', 'Bột mỳ, trứng, đường, bơ, sữa tươi, kem whipping, bột sữa, chất ổn định, lá đông, táo.', 1, 7, 1, NULL),
(31, 'BÁNH CUỘN CA CAO', 'cake_1681833342.jpg', 'Bột mỳ, trứng, đường, sữa tươi, dầu ăn, bột sữa, kem bơ, bột ca cao.', 1, 7, 1, NULL),
(32, 'GATO CUỘN TRÀ XANH', 'cake_1681833368.jpg', 'Bột mỳ, trứng, đường, sữa tươi, dầu ăn, bột sữa, kem bơ bột trà xanh.', 1, 7, 1, NULL),
(33, 'BÔNG LAN TRỨNG MUỐI', 'cake_1681833398.jpg', 'Bột mỳ, đường, trứng, sữa, dầu ăn, bột ngô, trứng muối, chà bông, sốt trứng.', 1, 7, 1, NULL);

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
(8, 8, 21, 360000),
(14, 14, 21, 360000),
(26, 8, 23, 440000),
(32, 14, 23, 440000),
(44, 8, 25, 530000),
(50, 14, 25, 530000),
(58, 19, 1, 15000),
(59, 21, 1, 10000),
(60, 22, 1, 15000),
(61, 23, 1, 75000),
(62, 24, 1, 12000),
(64, 26, 1, 7000),
(65, 27, 1, 7000),
(66, 28, 1, 10000),
(67, 29, 1, 65000),
(68, 30, 1, 85000),
(69, 31, 1, 75000),
(70, 32, 1, 75000),
(83, 4, 21, 360000),
(84, 4, 23, 440000),
(85, 4, 25, 530000),
(90, 6, 1, 360000),
(94, 7, 21, 360000),
(95, 7, 23, 440000),
(96, 7, 25, 530000),
(97, 33, 1, 25000),
(98, 2, 21, 330000),
(99, 2, 23, 380000),
(100, 2, 25, 460000),
(101, 2, 27, 530000),
(102, 1, 19, 275000),
(103, 1, 21, 330000),
(104, 1, 23, 380000),
(105, 1, 25, 460000),
(106, 3, 21, 360000),
(107, 3, 23, 420000),
(108, 3, 25, 500000),
(109, 5, 20, 400000),
(110, 5, 22, 480000),
(111, 5, 24, 580000),
(112, 5, 26, 700000),
(113, 9, 21, 360000),
(114, 9, 23, 420000),
(115, 9, 25, 500000),
(116, 9, 27, 580000),
(117, 10, 1, 360000),
(118, 11, 1, 400000),
(119, 12, 21, 380000),
(120, 12, 23, 460000),
(121, 12, 25, 550000),
(125, 13, 21, 330000),
(126, 13, 23, 380000),
(127, 13, 25, 460000),
(128, 13, 27, 530000),
(133, 16, 21, 275000),
(134, 16, 23, 330000),
(135, 16, 25, 380000),
(136, 16, 27, 460000),
(137, 15, 21, 275000),
(138, 15, 23, 330000),
(139, 15, 25, 380000),
(140, 15, 27, 460000),
(141, 17, 21, 275000),
(142, 17, 23, 330000),
(143, 17, 25, 380000),
(144, 17, 27, 460000),
(145, 18, 21, 360000),
(146, 18, 23, 420000),
(147, 18, 25, 500000),
(148, 18, 27, 580000);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `order_id` int NOT NULL,
  `star` int NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `order_id`, `star`, `comment`, `created_at`, `status`) VALUES
(1, 4, 15, 12, 3, 'Ngon', '2023-04-13 19:02:20', 1),
(2, 4, 15, 12, 1, 'Không ngon lắm', '2023-04-13 19:12:42', 1),
(3, 17, 15, 24, 4, 'Tuyệt vời', '2023-04-14 18:26:38', 1),
(4, 17, 4, 25, 3, '', '2023-04-14 20:21:53', 1),
(5, 17, 14, 26, 2, '', '2023-04-14 20:23:57', 1),
(6, 4, 16, 13, 5, 'Rất ngon ', '2023-04-14 20:25:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` date DEFAULT NULL,
  `level` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `id_deleted` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `gender`, `birthday`, `created`, `deleted`, `level`, `status`, `id_deleted`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$VGER95D9GaqeanD4mfTeuO2eKhfqYvV410CUU8CYbesNlK302LhR2', '0397170118', 'Thái Bình', NULL, NULL, '2023-04-08 10:34:20', NULL, 1, 1, 1),
(4, 'Dat', 'dat123@gmail.com', '$2y$10$Nm4gJ5gH2QocygUrE7B8yuVaa20mtSzb53SVzdIbyh4UebQdgZfvu', '0397170118', 'Hà Nội', NULL, NULL, '2023-04-08 10:34:20', NULL, 0, 1, 1),
(5, 'Dat', 'maitiendat011@gmail.com', '$2y$10$Nm4gJ5gH2QocygUrE7B8yuVaa20mtSzb53SVzdIbyh4UebQdgZfvu', '0397170118', 'Thái Bình', NULL, NULL, '2023-04-08 10:34:20', NULL, 0, 1, 1),
(11, 'Ngan', 'dat1234@gmail.com', '$2y$10$Nm4gJ5gH2QocygUrE7B8yuVaa20mtSzb53SVzdIbyh4UebQdgZfvu', '0366906111', 'Hà Nội', NULL, NULL, '2023-04-08 10:34:20', NULL, 0, 1, 1),
(17, 'Quan Nguyễn Hải', 'quan@gmail.com', '$2y$10$0mGPH51W0.AdrEnxxufnxe7.lef0F6n.jJo/YFXyYINVX0h4lIdY2', '', '', NULL, NULL, '2023-04-14 15:52:33', NULL, 0, 1, 1),
(18, 'Dat', 'nhanvientest1@gmail.com', '$2y$10$NiswfryePfPbkXu6azBQM.YqXbjc8C3MZXtbHCD1lPoatJ/odAvyu', '0397170118', 'Thái Bình', 'Nam', '2023-03-29', '2023-04-14 16:37:06', NULL, 2, 1, NULL),
(20, 'Ngan', 'ngan2@gmail.com', '$2y$10$w7Q4tqL.2X6rp7kPRjvW.eGKVGCHQIF29HVkBIlHmEJPW1q69Ufkm', '0397170118', 'Thái Bình', 'Nữ', '2023-03-26', '2023-04-14 16:44:38', NULL, 2, 1, 1),
(21, 'Ngan', 'ngan2@gmail.com', '$2y$10$wxE0DGcH8pU7I.xPAS1iEuFwX7RQM9amildLrPEUi.NKk2VEFbgdK', NULL, NULL, NULL, NULL, '2023-04-16 14:42:52', NULL, 0, 1, 1),
(22, 'Ngan', 'ngan1@gmail.com', '$2y$10$H5NI1GKjO5D8sfjgUQ3TdOsN.qxejhkE6YNxKS1/dvLomr47XEMa.', NULL, NULL, NULL, NULL, '2023-04-16 14:43:39', NULL, 0, 0, 1),
(23, 'Nam', 'nam@gmail.com', '$2y$10$N7XGHaFP32UZ8yXDJMzbWux7gnwbdl4VQBB7Z1LWeZjKs6/VRoZnS', NULL, NULL, NULL, NULL, '2023-04-17 06:09:13', NULL, 0, 1, NULL),
(24, 'Nam', 'nam1@gmail.com', '$2y$10$75e4ZHCayxkkSBiUDFSFPurzbR6UHaiscVHdz.4.0I0/7eUoqvZK2', NULL, NULL, NULL, NULL, '2023-04-17 06:09:47', NULL, 0, 1, NULL),
(25, 'Ly', 'ly123@gmail.com', '$2y$10$WFMya5xIMW7EKKRWXMYqPO7Ov0rLPtBEQEXBRSb0l115zIDAn6VOa', NULL, NULL, NULL, NULL, '2023-04-17 06:15:21', NULL, 0, 1, NULL);

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
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_detail_id` (`category_detail_id`);

--
-- Indexes for table `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products_size`
--
ALTER TABLE `products_size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD CONSTRAINT `category_detail_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`category_detail_id`) REFERENCES `category_detail` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products_size`
--
ALTER TABLE `products_size`
  ADD CONSTRAINT `products_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
