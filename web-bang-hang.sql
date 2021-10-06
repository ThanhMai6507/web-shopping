-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2021 lúc 04:55 PM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web-bang-hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pham Viet Khanh', 'khanhdev@gmail.com', NULL, '$2y$10$TaI3wTVrvlKUTwTikoOVW.M6xPW/j2iRduR4HYztj1QfEZeJK4f5.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `slug_category` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `category_name`, `slug_category`, `menu_id`, `trang_thai`) VALUES
(8, 'Thời Trang Nam', 'thoi-trang-nam', 7, 0),
(9, 'Thời Trang Nữ', 'thòi-trang-nũ', 7, 0),
(10, 'Phụ Kiện Nam', 'phụ-kiẹn-nam', 7, 0),
(11, 'Phụ Kiện Nữ', 'phụ-kiẹn-nũ', 7, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menutype`
--

CREATE TABLE `menutype` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_type` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `Slug_Menu_type` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `Trang_Thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `menutype`
--

INSERT INTO `menutype` (`id`, `menu_type`, `Slug_Menu_type`, `Trang_Thai`) VALUES
(7, 'Quan ao', 'quan-ao', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_08_26_084753_create_modelnames_table', 2),
(9, '2021_08_26_091454_create_menu_types_table', 3),
(10, '2021_08_27_074618_create_slide_models_table', 4),
(12, '2021_09_30_063440_create_admin_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `modelnames`
--

CREATE TABLE `modelnames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_card_detail`
--

CREATE TABLE `order_card_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_card_id` int(11) NOT NULL,
  `order_name_product` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_qty` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_price` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_card_detail`
--

INSERT INTO `order_card_detail` (`id`, `order_card_id`, `order_name_product`, `order_qty`, `order_price`) VALUES
(14, 14, 'ÁO KHOÁC NAM KAKI', '1', '234000'),
(15, 14, 'ÁO KHOÁC KAKI NỮ 2 LỚP VANI', '1', '172000'),
(16, 14, 'ÁO KHOÁC NAM 2 MÀU', '1', '207000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_cart`
--

CREATE TABLE `order_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_address` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_phone` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_qty` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `order_totol` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `payment_method` int(5) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_cart`
--

INSERT INTO `order_cart` (`id`, `order_name`, `order_address`, `order_phone`, `order_qty`, `order_totol`, `payment_method`, `status`) VALUES
(14, 'pham viet khanh', 'hn', '0123456789', '3', '613000', 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `slug_product` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8_vietnamese_ci NOT NULL,
  `img_product` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `hot` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `detail` text COLLATE utf8_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name_product`, `slug_product`, `code`, `description`, `img_product`, `price`, `hot`, `category_id`, `detail`, `status`) VALUES
(6, 'ÁO KHOÁC NAM KAKI', 'ao-khoac-nam-kaki-phoi-khoa-keo-rocky', 'G21', 'Chất liệu kaki chắc chắn, đẹp, co giãn nhẹ. Thiết kế cổ trụ phối đai nam tính, tay dài lịch lãm, lưng áo được phối nút cá tính, mang lại vẻ đẹp sành điệu cho các bạn nam.', '5f3469ef92f52a15044ea20c9c029c5743.jpg', '234000', 0, 8, 'Thông tin chi tiết\r\nNếu như thời trang cho bạn gái cần lắm sự tỉ mỉ, khéo léo và tinh tế từ kiểu dáng đến màu sắc thì thời trang cho nam lại đơn giản hơn nhưng tinh tế và không cầu kỳ, người ta vẫn sẽ thấy một anh chàng thanh lịch nhưng vẫn manly và nam tính, đặc biệt, những trang phục như áo khoác chỉ cần một chiếc áo màu trơn cùng một số điểm nhấn nhỏ như logo hay sọc ngang áo..cũng đủ làm chàng nổi bật và thật ấn tượng trước các bạn gái.', 0),
(7, 'Áo Khoác Hai Lớp', 'ao-khoac-kaki-caro-nam-hai-lop', 'G22', 'Với chiếc áo khoác kiểu dáng thời trang, bạn sẽ trông thật phong cách, khỏe khoắn và năng động hơn khi sánh đôi cùng bạn gái, đi dạo, đi chơi hay đi du lịch xa.', '1900c336077f01836f73d10d029bd5ba54.jpg', '198000', 0, 8, 'Áo khoác nam kaki caro hai lớp là sự phối hợp hài hòa giữa chất liệu vải, kiểu dáng cũng như màu sắc, sản phẩm này mang đến sự thoải mái, tự tin cho người mặc. Không chỉ phái nữ mới cần sự che nắng hiệu quả mà đối với làn da của các bạn nam cũng cần được bảo vệ khỏi cái nóng của tiết trời mùa hè. Chiếc áo khoác nam này còn mang đến phong cách thể thao khỏe khoắn và năng động.', 0),
(8, 'ÁO KHOÁC NAM STYLE', 'ao-khoac-nam-style', 'G23', 'Đối với phái mạnh thì những chiếc áo khoác không còn xa lạ nữa, kiểu dáng body sẽ giúp các chàng mạnh mẽ, thời trang hơn trong mắt phái đẹp.', '5c30bccb481962dce65beeacaa066de510.jpg', '200000', 0, 8, 'Có thể nói nỉ là chấy liệu được lựa chọn trong các mẫu áo khoác nam bởi mỗi loại chất liệu đều có đặc tính riêng và nỉ cũng không ngoại lệ khi mang trong mình sự mềm mại, co giãn nhẹ đồng thời giữ ấm cực hiệu quả, bạn có thể mặc trong thời tiết 4 mùa quanh năm, bất kể là thời tiết nóng hay lạnh.', 0),
(9, 'ÁO KHOÁC NAM 2 MÀU', 'ao-khoac-nam-2-mau', 'G24', 'Thiết kế từ chất liệu Kaki cao cấp, kiểu dáng trẻ trung mới lạ, cho bạn nam luôn mạnh mẽ năng động với Áo Khoác Nam 2 Màu', '19d58c358dbffc6a8dae762c53041cfa31.jpg', '207000', 1, 8, 'Thời trang áo khoác hiện nay đang rất được nhiều bạn trẻ ưa chuộng, vừa là sản phẩm làm đẹp vừa giúp bạn giữ ấp hoặc che nắng những lúc đi ra ngoài. Áo Khoác Nam 2 Màu được thiết kế từ chất liệu vải kaki cao cấp độ dày vừa giúp bạn có cảm giác dẽ chịu khi đi ra đường ban ngày lúc trời nắng, và giúp giữ ấp vào ban đêm với tiết trời xe lạnh', 0),
(10, 'ÁO THUN NAM CỔ TRỤ', 'ao-thun-nam-co-tru-blue', 'G25', 'Áo thun nam cổ trụ Blue - Thể Hiện Gu Thời Trang Tinh Tế Và Phong Cách Khỏe Khoắn, Năng Động Của Phái Mạnh.', '781624af6198b253bafe598c625c1d3779.jpg', '180000', 1, 8, 'Áo thun nam cổ trụ BLUE mang lại nét trẻ trung, năng động cho phái mạnh. Áo có kiểu dáng cổ bẻ xẻ trụ cài nút, tay ngắn, phối màu đa dạng, phù hợp cho bạn mặc khi đi học, đi chơi hay đi làm. Điểm nổi bật là túi áo, cổ tay, lưng áo phối màu khác nhau, đem lại nét hiện đại, cá tính cho người mặc. Kết hợp cùng quần jeans và giày thể thao, bạn đã có vẻ ngoài ấn tượng hơn bao giờ hết.', 0),
(11, 'ÁO KHOÁC LEN LÔNG XÙ', 'ao-khoac-len-long-xu-kieu-han-quoc', 'G222', 'Áo khoác len lông xù kiểu Hàn Quốc rất thích hợp để diện trong những ngày thời tiết lạnh, nó có tác dụng giữ ấm cơ thể và giúp trở nên trẻ trung, xinh đẹp hơn với nhiều kiểu dáng khác nhau. Hãy cùng mydeal.vn tham khảo những mẫu áo len xù này cho mình nhé', '13b33c9d4f1f63a487bef4db5d2ee3e611.jpg', '247000', 1, 9, 'Thông tin chi tiết\r\nCùng với áo len họa tiết, áo len vặn thừng, mùa đông 2014 này là sự lên ngôi của những chiếc áo len lông xù điệu đà, sang trọng mà vẫn không kém phần trẻ trung. Áo len lông xù được yêu thích không chỉ bởi dễ mix đồ, ấm áp mà còn bởi sự cá tính và mới mẻ.', 0),
(12, 'ÁO LEN 3 SỌC TAY DÀI', 'ao-len-3-soc-tay-dai-quyen-ru', 'g11', 'Áo len nữ thời trang với kiểu dáng trọn đầu, tay dài xinh xắn. Phối màu dụi nhẹ cho bạn gái chưng diện trong dip noel này. Giá 279.000đ chỉ còn 189.000đ chỉ có tại mydeal.vn!', '629a1f282caa3da14a70a82035df98ab22.jpg', '175000', 1, 9, 'Áo len  với sự mềm mại, dày dặn mang lại sự ấm áp trong màu đông cho bạn gái mỗi khi đi chơi. Áo len không chỉ khoác ngoài mà còn là trang phục cho bạn gái kết hợp với nhiều  trang khác thêm phần trẻ trung, xinh xắn.', 0),
(13, 'ÁO LEN NỮ HỌA TIẾT HOA MAI', 'ao-len-nu-hoa-tiet-hoa-mai-md1221', 'MD1221', 'Áo len nữ họa tiết hoa mai, thiết kế nữ tính, kiểu dáng thời trang, chất liệu len êm ái mềm mại, họa tiết hoa xinh xắn, mang đến bạn gái sự dịu dàng, nhẹ nhàng và đáng yêu.', '629a1f282caa3da14a70a82035df98ab91.jpg', '225000', 1, 9, 'Năm mới đến gần kéo theo không khí se lạnh, những chiếc áo len sẽ được dịp lên ngôi để giúp bạn giữ ấm và thể hiện phong cách thời trang tinh tế dù trong bất cứ hoàn cảnh nào. Áo len nữ họa tiết hoa mai là sự lựa chọn hoàn hảo, phong cách trẻ trung mang đến bạn gái phong cách nữ tính, năng động và đặc biệt rất ấm áp.\r\nForm áo len nữ họa tiết hoa mai ôm người, kiể dáng chui đầu không kén dáng người mặc, có bo gấu ở cổ, tay và vạt áo nhẹ nhàng.\r\nDễ dàng kết hợp áo len nữ họa tiết hoa mai cùng chân váy, short, jeans…để có style nữ tính khi xuống phố !', 0),
(14, 'ÁO KHOÁC KAKI NỮ 2 LỚP VANI', 'ao-khoac-kaki-nu-2-lop-vani', 'VANI', 'Áo khoác kaki form lỡ với thiết kế mang phong cách thời trang Hàn Quốc trẻ trung, sành điệu, là những gì mà chiếc áo khoác mang lại.', '53c249ef755e1bbc13628690f0e35cd084.jpg', '172000', 1, 9, 'Thông tin chi tiết\r\nNhững cô nàng mê mẩn hàng hiệu xứ Hàn không thể không biết đến những mẫu áo khoác  kiểu dáng magto, đây là mẫu thời trang đậm chất Hàn, mang lại vẻ ngoài thời trang sành điệu mỗi khi chưng diện.', 0),
(15, 'ÁO KHOÁC KAKI HAI LỚP VIỀN REN CỔ SURI', 'ao-khoac-kaki-hai-lop-vien-ren-co-suri', 'SURI', 'Áo khoác kaki hai lớp điệu đà với lớp ren phối ở cổ áo, form dáng dài, kết nơ xinh xắn ở phần thân sau của chiếc áo.', '296efd60a022a0bb7f099ad6a0e178ce4.jpg', '234000', 1, 9, 'Thông tin chi tiết\r\nÁo kaki form dài cho những ngày đông se lạnh, kiểu dáng thời trang, cùng với hai lớp có chức năng giữ ấm tốt cho người mặc. Mỗi năm đều có những tone màu chủ đạo lên ngôi tuy nhiên với các  mẫu áo khoác kaki màu sắc  như  xanh rêu, vàng đồng vừa tươi trẻ vừa không bao giờ lỗi mốt.', 0),
(16, 'ĐỒNG HỒ CẶP NAM NỮ ĐÔI THỜI TRANG', 'dong-ho-cap-nam-nu-doi-thoi-trang', 'g1111', 'Đồng hồ cặp nam nữ đôi thời trang, thiết kế trẻ trung, kiểu dáng ấn tượng, phong cách cá tính cho bạn trẻ thật nổi bật.', '8d676d97d0b42326e389a1f56a3706e068.jpg', '240000', 1, 10, 'Ngày nay đồng hồ đeo tay đã trở thành 1 phụ kiện thời trang không thể thiếu đối với tất cả mọi người. Ngoài chức năng cung cấp thông thông tin thời gian, đồng hồ còn giúp bạn thể hiện được gu thẩm mỹ tinh tế của mình. Hôm nay chúng tôi giới thiệu đến bạn sản phẩm đồng hồ cặp nam nữ Kimio thời trang với thiết kế trẻ trung, kiểu dáng thời trang, đẹp mắt, là phụ kiện thời trang lý tưởng dành cho bạn trẻ.', 0),
(17, 'ĐỒNG HỒ OMEGGA DÂY THÉP', 'dòng-hò-omegga-day-thep', 'G222', 'Đồng hồ Omegga dây thép chất liệu mặt kính cứng, dây kim loại. Thiết kế theo xu hướng cổ điển, sang trọng cùng các chữ số La Mã.', 'fcbbe9026bfa6db73f8eabfed6a8a2f777.jpg', '210000', 1, 10, 'Cũng như túi xách hay giày cao gót với nữ giới, chiếc đồng hồ từ lâu đã trở thành phụ kiện không thể thiếu được với các chàng. Một chiếc đồng hồ không đơn giản chỉ để giúp các chàng biết được thời gian mà còn tạo nên một phong cách nam tính, lịch lãm, một ấn tượng khó phai. Để thấy ngay “phép thuật” thời trang của những chiếc đồng hồ, hôm nay Siêu Mua xin được giới thiệu đến các chàng chiếc đồng hồ Omegga dây thép với thiết kế vô cùng tinh xảo, hứa hẹn sẽ khiến các chàng phải hài lòng.', 0),
(18, 'ĐỒNG HỒ ĐÍNH ĐÁ YAQIN CAO CẤP', 'dong-ho-dinh-da-yaqin-cao-cap', 'G242', 'Đồng hồ đính đá cao cấp mang lại cho bạn vẻ ngoài sang trọng khó cưỡng với đá được đính tinh tế dọc dây đeo và trên mặt kính.', '68ad65f490383cec422d8c46cd2284e913.jpg', '175000', 1, 11, 'Đồng hồ đính đá cao cấp mang lại cho bạn vẻ ngoài sang trọng khó cưỡng với đá được đính tinh tế dọc dây đeo và trên mặt kính.\r\n\r\nTrên cùng là lớp mạ vàng trắng cao cấp và sáng bóng, cùng với thiết kế dây đeo thanh mảnh sành điệu mang lại cho bạn vẻ ngoài cực sang trọng.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide_models`
--

CREATE TABLE `slide_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_slide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_slide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide_models`
--

INSERT INTO `slide_models` (`id`, `ten_slide`, `img_slide`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'slide1', 'chicago91.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pham Viet Khanh', 'khanhdev@gmail.com', NULL, '$2y$10$TaI3wTVrvlKUTwTikoOVW.M6xPW/j2iRduR4HYztj1QfEZeJK4f5.', NULL, '2021-08-26 00:05:24', '2021-08-26 00:05:24'),
(2, 'Pham Viet Khanh 2', 'khanhdev2@gmail.com', NULL, '$2y$10$ZfI3oKjWtNiDbB0UOsOS..CXCSgDgKmvHzPNl/l46fWvjx0brV2a6', NULL, '2021-09-30 01:24:10', '2021-09-30 01:24:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbadmin_email_unique` (`email`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menutype`
--
ALTER TABLE `menutype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `modelnames`
--
ALTER TABLE `modelnames`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_card_detail`
--
ALTER TABLE `order_card_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `slide_models`
--
ALTER TABLE `slide_models`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menutype`
--
ALTER TABLE `menutype`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `modelnames`
--
ALTER TABLE `modelnames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_card_detail`
--
ALTER TABLE `order_card_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `slide_models`
--
ALTER TABLE `slide_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
