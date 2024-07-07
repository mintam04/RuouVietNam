-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2023 lúc 03:58 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(10) NOT NULL,
  `id_nguoidung` int(10) NOT NULL DEFAULT 0,
  `bill_name` varchar(200) NOT NULL,
  `bill_address` varchar(200) NOT NULL,
  `bill_tel` varchar(200) NOT NULL,
  `bill_email` varchar(200) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL COMMENT '1.Thanh toán trực tiếp 2.Chuyển khaorn 3.Thanh toán online',
  `total` int(10) NOT NULL,
  `ngaydathang` varchar(200) DEFAULT NULL,
  `bill_status` tinyint(1) NOT NULL COMMENT '0. Đang chờ 1.Đang xử lú 2.Đang giao hàng 3.Hoàn tất',
  `receive_name` varchar(200) DEFAULT NULL,
  `receive_address` varchar(200) DEFAULT NULL,
  `receive_tel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `id_nguoidung`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `total`, `ngaydathang`, `bill_status`, `receive_name`, `receive_address`, `receive_tel`) VALUES
(26, 3, 'ngocht', 'số 44 ngõ 36 đường Khuyến Lương', '0983264473', 'ngocht@gmail.com', 1, 685000, '03:19:10am  06/10/2023', 2, NULL, NULL, NULL),
(33, 9, 'mjntem', 'số 44 ngõ 36 đường Khuyến Lương', '0983264473', 'mjntem2004@gmail.com', 1, 1060000, '08:46:33am  06/10/2023', 0, NULL, NULL, NULL),
(34, 3, 'ngocht', 'số 44 ngõ 36 đường Khuyến Lương', '0983264473', 'ngocht@gmail.com', 2, 425000, '03:51:13pm  06/10/2023', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(10) NOT NULL,
  `noidung` varchar(200) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `id_nguoidung` int(10) NOT NULL,
  `ngaybinhluan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `noidung`, `id_sp`, `id_nguoidung`, `ngaybinhluan`) VALUES
(9, 'okoek', 35, 3, '07:14:16am 06/10/2023'),
(10, 'Sản phẩm tốt', 35, 3, '07:14:25am 06/10/2023'),
(11, 'Rượu chất lượng', 35, 3, '07:14:42am 06/10/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) NOT NULL,
  `id_nguoidung` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `id_bill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_nguoidung`, `id_sp`, `img`, `name`, `price`, `soluong`, `thanhtien`, `id_bill`) VALUES
(48, 3, 35, '../upload/sparklingred.jpg', 'Rượu Chateau Dalat Sparkling Red wine', 145000, 1, 145000, 26),
(49, 3, 36, '../upload/dalatspecial.jpg', 'Rượu Vang Chateau Dalat Special Chardonnay', 280000, 1, 280000, 26),
(50, 3, 30, '../upload/vodkamengold.png', 'Rượu Vodka Men Sheriff Gold Edition', 260000, 1, 260000, 26),
(63, 9, 36, '../upload/dalatspecial.jpg', 'Rượu Vang Chateau Dalat Special Chardonnay', 280000, 1, 280000, 33),
(64, 9, 29, '../upload/vodka25.png', ' Rượu vodka men 25 độ', 780000, 1, 780000, 33),
(65, 3, 35, '../upload/sparklingred.jpg', 'Rượu Chateau Dalat Sparkling Red wine', 145000, 1, 145000, 34),
(66, 3, 36, '../upload/dalatspecial.jpg', 'Rượu Vang Chateau Dalat Special Chardonnay', 280000, 1, 280000, 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(10, 'Rượu Vang'),
(11, 'Rượu Sân Đình'),
(17, 'Rượu Vodka'),
(20, 'Rượu Đà Lạt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoidung`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(2, 'mintam04', '123456', 'tamnmph35915@gmail.com', '', '', 1),
(3, 'ngocht', '123456', 'ngocht@gmail.com', 'số 44 ngõ 36 đường Khuyến Lương', '0983264473', 0),
(8, 'phuong16', '123456 ', 'phuongnt@gmail.com', NULL, NULL, 0),
(9, 'mjntem', '123456 ', 'mjntem2004@gmail.com', '', '', 0),
(11, 'mtem', '123456 ', 'tamnmph35915@fpt.edu.vn', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int(200) DEFAULT 0,
  `img` varchar(200) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `view` int(10) DEFAULT 0,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name`, `price`, `img`, `des`, `view`, `id`) VALUES
(22, 'Rượu Sân Đình Táo Mèo', 432000, '../upload/taomeo.png', 'Rượu Sân Đình Táo mèo là loại cây tự nhiên trên các dãy núi cao vùng Tây Bắc. Quả táo chín có hương thơm đặc biệt và vị chua chát, hơi ngọt. Táo mèo là vị thuốc nổi tiếng có tác dụng chống lão hóa, tăng sự tuần hoàn máu và tim mạch, giảm đau, an thần.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 0, 11),
(23, ' Rượu Sân Đình Nếp Cẩm', 522000, '../upload/nepcam.png', 'Rượu Sân Đình Nếp Cẩm – Theo đông y, nếp cẩm là loại thuốc có tính ấm, vị ngọt, dễ tiêu hóa, giúp làm ấm bụng đặc biệt có tác dụng đối với những người có vấn đề về tiêu hóa hoặc các bệnh về dạ dày. Rượu nếp cẩm giúp hạn chế tai biến mạch, đồng thời tái tạo các mạch máu.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 10, 11),
(24, ' Rượu Sân Đình Thảo Mộc', 432000, '../upload/thaomoc.png', 'Rượu Sân Đình Thảo Mộc được sản xuất theo bài thuốc “thập toàn đại bổ thang” trong dân gian mang lại nhiều lợi ích về sức khoẻ cho người tiêu dùng dễ uống và êm dịu\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 0, 11),
(25, 'Rượu Sân Đình Mơ', 432000, '../upload/mo.png', 'Rượu Sân Đình Mơ là một sản phẩm của công ty rượu Vodka Men cho thị trường rượu ngâm truyền thống với nguồn mơ từ chùa hương có nhiều tác dụng tốt cho sức khoẻ người tiêu dùng\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 100, 11),
(26, 'Rượu Sân Đình Nếp Cái Hoa Vàng', 552000, '../upload/nepcaihoavang.png', 'Rượu Nếp Cái Hoa Vàng Sân Đình – Các nghiên cứu cho thấy rượu nếp cái hoa vàng không những có tác dụng bồi bổ cơ thể mà còn có thể ngăn ngừa các bệnh đái tháo đường cũng như tim mạch, đột quỵ và cao huyết áp.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 5, 11),
(27, ' Rượu Sân Đình Ba Kích', 786000, '../upload/bakich.png', 'Rượu Sân Đình Ba Kích là một sản phẩm của công ty Rượu Vodka Men cho thị trường rượu ngâm truyền thống , ba kích tím là loại cây thảo mộc thường mọc nhiều ở vùng Ba Chế – Quảng Ninh, Bắc Ninh, Băc Giang…\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 0, 11),
(28, ' Rượu Vodka men Hỷ', 780000, '../upload/vodkamenhy.png', 'Trong phong tục và quan niệm của người Việt Nam, lễ thành hôn là dịp vô cùng trọng đại trong đời mỗi người. Trong đời sống hiện đại, tập tục cưới xin trước nay cũng có thay đổi nhưng vẫn giữ nguyên những lễ nghi cơ bản.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 0, 17),
(29, ' Rượu vodka men 25 độ', 780000, '../upload/vodka25.png', 'Men’ Vodka được sản xuất từ 100% gạo chất lượng cao được tuyển chọn từ những cánh đồng lúa khu vực đồng bằng sông Hồng. men thuần chủng từ Đan Mạch và nguồn nước tinh khiết theo tiêu chuẩn châu Âu.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 0, 17),
(30, 'Rượu Vodka Men Sheriff Gold Edition', 260000, '../upload/vodkamengold.png', 'Rượu Vodka Men Sheriff Gold là phiên bản đặc biệt của dòng sản phẩm vodka cao cấp – Men’ Sheriff với hương vị rượu Vodka đặc biệt ngon và có vảy vàng bên trong khẳng định đẳng cấp và sự sang trọng của người thưởng thức\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống\r\n\r\n', 0, 17),
(31, ' Rượu Vodka Men Sheriff', 155000, '../upload/vodkamensheriff.png', 'Rượu Vodka Men Sheriff là dòng Vodka cao cấp ra đời từ sự kết hợp hoàn hảo giữa công nghệ sản xuất vodka hiện đại của châu Âu và nguyên liệu đặc biệt tinh tuý của truyền thống làm rượu Việt Nam – gạo nếp.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi v', 0, 17),
(32, ' Rượu Táo Mèo Rơm Vàng', 125000, '../upload/taomeoromvang.jpg', 'Rượu Táo Mèo Rơm Vàng là một sản phẩm của công ty rượu vodka cá sấu thiết kế để phục vụ thị trường truyền thống những người thích uống rượu ngâm, với sự phá cách kết hợp giữa rượu vodka cá sấu và tinh chất siro táo mèo tạo nên chai rượu ngâm hoàn hảo.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống', 0, 11),
(33, 'Rượu Vang Đà Lạt Export Blue – Red Wine', 125000, '../upload/bluered.jpg', 'Rượu vang đà lạt Export Blue là một sản phẩm mới ra mắt của gia đình vang đà lạt với công thức phối trộn mới từ các giống nho Shiraz ,Cardinal , và quả dâu đà lạt mang lại hương vị mới và những trải nghiệm mới về vang cho người việt nam từ các giống nho nước ngoài.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này.\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống.', 50, 10),
(34, 'Rượu vang Divani Red Wine', 80000, '../upload/Divanired.jpg', 'Rượu vang đà lạt giá rẻ – Rượu vang Divani được được lên men từ quả dâu Đà Lạt và nho Cardinal. Vang có màu đỏ đậm với hương thơm nhẹ nhành của các loại quả đỏ, vị chua ngọt của trái cây hài hòa cùng vị chat dịu. Vang Divani thích hợp cho mọi món ăn.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này.\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống.', 15, 10),
(35, 'Rượu Chateau Dalat Sparkling Red wine', 145000, '../upload/sparklingred.jpg', 'Rượu Chateau Dalat Sparkling – Red Wine là rượu vang sủi có hương của quả dâu rừng và mận chín ,loại Sparkling này phù hợp cho nữ và các sự kiện cưới hỏi hoặc là sử dụng kèm với món khai vị của bữa ăn sang trọng.\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này.\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống.\r\n\r\n', 0, 20),
(36, 'Rượu Vang Chateau Dalat Special Chardonnay', 280000, '../upload/dalatspecial.jpg', 'Rượu Vang Chateau Dalat Special – Chardonnay mang hương vị của táo ổi hoà quyện với hương vị của mật ong và Vani phù hợp với các món hải sản\r\n\r\nUống rượu không phải là giải pháp cho mọi vấn đề, nhưng nó có thể biến các vấn đề thành những câu chuyện thú vị để kể lại sau này.\r\n\r\nTại sao cần phải uống rượu? Vì nếu bạn không uống rượu, thì sẽ không bao giờ biết mình có thể uống bao nhiêu!\r\n\r\nUống rượu không phải là giải pháp cho tất cả các vấn đề, nhưng nó cũng không phải là nguyên nhân của tất cả các vấn đề - trừ khi vấn đề của bạn là không có đủ rượu để uống.', 0, 20);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `lk_nguoidung` (`id_nguoidung`),
  ADD KEY `lk_binhluan_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `cart_user` (`id_nguoidung`),
  ADD KEY `cart_sanpham` (`id_sp`),
  ADD KEY `cart_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `lk_sp` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nguoidung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_binhluan_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `lk_nguoidung` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `cart_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sp` FOREIGN KEY (`id`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
