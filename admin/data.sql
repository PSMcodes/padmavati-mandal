-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 03, 2024 at 07:58 PM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u912243786_padmavati`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `image_path`, `alt_text`, `uploaded_at`) VALUES
(31, 'uploads/369788330_7247078898635547_7996679837348873812_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(32, 'uploads/396720204_7247073501969420_707893116218361985_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(33, 'uploads/396729817_7247085735301530_80825106359791051_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(34, 'uploads/396732073_7247072435302860_3755158322085989175_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(35, 'uploads/396980489_7247090618634375_5690191772745128982_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(36, 'uploads/397610522_7247068385303265_3405881329314951989_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(37, 'uploads/397980037_7247075735302530_971193745016825210_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(38, 'uploads/397995083_7247067275303376_9198129114040927624_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(39, 'uploads/398005124_7247077981968972_5586861452601510561_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(40, 'uploads/398007515_7247081498635287_6262037812559206642_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(41, 'uploads/398017809_7247088065301297_2297850193942610194_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(42, 'uploads/398189563_7247067495303354_8788256345232025730_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(43, 'uploads/398208385_7247082765301827_3841971110717021806_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(44, 'uploads/398217028_7247067725303331_2858175320192189293_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(45, 'uploads/398445635_7247077268635710_3208182447325941500_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(46, 'uploads/398463852_7247078108635626_1428918529826810953_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(47, 'uploads/398472036_7247081868635250_7620243946030894672_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(48, 'uploads/398539187_7247076031969167_5571084001997266036_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(49, 'uploads/398556873_7247087171968053_3940028835939616749_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(50, 'uploads/398580033_7247077908635646_1570667498100045744_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(51, 'uploads/398672854_7247087278634709_8063869378207048334_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(52, 'uploads/398720442_7247075838635853_2462244681292658718_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(53, 'uploads/398721425_7247072845302819_1954478031349658341_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(54, 'uploads/398728820_7247073925302711_8979307547597023284_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(55, 'uploads/398732284_7247075395302564_8276953595137365664_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(56, 'uploads/398762992_7247078735302230_8703527592188954898_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(57, 'uploads/398769341_7247071708636266_3252183986627250382_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(58, 'uploads/398779911_7247076325302471_757078022397927840_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(59, 'uploads/398784040_7247081105301993_6738969888017979346_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(60, 'uploads/398815874_7247095088633928_301081659689801064_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(61, 'uploads/398824768_7247073681969402_9216827981278324233_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(62, 'uploads/398827227_7247072001969570_5306019057323334546_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(63, 'uploads/398830899_7247073068636130_7066348411182735670_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(64, 'uploads/398838610_7247077731968997_8497938917902733203_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(65, 'uploads/398838764_7247096078633829_5700759415438032404_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(66, 'uploads/398839518_7247078228635614_150906411317434137_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(67, 'uploads/398912766_7247088381967932_8092967755658710153_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(68, 'uploads/398971755_7247085988634838_1456573510544110913_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(69, 'uploads/398978525_7247084495301654_2671839040742242791_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(70, 'uploads/398983497_7247072521969518_6978603128694688068_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(71, 'uploads/398984167_7247074908635946_2311740733465622193_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(72, 'uploads/399086482_7247095691967201_7099687193216885355_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(73, 'uploads/399161462_7247087701968000_4538155685500461662_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(74, 'uploads/399201308_7247073198636117_8311844823127181603_n.jpg', 'Navratri 2023', '2024-08-25 14:55:10'),
(75, 'uploads/399209711_7247077488635688_8712521971918215047_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(76, 'uploads/399241242_7247072731969497_2027087851231787712_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(77, 'uploads/399269019_7247088618634575_7909638464387448318_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(78, 'uploads/399316559_7247074525302651_7059811217604232335_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(79, 'uploads/399339428_7247075175302586_5297281362495146958_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(80, 'uploads/399373182_7247071535302950_7377136229937287085_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(81, 'uploads/399377404_7247083215301782_5582638537788591499_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(82, 'uploads/399385856_7247087378634699_6154053190620548629_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(83, 'uploads/399398547_7247076721969098_3314583187292946603_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(84, 'uploads/399410888_7247079018635535_414919676059064305_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(85, 'uploads/399468534_7247094975300606_7044110240707944739_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(86, 'uploads/399469281_7247072165302887_8196929661706154995_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(87, 'uploads/399552294_7247082481968522_972120743834824230_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(88, 'uploads/399600502_7247072628636174_962643593923307914_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(89, 'uploads/399609646_7247071435302960_830088804206337200_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(90, 'uploads/399633888_7247071595302944_1974568103591052173_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(91, 'uploads/399758630_7247074245302679_4458099175632385401_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(92, 'uploads/399782097_7247087518634685_9046600917483175921_n.jpg', 'Navratri 2023', '2024-08-25 14:55:11'),
(93, 'uploads/397082814_7254155847927852_1095116511024290464_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(94, 'uploads/397084998_7254153097928127_2404649102299063242_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(95, 'uploads/397089233_7254158131260957_5719286623558167397_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(96, 'uploads/398868639_7254149287928508_8090675435741351102_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(97, 'uploads/398885716_7254158001260970_8162106197719392250_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(98, 'uploads/398916729_7254156534594450_6892126205542938571_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(99, 'uploads/398933651_7257297067613730_8871989576359255560_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(100, 'uploads/398954474_7254151984594905_3404056573394530728_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(101, 'uploads/398961548_7254140901262680_7842400310596036784_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(102, 'uploads/398964521_7257296544280449_4311088395752805025_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(103, 'uploads/398969208_7254144861262284_7249312475550671292_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(104, 'uploads/398974402_7254155524594551_6970750854485649269_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(105, 'uploads/398983296_7257257860950984_3297125828717174964_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(106, 'uploads/398983312_7257131127630324_6872622264018839293_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(107, 'uploads/399061791_7254018697941567_6509053561943747704_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(108, 'uploads/399260949_7254146044595499_6995694308067730500_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(109, 'uploads/399263443_7257147717628665_1882274726029280932_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(110, 'uploads/399277379_7254157314594372_4568361002671047541_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(111, 'uploads/399319846_7257132520963518_7420265702882430632_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(112, 'uploads/399337447_7254159184594185_3379898734263072228_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(113, 'uploads/399347575_7254143671262403_4268381331174927880_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(114, 'uploads/399363966_7257296004280503_820856873250831075_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(115, 'uploads/399407354_7257127807630656_4372130904599676267_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(116, 'uploads/399488405_7254159527927484_8971302576730893526_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(117, 'uploads/399521071_7254150304595073_3395752142021079337_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(118, 'uploads/399522219_7254153694594734_1456065085396325438_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(119, 'uploads/399528941_7257257767617660_5774409637923645983_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(120, 'uploads/399535579_7257127020964068_5250538072870461849_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(121, 'uploads/399600361_7257138490962921_543871335694990641_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(122, 'uploads/399648906_7254140217929415_4926720191612914435_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(123, 'uploads/399695420_7254018491274921_434358001998863343_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(124, 'uploads/399731431_7254152077928229_1184579926496975957_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(125, 'uploads/399745843_7254019144608189_7044666009152736619_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(126, 'uploads/399777527_7254153217928115_4537174365692058875_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(127, 'uploads/399790710_7257137594296344_5765255624546515311_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(128, 'uploads/399794417_7254149714595132_5724694657068996581_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(129, 'uploads/399797171_7257135057629931_5946977519069167999_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(130, 'uploads/399852372_7254142244595879_5986445892023683267_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(131, 'uploads/399853364_7254141551262615_8506003594573005929_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(132, 'uploads/399865104_7254154321261338_4869662313593761129_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(133, 'uploads/399865961_7254158854594218_1707634301985319663_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(134, 'uploads/399869339_7254156867927750_2726365652330439854_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(135, 'uploads/399869597_7254151557928281_3172512844218762065_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(136, 'uploads/399876195_7254151254594978_336249291591845032_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(137, 'uploads/399884363_7257296950947075_5283717065456202227_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(138, 'uploads/399889474_7254152944594809_2168569261096116046_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(139, 'uploads/399892993_7254149984595105_2559892255642826401_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(140, 'uploads/399899391_7257136634296440_2030581605142113068_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(141, 'uploads/399899617_7254145274595576_2499042345183171027_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(142, 'uploads/399902660_7254158434594260_4765434894858416142_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(143, 'uploads/399904541_7254156201261150_8700036684649465239_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(144, 'uploads/399913870_7254158584594245_4085348539304387563_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(145, 'uploads/399922582_7257297174280386_7436695375630495562_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(146, 'uploads/399927098_7254154921261278_7345644263520473539_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(147, 'uploads/399930297_7254156104594493_4750994151741817272_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(148, 'uploads/399956147_7254140551262715_6286377247900905913_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(149, 'uploads/399971798_7254152591261511_1970841453351594020_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(150, 'uploads/399991954_7254159354594168_1694769226705379374_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(151, 'uploads/399992117_7254153564594747_5134493834987480249_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(152, 'uploads/400013630_7257135960963174_3491395295920745046_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(153, 'uploads/400020114_7257131744296929_7572439349723112019_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(154, 'uploads/400024081_7254157011261069_3727565093740211999_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(155, 'uploads/400035749_7254154201261350_6396203271608213214_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(156, 'uploads/400055172_7257296737613763_3625288193867005123_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(157, 'uploads/400060211_7254158691260901_3726840383542889015_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(158, 'uploads/400089732_7257133140963456_6090466850894735775_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(159, 'uploads/400320334_7254155991261171_9153556809676814660_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(160, 'uploads/400323219_7254142911262479_4879169308148136811_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(161, 'uploads/400381344_7254148841261886_2392971940596560848_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(162, 'uploads/400389936_7254152221261548_5000799468673363657_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(163, 'uploads/400401379_7254153511261419_4324944019169249108_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(164, 'uploads/400407675_7257128400963930_8346538630460971779_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(165, 'uploads/400429667_7254149841261786_8212142432768891152_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(166, 'uploads/400432103_7257296147613822_7462610560679760643_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(167, 'uploads/400462535_7257129000963870_4416892024515518588_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(168, 'uploads/400467813_7257129814297122_6383765250673289898_n.jpg', 'साडी वताप', '2024-08-25 14:57:02'),
(169, 'uploads/400597089_7257130480963722_7934781267332110838_n.jpg', 'साडी वताप', '2024-08-25 14:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `testimonial_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'prasadkalvikatti@gmail.com', '$2y$10$ncsSgN5XEmPYXD6QNZRWy.r.XBCWP4GZnM9quWo4EbFaPvQ/xDsxy', '2024-08-24 20:42:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
