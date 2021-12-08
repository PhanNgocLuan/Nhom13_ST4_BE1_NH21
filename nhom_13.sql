-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Dec 08, 2021 at 02:35 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom_13`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_rate` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name_comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'Sony'),
(4, 'SamSung'),
(5, 'Anker');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pro_image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(2, 'iphone 6s Plus 64GB ', 1, 1, 2500000, 'ip6.jpg', 'iPhone 6s Plus 64 GB được nâng cấp độ phân giải camera sau lên 12 MP (thay vì 8 MP như trên iPhone 6 Plus), camera cho tốc độ lấy nét và chụp nhanh, thao tác chạm để chụp nhẹ nhàng. Chất lượng ảnh trong các điều kiện chụp khác nhau tốt', 1, '2021-12-01 03:38:30'),
(4, 'Iphone 11 Pro MAX', 1, 1, 20000000, 'iphone11promax.png', 'Mặt lưng của iPhone 7 Plus được thiết kế với phần ăng-ten được đưa vòng lên trên thay vì cắt ngang mặt lưng như những phiên bản trước là iPhone 6 Plus mang lại cảm giác thoải mái khi cầm nắm.', 1, '2021-10-20 02:37:21'),
(6, 'Laptop Dell Vostro 3491 i3 1005G1/4GB/256GB/Win10 (70223127)', 2, 2, 11000000, 'lap1.jpg', 'Dell Vostro 3491 có thiết kế hiện đại, tối giản từ chất liệu nhựa, tông màu đen sang trọng. Máy có độ dày 21 mm, trọng lượng 1.66 kg dễ dàng để các bạn học sinh sinh viên có thể đem theo đến lớp, đi cà phê,..', 1, '2020-11-22 14:08:56'),
(7, 'Laptop Dell Vostro 3580 i3 8145U/4GB/1TB/Win10 (V5I3058W)\r\n', 2, 2, 10000000, 'lap2.jpg', 'Dell luôn được yêu thích vì độ bền cao, Dell Vostro 3580 là một chiếc laptop tối ưu với sức chịu đựng, cứng cáp, chắc chắn. Chiếc laptop có trọng lượng 2.16 kg, không quá nặng để bạn mang theo bên mình khi đi học hay đi làm.', 1, '2020-11-22 14:08:56'),
(8, 'Laptop Dell Inspiron 5584 i3 8145U/4GB/1TB/Win10 (70186849)\r\n', 2, 2, 12000000, 'lap3.jpg', 'Dell Inspiron 5584 i3 8145U (70186849) được thiết kế đơn giản, thanh lịch. Trọng lượng nhẹ và cấu hình khá, phù hợp cho sinh viên - nhân viên văn phòng khi đi làm và đi học.', 1, '2020-11-22 14:08:56'),
(9, 'Laptop Dell Inspiron 3476 i3 8130U/4GB/1TB/Win10/(8J61P11)\r\n', 2, 2, 14000000, 'lap4.jpg', 'Dell Inspiron 3476 i3 8130U là phiên bản máy tính xách tay được trang bị cấu hình cơ bản với chip Intel Core i3 Kabylake Refresh, RAM DDR4 4 GB, ổ cứng HDD lên đến 1 TB, cùng hệ điều hành Windows 10 được cài đặt sẵn. Đây sẽ là lựa chọn phù hợp cho đối tượng như học sinh - sinh viên cần một chiếc laptop đáp ứng tốt các nhu cầu cơ bản của công việc văn phòng cũng như học tập.', 1, '2020-11-22 14:08:56'),
(10, 'Laptop Dell Inspiron 3581 i3 7020U/4GB/1TB/Win10 (P75F005N81A)', 2, 2, 15000000, 'lap5.jpg', 'Không quá cầu kỳ, laptop Dell Inspiron 3581 có thiết kế truyền thống với cân nặng 2.28 kg.\r\n\r\nTrọng lượng này khá cồng kềnh nếu bạn là người phải thường xuyên di chuyển nhiều.', 1, '2020-11-22 14:08:56'),
(20, 'Apple Watch SE 40mm viền nhôm dây cao su', 1, 4, 7990000, 'applewatch2.jpg', 'Apple Watch SE 40mm viền nhôm dây cao su sở hữu ngoại hình khá giống với Series 5 với mặt kính cong 2.5D cho cảm giác vuốt và chạm thoải mái. Kích thước màn hình 1.57 inch cùng độ phân giải 324 x 394 pixels giúp hiển thị hình ảnh và các thông tin đầy đủ và sắc nét. Dây đeo làm từ chất liệu cao su có đàn hồi cao, tạo cảm giác thoải mái cho cổ tay khi đeo trong thời gian dài. Apple watch không chỉ là đồng hồ với nhiều tính năng thông minh mà còn là một phụ kiện thời trang cao cấp.', 1, '2021-10-20 02:34:45'),
(19, 'Apple Watch S6 LTE 40mm viền nhôm dây cao su', 1, 4, 14490000, 'applewatch1.jpg', 'Apple Watch S6 LTE 40mm viền nhôm dây cao su sở hữu màn hình 1.57 inch giúp hiển thị đầy đủ thông tin và hình ảnh sắc nét. Dây đeo được làm từ chất liệu cao su dẻo dai và êm ái, cho cảm giác dễ chịu khi mang. Thêm vào đó, mặt kính cường lực Sapphire giúp chống trầy, tăng độ bền cho thiết bị. Các đường nét được thiết kế tinh xảo làm nên sự đẳng cấp của Apple Watch.', 1, '2021-10-20 02:34:35'),
(18, 'Sony Xperia 10 Plus Likenew 99%', 3, 1, 4490000, 'sony5.png', 'Khi nói về thiết kế thì chiếc Sony Xperia 10 Plus được coi là smartphone có chiều dài dài nhất hiện nay. Với tỷ lệ màn hình khác biệt 21:9 theo chiều ngang và 9:21 theo chiều dọc. Chưa nói đến ưu điểm nhưng đây chắc chắn là 1 điểm gây ấn tượng với người dùng.', 1, '2021-10-20 02:34:25'),
(17, 'Sony Xperia XZ3 Likenew 99%', 3, 1, 6190000, 'sony3.png', 'điện thoại sony máy cũ ', 1, '2021-10-20 02:34:14'),
(16, 'Sony Xperia 1 II ( Mark 2 ) Likenew 99%', 3, 1, 22490000, 'sony2.png', 'Sony Xperia 1 Mark II có một sự thay đổi về thiết kế so với phiên bản Sony Xperia 1 trước đó, thay đổi đầu tiên là \"em nó\" mang một cái tên mới \"Mark II\". Theo nguồn tin cho biết, Xperia 1 Mark II vẫn đâu đó mang đến một sự hấp dẫn kì lạ, với thân máy được gia công bằng kim loại phẳng đầy sang trọng và mặt trước, sau đều được phủ kính trong sáng bóng và lấp lánh.', 1, '2021-10-20 02:34:06'),
(15, 'Sony Xperia 5 II ( Mark 2 ) Mới 100% - FullBox', 3, 1, 24890000, 'sony1.png', 'Tiếp nối sự thành công đến từ 2 phiên bản Xperia 1 Mark 2 và Xperia 10 Mark 2 đều là những phiên bản nâng cấp của Xperia 1 và Xperia 10 Plus - đến lượt SONY tiếp tục con đường thành công thời gian gần đây với các mẫu smartphone thế hệ mới giới thiệu ra mắt sản phẩm Xperia 5 Mark 2 ( phiên bản nâng cấp của Xperia 5 ) vào tháng 9 vừa qua.', 1, '2021-10-20 02:33:58'),
(11, 'Tai nghe AirPods Pro sạc không dây Apple MWP22\r\n', 1, 3, 6990000, 'airpod1.jpg', 'Thiết kế in-ear hoàn toàn mới và độc đáo.\r\nTích hợp công nghệ chống ồn chủ động (Active Noise Cancellation).\r\nChip H1 mạnh mẽ, xử lý âm thanh kỹ thuật số với độ trễ gần như bằng không.\r\nNghe nhạc đến 4.5 giờ khi bật chống ồn, 5 giờ khi tắt chống ồn .\r\nSử dụng song song với hộp sạc có thể dùng được đến 24 giờ nghe nhạc.\r\nHỗ trợ sạc nhanh, cho thời gian sử dụng đến 1 giờ chỉ với 5 phút sạc.\r\nHộp sạc hỗ trợ sạc không dây chuẩn Qi, tiện lợi khi sạc lại.', 1, '2021-10-20 02:33:15'),
(12, 'Tai nghe nhét tai Earpods Apple MNHF2\r\n', 1, 3, 790000, 'earpod2.jpg', 'Thiết kế hiện đại, sang trọng và thoải mái.\r\nCó phím điều chỉnh âm lượng, nghe/nhận cuộc gọi.\r\nCổng 3.5mm phù hợp nhiều loại điện thoại, máy tính bảng, laptop.\r\nSản phẩm chính hãng Apple, nguyên seal 100%.\r\nLưu ý: Thanh toán trước khi mở seal.', 1, '2021-10-20 02:33:26'),
(13, 'Tai nghe nhét tai Sony MDR-E9LP', 3, 3, 139000, 'tainghesony1.jpg', 'Thiết kế sành điệu, bắt mắt.\r\nChất lượng âm thanh sống động và chân thực.\r\nSử dụng được cho hầu hết điện thoại, máy tính bảng, laptop có cổng 3.5mm\r\nTai nghe có dây dài 1.2 m, tiện lợi khi nghe nhạc với điện thoại bỏ trong balo, túi xách.\r\nThương hiệu Sony đến từ Nhật Bản, nổi tiếng toàn cầu trong lĩnh vực công nghệ, điện tử.', 0, '2021-10-20 02:33:35'),
(14, 'Tai nghe chụp tai Sony MDR - ZX110AP', 3, 3, 439000, 'tainghesony2.jpg', 'Thiết kế mạnh mẽ, hiện đại.\r\nĐệm tai nghe tạo cảm giác êm khi đeo và cách âm tốt.\r\nCó thể nới lỏng tai nghe thêm khoảng 4.5 cm để thoải mái khi đeo.\r\nGấp gọn dễ dàng khi cất, đựng trong balo, túi xách hoặc mang theo.\r\nDây dài 1.2 m và kết nối dễ dàng với thiết bị có cổng 3.5mm.\r\nCó nút dừng/phát nhạc, chuyển bài, nhận cuộc gọi dễ dàng.\r\nThương hiệu Sony đến từ Nhật Bản, nổi tiếng toàn cầu trong lĩnh vực công nghệ, điện tử.', 1, '2021-10-20 02:33:45'),
(21, 'Apple Watch S5 44mm viền nhôm dây cao su đen', 1, 4, 10000000, 'applewatch3.jpg', 'Apple Watch S5. chất lượng cực tốt xài sướng khỏi bàn', 1, '2021-10-20 02:34:57'),
(22, 'Apple Watch S3 LTE 42mm viền nhôm dây cao su trắng\r\n\r\n', 1, 4, 6990000, 'applewatch4.jpg', 'Đồng hồ thông minh Apple Watch được trang bị màn hình OLED Retina cho mọi hình ảnh sắc nét, hiển thị tốt cả khi sử dụng ngoài trời. Với kích thước 1.65 inch giúp bạn có thể theo dõi các thông tin to rõ, dễ dàng hơn. ', 1, '2021-10-20 02:35:06'),
(23, 'Apple Watch S6 LTE 44mm viền nhôm dây cao su', 1, 4, 15490000, 'applewatch5.jpg', 'Apple Watch S6 LTE là một trong những dòng đồng hồ được ưa chuộng nhiều nhất trên thế giới với thiết kế tinh tinh tế trong từng chi tiết, khung viền được gia công chắc chắn, dây đeo cao su đàn hồi tốt, màn hình sắc nét với mặt kính cường lực Sapphire đem lại sự thời thượng và sang trọng, cho bạn tự tin thể hiện đẳng cấp của mình', 1, '2021-10-20 02:35:14'),
(24, 'Tai nghe AirPods 2 sạc không dây Apple MRXJ2', 1, 3, 4900000, 'airpod2.jpg', 'Thiết kế đơn giản, thời trang và nhỏ gọn.\r\nTrang bị chip H1 hoàn toàn mới, cho tốc độ kết nối, chuyển đổi giữa các thiết bị nhanh chóng.\r\nKích hoạt nhanh trợ lý ảo Siri bằng cách nói \"Hey, Siri\".\r\nCó thể sử dụng nghe nhạc lên đến 5 giờ (âm lượng 50%) cho mỗi một lần sạc đầy.', 1, '2021-10-20 02:35:22'),
(25, 'Điện thoại Samsung Galaxy Note 20 Ultra', 4, 1, 24990000, 'ss1.png', 'Sau Galaxy Note 20 thì Galaxy Note 20 Ultra là phiên bản tiếp theo cao cấp hơn thuộc dòng Note 20 Series của Samsung, với nhiều thay đổi từ cụm camera hỗ trợ lấy nét laser AF cùng ống kính góc rộng mới, màn hình tràn viền lên đến 6.9 inch chắc chắn sẽ là chiếc điện thoại được săn đón của fan yêu thích công nghệ.', 1, '2021-10-20 02:35:31'),
(26, 'Điện thoại Samsung Galaxy Z Fold2 5G', 4, 1, 50000000, 'ss2.png', 'Samsung Galaxy Z Fold 2 là tên gọi chính thức của điện thoại màn hình gập cao cấp nhất của Samsung. Với nhiều nâng cấp tiên phong về thiết kế, hiệu năng và camera, hứa hẹn đây sẽ là một siêu phẩm thành công tiếp theo đến từ “ông trùm” sản xuất điện thoại lớn nhất thế giới.', 1, '2021-10-20 02:35:40'),
(27, 'Điện thoại Samsung Galaxy S20+', 4, 1, 23990000, 'ss3.png', 'Chiếc điện thoại Samsung Galaxy S20 Plus - Siêu phẩm với thiết kế màn hình tràn viền, hiệu năng đỉnh cao kết hợp cùng nhiều đột phá về công nghệ dẫn đầu thế giới smartphone.', 1, '2021-10-20 02:35:49'),
(28, 'Điện thoại Samsung Galaxy S20 FE', 4, 1, 15990000, 'ss4.png', 'Trong sự kiện Samsung Unpacked đặc biệt vừa qua, Samsung đã giới thiệu đến người dùng thành viên mới của dòng điện thoại thông minh S20 Series đó chính là Samsung Galaxy S20 FE. Đây là mẫu flagship cao cấp quy tụ nhiều tính năng mà Samfan yêu thích, hứa hẹn sẽ mang lại trải nghiệm cao cấp của dòng Galaxy S với mức giá dễ tiếp cận hơn.', 0, '2021-10-20 02:35:57'),
(29, 'Điện thoại Samsung Galaxy A50s', 4, 1, 6990000, 'ss5.png', 'Nằm trong sứ mệnh nâng cao khả năng cạnh tranh với các smartphone đến từ nhiều nhà sản xuất Trung Quốc, mới đây Samsung tiếp tục giới thiệu phiên bản Samsung Galaxy A50s với nhiều tính năng mà trước đây chỉ xuất hiện trên dòng cao cấp.', 1, '2021-10-20 02:36:04'),
(30, 'Iphone 8 Plus 64Gb', 1, 1, 10000000, 'iphone8plus.png', 'iPhone 7 32GB vẫn mang trên mình thiết kế quen thuộc của từ thời iPhone 6 nhưng có nhiều thay đổi lớn về phần cứng, dàn loa stereo và cấu hình cực mạnh.', 1, '2021-10-20 02:36:16'),
(1, 'Iphone 7 Plus 128Gb', 1, 1, 8600000, 'ip7plus.png', 'iPhone 7 Plus 128GB vẫn mang trên mình thiết kế quen thuộc của từ thời iPhone 6 nhưng có nhiều thay đổi lớn về phần cứng, dàn loa stereo và cấu hình cực mạnh.', 1, '2021-10-23 14:14:36'),
(31, 'Tai nghe Anker Soundcore Verve', 5, 3, 290000, 'anker-soundcore-verve.jpg', 'Thiết kế bền bỉ, đàn hồi trên tai nghe Anker Soundbuds Verve\r\nTai nghe Anker Soundbuds Verve được trang bị thiết kế bền bỉ với dây nối mạnh mẽ nhưng linh hoạt được thiết kế để chịu được uốn cong hơn 15000 lần, nhằm đảo bảo trước sự hao mòn của việc sử dụng hằng ngày do đây là thiết bị tai nghe có dây cắm jack 3.5mm nên việc va chạm là điều không tránh khỏi.', 0, '2021-10-20 03:18:45'),
(32, 'Cáp Anker PowerLine II Lightning 3m A8432', 5, 5, 344000, 'cap-lightning-anker-powerline-ii-a8434-3m.jpg', 'Bền bỉ gấp 5 lần với 12000 lần uốn cong\r\nAnker đã làm mọi cách để đưa thương hiệu trở thành phụ kiện bền bỉ nhất thế giới. Chứng minh bằng những thử nghiệm chân thực nhất, cáp Anker PowerLine II Lightning 3m A8434 có độ bền cao gấp 5 lần so với cáp sạc thông thường.', 0, '2021-10-20 03:21:00'),
(33, 'Sạc Anker PowerPort Mini 12w 2 Cổng - A2620', 5, 5, 225000, 'sac-anker-powerport-mini-2-cong-12w-a2620_1.jpg', 'Anker PowePort Mini 12W với thiết kế nhỏ gọn vừa vặn trong lòng bàn tay\r\nĐối với những người đang sử dụng những ổ cắm có kích thước nhỏ thì việc có được một củ sạc nhỏ gọn là điều vô cùng tiện ích. Nắm được điểm yếu này Anker đã cho ra đời sản phẩm có kích thước siêu nhỏ giúp tiết kiệm không gian tối đa trên các ổ cắm', 0, '2021-10-20 03:23:30'),
(34, 'Tai Nghe Bluetooth Anker SoundCore SoundBuds Slim', 5, 3, 800000, '51my0cfnshl._sl1500__e7b84200b0bc4c0ba7b9e10ef349727d_master', 'Anker soundcore slim - Thiết kế siêu nhẹ chỉ 14g, thoải mái với EarTips và EarWings nhiều lớp, nhiều kích cỡ\r\nAnker Soundcore Slim được thiết kế mỏng và nhẹ (14g) với kích thước 55.3x3.1x1.2 cm, đồng thời mang lại hiệu năng cao. Hai tai gắn với nhau bằng từ tính khi không sử dụng dễ dàng cất gọn vào túi mang đi. Phần củ tai được thiết kế nghiêng một góc 45 độ giúp tai nghe vào sâu hơn, thiết kế này giúp tai nghe dạng in-ear này vào sâu hơn trong ống tai từ đó nâng cao chất lượng âm bass.', 0, '2021-10-20 03:25:46'),
(60, 'iPhone 13 Pro Max', 1, 1, 33990000, 'iphone13pro.jpg', 'Một trong những yếu tố khiến iPhone 13 Pro Max đáng mong chờ đó là thiết kế notch \"tai thỏ\" được thu gọn lại. Ngoài kích cỡ màn hình 6.7 inch với tấm nền Super Retina XDR OLED, máy sẽ có thiết kế notch được thu hẹp lại, giúp tăng tỷ lệ hiển thị trên màn hình điện thoại. Tất nhiên, những cảm biến quan trọng như TrueDepth, Face ID hoặc camera selfie đều sẽ giữ nguyên vị trí.', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(4, 'Đồng hồ thông minh'),
(3, 'Tai nghe'),
(5, 'Sạc');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'users');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `roles`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'user', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(3, 'luan1234', 'e10adc3949ba59abbe56e057f20f883e', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
