-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for hmisphp
CREATE DATABASE IF NOT EXISTS `hmisphp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hmisphp`;

-- Dumping structure for table hmisphp.his_accounts
CREATE TABLE IF NOT EXISTS `his_accounts` (
  `acc_id` int NOT NULL AUTO_INCREMENT,
  `acc_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `acc_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_amount` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_accounts: ~8 rows (approximately)
INSERT INTO `his_accounts` (`acc_id`, `acc_name`, `acc_desc`, `acc_type`, `acc_number`, `acc_amount`) VALUES
	(6, 'Bùi Kim Đạt ', '<p>tải khoản của đạt, nợ nần chồng chất&nbsp;</p>', 'Tài khoản phải trả', '154380726', '1000'),
	(7, 'BioHealth Ltd', '<p>trả tiền mua thuốc cho c&ocirc;ng ty&nbsp;BioHealth Ltd&nbsp;</p>', 'Tài khoản phải trả', '016978425', '1000'),
	(8, 'DP Việt Nhật', '<p>trả tiền mua thuốc cho c&ocirc;ng ty DP việt nhật</p>', 'Tài khoản phải trả', '805743196', '1000'),
	(9, 'Delta Pharma Co T8', '<p>chi trả tiền mua thuốc cho c&ocirc;ng ty&nbsp;Delta Pharma Co. trong th&aacute;ng 8</p><p>&nbsp;</p>', 'Tài khoản phải trả', '208349516', '100000'),
	(10, 'Thu Viện phí', '<p>tiền thu viện ph&iacute; của bệnh nh&acirc;n chuyển v&agrave;o đ&acirc;y&nbsp;</p><p>&nbsp;</p>', 'Tài khoản nhận tiền', '745908162', '100000'),
	(11, 'bán thuốc ', '<p>t&agrave;i khoản nhận tiền b&aacute;n thuốc</p>', 'Tài khoản nhận tiền', '236914085', '6000'),
	(12, 'chi phí khấu hao', '<p>mua c&aacute;c vật tư khấu hao kh&aacute;c</p>', 'Tài khoản phải trả', '638724059', '2000'),
	(13, 'tiền bôi trơn ', '<p>chỉ để nhận tiền của bệnh nh&acirc;n&nbsp;</p>', 'Tài khoản nhận tiền', '708315269', '1000000');

-- Dumping structure for table hmisphp.his_admin
CREATE TABLE IF NOT EXISTS `his_admin` (
  `ad_id` int NOT NULL AUTO_INCREMENT,
  `ad_fname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_lname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_pwd` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_dpic` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_admin: ~0 rows (approximately)
INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
	(1, 'System', 'Administrator', 'admin@mail.com', '4c7f5919e957f354d57243d37f223cf31e9e7181', 'doc-icon.png');

-- Dumping structure for table hmisphp.his_docs
CREATE TABLE IF NOT EXISTS `his_docs` (
  `doc_id` int NOT NULL AUTO_INCREMENT,
  `doc_fname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_lname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_pwd` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_dept` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_dpic` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_docs: ~8 rows (approximately)
INSERT INTO `his_docs` (`doc_id`, `doc_fname`, `doc_lname`, `doc_email`, `doc_pwd`, `doc_dept`, `doc_number`, `doc_dpic`) VALUES
	(4, 'Nguyễn Hoàng', 'Anh', 'anhemhucau@gmail.com', '3331ef9171f5f01beecbd9ece98986fce20b0a4d', 'Đăng ký bệnh nhân', 'XBKT9', 'hoang anh.jpg'),
	(6, 'Bùi Quang', 'Khải', 'khai@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Phẫu thuật | Phòng mổ', '3TGC9', 'Khai.png'),
	(7, 'Bùi Kim', 'Đạt', 'dat@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Kế toán', '9KT6J', 'buiKimDat.png'),
	(8, 'Nguyễn Hương', 'Thảo', 'thao@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Phẫu thuật | Phòng mổ', 'G1KE2', 'huongThao.png'),
	(19, 'Trần Diệu', 'Linh', 'linh@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Kế toán', 'LD0BR', 'DieuLinh.png'),
	(23, 'Trần văn ', 'Bảo ', 'VanBaoTran@mail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Dược', 'WEPL0', 'Vanbao.png'),
	(26, 'Âu', 'Xuân Mạnh', 'manhSan@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Xét nghiệm', 'XQJI5', 'XuanManh.png'),
	(27, 'Trương ', 'Nam', 'namusan@mail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'Xét nghiệm', 'F6AB3', 'Nam.png');

-- Dumping structure for table hmisphp.his_equipments
CREATE TABLE IF NOT EXISTS `his_equipments` (
  `eqp_id` int NOT NULL AUTO_INCREMENT,
  `eqp_code` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eqp_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eqp_vendor` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eqp_desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `eqp_dept` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eqp_status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eqp_qty` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`eqp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_equipments: ~22 rows (approximately)
INSERT INTO `his_equipments` (`eqp_id`, `eqp_code`, `eqp_name`, `eqp_vendor`, `eqp_desc`, `eqp_dept`, `eqp_status`, `eqp_qty`) VALUES
	(4, '724519308', 'Dao mổ phẫu thuật', 'Medline Industries', '<p>Dụng cụ phẫu thuật sắc b&eacute;n, d&ugrave;ng để rạch da v&agrave; m&ocirc; trong c&aacute;c ca phẫu thuật.</p>', 'phòng mổ', 'Hoạt động bình thường', '50'),
	(5, '836041927', 'Găng tay vô trùng', 'Ansell Healthcare', '<p>Găng tay y tế d&ugrave;ng một lần, đảm bảo v&ocirc; tr&ugrave;ng, chống dị ứng, ph&ugrave; hợp cho phẫu thuật v&agrave; kh&aacute;m bệnh.</p>', 'phòng mổ', 'Hoạt động bình thường', '200'),
	(6, '096573841', 'Máy đo huyết áp', 'Omron Healthcare', '<p>Thiết bị đo huyết &aacute;p điện tử tự động, cho kết quả ch&iacute;nh x&aacute;c, dễ sử dụng tại nh&agrave; hoặc bệnh viện.</p><p>&nbsp;</p>', 'phòng mổ', 'Hoạt động bình thường', '15'),
	(7, '697841325', 'Khẩu trang phẫu thuật', '3M Health Care', '<p>Khẩu trang y tế 3 lớp, ngăn giọt bắn, bụi mịn v&agrave; vi khuẩn, d&ugrave;ng cho nh&acirc;n vi&ecirc;n y tế v&agrave; bệnh nh&acirc;n.</p>', 'phòng mổ', 'Hoạt động bình thường', '300'),
	(8, '518297603', 'Máy sốc tim (Defibrillator)', 'Philips Healthcare', '<p>Thiết bị cấp cứu d&ugrave;ng để sốc điện kh&ocirc;i phục nhịp tim trong trường hợp rung thất hoặc ngừng tim.</p>', 'phòng mổ', 'Hoạt động bình thường', '5'),
	(9, '276350198', 'Bơm tiêm điện', 'B. Braun Medical', '<p>Thiết bị truyền dịch hoặc thuốc ch&iacute;nh x&aacute;c theo liều lượng c&agrave;i đặt, d&ugrave;ng trong ICU hoặc ph&ograve;ng mổ.</p>', 'phòng mổ', 'Hoạt động bình thường', '20'),
	(10, '239816745', 'Máy điện tim (ECG)', 'GE Healthcare', '<p>M&aacute;y ghi lại hoạt động điện tim, chẩn đo&aacute;n c&aacute;c bệnh l&yacute; tim mạch như rối loạn nhịp, nhồi m&aacute;u cơ tim.</p>', 'phòng mổ', 'Hoạt động bình thường', '8'),
	(11, '759068132', 'Kẹp phẫu thuật (Forceps)', 'Becton Dickinson', '<p>Dụng cụ cầm nắm m&ocirc; hoặc gạc trong phẫu thuật, chất liệu th&eacute;p kh&ocirc;ng gỉ, c&oacute; thể t&aacute;i tiệt tr&ugrave;ng.</p>', 'phòng mổ', 'Hoạt động bình thường', '30'),
	(12, '329706851', 'Bộ dây truyền dịch', 'Baxter International', '<p>Hệ thống d&acirc;y truyền dịch v&ocirc; tr&ugrave;ng, kết nối với chai dịch v&agrave; kim ti&ecirc;m, d&ugrave;ng trong truyền nước/biệt dược.</p>', 'phòng mổ', 'Hoạt động bình thường', '100'),
	(13, '619423705', 'Máy siêu âm', 'Siemens Healthineers', '<p>Thiết bị chẩn đo&aacute;n h&igrave;nh ảnh sử dụng s&oacute;ng si&ecirc;u &acirc;m để quan s&aacute;t cấu tr&uacute;c nội tạng, thai nhi hoặc mạch m&aacute;u.</p>', 'phòng mổ', 'Hoạt động bình thường', '10'),
	(14, '243186975', 'Máy ly tâm', 'Eppendorf', '<p>Thiết bị d&ugrave;ng để t&aacute;ch c&aacute;c th&agrave;nh phần trong mẫu m&aacute;u hoặc dung dịch sinh học dựa tr&ecirc;n lực ly t&acirc;m, tốc độ cao c&oacute; thể điều chỉnh.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '10'),
	(15, '456819037', 'Máy phân tích huyết học', 'Sysmex', '<p>Tự động đếm tế b&agrave;o m&aacute;u (hồng cầu, bạch cầu, tiểu cầu) v&agrave; ph&acirc;n t&iacute;ch c&aacute;c chỉ số huyết học từ mẫu m&aacute;u to&agrave;n phần.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '5'),
	(16, '487056321', 'Máy PCR', 'Thermo Fisher Scientific', '<p>Thiết bị khuếch đại DNA/RNA bằng phản ứng chuỗi polymerase (PCR), ứng dụng trong chẩn đo&aacute;n bệnh truyền nhiễm, di truyền.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '8'),
	(17, '390586721', 'Tủ cấy vi sinh', 'Labconco', '<p>Tủ c&oacute; hệ thống lọc kh&iacute; v&ocirc; tr&ugrave;ng, đảm bảo m&ocirc;i trường kh&ocirc;ng nhiễm khuẩn khi cấy mẫu vi sinh hoặc tế b&agrave;o.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '4'),
	(18, '705243169', 'Máy sinh hóa tự động', 'Roche Diagnostics', '<p>Ph&acirc;n t&iacute;ch tự động c&aacute;c chỉ số sinh h&oacute;a (glucose, cholesterol, men gan&hellip;) từ mẫu huyết thanh hoặc nước tiểu.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '10'),
	(19, '953846702', 'Bể cách thủy', 'Memmert', '<p>Duy tr&igrave; nhiệt độ ổn định để ủ mẫu, phản ứng h&oacute;a học hoặc nhuộm ti&ecirc;u bản, nhiệt độ điều chỉnh từ 25&deg;C &ndash; 100&deg;C.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '12'),
	(20, '325741098', 'Máy đo quang phổ UV-Vis', 'Shimadzu', '<p>&nbsp;Đo nồng độ chất h&oacute;a học dựa tr&ecirc;n hấp thụ &aacute;nh s&aacute;ng, ứng dụng trong định lượng protein, DNA, hoặc thuốc.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '3'),
	(21, '126304879', 'Hệ thống pipet tự động', 'Gilson', '<p>Pipet b&aacute;n tự động với khả năng h&uacute;t v&agrave; nhả ch&iacute;nh x&aacute;c thể t&iacute;ch mẫu (từ 0.1&micro;l &ndash; 1000&micro;l), giảm sai số thao t&aacute;c.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '15'),
	(22, '108596327', 'Tủ đông -80°C', ' Thermo Scientific', '<p>Bảo quản d&agrave;i hạn mẫu sinh học (m&aacute;u, DNA, vi khuẩn) ở nhiệt độ cực thấp, ngăn ngừa ph&acirc;n hủy.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '2'),
	(23, '275638190', 'Máy điện di', 'Bio-Rad', '<p>T&aacute;ch c&aacute;c ph&acirc;n tử DNA, RNA hoặc protein dựa tr&ecirc;n k&iacute;ch thước v&agrave; điện t&iacute;ch, sử dụng gel agarose hoặc polyacrylamide.</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '7'),
	(24, '140576892', 'Bơm tiêm điện loại 2', 'Medline Industries', '<p>bơm ti&ecirc;m điện</p>', 'Phòng xét nghiệm', 'Hoạt động bình thường', '11'),
	(30, '257104983', 'Dao mổ phẫu thuật', 'dágsdgsdfg', '<p>dsyhyearrhse</p>', 'phòng mổ', 'Hoạt động bình thường', '111');

-- Dumping structure for table hmisphp.his_laboratory
CREATE TABLE IF NOT EXISTS `his_laboratory` (
  `lab_id` int NOT NULL AUTO_INCREMENT,
  `lab_pat_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_pat_ailment` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_pat_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_pat_tests` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lab_pat_results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lab_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_date_rec` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_laboratory: ~7 rows (approximately)
INSERT INTO `his_laboratory` (`lab_id`, `lab_pat_name`, `lab_pat_ailment`, `lab_pat_number`, `lab_pat_tests`, `lab_pat_results`, `lab_number`, `lab_date_rec`) VALUES
	(6, 'Võ Minh   Tuấn  ', 'Viêm gan B mạn tính(ALT 120 UI/L, đang điều trị Entecavir)  ', '1N7IJ', '<p><strong>X&Eacute;T NGHIỆM Đ&Aacute;NH GI&Aacute; CHỨC NĂNG GAN</strong></p>', '<p>-----------------------------------------------<br />| Chỉ số &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | Kết quả &nbsp; | Ngưỡng &nbsp; &nbsp;|<br />-----------------------------------------------<br />| ALT (GPT) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | 120 UI/L &nbsp;| &lt; 40 UI/L |<br />| AST (GOT) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | 85 UI/L &nbsp; | &lt; 40 UI/L |<br />| Bilirubin to&agrave;n phần | 1.2 mg/dL | &lt; 1.2 mg/dL |<br />| Albumin &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | 4.0 g/dL &nbsp;| 3.5-5.0 g/dL |<br />| INR &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | 1.1 &nbsp; &nbsp; &nbsp; | 0.8-1.2 &nbsp; &nbsp;|<br />-----------------------------------------------</p><p><strong>B&aacute;c sĩ kết luận:</strong></p><ul><li><p>Vi&ecirc;m gan B mạn, đang ức chế virus th&agrave;nh c&ocirc;ng.</p></li><li><p>Cần theo d&otilde;i l&acirc;u d&agrave;i nguy cơ xơ gan.</p></li></ul>', 'EM65R', '2025-05-27 10:16:57'),
	(7, 'Phạm Đức   Anh', 'Nhồi máu cơ tim nhẹ(Đau ngực trái lan vai, Troponin T dương tính)  ', 'HPTB5', '<p>x&eacute;t nghiệm nước tiểu&nbsp;</p><p>&nbsp;</p>', '<p><strong>KẾT QUẢ X&Eacute;T NGHIỆM NƯỚC TIỂU &nbsp;<br />Mẫu nghiệm: Nước tiểu tự nhi&ecirc;n &nbsp;<br />Thời gian: [Ng&agrave;y/giờ lấy mẫu] &nbsp;</strong></p><p><strong>----------------------------------------------- &nbsp;<br />| Chỉ số &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | Kết quả &nbsp; &nbsp;| B&igrave;nh thường &nbsp;| &nbsp;<br />----------------------------------------------- &nbsp;<br />| M&agrave;u sắc &nbsp; &nbsp; &nbsp; &nbsp; | V&agrave;ng nhạt | V&agrave;ng nhạt &nbsp; | &nbsp;<br />| Độ trong &nbsp; &nbsp; &nbsp; | Trong &nbsp; &nbsp; &nbsp;| Trong &nbsp; &nbsp; &nbsp; &nbsp;| &nbsp;<br />| Tỷ trọng &nbsp; &nbsp; &nbsp;| 1.015 &nbsp; &nbsp; &nbsp;| 1.005-1.030 | &nbsp;<br />| pH &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | 6.0 &nbsp; &nbsp; &nbsp; &nbsp;| 4.6-8.0 &nbsp; &nbsp; | &nbsp;<br />| Protein &nbsp; &nbsp; &nbsp; | &Acirc;m t&iacute;nh &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp; | &nbsp;<br />| Glucose &nbsp; &nbsp; &nbsp; | &Acirc;m t&iacute;nh &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp; | &nbsp;<br />| Ketones &nbsp; &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp; | &nbsp;<br />| Hồng cầu &nbsp; &nbsp; | &Acirc;m t&iacute;nh &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp; | &nbsp;<br />| Bạch cầu &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp; | &nbsp;<br />| Nitrite &nbsp; &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp;| &Acirc;m t&iacute;nh &nbsp; &nbsp; | &nbsp;<br />| Vi khuẩn &nbsp; &nbsp;| Kh&ocirc;ng &nbsp; &nbsp; &nbsp;| Kh&ocirc;ng &nbsp; &nbsp; &nbsp; | &nbsp;<br />----------------------------------------------- &nbsp;</strong></p><p><strong>Kết luận: &nbsp;<br />- Kết quả trong giới hạn b&igrave;nh thường &nbsp;<br />- Kh&ocirc;ng ph&aacute;t hiện bất thường &nbsp;</strong></p>', '57CG2', '2025-05-27 10:09:24'),
	(8, 'Vũ Thị   Hằng', 'Viêm phổi do vi khuẩn(Sốt cao 39°C, đờm xanh, X-quang tổn thương thùy dưới phổi P)  ', 'E81XZ', '<p><strong>X&Eacute;T NGHIỆM CẬN L&Acirc;M S&Agrave;NG</strong></p>', '<p>-----------------------------------------------<br />| **X&eacute;t nghiệm** &nbsp; &nbsp; &nbsp; | **Kết quả** &nbsp; &nbsp; &nbsp; | **Gi&aacute; trị b&igrave;nh thường** |<br />-----------------------------------------------<br />| **C&ocirc;ng thức m&aacute;u** &nbsp; &nbsp;| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;|<br />| - Bạch cầu &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| 15.2 G/L &nbsp; &nbsp; &nbsp; &nbsp; | 4.0 - 10.0 G/L &nbsp; &nbsp; &nbsp; &nbsp; |<br />| - Neutrophil (%) &nbsp; &nbsp;| 85% &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| 40 - 70% &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |<br />| - CRP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | 120 mg/L &nbsp; &nbsp; &nbsp; &nbsp; | &lt; 5 mg/L &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |<br />| **Kh&iacute; m&aacute;u động mạch** | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;|<br />| - PaO2 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| 65 mmHg &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| 80 - 100 mmHg &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;|<br />| - SpO2 (room air) &nbsp; | 90% &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| &ge; 95% &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;|<br />| **X-quang ngực** &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;|<br />| - Tổn thương &nbsp; &nbsp; &nbsp; &nbsp;| Đ&aacute;m mờ th&ugrave;y dưới phổi P | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |<br />| - Tr&agrave;n dịch &nbsp; &nbsp; &nbsp; &nbsp; | Kh&ocirc;ng &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;|<br />-----------------------------------------------</p><p><strong>CHẨN ĐO&Aacute;N</strong></p><ul><li><p><strong>Vi&ecirc;m phổi th&ugrave;y do S. pneumoniae</strong></p></li><li><p><strong>Mức độ:</strong>&nbsp;Trung b&igrave;nh - nặng (CURB-65 Score: 2 điểm)</p><ul><li><p><strong>C</strong>&nbsp;(BUN &gt; 19 mg/dL): C&oacute;</p></li><li><p><strong>U</strong>&nbsp;(SpO2 &lt; 90%): C&oacute;</p></li><li><p>R (Nhịp thở &gt; 30): Kh&ocirc;ng</p></li><li><p>B (HA &lt; 90 mmHg): Kh&ocirc;ng</p></li><li><p>Tuổi &gt; 65: Kh&ocirc;ng</p></li></ul></li></ul><p><strong>4. PH&Aacute;C ĐỒ ĐIỀU TRỊ</strong></p><ol><li><p><strong>Kh&aacute;ng sinh:</strong></p><ul><li><p>Ceftriaxone 2g/ng&agrave;y IV &times; 7 ng&agrave;y</p></li><li><p>Azithromycin 500mg/ng&agrave;y PO &times; 5 ng&agrave;y (phủ vi khuẩn kh&ocirc;ng điển h&igrave;nh)</p></li></ul></li></ol>', '9WY10', '2025-05-27 10:19:47'),
	(9, 'Nguyễn Văn   Thành', 'Tăng huyết áp độ 2(HA 160/95mmHg, kèm tiền sử đái tháo đường)  ', 'CRHD6', '<p><strong>X&eacute;t nghiệm m&aacute;u</strong>:</p><ul><li><p><strong>Đường huyết đ&oacute;i</strong>: 8.2 mmol/L (&uarr;)</p></li><li><p><strong>HbA1c</strong>: 7.5% (&uarr;)</p></li><li><p><strong>Creatinine</strong>: 110 &mu;mol/L (&uarr;)</p></li><li><p><strong>eGFR</strong>: 65 mL/ph&uacute;t/1.73m&sup2; (&darr;)</p></li><li><p><strong>Kali</strong>: 4.2 mmol/L (b&igrave;nh thường)</p></li><li><p><strong>LDL-C</strong>: 3.8 mmol/L (&uarr;)</p></li></ul><p><strong>3. Nước tiểu</strong>:</p><ul><li><p><strong>Microalbumin niệu</strong>: 45 mg/24h (&uarr;)</p></li><li><p><strong>Tỷ lệ ACR</strong>: 35 mg/g creatinine (&uarr;)</p></li></ul><p><strong>Kết luận</strong>:</p><ul><li><p>Tăng huyết &aacute;p độ 2 k&egrave;m đ&aacute;i th&aacute;o đường type 2.</p></li><li><p>C&oacute;&nbsp;<strong>tổn thương thận giai đoạn sớm</strong>&nbsp;(microalbumin niệu, eGFR giảm nhẹ).</p></li><li><p><strong>Rối loạn lipid m&aacute;u</strong>&nbsp;(LDL-C cao).</p></li></ul><p><strong>Hướng điều trị</strong>:</p><ul><li><p>Điều chỉnh thuốc hạ &aacute;p (ưu ti&ecirc;n nh&oacute;m ARB/ACEi).</p></li><li><p>Kiểm so&aacute;t đường huyết + statin.</p></li><li><p>Theo d&otilde;i định kỳ chức năng thận.</p></li></ul>', NULL, '6TFLA', '2025-05-25 18:27:25'),
	(10, 'Lê Hoàng   Nam  ', 'Gãy xương đòn trái (Ngã xe đạp, không di lệch)  ', 'BIR2P', '<p>chụp X quang&nbsp;</p>', '<p>-----------------------------------------------<br />| ĐẶC ĐIỂM &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| KẾT QUẢ &nbsp; &nbsp; &nbsp; &nbsp; |<br />-----------------------------------------------<br />| Đường g&atilde;y xương &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | C&oacute; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;|<br />| Vị tr&iacute; g&atilde;y &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| 1/3 giữa xương đ&ograve;n |<br />| Di lệch &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | Kh&ocirc;ng &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |<br />| Tổn thương m&ocirc; mềm &nbsp; &nbsp; &nbsp; &nbsp;| Nhẹ (ph&ugrave; nề) &nbsp; &nbsp;|<br />| Khớp c&ugrave;ng vai &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | B&igrave;nh thường &nbsp; &nbsp; |<br />| Dị vật trong xương &nbsp; &nbsp; &nbsp; | Kh&ocirc;ng &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |<br />-----------------------------------------------</p><p>&nbsp;</p>', '06X2E', '2025-05-27 10:11:45'),
	(11, 'Lê Thị    Hồng  ', 'Đau dạ dày mãn tính (Kèm trào ngược axit nhẹ)  ', 'RG0CB', '<p><strong>X&Eacute;T NGHIỆM CƠ BẢN</strong></p>', '<p>-----------------------------------------------<br />| Chỉ số &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | Kết quả &nbsp; | Ngưỡng &nbsp; &nbsp;|<br />-----------------------------------------------<br />| **C&ocirc;ng thức m&aacute;u** &nbsp; &nbsp;| &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |<br />| Hb &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | 13.5 g/dL | 12-16 g/dL|<br />| Bạch cầu &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| 6.5 G/L &nbsp; | 4-10 G/L &nbsp;|<br />| **Sinh h&oacute;a m&aacute;u** &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |<br />| CRP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| 2 mg/L &nbsp; &nbsp;| &lt; 5 mg/L &nbsp;|<br />| Albumin &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| 4.2 g/dL &nbsp;| 3.5-5 g/dL|<br />-----------------------------------------------</p><p><strong>&nbsp;KHUYẾN NGHỊ ĐIỀU TRỊ</strong></p><ol><li><p><strong>Thuốc ức chế bơm proton (PPI):</strong></p><ul><li><p>Omeprazole 20mg x 2 lần/ng&agrave;y (trước ăn 30 ph&uacute;t).</p></li></ul></li><li><p><strong>Thay đổi lối sống:</strong></p><ul><li><p>Tr&aacute;nh ăn khuya, thức ăn cay/chua.</p></li><li><p>K&ecirc; cao đầu khi ngủ.</p></li></ul></li><li><p><strong>T&aacute;i kh&aacute;m sau 4 tuần</strong>&nbsp;đ&aacute;nh gi&aacute; đ&aacute;p ứng.</p></li></ol><p><strong>B&aacute;c sĩ kết luận:</strong></p><ul><li><p>Vi&ecirc;m dạ d&agrave;y mạn + tr&agrave;o ngược axit nhẹ.</p></li><li><p>Ti&ecirc;n lượng tốt nếu tu&acirc;n thủ điều trị.</p></li></ul>', 'V7PLR', '2025-05-27 10:18:22'),
	(12, 'Võ Minh   Tuấn  ', 'Viêm gan B mạn tính(ALT 120 UI/L, đang điều trị Entecavir)  ', '1N7IJ', '<p><strong>X&Eacute;T NGHIỆM Đ&Aacute;NH GI&Aacute; CHỨC NĂNG GAN</strong></p>', NULL, 'Q4XPC', '2025-05-27 10:15:49');

-- Dumping structure for table hmisphp.his_medical_records
CREATE TABLE IF NOT EXISTS `his_medical_records` (
  `mdr_id` int NOT NULL AUTO_INCREMENT,
  `mdr_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdr_pat_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdr_pat_adr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdr_pat_age` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdr_pat_ailment` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdr_pat_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdr_pat_prescr` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mdr_date_rec` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4),
  PRIMARY KEY (`mdr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_medical_records: ~2 rows (approximately)
INSERT INTO `his_medical_records` (`mdr_id`, `mdr_number`, `mdr_pat_name`, `mdr_pat_adr`, `mdr_pat_age`, `mdr_pat_ailment`, `mdr_pat_number`, `mdr_pat_prescr`, `mdr_date_rec`) VALUES
	(5, 'ADTGK', 'Lý Văn   Khánh  ', 'Số 56, đường 3/2, phường 11, Quận 10, TP.HCM  ', '25', 'Gãy xương bàn chân phải (Ngã cầu thang, di lệch nhẹ)  ', 'ADC8X', '<p>thuốc B&agrave;u kim đạt buiii</p>', '2025-05-30 15:40:32.5920'),
	(6, 'D7IZS', 'Đào Xuân   Quang ', 'Số 78, ngõ 12, phố Trần Quốc Hoàn, phường Dịch Vọng, quận Cầu Giấy, Hà Nội  ', '32', 'Viêm họng hạt mãn tính (Ho khan kéo dài 3 tháng, họng có hạt trắng)  ', 'L8FMX', NULL, '2025-05-28 06:52:50.8162'),
	(7, 'RCQJ0', 'Võ Minh   Tuấn  ', 'Số 67, đường Lê Văn Việt, phường Tăng Nhơn Phú, TP. Thủ Đức  ', '36', 'Viêm gan B mạn tính(ALT 120 UI/L, đang điều trị Entecavir)  ', '1N7IJ', '<p>2 lọ Omeprazole 20mg&nbsp;</p>', '2025-05-30 15:40:13.1207');

-- Dumping structure for table hmisphp.his_patients
CREATE TABLE IF NOT EXISTS `his_patients` (
  `pat_id` int NOT NULL AUTO_INCREMENT,
  `pat_fname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_lname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_dob` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_age` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_addr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_phone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_date_joined` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `pat_ailment` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_discharge_status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_patients: ~22 rows (approximately)
INSERT INTO `his_patients` (`pat_id`, `pat_fname`, `pat_lname`, `pat_dob`, `pat_age`, `pat_number`, `pat_addr`, `pat_phone`, `pat_type`, `pat_date_joined`, `pat_ailment`, `pat_discharge_status`) VALUES
	(12, 'Christine', 'Moore', '11/06/1994', '28', 'C6J3Y', '117 Bleecker Street', '7412569698', 'Nội Trú', '2025-05-28 07:13:37.687373', 'Demo Test', NULL),
	(13, 'Trương văn ', 'Hiền ', '30/11/1978', '46', 'ZGTXQ', 'Gia Lâm Hà Nội ', '0946829040', 'Nội Trú', '2025-05-28 07:13:59.855503', 'viêm ruột thừa', NULL),
	(14, 'Lê Thị  ', 'Hồng  ', '22/09/1992  ', '32', 'RG0CB', 'Số 45, đường Nguyễn Huệ, phường Bến Thành, Quận 1, TP.HCM  ', '0987654321', 'Ngoại Trú ', '2025-05-30 15:02:32.697577', 'Đau dạ dày mãn tính (Kèm trào ngược axit nhẹ)  ', NULL),
	(15, 'Nguyễn Văn  ', 'Thành', '18/03/1987  ', '38 ', 'CRHD6', 'Số 78, đường Lý Thường Kiệt, phường 7, Quận 5, TP.HCM  ', '0912345999  ', 'Nội Trú', '2025-05-28 07:13:44.868268', 'Tăng huyết áp độ 2(HA 160/95mmHg, kèm tiền sử đái tháo đường)  ', NULL),
	(16, 'Trần Thị ', 'Mai  ', '25/12/1995  ', '30', 'WEDLN', 'Số 12, đường Nguyễn Văn Linh, quận Hải Châu, Đà Nẵng  ', '0988777666  ', 'Nội Trú', '2025-05-30 14:59:39.872070', 'viêm xoang cấp(Ngạt mũi, đau vùng trán, sốt 37.8°C)  ', NULL),
	(17, 'Phạm Đức  ', 'Anh', '30/08/1975  ', '49', '45WPR', 'Số 45, đường Hoàng Diệu, phường 12, Quận 4, TP.HCM  ', '0909123123  ', 'Xuất viện', '2025-05-29 14:33:05.401695', 'Nhồi máu cơ tim nhẹ(Đau ngực trái lan vai, Troponin T dương tính)  ', NULL),
	(18, 'Lê Hoàng  ', 'Nam  ', '14/07/2005  ', '19', 'BIR2P', 'Số 23, đường Lê Duẩn, phường Bến Nghé, Quận 1, TP.HCM  ', '0369876543  ', 'Nội Trú', '2025-05-28 07:13:39.328052', 'Gãy xương đòn trái (Ngã xe đạp, không di lệch)  ', NULL),
	(20, 'Phạm Đức  ', 'Anh', '30/08/1975  ', '49', 'HPTB5', 'Số 45, đường Hoàng Diệu, phường 12, Quận 4, TP.HCM  ', '0909123123  ', 'Nội Trú', '2025-05-28 07:14:08.121286', 'Nhồi máu cơ tim nhẹ(Đau ngực trái lan vai, Troponin T dương tính)  ', NULL),
	(21, 'Đỗ Xuân  ', 'Hùng  ', '11/04/1990  ', '35', '3J0DB', 'Số 89, đường Nguyễn Chí Thanh, phường 9, Quận 10, TP.HCM  ', '0911222333  ', 'Nội Trú', '2025-05-28 07:13:54.490152', 'Thoái hóa đốt sống cổ C5-C6 (Đau cổ lan vai, hạn chế vận động) ', NULL),
	(22, 'Hoàng Thị  ', 'Ngọc  ', '22/02/2001  ', '24 ', 'HXGYL', 'Số 34, đường Trần Hưng Đạo, phường 5, Quận 5, TP.HCM  ', '0988999888  ', 'Nội Trú', '2025-05-28 07:13:40.891274', 'Ngộ độc thực phẩm(Nôn ói, tiêu chảy cấp, nghi do hải sản)  ', NULL),
	(23, 'Võ Minh  ', 'Tuấn  ', '30/10/1988  ', '36', '1N7IJ', 'Số 67, đường Lê Văn Việt, phường Tăng Nhơn Phú, TP. Thủ Đức  ', '0977123456  ', 'Nội Trú', '2025-05-28 07:13:48.287689', 'Viêm gan B mạn tính(ALT 120 UI/L, đang điều trị Entecavir)  ', NULL),
	(25, 'Lý Văn  ', 'Khánh  ', '03/09/1999  ', '25', 'ADC8X', 'Số 56, đường 3/2, phường 11, Quận 10, TP.HCM  ', '0934567890  ', 'Nội Trú', '2025-05-28 07:13:52.765538', 'Gãy xương bàn chân phải (Ngã cầu thang, di lệch nhẹ)  ', NULL),
	(26, 'Nguyễn Văn', 'Đạt  ', '18/03/1987  ', '38', '6QN18', 'Số 12, ngõ 34, phố Lý Thường Kiệt, phường Trần Hưng Đạo, quận Hoàn Kiếm, Hà Nội  ', '0912 345 999  ', 'Nội Trú', '2025-05-28 07:14:05.395923', 'Tăng huyết áp độ 2(HA 160/95, kèm tiền sử tiểu đường)  ', NULL),
	(27, 'Trần Thị  ', ' Ngọc  ', '25/12/1995  ', '29', 'IKSLR', 'Số 56, tổ 8, khu phố 3, phường Hải Châu 1, quận Hải Châu, Đà Nẵng  ', '0988 777 666  ', 'Ngoại Trú ', '2025-05-28 07:14:20.760556', 'Viêm xoang cấp (Ngạt mũi, đau trán, sốt 37.8°C)  ', NULL),
	(28, 'Phạm Quang ', 'Minh  ', '30/08/1975 ', '49', 'N3XYH', 'Thôn Đồng Quang, xã Kim Sơn, huyện Gia Lâm, Hà Nội  ', '0909 999999', 'Nội Trú', '2025-05-31 07:43:33.228056', 'Nhồi máu cơ tim nhẹ (Đau ngực trái lan vai, Troponin T dương tính)  ', NULL),
	(29, 'Đào Xuân  ', 'Quang ', '19/05/1993  ', '32', 'L8FMX', 'Số 78, ngõ 12, phố Trần Quốc Hoàn, phường Dịch Vọng, quận Cầu Giấy, Hà Nội  ', '0919 555 123  ', 'Nội Trú', '2025-05-28 07:13:42.964539', 'Viêm họng hạt mãn tính (Ho khan kéo dài 3 tháng, họng có hạt trắng)  ', NULL),
	(30, 'Chu Thị  ', 'Hồng Nhung  ', '22/08/1988  ', '36', 'RGPTA', 'Thôn Phú Lương, xã Đông Xuân, huyện Sóc Sơn, Hà Nội  ', '0986 123 456 ', 'Nội Trú', '2025-05-28 07:13:55.970033', 'U xơ tử cung (Kích thước 45mm, rong kinh kéo dài)  ', NULL),
	(31, 'Tạ Văn  ', 'Hiếu  ', '30/01/2002  ', '23', '4B7IF', 'Số 34, đường Nguyễn Văn Linh, phường Vĩnh Trung, quận Thanh Khê, Đà Nẵng  ', '0905 678 123  ', 'Nội Trú', '2025-05-28 07:13:58.228947', 'Chấn thương sọ não nhẹ (Ngã từ giàn giáo cao 3m, tỉnh táo, chụp CT không máu tụ)  ', NULL),
	(32, 'Lương Thị  ', 'Thu Trang  ', '14/11/1979  ', '45', '2E8XK', 'Số 56, tổ 7, khu phố 4, phường Tân Phong, quận 7, TP.HCM  ', '0978 456 321  ', 'Nội Trú', '2025-05-28 07:13:46.766394', 'Rối loạn lipid máu(Cholesterol 6.5 mmol/L, LDL 4.2 mmol/L)  ', NULL),
	(33, 'Hồ Đình  ', 'Vũ  ', '03/04/1997  ', '28', '8VHWC', 'Số 89, đường Lê Hồng Phong, phường Thắng Nhì, TP. Vũng Tàu, Bà Rịa - Vũng Tàu  ', '0933 789 456  ', 'Ngoại trú', '2025-05-28 07:15:45.284767', 'Viêm ruột thừa cấp (Đau hố chậu phải, siêu âm ruột thừa to 8mm)  ', NULL),
	(34, 'Trần Đình ', 'Hùng ', '18/03/1987  ', '38', 'W8D34', 'Số 45, đường Nguyễn Huệ, phường Bến Thành, Quận 1, TP.HCM  ', '0934528568', 'Nội trú', '2025-05-25 17:31:43.265618', 'đái tháo đường ', NULL);

-- Dumping structure for table hmisphp.his_patient_transfers
CREATE TABLE IF NOT EXISTS `his_patient_transfers` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `t_hospital` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_date` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_pat_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_pat_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_patient_transfers: ~2 rows (approximately)
INSERT INTO `his_patient_transfers` (`t_id`, `t_hospital`, `t_date`, `t_pat_name`, `t_pat_number`, `t_status`) VALUES
	(4, 'Đa Khoa Đức Giang', '2025-05-20', 'Trương văn  Hiền ', 'ZGTXQ', 'Success'),
	(5, 'Bạch Mai', '2025-04-06', 'Tạ Văn   Hiếu  ', '4B7IF', 'Success');

-- Dumping structure for table hmisphp.his_payrolls
CREATE TABLE IF NOT EXISTS `his_payrolls` (
  `pay_id` int NOT NULL AUTO_INCREMENT,
  `pay_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_doc_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_doc_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_doc_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_emp_salary` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date_generated` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4),
  `pay_status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_descr` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_payrolls: ~7 rows (approximately)
INSERT INTO `his_payrolls` (`pay_id`, `pay_number`, `pay_doc_name`, `pay_doc_number`, `pay_doc_email`, `pay_emp_salary`, `pay_date_generated`, `pay_status`, `pay_descr`) VALUES
	(6, 'JNABT', 'Bùi Kim Đạt', '9KT6J', 'dat@gmail.com', '-100000', '2025-05-28 07:10:09.8823', 'Chưa trả', '<p>l&agrave;m toi bệnh nh&acirc;n&nbsp;</p>'),
	(8, 'UTDY2', 'Nguyễn Hoàng Anh', 'XBKT9', 'anhemhucau@gmail.com', '4000', '2025-05-29 11:59:17.5026', 'Đã trả', '<p>Lương th&aacute;ng 4</p>'),
	(9, '3JNF1', 'Bùi Quang Khải', '3TGC9', 'khai@gmail.com', '1000', '2025-05-29 11:55:49.6944', NULL, ''),
	(10, 'FY3Q0', 'Âu Xuân Mạnh', 'XQJI5', 'manhSan@gmail.com', '1000', '2025-05-29 11:56:12.3180', NULL, ''),
	(11, 'D6U1I', 'Trần Diệu Linh', 'LD0BR', 'linh@gmail.com', '1000', '2025-05-29 11:56:32.7559', NULL, ''),
	(12, 'YZXL6', 'Nguyễn Hương Thảo', 'G1KE2', 'thao@gmail.com', '1000', '2025-05-29 11:59:39.8825', 'Đã trả', '<p>Lương th&aacute;ng 4</p>'),
	(13, '6C78G', 'Trần văn  Bảo ', 'WEPL0', 'VanBaoTran@mail.com', '1000', '2025-05-29 11:58:53.3793', 'Đã trả', '<p>Lương th&aacute;ng 4</p>'),
	(14, 'LPD1K', 'Trương  Nam', 'F6AB3', 'namusan@mail.com', '280000', '2025-05-30 14:16:59.9711', NULL, '');

-- Dumping structure for table hmisphp.his_pharmaceuticals
CREATE TABLE IF NOT EXISTS `his_pharmaceuticals` (
  `phar_id` int NOT NULL AUTO_INCREMENT,
  `phar_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phar_bcode` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phar_desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `phar_qty` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phar_cat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phar_vendor` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`phar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_pharmaceuticals: ~11 rows (approximately)
INSERT INTO `his_pharmaceuticals` (`phar_id`, `phar_name`, `phar_bcode`, `phar_desc`, `phar_qty`, `phar_cat`, `phar_vendor`) VALUES
	(4, 'Amoxicillin 500mg', '837549612', '<p>Kh&aacute;ng sinh phổ rộng, điều trị nhiễm khuẩn h&ocirc; hấp, vi&ecirc;m tai giữa. Dạng vi&ecirc;n n&eacute;n, uống 2-3 lần/ng&agrave;y.</p>', '50 ', 'Antibiotics', 'BioHealth Ltd'),
	(5, 'Vitamin D3 2000IU', '057128469', '<p>&nbsp;</p><p>Bổ sung vitamin D cho người thiếu hụt, hỗ trợ hấp thu canxi. Dạng vi&ecirc;n nang mềm, uống 1 vi&ecirc;n/ng&agrave;y.</p>', '100', 'Vitamin và khoáng chất', 'United Drug Distributors'),
	(6, 'Gabapentin 300mg', '715289406', '<p>&nbsp;</p><p>Điều trị động kinh, đau thần kinh ngoại bi&ecirc;n. Dạng vi&ecirc;n n&eacute;n, liều d&ugrave;ng theo chỉ định b&aacute;c sĩ.</p>', '30', 'Thuốc thần kinh', 'United Drug Distributors'),
	(7, 'Ketoconazole Cream 2%', '830915624', '<p>&nbsp;</p><p>Kem b&ocirc;i trị nấm da, lang ben, hắc l&agrave;o. B&ocirc;i 1-2 lần/ng&agrave;y l&ecirc;n v&ugrave;ng tổn thương.</p>', '40', 'Thuốc da liễu', 'BioHealth Ltd'),
	(8, 'Paracetamol 500mg', '297360814', '<p>Hạ sốt, giảm đau nhẹ. Dạng vi&ecirc;n sủi, uống mỗi 4-6 giờ khi cần.</p>', '120', 'Analgesics', 'CTY TNHH Dược phẩm EMC'),
	(9, 'Omeprazole 20mg', '385469071', '<p>&nbsp;</p><p>Ức chế axit dạ d&agrave;y, trị vi&ecirc;m lo&eacute;t dạ d&agrave;y-t&aacute; tr&agrave;ng. Uống 1 vi&ecirc;n/ng&agrave;y trước bữa s&aacute;ng.</p>', '60', 'Thuốc tiêu hóa', 'Delta Pharma Co.'),
	(10, 'Loratadine 10mg', '014539628', '<p>&nbsp;</p><p>Kh&aacute;ng histamin, giảm ngứa, mề đay, vi&ecirc;m mũi dị ứng. Uống 1 vi&ecirc;n/ng&agrave;y.</p>', '10', 'Thuốc dị ứng', 'Delta Pharma Co.'),
	(11, 'Amlodipine 5mg', '793412650', '<p>&nbsp;</p><p>Ổn định huyết &aacute;p, trị tăng huyết &aacute;p, đau thắt ngực. Uống 1 vi&ecirc;n/ng&agrave;y.</p>', '50', 'Thuốc tim mạch', 'CTY TNHH Dược phẩm EMC'),
	(13, 'Ibuprofen 400mg', '807943516', '<p>&nbsp;</p><p>Giảm đau kh&aacute;ng vi&ecirc;m (đau cơ, đau đầu, đau răng). Uống c&aacute;ch 6-8 giờ.</p><p>&nbsp;</p>', '55', 'Analgesics', 'CTY TNHH Dược phẩm EMC'),
	(14, 'Ibuprofen 400mg', '807943516', '<p>&nbsp;</p><p>Giảm đau kh&aacute;ng vi&ecirc;m (đau cơ, đau đầu, đau răng). Uống c&aacute;ch 6-8 giờ.</p><p>&nbsp;</p>', '55', 'Analgesics', 'CTY TNHH Dược phẩm EMC'),
	(15, 'Ciprofloxacin 500mg', '620835417', '<p>Kh&aacute;ng sinh trị nhiễm khuẩn tiết niệu, đường ruột. Uống 2 lần/ng&agrave;y.</p>', '55', 'Kháng sinh', 'Delta Pharma Co.');

-- Dumping structure for table hmisphp.his_pharmaceuticals_categories
CREATE TABLE IF NOT EXISTS `his_pharmaceuticals_categories` (
  `pharm_cat_id` int NOT NULL AUTO_INCREMENT,
  `pharm_cat_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pharm_cat_vendor` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pharm_cat_desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`pharm_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_pharmaceuticals_categories: ~9 rows (approximately)
INSERT INTO `his_pharmaceuticals_categories` (`pharm_cat_id`, `pharm_cat_name`, `pharm_cat_vendor`, `pharm_cat_desc`) VALUES
	(1, 'Hạ sốt ', 'Cosmos Kenya Limited', '<ul><li>An <strong>antipyretic</strong> (<a href="https://en.wikipedia.org/wiki/Help:IPA/English">/Ã‹Å’&aelig;ntipaÃ‰ÂªÃ‹Ë†rÃ‰â€ºtÃ‰Âªk/</a>, from <em>anti-</em> &#39;against&#39; and <em><a href="https://en.wiktionary.org/wiki/pyretic">pyretic</a></em> &#39;feverish&#39;) is a substance that reduces <a href="https://en.wikipedia.org/wiki/Fever">fever</a>. Antipyretics cause the <a href="https://en.wikipedia.org/wiki/Hypothalamus">hypothalamus</a> to override a <a href="https://en.wikipedia.org/wiki/Prostaglandin">prostaglandin</a>-induced increase in <a href="https://en.wikipedia.org/wiki/Thermoregulation">temperature</a>. The body then works to lower the temperature, which results in a reduction in fever.</li><li>Most antipyretic medications have other purposes. The most common antipyretics in the United States are <a href="https://en.wikipedia.org/wiki/Ibuprofen">ibuprofen</a> and <a href="https://en.wikipedia.org/wiki/Aspirin">aspirin</a>, which are <a href="https://en.wikipedia.org/wiki/Nonsteroidal_anti-inflammatory_drugs">nonsteroidal anti-inflammatory drugs</a> (NSAIDs) used primarily as <a href="https://en.wikipedia.org/wiki/Analgesics">analgesics</a> (pain relievers), but which also have antipyretic properties; and <a href="https://en.wikipedia.org/wiki/Acetaminophen">acetaminophen</a> (paracetamol), an analgesic with weak anti-inflammatory properties.<a href="https://en.wikipedia.org/wiki/Antipyretic#cite_note-2">[2]</a></li></ul>'),
	(2, 'Giảm đau', 'Dawa Limited Kenya', '<ul><li><p>An <strong>analgesic</strong> or <strong>painkiller</strong> is any member of the group of <a href="https://en.wikipedia.org/wiki/Pharmaceutical_drug">drugs</a> used to achieve analgesia, relief from <a href="https://en.wikipedia.org/wiki/Pain">pain</a>.</p><p>Analgesic drugs act in various ways on the <a href="https://en.wikipedia.org/wiki/Peripheral_nervous_system">peripheral</a> and <a href="https://en.wikipedia.org/wiki/Central_nervous_system">central</a> nervous systems. They are distinct from <a href="https://en.wikipedia.org/wiki/Anesthetic">anesthetics</a>, which temporarily affect, and in some instances completely eliminate, <a href="https://en.wikipedia.org/wiki/Sense">sensation</a>. Analgesics include <a href="https://en.wikipedia.org/wiki/Paracetamol">paracetamol</a> (known in North America as <a href="https://en.wikipedia.org/wiki/Acetaminophen">acetaminophen</a> or simply APAP), the <a href="https://en.wikipedia.org/wiki/Nonsteroidal_anti-inflammatory_drug">nonsteroidal anti-inflammatory drugs</a> (NSAIDs) such as the <a href="https://en.wikipedia.org/wiki/Salicylate">salicylates</a>, and <a href="https://en.wikipedia.org/wiki/Opioid">opioid</a> drugs such as <a href="https://en.wikipedia.org/wiki/Morphine">morphine</a> and <a href="https://en.wikipedia.org/wiki/Oxycodone">oxycodone</a>.</p></li></ul>'),
	(3, 'Kháng sinh ', 'Cosmos Kenya Limited', '<p>Antibiotics</p>'),
	(4, 'Thuốc tim mạch', 'CTY TNHH Dược phẩm EMC', '<p>C&aacute;c loại thuốc điều trị bệnh l&yacute; tim mạch như huyết &aacute;p, suy tim, thiếu m&aacute;u cơ tim</p>'),
	(5, 'Thuốc tiêu hóa', 'CTY TNHH Dược phẩm EMC', '<p>Thuốc điều trị c&aacute;c bệnh về dạ d&agrave;y, gan mật, rối loạn ti&ecirc;u h&oacute;a</p>'),
	(6, 'Thuốc thần kinh', 'United Drug Distributors', '<p>Thuốc điều trị c&aacute;c bệnh l&yacute; thần kinh trung ương v&agrave; ngoại bi&ecirc;n</p>'),
	(7, 'Thuốc dị ứng', 'BioHealth Ltd', '<p>Thuốc kh&aacute;ng histamin, điều trị c&aacute;c bệnh dị ứng, mề đay</p>'),
	(8, 'Vitamin và khoáng chất', 'United Drug Distributors', '<p>C&aacute;c loại vitamin tổng hợp, kho&aacute;ng chất bổ sung cho cơ thể</p>'),
	(9, 'Thuốc da liễu', 'BioHealth Ltd', '<p>Thuốc điều trị c&aacute;c bệnh ngo&agrave;i da, nấm, eczema</p>');

-- Dumping structure for table hmisphp.his_prescriptions
CREATE TABLE IF NOT EXISTS `his_prescriptions` (
  `pres_id` int NOT NULL AUTO_INCREMENT,
  `pres_pat_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pres_pat_age` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pres_pat_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pres_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pres_pat_addr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pres_pat_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pres_date` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4),
  `pres_pat_ailment` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pres_ins` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`pres_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_prescriptions: ~4 rows (approximately)
INSERT INTO `his_prescriptions` (`pres_id`, `pres_pat_name`, `pres_pat_age`, `pres_pat_number`, `pres_number`, `pres_pat_addr`, `pres_pat_type`, `pres_date`, `pres_pat_ailment`, `pres_ins`) VALUES
	(7, 'Phạm Đức   Anh', '49', 'HPTB5', 'DAS93', 'Số 45, đường Hoàng Diệu, phường 12, Quận 4, TP.HCM  ', 'Nội Trú', '2025-05-30 15:30:08.2806', 'Nhồi máu cơ tim nhẹ(Đau ngực trái lan vai, Troponin T dương tính)  1', '<p>2 lọ Amlodipine 5mg&nbsp;</p>'),
	(8, 'Võ Minh   Tuấn  ', '36', '1N7IJ', 'PLTMV', 'Số 67, đường Lê Văn Việt, phường Tăng Nhơn Phú, TP. Thủ Đức  ', 'Nội Trú', '2025-05-30 15:09:30.3412', 'Viêm gan B mạn tính(ALT 120 UI/L, đang điều trị Entecavir)  ', '<p>2 lọ Omeprazole 20mg&nbsp;</p>'),
	(10, 'Lương Thị   Thu Trang  ', '45', '2E8XK', '3WVT0', 'Số 56, tổ 7, khu phố 4, phường Tân Phong, quận 7, TP.HCM  ', 'Ngoại Trú', '2025-05-30 15:09:35.2676', 'Rối loạn lipid máu(Cholesterol 6.5 mmol/L, LDL 4.2 mmol/L)  ', '<p>Paracetamol 500mg</p>');

-- Dumping structure for table hmisphp.his_surgery
CREATE TABLE IF NOT EXISTS `his_surgery` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `s_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_doc` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_pat_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_pat_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_pat_ailment` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_pat_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `s_pat_status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_surgery: ~4 rows (approximately)
INSERT INTO `his_surgery` (`s_id`, `s_number`, `s_doc`, `s_pat_number`, `s_pat_name`, `s_pat_ailment`, `s_pat_date`, `s_pat_status`) VALUES
	(5, '6ANS5', 'Bùi Quang Khải', 'ZGTXQ', 'Trương văn  Hiền ', 'viêm ruột thừa', '2025-05-29 14:38:14.554507', 'Thành công'),
	(6, '8N1IB', 'Bùi Quang Khải', '45WPR', 'Phạm Đức   Anh', 'Nhồi máu cơ tim nhẹ(Đau ngực trái lan vai, Troponin T dương tính)  ', '2025-05-29 14:39:04.161931', 'Thành công'),
	(7, 'E4N9J', 'Nguyễn Hương Thảo', 'HXGYL', 'Hoàng Thị   Ngọc  ', 'Ngộ độc thực phẩm(Nôn ói, tiêu chảy cấp, nghi do hải sản)  ', '2025-05-29 14:40:27.978707', 'Thành công'),
	(8, '5LK8Z', 'Nguyễn Hương Thảo', 'N3XYH', 'Phạm Quang  Minh  ', 'Nhồi máu cơ tim nhẹ (Đau ngực trái lan vai, Troponin T dương tính)  ', '2025-05-29 14:45:02.575816', 'Undergoing');

-- Dumping structure for table hmisphp.his_vendor
CREATE TABLE IF NOT EXISTS `his_vendor` (
  `v_id` int NOT NULL AUTO_INCREMENT,
  `v_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_adr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_phone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_vendor: ~7 rows (approximately)
INSERT INTO `his_vendor` (`v_id`, `v_number`, `v_name`, `v_adr`, `v_email`, `v_phone`, `v_desc`) VALUES
	(2, '7VEGC', 'CTY TNHH Dược phẩm EMC', 'đường cầu giấy', 'emc@gmail.com', '012 345 6784', '<p>emc đầy đủ loại thuốc</p>'),
	(3, '8XZ9F', 'Delta Pharma Co.', 'Số 78, đường Lê Lợi, Hà Nội', 'contact@deltapharma.com', '0912 345 678', '<p>Cung cấp dược phẩm đa khoa, thiết bị y tế</p>'),
	(4, '5TG7H', 'BioHealth Ltd', 'Lô B5, KCN Biên Hòa, Đồng Nai', 'sales@biohealth.vn', '0987 654 321', '<p>Chuyên kháng sinh và vaccine</p>'),
	(5, '2KL4M', 'Medico Solutions', ' Tầng 5, tòa nhà Sài Gòn Tower, TP.HCM', 'info@medicosolutions.com', ' 0903 456 789', '<p>Phân phối thuốc giảm đau và vitamin</p>'),
	(6, '9PQ2R', 'GreenCross Pharma', 'Số 45, đường Nguyễn Văn Linh, Đà Nẵng', 'orders@greencross.com', '0932 987 654', '<p>Cung cấp thuốc hạ sốt và dịch truyền</p>'),
	(7, '3VN8S', 'United Drug ', 'Khu phố 2, phường Linh Trung, Thủ Đức', 'support@udd.vn', '0978 123 456', '<p>Chuy&ecirc;n Thực phẩm chức năng</p>'),
	(8, '28YXP', 'Dược phẩm Việt Nhật', 'Sài đồng, Long Biên, Hà Nội', 'dpvietNhat@gmail.com', '0968802468', '<p>chuy&ecirc;n cung cấp thuốc an thần</p>');

-- Dumping structure for table hmisphp.his_vitals
CREATE TABLE IF NOT EXISTS `his_vitals` (
  `vit_id` int NOT NULL AUTO_INCREMENT,
  `vit_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vit_pat_number` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vit_bodytemp` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vit_heartpulse` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vit_resprate` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vit_bloodpress` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vit_daterec` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`vit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table hmisphp.his_vitals: ~4 rows (approximately)
INSERT INTO `his_vitals` (`vit_id`, `vit_number`, `vit_pat_number`, `vit_bodytemp`, `vit_heartpulse`, `vit_resprate`, `vit_bloodpress`, `vit_daterec`) VALUES
	(7, 'OACJ6', 'HXGYL', '40', '100', '100', '100', '2025-05-28 08:37:13.421969'),
	(10, '1NFLG', 'ZGTXQ', '40', '100', '50', '130', '2025-05-29 11:23:52.545327'),
	(13, 'Y80BI', 'CRHD6', '39', '77', '50', '133', '2025-05-29 14:36:47.022188'),
	(14, 'F3U29', 'G1BA6', '41', '70', '40', '120', '2025-05-29 14:37:30.916194'),
	(15, '8QZ4V', '1N7IJ', '37', '72', '15', '90/60', '2025-05-31 07:41:02.272352');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
