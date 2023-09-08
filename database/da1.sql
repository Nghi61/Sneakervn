-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 01:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MHD` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `delivery` enum('0','1') NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `MHD`, `name`, `phone`, `email`, `address`, `payment`, `delivery`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MHD_64fb05895389b6.81244541', 'Nguyễn Văn Nghi', '0353681506', 'nghinvps23655@fpt.edu.vn', '150/8/2 đường Văn Cao, Bến Cát Bình Dương', '0', '0', 7600000, '0', '2023-09-08 04:29:13', '2023-09-08 04:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `urlHinh` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `idUser`, `content`, `urlHinh`, `view`, `slug`, `created_at`, `updated_at`) VALUES
(1, '3 kiểu giày sneaker đáng sắm nhất mùa Thu - Đông giúp chị em F5 phong cách', 1, 'Đang cập nhật...', 'img/blog/1.jpg', 0, '3-kieu-giay-sneaker-dang-sam-nhat-mua-thu-dong-giup-chi-em-f5-phong-cach', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(2, '6 cách biến hóa đồ công sở với giày sneaker chuẩn thanh lịch và sành điệu', 1, 'Đang cập nhật...', 'img/blog/2.jpg', 0, '6-cach-bien-hoa-do-cong-so-voi-giay-sneaker-chuan-thanh-lich-va-sanh-dieu', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(3, 'Điểm danh những kiểu váy xinh yêu không thể thiếu trong vali du lịch ngày hè', 1, 'Đang cập nhật...', 'img/blog/3.png', 2, 'diem-danh-nhung-kieu-vay-xinh-yeu-khong-the-thieu-trong-vali-du-lich-ngay-he', '2023-09-08 02:49:39', '2023-09-08 03:35:28'),
(4, '4 kiểu giày sneaker \"lệch pha\" khi lên đồ, ngày Tết chị em nên lưu ý', 1, 'Đang cập nhật...', 'img/blog/4.jpg', 0, '4-kieu-giay-sneaker-lech-pha-khi-len-do-ngay-tet-chi-em-nen-luu-y', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(6, 'Công nương Kate và Meghan Markle có lúc hợp cạ nhau khi cùng yêu thích mẫu quần jeans này', 1, '<p>Meghan Markle luôn được đặt lên bàn cân so sánh với Công nương Kate. Trong khoản phong cách, Công nương Kate và Meghan Markle so kè nhau khá gắt gao. Những tưởng là \"không đội trời chung\", thế nhưng, Công nương Kate và Meghan Markle lại khá hợp cạ nhau trong khoản chọn quần jeans đó là luôn chọn kiểu lai giữa jeans ống đứng và skinny jeans.&nbsp;</p><p><img src=\"https://media.phunutoday.vn/files/content/2022/01/15/quanjean1-0744.jpg\" alt=\"Empty\"></p><p>&nbsp;</p><p><img src=\"https://media.phunutoday.vn/files/content/2022/01/15/quanjean2-0744.jpg\" alt=\"Empty\"></p><p><img src=\"https://media.phunutoday.vn/files/content/2022/01/15/quanjean3-0744.jpg\" alt=\"Empty\"></p><p><i>Kiểu&nbsp;quần jeans này mang vẻ nữ tính, yểu điệu của skinny jeans nhưng cũng toát lên sự năng động, phóng khoáng của quần ống đứng.&nbsp;Kate diện khi&nbsp;rất trẻ trung, hiện đại với bộ đôi quần jeans + áo kẻ ngang + giày sneaker, lúc lại vô cùng thanh lịch, chuẩn Hoàng như áo thun trắng + blazer + quần jeans, và áo cổ lọ + jeans đen + boots + áo khoác dáng dài. Đây là kiểu quần có thể mặc được trong nhiều hoàn cảnh, nếu cần thanh lịch thì vẫn có cách mix chuẩn chỉnh.</i></p><p><img src=\"https://media.phunutoday.vn/files/content/2022/01/15/quanjean4-0744.jpg\" alt=\"Empty\"></p><p><img src=\"https://media.phunutoday.vn/files/content/2022/01/15/quanjean3-0744.png\" alt=\"Empty\"></p><p><i>Style diện quần jeans của Meghan Markle dường như phóng khoáng hơn vì cô&nbsp;kết hợp với áo sơ mi trắng, sau đó sơ vin nửa vạt, đôi khi khoác ngoài denim jacket. Nhờ vậy, vẻ ngoài của cô trông bụi bặm, trẻ trung.&nbsp;Hoặc đôi khi&nbsp;kết hợp với blazer, hoặc diện cùng áo dáng dài, nhưng outfit vẫn có gì đó rất thoải mái, không bị cứng nhắc chút nào.</i></p><p>Kểu quần jeans yêu thích của Công nương Kate và Meghan Markle rất hợp với các chị em ngoài 30+. Mẫu quần này có sự tổng hòa giữa nét trẻ trung, và sự chỉn chu, thanh lịch.</p><p><img src=\"https://media.phunutoday.vn/files/content/2022/01/15/quanjean5-0744.jpg\" alt=\"Empty\"></p><p>Nếu kết hợp cùng các mẫu áo lịch sự như là áo len đơn giản, áo sơ mi, blouse rồi khoác ngoài blazer hoặc áo dạ dáng dài, áo trench coat… sẽ mang vẻ thanh lịch đơn giản chẳng cầu kỳ và sẽ chẳng bao giờ bị chê mặc xấu. Lý do là có thiết kế không quá ôm sát, kiểu quần jeans \"con lai\" này được đánh giá là khá dễ mặc, phù hợp cho chị em đi làm.</p><p>Cuối cùng nhưng chẳng kém phần thú vị, nhờ phom dáng gọn gàng, độ dài trên mắt cá chân, kiểu quần jeans này tôn chiều cao rất tốt, ngay cả khi chị em không sơ vin thì cũng chẳng sợ bị dìm dáng.</p>', 'img/blog/upload/cong-nuong-kate-va-meghan-markle-co-luc-hop-ca-nhau-khi-cung-yeu-thich-mau-quan-jeans-nay.jpg', 7, 'cong-nuong-kate-va-meghan-markle-co-luc-hop-ca-nhau-khi-cung-yeu-thich-mau-quan-jeans-nay', '2023-09-08 02:54:52', '2023-09-08 03:01:03'),
(7, 'Dương Mịch xứng danh \"hệ phá cách\", hết mặc váy đi cùng sneaker lại mix cùng dép nhựa', 1, '<p>Dương Mịch là một trong những mỹ nhân sở hữu phong cách thời trang thời thượng và sành điệu với nhiều mốt ấn tượng như diện áo hai lớp, mặc style&nbsp;giấu quần... Ngoài ra cô còn là&nbsp;người \"khởi xướng\" trào lưu mang sneakers cùng váy vóc điệu đà. Phong cách mang đến&nbsp;sự phá cách ấn tượng,&nbsp;giúp hội chị em thêm thoải mái nhất là với các ngôi sao đi thảm đỏ.&nbsp;</p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/05/28/duongmich-2-1007.jpg\" alt=\"Empty\"></figure><p>&nbsp;</p><p><i>Dương Mịch làm dân tình không khỏi thích thú khi mặc bên trên là&nbsp;váy áo điệu đà, bên dưới lại đi giày sneaker khỏe khoắn trẻ trung.</i></p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/05/28/duongmich-1-1007.jpg\" alt=\"Empty\"></figure><p><i>Hình ảnh vừa yểu điệu lại cá tính và dễ thương giúp Dương Mịch trông trẻ trung quá đỗi, khó ai nghĩ rằng cô nàng đã bước vào tuổi 34.&nbsp;</i></p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/05/28/duongmich-3-1007.jpg\" alt=\"Empty\"></figure><p><i>Nữ diễn viên Cung tỏa tâm ngọc cũng nổi tiếng được gọi là chuyên gia phá lệ.&nbsp;</i></p><p>Mới đây nhất, Dương Mịch tiếp tục làm dân tình ngỡ ngàng khi tạm biệt đôi sneakers để kết thân cùng một item dép bệt. Đây là đôi&nbsp;dép&nbsp;bình dân bán chạy nhất thế giới dù sở hữu&nbsp;hình dáng xù xì, thô kệch.</p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/05/28/duongmich-4-1007.jpg\" alt=\"Empty\"></figure><p><i>Xúng xính bộ váy trắng phối áo dài tay vừa thanh lịch vừa ngọt ngào, Dương Mịch chọn \"lăng xê\" đôi dép nhựa trong suốt. Dù chẳng hề mang vẻ ngoài nữ tính, song&nbsp;sự kết hợp giữa mốt dép \"xấu\" này với váy đầm điệu đà lại khá lạ mắt.</i></p><p>Nếu chị em cũng mong muốn đổi mới phong cách hàng ngày, thay thế những&nbsp;đôi giày bít chân thì dưới đây là các gợi ý mà bạn có thể tham khảo:</p><p><strong>- Dép xỏ ngón</strong></p><p>Các&nbsp;chị em sành điệu đừng nên chọn kiểu dép màu mè, hoa hoè hay có đế xốp, dây quai cao su vì dễ khiến người nhìn liên tưởng đến việc mang dép trong nhà.</p><p><strong>- Dép quai ngang</strong></p><p>Một item khác khi \"sóng đôi cùng váy đầm vô cùng hợp lí đó chính là dép quai ngang. Item này không chỉ rất nịnh chân, mà khi diện cùng váy đầm lại dễ mang đến vẻ ngoài điệu đà và sang chảnh hẳn.</p><p><strong>- Dép quai thô</strong></p><p>Dù là item quai ngang, nhưng kiểu dép này lại có phần quai dày dặn và cứng cáp hơn.&nbsp;Thiết kế này rất thoáng khí, không bị bí bức&nbsp;mà vẫn ghi điểm đẹp xịn tuyệt đối.</p>', 'img/blog/upload/duong-mich-xung-danh-he-pha-cach-het-mac-vay-di-cung-sneaker-lai-mix-cung-dep-nhua.jpg', 0, 'duong-mich-xung-danh-he-pha-cach-het-mac-vay-di-cung-sneaker-lai-mix-cung-dep-nhua', '2023-09-08 04:23:41', '2023-09-08 04:23:41'),
(8, 'Mặc váy cưới đi giày cao gót xưa rồi, giờ mix với sneaker mới chuẩn bài', 1, '<p>Quan niệm áo dài hay váy cưới đóng đinh với giày cao gót đã là điều quá dễ hiểu.&nbsp;Tuy nhiên&nbsp;những món đồ đó được kết hợp với giày sneakers - món thời trang dành riêng cho dân chơi thể thao lại đang dậy sóng mạng xã hội.&nbsp;</p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/01/28/vay-cuoi-va-giay-sneaker-1-0934.jpg\" alt=\"Empty\"></figure><p>&nbsp;</p><p><i>Cô dâu và dàn bê tráp siêu chất với mỗi người một màu áo dài riêng biệt, đặc biệt là dàn \"vệ binh\" giày sneakers tông xuyệt tông dưới chân.</i></p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/01/28/vay-cuoi-va-giay-sneaker-3-0934.jpg\" alt=\"Empty\"></figure><p><i>Trong khi nhà trai vẫn đóng thùng với quần âu và sơ mi trắng thì nhà gái lại có phần nổi bật hơn hẳn.&nbsp;</i></p><p><i>Nhìn thôi cũng đủ hiểu cô dâu và nhóm bạn thân thiết và có tình yêu với giày thể thao cuồng nhiệt đến mức nào.</i></p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/01/28/vay-cuoi-va-giay-sneaker-6-0934.jpg\" alt=\"Empty\"></figure><p><i>Cô dâu không cầu kì trong những bộ váy đồ sộ mà đơn giản trong chiếc váy 2 dây, đôi giày thể thao dưới chân được cô xách váy cao lên nhường trọn spotlight.</i></p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/01/28/vay-cuoi-va-giay-sneaker-7-0934.jpg\" alt=\"Empty\"></figure><p><i>Cô dâu chú rể mặc trang phục cưới như thường ngoại trừ đôi giày&nbsp; thấp cổ màu đỏ dưới chân. Và có lẽ chính đôi giày là thứ làm nên màu sắc mới mẻ cho tấm hình.</i></p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2021/01/28/vay-cuoi-va-giay-sneaker-8-0934.jpg\" alt=\"Empty\"></figure><p><i>Hay cặp đôi này lại kỉ niệm thời trang cưới trong mùa World Cup với mốt đi giày và tất siêu dễ thương.</i></p><p>Nếu là một tín đồ của giày đế bệt thì bạn đừng ngại mà \"quẩy\" giày sneakers vào trang phục yêu thích của mình. Tuy nhiên, bạn có thể cũng cần một số tips diện dưới đây để trông thời trang hơn.</p><h2><strong>Chọn giày tiệp màu với áo dài</strong></h2><p>Đối với những tà áo dài truyền thống có lẽ bạn nên chọn giày tiệp màu với màu của quần vì nó sẽ giúp bạn trông cao hơn và không quá chiếm sóng vẻ dẹp của chiếc áo dài.</p><p><strong>Lưu ý chọn kiểu dáng váy cưới</strong></p><p>Khi xác định đi giày sneakers để làm điểm nhấn cho trang phục cưới thì có lẽ bạn nên chọn một chiếc váy cưới có thiết kế ngắn đến gối hoặc thiết kế high-low tạo nét cá tính.</p><p><strong>Tô điểm cho các mẫu giày cưới với ren và sequin</strong></p><p>Nàng hoàn toàn có thể tô điểm thêm cho đôi giày của mình với các chi tiết cùng chất liệu mix &amp; match với váy cưới như ren và sequin để tạo thành một tổng thể liên kết.</p>', 'img/blog/upload/mac-vay-cuoi-di-giay-cao-got-xua-roi-gio-mix-voi-sneaker-moi-chuan-bai.jpg', 0, 'mac-vay-cuoi-di-giay-cao-got-xua-roi-gio-mix-voi-sneaker-moi-chuan-bai', '2023-09-08 04:25:27', '2023-09-08 04:25:27'),
(9, '5 kiểu trang phục mix với giày sneaker làm tăng thêm vẻ sành điệu cho bạn trong hè này', 1, '<p>Đối với các chị em, chọn được giày dép phù hợp sẽ giúp phong cách ngày càng nâng hạng hơn. Thậm chí bạn sẽ từ mức bình thường trở nên xịn sò hơn rất nhiều. Nhất là chị em nào mà yêu thích sneaker thì việc phối đồ sao cho vừa cá tính lại vừa nữ tính quả thực là một điều khó.&nbsp;Khi kiểu giày này được mix với 5 công thức diện đồ cơ bản sau đây của mùa hè.</p><h3><strong>1. Áo sơ mi + quần ống rộng</strong></h3><p>&nbsp;</p><p>Giày sneaker sẽ giúp hoàn thiện set đồ vốn tưởng là quá cứng nhắc như áo sơ mi và quần ống rộng. Chúng ta sẽ thường xuyên thấy combo này ngoài đường vì càng ngày phong cách này càng phổ biến. Hơn nữa, mix hai món đồ này thể hiện sự phóng khoáng, thanh lịch, giúp tổng thể style của bạn trông hút mắt, ấn tượng hơn.</p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2020/06/30/88458001157477-15934277284981814212526-2106.jpg\" alt=\"Empty\"></figure><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2020/06/30/921417852103-1593427728503633250910-2106.jpg\" alt=\"Empty\"></figure><p>&nbsp;<strong>2. Váy dáng dài</strong></p><p>Hãy từ bỏ quan niệm rằng váy thì không thể đi với giày thể thao nhé, nếu không bạn sẽ không bao giờ có thể sành điệu được đâu. Rất nhiều tín đồ thời trang nổi tiếng đã áp dụng công thức váy dài và sneaker rồi đó và hiệu quả vô cùng bất ngờ.&nbsp;Cách mix này tạo nên những set trang phục thú vị và \"ăn chơi\" hết cỡ nhưng vẫn giữ được vẻ nữ tính, bay bổng.&nbsp;</p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2020/06/30/10144582328810051652818857505743406450356426n-15934277460011876383682-2106.jpg\" alt=\"Empty\"></figure><h3><strong>3. Muôn kiểu áo + chân váy suông</strong></h3><p>Để có được vẻ ngoài tinh tế, thanh lịch, bạn hãy thử mix chân váy suông với áo sơ mi, áo blouse. Bạn sẽ trở nên phóng khoáng hơn rất nhiều nếu diện thêm đôi sneaker trắng hoặc màu sắc, họa tiết. Những items mang phong cách&nbsp;trẻ trung, năng động và điểm sành điệu cũng tăng mạnh cho cá tính của bạn. Lưu ý là bạn nên quan tâm đến màu sắc và cách phối nhé, ví dụ chân váy màu tối đi cùng giày màu trắng, chân váy sáng màu đi cùng giày tối chẳng hạn.&nbsp;</p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2020/06/30/060809t221-1593427772860299137710-2106.jpg\" alt=\"Empty\"></figure><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2020/06/30/9394228629350889399432652987289119753228543n-15934277729031845355601-2106.jpg\" alt=\"Empty\"></figure><h3><strong>4. Áo thun + quần jeans</strong></h3><p>Đây là item vô cùng quen thuộc&nbsp;tuy nhiên vì quá phổ biến và&nbsp;dễ mix nên đôi khi&nbsp;chị em rất dễ trở nên mờ nhạt khi lên đồ với công thức basic này. Vẫn có cách để vẻ ngoài trở nên ấn tượng, xịn mịn hơn và đó chính là kết lại set đồ bằng một đôi sneaker.</p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2020/06/30/82565250176132513797-15934277970661263310454-2106.jpg\" alt=\"Empty\"></figure><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2020/06/30/021804tp117-1593427797034750089524-2105.jpg\" alt=\"Empty\"></figure><h3><strong>5. Váy hai dây</strong></h3><p>Nhiều nàng nghĩ rằng những items nữ tính, nhẹ nhàng như váy hai dây thì nên được mix với những kiểu giày cũng nhu mì không kém. Tuy nhiên, hãy thử một vài lần ghép cặp váy hai dây với giày sneaker xem, bạn sẽ thấy mình trở nên mới mẻ hơn. Những chiếc váy hai dây mang đến cảm giác gợi cảm, phóng khoáng cùng với giày sneaker mang cảm giác trẻ trung sẽ hoàn thiện phong cách của bạn. Bạn hoàn toàn có thể diện đi chơi và đi làm tùy ý.&nbsp;</p><figure class=\"image\"><img src=\"https://media.phunutoday.vn/files/content/2020/06/30/060811tp111-1593427813155480165162-2107.jpg\" alt=\"060811tp111-1593427813155480165162\"></figure>', 'img/blog/upload/5-kieu-trang-phuc-mix-voi-giay-sneaker-lam-tang-them-ve-sanh-dieu-cho-ban-trong-he-nay.jpg', 0, '5-kieu-trang-phuc-mix-voi-giay-sneaker-lam-tang-them-ve-sanh-dieu-cho-ban-trong-he-nay', '2023-09-08 04:27:55', '2023-09-08 04:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `urlHinh` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `idBill` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `ProductName`, `Price`, `urlHinh`, `size`, `quantity`, `idBill`, `created_at`, `updated_at`) VALUES
(1, 'GIÀY TRAE YOUNG 1', 3800000, 'img/products/upload/GIÀY TRAE YOUNG 1.jpg', 40, 2, 1, '2023-09-08 04:29:13', '2023-09-08 04:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Không xác định', 'khong-xac-dinh', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(2, 'Original', 'original', '2023-09-08 02:49:39', '2023-09-08 03:51:59'),
(3, 'Bóng đá', 'bong-da', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(4, 'Chạy', 'Chạy', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(5, 'Tập luyện', 'tap-luyen', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(6, 'Essentials', 'essentials', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(7, 'Ngoài trời', 'ngoai-troi', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(8, 'Bóng rổ', 'bong-ro', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(9, 'Tennis', 'tennis', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(10, 'Nam', 'nam', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(11, 'Nữ', 'nu', '2023-09-08 02:49:39', '2023-09-08 02:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments_blog`
--

CREATE TABLE `comments_blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idBlog` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `idUser` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments_blog`
--

INSERT INTO `comments_blog` (`id`, `idBlog`, `content`, `idUser`, `created_at`, `updated_at`) VALUES
(1, 3, 'Mọi người nhớ chưa', '1', '2023-09-08 03:33:22', '2023-09-08 03:33:22'),
(2, 3, 'Hay quá', '1', '2023-09-08 03:35:37', '2023-09-08 03:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `comments_product`
--

CREATE TABLE `comments_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idProduct` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `idUser` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments_product`
--

INSERT INTO `comments_product` (`id`, `idProduct`, `content`, `idUser`, `created_at`, `updated_at`) VALUES
(1, 2, 'Mọi người ủng hộ shop nha', '1', '2023-09-08 03:32:39', '2023-09-08 03:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(472, '2014_10_12_000000_create_users_table', 1),
(473, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(474, '2019_08_19_000000_create_failed_jobs_table', 1),
(475, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(476, '2023_07_31_112119_create_categories_table', 1),
(477, '2023_07_31_112952_create_sizes_table', 1),
(478, '2023_07_31_113026_create_products_table', 1),
(479, '2023_07_31_113129_create_product_gallery_table', 1),
(480, '2023_08_21_150715_create_product_categories_table', 1),
(481, '2023_08_25_155612_create_comments_product', 1),
(482, '2023_09_01_000821_create_bill_table', 1),
(483, '2023_09_01_000845_create_cart_table', 1),
(484, '2023_09_02_233117_create_contract_table', 1),
(485, '2023_09_06_113654_create_blog_table', 1),
(486, '2023_09_06_114414_create_comments_blog_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `urlHinh` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `sale`, `quantity`, `urlHinh`, `view`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Giày Reponse CL 2', '<p>ĐÔI GIÀY TRAINER PHONG CÁCH OUTDOOR VỚI THIẾT KẾ BỤI BẶM. Phong cách sẵn sàng cho tất cả. Đôi Giày adidas Response CL này có kết cấu mô phỏng giày chạy trail. Đế giữa siêu nhẹ và mềm mại giúp bạn luôn thoải mái suốt những bữa tiệc nấu ngoài trời kéo dài nhất. Bởi ra ngoài đâu có nghĩa là phải đau đầu suy nghĩ?</p>', 3300000, 3000000, 100, 'img/products/Giày Reponse CL/1.jpg', 0, 'giay-reponse-cl-2', '2023-09-08 02:49:39', '2023-09-08 03:52:15'),
(2, 'Giày Hanball Spezial', '', 2700000, 2500000, 100, 'img/products/Giày Hanball Spezial/1.jpg', 1, 'giay-hanball-spezial', '2023-09-08 02:49:39', '2023-09-08 03:32:10'),
(3, 'Giày Supertar XLG', 'ĐÔI GIÀY TRAINER CLASSIC PHIÊN BẢN MỚI VỚI CÁC CHI TIẾT ĐƯƠNG ĐẠI.\n            Tưởng rằng giày adidas Superstar không thể nào táo bạo hơn nữa, nhưng phiên bản này phóng đại mẫu giày trainer classic thập niên 70 tạo nên phong cách thời trang hiện đại. Tỷ lệ thiết kế oversize và cá tính mạnh mẽ không kém thể hiện rõ ràng qua 3 Sọc răng cưa biểu tượng. Thân giày hoàn toàn bằng da trung thành với chất vintage, đồng thời biến hóa kiểu dáng cho phong cách mới mẻ. Tự tin sải bước khi đã có mũi giày vỏ sò dẫn lối.', 3000000, 3000000, 100, 'img/products/Giày Supertar XLG/1.jpg', 0, 'giay-supertar-xlg', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(4, 'Giày Adiform Climacool', '', 2600000, 2500000, 100, 'img/products/Giày Adiform Climacool/1.jpg', 0, 'giay-adiform-climacool', '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(5, 'GIÀY X_PLRPHASE', '<h3>ĐÔI GIÀY HOÀN TRẢ NĂNG LƯỢNG CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.</h3><p>Hãy để lớp đệm siêu mềm mại của đôi giày adidas này là lời nhắc bạn ra ngoài hít thở không khí trong lành. Dạo bước ngoài công viên. Đi bộ về văn phòng. Đôi giày này có thiết kế giúp bạn di chuyển thoải mái và dễ chịu. Với đế giữa BOOST và Bounce, từng sải bước đều thật nhẹ nhàng. Làm từ một loạt chất liệu tái chế, thân giày có chứa tối thiểu 50% thành phần tái chế.</p>', 2500000, 2300000, 80, 'img/blog/upload/GIÀY X_PLRPHASE.jpg', 0, 'giay-x-plrphase', '2023-09-08 03:58:14', '2023-09-08 04:14:57'),
(6, 'GIÀY AVRYN', '<h3>ĐÔI GIÀY MANG CẢM HỨNG NGHỆ THUẬT THỦ CÔNG, CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.</h3><p>Lấy cảm hứng từ nghệ thuật xếp giấy origami, đôi giày adidas này mang đến vẻ đẹp cho mọi góc cạnh và hình dáng. Kết hợp bề mặt sần và kiểu dáng thanh thoát, mẫu giày này mang đến vẻ ngoài thanh lịch mà casual tương ứng với phong cách hàng ngày của bạn. Với đế giữa kết hợp đệm BOOST và Bounce, bạn sẽ có được cảm giác êm ái vượt trội hệt như đang nhẹ bước trên mây. Làm từ một nhóm chất liệu tái chế, thân giày có chứa tối thiểu 50% thành phần tái chế. Sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.</p>', 3800000, 3230000, 120, 'img/products/upload/GIÀY AVRYN.jpg', 0, 'giay-avryn', '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(7, 'GIÀY TRAINER DROPSET 2', '<h3>ĐÔI GIÀY DÀNH CHO TẬP LUYỆN THỂ LỰC, CÓ SỬ DỤNG CHẤT LIỆU TÁI CHẾ.</h3><p>Cảm giác của thanh tạ đòn trên tay, âm thanh các đĩa tạ va vào nhau, tiếng chuông báo hiệu kỷ lục mới đạt được. Chẳng gì sánh bằng một buổi nâng tạ thành công, và đôi giày tập luyện adidas này mang đến cho bạn phong độ vượt trội trong các buổi tập rèn luyện sức mạnh. Đế giữa chênh lệch độ cao 6 mm tạo nền tảng bằng phẳng và ổn định, giúp bạn căn chỉnh đúng tư thế mỗi lần nâng tạ. Đế giữa mật độ kép mang lại cảm giác thoải mái và ổn định có kiểm soát, cùng đế ngoài Traxion siêu bám cho bạn thế đứng vững chãi. Làm từ một loạt chất liệu tái chế, thân giày có chứa tối thiểu 50% thành phần tái chế. Sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.</p>', 3500000, NULL, 80, 'img/products/upload/GIÀY TRAINER DROPSET 2.jpg', 0, 'giay-trainer-dropset-2', '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(8, 'GIÀY TRAE YOUNG 1', '<h3>ĐÔI GIÀY BÓNG RỔ CÓ DÂY GIÀY BÁN PHẦN CHO CẢM GIÁC SIÊU NHẸ.</h3><p>Trae Young ngày càng tiến bộ hơn qua mỗi mùa và bây giờ là lúc để bạn làm điều tương tự. Đôi giày bóng rổ adidas này làm từ chất liệu siêu nhẹ cho cảm giác mềm mại và thoải mái, không hề trĩu nặng khi bạn thử thách kỹ năng. Đế giữa Lightstrike và BOOST hoàn trả năng lượng trong từng cú nhảy và cắt bóng, cùng đế ngoài bằng cao su siêu bám tạo điểm tựa vững chãi trong những cú bứt tốc dọc sân.</p>', 3800000, 3600000, 100, 'img/products/upload/GIÀY TRAE YOUNG 1.jpg', 1, 'giay-trae-young-1', '2023-09-08 04:12:06', '2023-09-08 04:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idProduct` bigint(20) UNSIGNED NOT NULL,
  `idCategories` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `idProduct`, `idCategories`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(2, 1, 10, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(3, 2, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(4, 2, 10, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(5, 3, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(6, 3, 10, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(7, 4, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(8, 4, 11, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(9, 5, 4, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(10, 5, 11, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(11, 6, 2, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(12, 6, 11, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(13, 7, 5, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(14, 7, 11, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(15, 8, 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06'),
(16, 8, 10, '2023-09-08 04:12:06', '2023-09-08 04:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `urlHinh` varchar(255) NOT NULL,
  `idProduct` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `name`, `urlHinh`, `idProduct`, `created_at`, `updated_at`) VALUES
(1, 'Giày Reponse CL - ảnh 2', 'img/products/Giày Reponse CL/2.jpg', 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(2, 'Giày Reponse CL - ảnh 3', 'img/products/Giày Reponse CL/3.jpg', 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(3, 'Giày Reponse CL - ảnh 4', 'img/products/Giày Reponse CL/4.jpg', 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(4, 'Giày Hanball Spezial - ảnh 2', 'img/products/Giày Hanball Spezial/2.jpg', 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(5, 'Giày Hanball Spezial - ảnh 3', 'img/products/Giày Hanball Spezial/3.jpg', 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(6, 'Giày Hanball Spezial - ảnh 4', 'img/products/Giày Hanball Spezial/4.jpg', 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(7, 'Giày Supertar XLG - ảnh 2', 'img/products/Giày Supertar XLG/2.jpg', 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(8, 'Giày Supertar XLG - ảnh 3', 'img/products/Giày Supertar XLG/3.jpg', 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(9, 'Giày Supertar XLG - ảnh 4', 'img/products/Giày Supertar XLG/4.jpg', 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(10, 'Giày Adiform Climacool - ảnh 2', 'img/products/Giày Adiform Climacool/2.jpg', 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(11, 'Giày Adiform Climacool - ảnh 3', 'img/products/Giày Adiform Climacool/3.jpg', 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(12, 'Giày Adiform Climacool - ảnh 4', 'img/products/Giày Adiform Climacool/4.jpg', 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(13, 'GIÀY X_PLRPHASE.2', 'img/products/upload/GIÀY X_PLRPHASE.2.jpg', 5, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(14, 'GIÀY X_PLRPHASE.3', 'img/products/upload/GIÀY X_PLRPHASE.3.jpg', 5, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(15, 'GIÀY X_PLRPHASE.4', 'img/products/upload/GIÀY X_PLRPHASE.4.jpg', 5, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(16, 'GIÀY AVRYN.2', 'img/products/upload/GIÀY AVRYN.2.jpg', 6, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(17, 'GIÀY AVRYN.3', 'img/products/upload/GIÀY AVRYN.3.jpg', 6, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(18, 'GIÀY AVRYN.4', 'img/products/upload/GIÀY AVRYN.4.jpg', 6, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(19, 'GIÀY TRAINER DROPSET 2.2', 'img/products/upload/GIÀY TRAINER DROPSET 2.2.jpg', 7, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(20, 'GIÀY TRAINER DROPSET 2.3', 'img/products/upload/GIÀY TRAINER DROPSET 2.3.jpg', 7, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(21, 'GIÀY TRAINER DROPSET 2.4', 'img/products/upload/GIÀY TRAINER DROPSET 2.4.jpg', 7, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(22, 'GIÀY TRAE YOUNG 1.2', 'img/products/upload/GIÀY TRAE YOUNG 1.2.jpg', 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06'),
(23, 'GIÀY TRAE YOUNG 1.3', 'img/products/upload/GIÀY TRAE YOUNG 1.3.jpg', 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06'),
(24, 'GIÀY TRAE YOUNG 1.4', 'img/products/upload/GIÀY TRAE YOUNG 1.4.jpg', 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `idProduct` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `quantity`, `idProduct`, `created_at`, `updated_at`) VALUES
(1, 39, 10, 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(2, 40, 10, 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(3, 41, 20, 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(4, 42, 20, 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(5, 43, 10, 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(6, 44, 20, 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(7, 45, 10, 1, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(8, 39, 10, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(9, 40, 10, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(10, 41, 20, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(11, 42, 20, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(12, 43, 10, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(13, 44, 20, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(14, 45, 10, 2, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(15, 39, 10, 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(16, 40, 10, 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(17, 41, 20, 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(18, 42, 20, 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(19, 43, 10, 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(20, 44, 20, 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(21, 45, 10, 3, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(22, 39, 10, 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(23, 40, 10, 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(24, 41, 20, 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(25, 42, 20, 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(26, 43, 10, 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(27, 44, 20, 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(28, 45, 10, 4, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(29, 39, 10, 5, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(30, 40, 30, 5, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(31, 41, 20, 5, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(32, 42, 10, 5, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(33, 43, 10, 5, '2023-09-08 03:58:14', '2023-09-08 03:58:14'),
(34, 39, 20, 6, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(35, 40, 20, 6, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(36, 41, 30, 6, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(37, 42, 20, 6, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(38, 43, 30, 6, '2023-09-08 04:02:30', '2023-09-08 04:02:30'),
(39, 39, 20, 7, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(40, 40, 20, 7, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(41, 41, 20, 7, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(42, 42, 10, 7, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(43, 43, 10, 7, '2023-09-08 04:06:55', '2023-09-08 04:06:55'),
(44, 39, 10, 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06'),
(45, 40, 10, 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06'),
(46, 41, 20, 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06'),
(47, 42, 40, 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06'),
(48, 43, 20, 8, '2023-09-08 04:12:06', '2023-09-08 04:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('0','1') NOT NULL DEFAULT '1',
  `phone` char(10) DEFAULT NULL,
  `gender` enum('0','1') NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `gender`, `avatar`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Nghi', 'nghinvps23655@fpt.edu.vn', NULL, '$2y$10$w/PLeFDcgTBSOM43qt8sWuEXSpuoyRpTHM4WRjoo9ueJg9lGCWkt2', '0', '0353681506', '0', 'img/avatar/1_carousel.jpg', '2003-11-10', NULL, '2023-09-08 02:49:39', '2023-09-08 02:49:39'),
(3, 'Nguyễn Huy Thiện', 'thien@gmail.com', NULL, '$2y$10$mjX5NYqj3RQCqQ6nntAj1urN6qmD7UQ7HDSNaNDU2cea.u8MRPxZK', '1', '0741852963', '0', 'img/avatar/Nguyễn Huy Thiện.jpg', '2023-09-08', NULL, '2023-09-08 03:48:05', '2023-09-08 03:48:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_blog`
--
ALTER TABLE `comments_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_product`
--
ALTER TABLE `comments_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments_blog`
--
ALTER TABLE `comments_blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments_product`
--
ALTER TABLE `comments_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
