-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th5 22, 2023 lúc 11:09 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `norenown`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `accid` int(11) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `date_create` varchar(30) DEFAULT NULL,
  `acc_status` tinyint(1) DEFAULT NULL,
  `acc_visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`accid`, `passwd`, `mail`, `groupID`, `userID`, `date_create`, `acc_status`, `acc_visible`) VALUES
(1, '12345678', 'adminADMIN123@gmail.com', 1, 1, '1/1/2023', 1, 1),
(2, '61706976', 'Brittany3049@gmail.com', 2, 2, '18/5/2022', 1, 1),
(3, '67937746', 'Cinderella7152@gmail.com', 2, 3, '20/8/2022', 1, 1),
(4, '89433771', 'Diana7433@gmail.com', 2, 4, '15/4/2022', 1, 1),
(5, '12345678', 'Eva9364@gmail.com', 3, 5, '27/5/2022', 1, 1),
(6, '12345678', 'Fiona1546@gmail.com', 5, 6, '31/8/2022', 1, 1),
(7, '74818837', 'Gunda3133@gmail.com', 2, 7, '28/7/2022', 1, 1),
(8, '12195064', 'Hege7466@gmail.com', 2, 8, '22/11/2022', 1, 0),
(9, '35110066', 'Inga9847@gmail.com', 2, 9, '13/12/2022', 1, 1),
(10, '66844736', 'Johanna9344@gmail.com', 2, 10, '29/4/2022', 1, 1),
(11, '97160294', 'Kitty3677@gmail.com', 6, 11, '30/3/2022', 1, 1),
(12, '97346284', 'Linda7702@gmail.com', 2, 12, '12/1/2022', 1, 1),
(13, '78623062', 'Nina5620@gmail.com', 3, 13, '15/5/2022', 1, 1),
(14, '66131750', 'Ophelia8655@gmail.com', 2, 14, '22/2/2022', 1, 1),
(15, '10252307', 'Petunia9738@gmail.com', 3, 15, '18/7/2022', 1, 1),
(16, '40190289', 'Amanda8224@gmail.com', 3, 16, '3/9/2022', 1, 1),
(17, '44369947', 'Raquel1996@gmail.com', 2, 17, '5/9/2022', 1, 1),
(18, '78711728', 'Cindy1526@gmail.com', 2, 18, '6/3/2022', 1, 1),
(19, '81164632', 'Doris4470@gmail.com', 2, 19, '11/2/2022', 1, 1),
(20, '71751000', 'Eve4128@gmail.com', 2, 20, '28/12/2022', 1, 1),
(21, '98933369', 'Evita5299@gmail.com', 2, 21, '17/8/2022', 1, 1),
(22, '15850783', 'Sunniva4495@gmail.com', 3, 22, '30/7/2022', 1, 1),
(23, '60908104', 'Tove2323@gmail.com', 2, 23, '8/10/2022', 1, 1),
(24, '64150840', 'Unni7201@gmail.com', 2, 24, '4/3/2022', 1, 1),
(25, '96930326', 'Violet9618@gmail.com', 2, 25, '11/8/2022', 1, 1),
(26, '28417987', 'Liza1192@gmail.com', 3, 26, '17/7/2022', 1, 1),
(27, '96716474', 'Elizabeth5457@gmail.com', 3, 27, '26/1/2022', 1, 1),
(28, '49071585', 'Ellen3991@gmail.com', 3, 28, '30/3/2022', 1, 1),
(29, '69539739', 'Wenche4717@gmail.com', 5, 29, '16/9/2022', 1, 1),
(30, '37978107', 'Vicky4960@gmail.com', 2, 30, '3/6/2022', 1, 1),
(32, '04082003', 'huchuynh0707@gmail.com', 2, 32, '2023/04/16', 1, 1),
(34, '07072003', 'tuanhaomach@gmail.com', 2, 34, '2023/05/01', 1, 0),
(35, '12345678', 'thanhsang@gmail.com', 2, 35, '2023/05/11', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_group`
--

CREATE TABLE `auth_group` (
  `groupID` int(11) NOT NULL,
  `groupName` varchar(30) DEFAULT NULL,
  `date_create` varchar(30) DEFAULT NULL,
  `last_modify` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_group`
--

INSERT INTO `auth_group` (`groupID`, `groupName`, `date_create`, `last_modify`) VALUES
(1, 'admin', '2023/01/01', '2023/01/01'),
(2, 'customer', '2023/01/01', '2023/01/01'),
(3, 'employee', '2023/03/19', '2023/04/28'),
(5, 'manager', '2023/04/07', '2023/05/10'),
(6, 'abc', '2023/05/11', '2023/05/11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth_group_detail`
--

CREATE TABLE `auth_group_detail` (
  `groupID` int(11) DEFAULT NULL,
  `feaID` int(11) DEFAULT NULL,
  `action` varchar(30) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `auth_group_detail`
--

INSERT INTO `auth_group_detail` (`groupID`, `feaID`, `action`, `visible`) VALUES
(1, 1, 'ADD GAME', 1),
(1, 1, 'EDIT GAME', 1),
(1, 1, 'DELETE GAME', 1),
(1, 2, 'ADD ACCOUNT', 1),
(1, 2, 'EDIT ACCOUNT', 1),
(1, 2, 'DELETE ACCOUNT', 1),
(1, 3, 'DETAIL INVOICE', 1),
(1, 3, 'ACCEPT INVOICE', 1),
(1, 3, 'DECLINE INVOICE', 1),
(1, 4, 'STATISTIC', 1),
(1, 5, 'ADD AUTHORITY', 1),
(1, 5, 'EDIT AUTHORITY', 1),
(1, 5, 'DELETE AUTHORITY', 1),
(1, 6, 'VIEW IMPORT DETAIL', 1),
(1, 6, 'IMPORT GAMES', 1),
(1, 7, 'RESTORE GAME', 1),
(3, 1, 'ADD GAME', 1),
(3, 1, 'EDIT GAME', 0),
(3, 1, 'DELETE GAME', 0),
(3, 2, 'ADD ACCOUNT', 1),
(3, 2, 'EDIT ACCOUNT', 0),
(3, 2, 'DELETE ACCOUNT', 0),
(3, 3, 'DETAIL INVOICE', 0),
(3, 3, 'ACCEPT INVOICE', 1),
(3, 3, 'DECLINE INVOICE', 0),
(3, 4, 'STATISTIC', 0),
(3, 5, 'ADD AUTHORITY', 0),
(3, 5, 'EDIT AUTHORITY', 1),
(3, 5, 'DELETE AUTHORITY', 0),
(3, 6, 'VIEW IMPORT DETAIL', 0),
(3, 6, 'IMPORT GAMES', 0),
(3, 7, 'RESTORE GAME', 0),
(5, 1, 'ADD GAME', 1),
(5, 1, 'EDIT GAME', 1),
(5, 1, 'DELETE GAME', 1),
(5, 2, 'ADD ACCOUNT', 0),
(5, 2, 'EDIT ACCOUNT', 0),
(5, 2, 'DELETE ACCOUNT', 0),
(5, 3, 'DETAIL INVOICE', 1),
(5, 3, 'ACCEPT INVOICE', 1),
(5, 3, 'DECLINE INVOICE', 1),
(5, 4, 'STATISTIC', 1),
(5, 5, 'ADD AUTHORITY', 0),
(5, 5, 'EDIT AUTHORITY', 0),
(5, 5, 'DELETE AUTHORITY', 0),
(5, 6, 'VIEW IMPORT DETAIL', 1),
(5, 6, 'IMPORT GAMES', 1),
(5, 7, 'RESTORE GAME', 1),
(1, 9, 'ADD GENRE', 1),
(1, 9, 'EDIT GENRE', 1),
(1, 9, 'LOCK GENRE', 1),
(3, 9, 'ADD GENRE', 1),
(3, 9, 'EDIT GENRE', 0),
(3, 9, 'LOCK GENRE', 0),
(5, 9, 'ADD GENRE', 1),
(5, 9, 'EDIT GENRE', 0),
(5, 9, 'LOCK GENRE', 1),
(1, 8, 'VIEW SUPPLIER', 1),
(1, 8, 'ADD SUPPLIER', 1),
(1, 8, 'DELETE SUPPLIER', 1),
(1, 8, 'EDIT SUPPLIER', 1),
(3, 8, 'VIEW SUPPLIER', 0),
(3, 8, 'ADD SUPPLIER', 1),
(3, 8, 'DELETE SUPPLIER', 0),
(3, 8, 'EDIT SUPPLIER', 0),
(5, 8, 'VIEW SUPPLIER', 1),
(5, 8, 'ADD SUPPLIER', 0),
(5, 8, 'DELETE SUPPLIER', 1),
(5, 8, 'EDIT SUPPLIER', 0),
(6, 1, 'ADD GAME', 1),
(6, 1, 'EDIT GAME', 1),
(6, 1, 'DELETE GAME', 1),
(6, 2, 'ADD ACCOUNT', 0),
(6, 2, 'EDIT ACCOUNT', 0),
(6, 2, 'DELETE ACCOUNT', 0),
(6, 3, 'DETAIL INVOICE', 0),
(6, 3, 'ACCEPT INVOICE', 0),
(6, 3, 'DECLINE INVOICE', 0),
(6, 4, 'STATISTIC', 0),
(6, 5, 'ADD AUTHORITY', 0),
(6, 5, 'EDIT AUTHORITY', 0),
(6, 5, 'DELETE AUTHORITY', 0),
(6, 6, 'VIEW IMPORT DETAIL', 0),
(6, 6, 'IMPORT GAMES', 0),
(6, 7, 'RESTORE GAME', 0),
(6, 9, 'ADD GENRE', 0),
(6, 9, 'EDIT GENRE', 0),
(6, 9, 'LOCK GENRE', 0),
(6, 8, 'VIEW SUPPLIER', 0),
(6, 8, 'ADD SUPPLIER', 0),
(6, 8, 'DELETE SUPPLIER', 0),
(6, 8, 'EDIT SUPPLIER', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cUser_id` int(11) NOT NULL,
  `cItem_id` int(11) NOT NULL,
  `cItem_name` varchar(20) NOT NULL,
  `cItem_price_after_discount` varchar(5) NOT NULL,
  `cItem_price_before_discount` varchar(5) NOT NULL,
  `cItem_image` varchar(256) NOT NULL,
  `cItem_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cUser_id`, `cItem_id`, `cItem_name`, `cItem_price_after_discount`, `cItem_price_before_discount`, `cItem_image`, `cItem_quantity`) VALUES
(32, 36, 'Global Adventures', '2.77', '3.26', 'Global-Adventures.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `features`
--

CREATE TABLE `features` (
  `feaID` int(11) NOT NULL,
  `feaName` varchar(30) DEFAULT NULL,
  `feaIcon` varchar(256) DEFAULT NULL,
  `feaCode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `features`
--

INSERT INTO `features` (`feaID`, `feaName`, `feaIcon`, `feaCode`) VALUES
(1, 'Games', 'fa-solid fa-gamepad', 'listgame'),
(2, 'Accounts', 'fa-solid fa-users-gear', 'listaccount'),
(3, 'Invoice', 'fa-solid fa-barcode', 'listbills'),
(4, 'Statistic', 'fa-solid fa-chart-simple', 'statistic'),
(5, 'Authorization', 'fa-solid fa-screwdriver-wrench', 'authorization'),
(6, 'Import goods', 'fa-sharp fa-solid fa-dolly', 'import'),
(7, 'Trash game', 'fa-solid fa-trash-can', 'listgametrash'),
(8, 'Supplier', 'fa-solid fa-truck-field', 'listsupply'),
(9, 'Genres', 'fa-solid fa-dice-d6', 'listgenre');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `games`
--

CREATE TABLE `games` (
  `gid` int(11) NOT NULL,
  `gname` varchar(256) DEFAULT NULL,
  `gprice` mediumtext DEFAULT NULL,
  `genreID` int(11) NOT NULL,
  `gdiscount` int(11) DEFAULT NULL,
  `gimg` varchar(100) DEFAULT NULL,
  `gquantity` int(11) DEFAULT NULL,
  `trending` tinyint(1) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `games`
--

INSERT INTO `games` (`gid`, `gname`, `gprice`, `genreID`, `gdiscount`, `gimg`, `gquantity`, `trending`, `visible`) VALUES
(1, 'World of Tanks', '26.99', 18, 61, 'World-of-Tanks.jpg', 51, 0, 1),
(2, 'Warframe', '7.04', 18, 31, 'Warframe.jpg', 50, 0, 1),
(3, 'CRSED: F.O.A.D.', '68.99', 13, 49, 'CRSED-FOAD.jpg', 51, 0, 1),
(4, 'Crossout', '25.49', 1, 29, '4horseman.jpg', 135, 0, 1),
(5, 'Blade and Soul', '42.49', 3, 50, 'Blade-and-Soul.jpg', 51, 0, 1),
(6, 'Armored Warfare', '29.99', 13, 56, 'Armored-Warfare.jpg', 50, 0, 1),
(7, 'Trove', '25.43', 20, 51, 'Trove.jpg', 50, 1, 1),
(8, 'World of Warships', '13.23', 1, 36, 'World-of-Warships.jpg', 64, 1, 1),
(9, 'ArcheAge', '19.34', 8, 49, 'ArcheAge.jpg', 50, 0, 0),
(10, 'Neverwinter', '6.09', 3, 63, 'Neverwinter.jpg', 50, 0, 1),
(11, 'War Thunder', '19.99', 10, 33, 'War-Thunder.jpg', 54, 0, 1),
(12, 'Guild Wars 2', '6.68', 18, 25, 'Guild-Wars-2.jpg', 50, 0, 1),
(13, 'Star Trek Online', '39.98', 10, 28, 'Star-Trek-Online.jpg', 50, 0, 1),
(14, 'Crossfire', '25.49', 1, 33, 'Crossfire.jpg', 53, 0, 1),
(15, 'Roblox', '43.49', 13, 40, 'Roblox.jpg', 50, 0, 1),
(16, 'Entropia Universe', '5.99', 3, 72, 'Entropia-Universe.jpg', 50, 0, 1),
(17, 'Second Life', '41.99', 2, 25, 'Second-Life.jpg', 50, 1, 1),
(18, 'Minion Masters', '5.60', 12, 30, 'Minion-Masters.jpg', 50, 1, 1),
(19, 'Splitgate: Arena War', '4.49', 16, 27, 'Splitgate-Arena-Warfare.jpg', 50, 1, 1),
(20, 'Destiny 2', '8.89', 9, 30, 'Destiny-2.jpg', 50, 0, 1),
(21, 'Wild Terra Online', '29.29', 16, 41, 'Wild-Terra-Online.jpg', 50, 1, 1),
(22, 'Apex Legends', '34.99', 10, 25, 'Apex-Legends.jpg', 50, 0, 1),
(23, 'Counter-Strike: Glob', '5.51', 18, 55, 'Counter-Strike-Global-Offensive.jpg', 50, 1, 1),
(24, 'Spacelords', '8.99', 10, 52, 'Spacelords.jpg', 50, 1, 1),
(25, 'Ring of Elysium', '55.99', 10, 25, 'Ring-of-Elysium.jpg', 50, 0, 0),
(26, 'Quake Champions', '7.14', 14, 34, 'Quake-Champions.jpg', 50, 0, 1),
(27, 'Cosmos Invictus', '29.99', 3, 45, 'Cosmos-Invictus.jpg', 50, 0, 1),
(28, 'Realm Royale Reforged', '11.89', 8, 34, 'Realm-Royale-Reforged.jpg', 50, 0, 1),
(29, 'Darwin Project', '14.99', 12, 39, 'Darwin-Project.jpg', 50, 0, 1),
(30, 'Spellsworn', '32.99', 13, 33, 'Spellsworn.jpg', 50, 0, 0),
(31, 'Z1 Battle Royale', '3.99', 18, 45, 'Z1-Battle-Royale.jpg', 50, 1, 1),
(32, 'Tale Of Toast', '49.69', 20, 35, 'Tale-Of-Toast.jpg', 50, 0, 1),
(33, 'Bombtag', '19.59', 4, 45, 'Bombtag.jpg', 50, 1, 1),
(34, 'Ironsight', '22.19', 16, 40, 'Ironsight.jpg', 50, 0, 1),
(35, 'Dead Maze', '3.99', 19, 38, 'Dead-Maze.jpg', 50, 1, 1),
(36, 'Global Adventures', '3.26', 9, 15, 'Global-Adventures.jpg', 50, 1, 1),
(37, 'Closers', '4.50', 4, 63, 'Closers.jpg', 50, 0, 1),
(38, 'Deceit', '27.99', 5, 40, 'Deceit.jpg', 50, 0, 0),
(39, 'Grimoire: Manastorm', '11.99', 4, 4, 'Grimoire-Manastorm.jpg', 50, 0, 1),
(40, 'Fortnite', '23.90', 1, 6, 'Fortnite.jpg', 64, 0, 1),
(41, 'The Ultimatest Battl', '13.89', 19, 15, 'The-Ultimatest-Battle.jpg', 50, 0, 1),
(42, 'Insidia', '6.59', 14, 31, 'Insidia.jpg', 50, 0, 0),
(43, 'Brink', '16.99', 7, 29, 'Brink.jpg', 50, 0, 1),
(44, 'Black Squad', '18.89', 15, 32, 'Black-Squad.jpg', 50, 0, 1),
(45, 'Kritika: REBOOT', '20.49', 5, 28, 'Kritika-REBOOT.jpg', 50, 1, 1),
(46, 'Argo', '71.49', 8, 37, 'Argo.jpg', 50, 0, 1),
(47, 'Secret World Legends', '21.59', 6, 18, 'Secret-World-Legends.jpg', 50, 0, 1),
(48, 'Pixel Worlds', '26.99', 3, 45, 'Pixel-Worlds.jpg', 50, 0, 1),
(49, 'Gwent: The Witcher C', '38.50', 3, 12, 'Gwent-The-Witcher-Card-Game.jpg', 50, 0, 1),
(50, 'Awesomenauts', '12.36', 16, 7, 'Awesomenauts.jpg', 50, 0, 1),
(51, 'Dreadnought', '7.99', 2, 90, 'Dreadnought.jpg', 50, 0, 0),
(52, 'Cabals: Card Blitz', '21.50', 8, 47, 'Cabals-Card-Blitz.jpg', 46, 1, 1),
(53, 'Alien Swarm: Reactiv', '3.09', 6, 51, 'Alien-Swarm-Reactive-Drop.jpg', 0, 0, 1),
(54, 'Catan Universe', '17.69', 2, 36, 'Catan-Universe.jpg', 50, 0, 1),
(55, 'Krosmaga', '13.35', 2, 46, 'Krosmaga.jpg', 50, 0, 0),
(56, 'Revelation Online', '26.99', 20, 53, 'Revelation-Online.jpg', 50, 0, 1),
(57, 'Line of Sight', '7.04', 12, 31, 'Line-of-Sight.jpg', 50, 0, 1),
(58, 'Heavy Metal Machines', '26.99', 3, 61, 'Heavy-Metal-Machines.jpg', 50, 1, 1),
(59, 'Infestation: The New', '68.99', 14, 49, 'Infestation-The-New-Z.jpg', 50, 0, 1),
(60, 'MU Legend', '25.49', 20, 29, 'MU-Legend.jpg', 50, 0, 1),
(61, 'Shadowverse', '42.49', 10, 50, 'Shadowverse.jpg', 50, 0, 1),
(62, 'AdventureQuest 3D', '29.99', 2, 56, 'AdventureQuest-3D.jpg', 50, 0, 1),
(63, 'Eternal', '13.23', 10, 36, 'Eternal.jpg', 50, 1, 1),
(64, 'One Tower', '25.43', 9, 51, 'One-Tower.jpg', 50, 0, 1),
(65, 'Riding Club Champion', '6.09', 16, 63, 'Riding-Club-Championships.jpg', 50, 0, 1),
(66, 'Battlerite', '25.49', 20, 33, 'Battlerite.jpg', 50, 0, 1),
(67, 'Paladins', '19.34', 10, 49, 'Paladins.jpg', 50, 0, 0),
(68, 'Otherland', '39.98', 1, 28, 'Otherland.jpg', 50, 0, 1),
(69, 'Star Crusade', '6.68', 13, 25, 'Star-Crusade.jpg', 50, 0, 1),
(70, 'The Elder Scrolls: L', '19.99', 19, 33, 'The-Elder-Scrolls-Legends.jpg', 50, 0, 1),
(71, 'Fallout Shelter', '43.49', 20, 40, 'Fallout-Shelter.jpg', 50, 0, 1),
(72, 'Riders of Icarus', '5.99', 1, 72, 'Riders-of-Icarus.jpg', 50, 0, 0),
(73, 'Zula', '29.29', 12, 41, 'Zula.jpg', 50, 0, 1),
(74, 'LuckCatchers', '41.99', 9, 25, 'LuckCatchers.jpg', 50, 0, 1),
(75, 'UFO Online: Invasion', '4.49', 14, 27, 'UFO-Online-Invasion.jpg', 50, 0, 1),
(76, 'Weapons Of Mythology', '5.60', 16, 30, 'Weapons-Of-Mythology.jpg', 50, 0, 1),
(77, 'Tree of Savior', '8.89', 4, 30, 'Tree-of-Savior.jpg', 50, 0, 1),
(78, 'Astral Heroes', '34.99', 14, 25, 'Astral-Heroes.jpg', 50, 0, 1),
(79, 'Starbreak', '29.99', 15, 45, 'Starbreak.jpg', 50, 0, 1),
(80, 'Fantasy Tales Online', '55.99', 18, 25, 'Fantasy-Tales-Online.jpg', 50, 0, 1),
(81, 'Luna Online: Reborn', '5.51', 12, 55, 'Luna-Online-Reborn.jpg', 50, 1, 1),
(82, 'Forza Motorsport 6: ', '7.14', 10, 34, 'Forza-Motorsport-6-Apex.jpg', 50, 0, 1),
(83, 'Holodrive', '8.99', 7, 52, 'Holodrive.jpg', 50, 0, 1),
(84, 'Atom Universe', '4.50', 14, 63, 'Atom-Universe.jpg', 50, 1, 1),
(85, 'Spellweaver', '14.99', 3, 39, 'Spellweaver.jpg', 50, 0, 1),
(86, 'War Trigger 3', '11.89', 5, 34, 'War-Trigger-3.jpg', 50, 0, 1),
(87, 'VEGA Conflict', '32.99', 13, 33, 'VEGA-Conflict.jpg', 50, 0, 1),
(88, 'Metal War Online: Re', '3.99', 20, 45, 'Metal-War-Online-Retribution.jpg', 50, 0, 0),
(89, 'Immortal Empire', '49.69', 13, 35, 'Immortal-Empire.jpg', 50, 0, 1),
(90, 'America’s Army: Prov', '3.26', 8, 15, 'America’s-Army-Proving-Grounds.jpg', 50, 0, 1),
(91, 'WARMODE', '19.59', 20, 45, 'WARMODE.jpg', 50, 1, 1),
(92, 'Sphere 3: Enchanted ', '22.19', 2, 40, 'Sphere-3-Enchanted-World.jpg', 50, 0, 1),
(93, 'Fishing Planet', '3.99', 6, 38, 'Fishing-Planet.jpg', 50, 1, 1),
(94, 'Codename CURE', '27.99', 5, 40, 'Codename-CURE.jpg', 50, 0, 1),
(95, 'Skyforge', '11.99', 6, 4, 'Skyforge.jpg', 50, 0, 0),
(96, 'Card Hunter', '23.90', 9, 6, 'Card-Hunter.jpg', 50, 0, 1),
(97, 'Salem', '13.89', 12, 15, 'Salem.jpg', 50, 0, 1),
(98, 'Heroes of the Storm', '16.99', 15, 29, 'Heroes-of-the-Storm.jpg', 50, 0, 1),
(99, 'Dirty Bomb', '6.59', 2, 31, 'Dirty-Bomb.jpg', 50, 0, 1),
(100, 'Block N Load', '18.89', 8, 32, 'Block-N-Load.jpg', 50, 0, 1),
(101, 'Survarium', '20.49', 11, 28, 'Survarium.jpg', 50, 0, 1),
(102, 'Dungeon Fighter Onli', '71.49', 7, 37, 'Dungeon-Fighter-Online.jpg', 50, 0, 1),
(103, 'Transformice', '21.59', 18, 18, 'Transformice.jpg', 50, 0, 0),
(104, 'Gear Up', '26.99', 20, 45, 'Gear-Up.jpg', 50, 0, 0),
(105, '8BitMMO', '38.50', 10, 12, '8BitMMO.jpg', 50, 0, 1),
(106, 'Dungeon Defenders 2', '12.36', 1, 7, 'Dungeon-Defenders-2.jpg', 50, 0, 0),
(107, 'Blockade 3D', '7.99', 19, 90, 'Blockade-3D.jpg', 50, 0, 1),
(108, 'Eldevin', '3.09', 11, 51, 'Eldevin.jpg', 49, 0, 1),
(109, 'Double Action', '17.69', 19, 36, 'Double-Action.jpg', 50, 0, 1),
(110, 'Pox Nora', '13.35', 6, 46, 'Pox-Nora.jpg', 50, 0, 1),
(111, 'Counter-Strike Nexon', '26.99', 17, 53, 'Counter-Strike-Nexon-Studio.jpg', 50, 0, 1),
(112, 'Uncharted Waters Online', '21.59', 20, 50, 'Uncharted-Waters-Online.jpg', 50, 0, 0),
(358, 'heloooohaha', '20', 30, 12, '8BitMMO.jpg', 0, 0, 1),
(359, 'xmen', '20', 1, 90, '4horseman.jpg', 18, 0, 1),
(363, 'xmen', '20', 30, 23, '4horseman.jpg', 0, 0, 1),
(364, 'ava', '20', 30, 25, 'cnxh.txt', 0, 0, 1),
(365, 'abcd', '20', 1, 20, 'Heavy-Metal-Machines.jpg', 10, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game_detail`
--

CREATE TABLE `game_detail` (
  `gdt_id` int(11) NOT NULL,
  `about` varchar(600) NOT NULL,
  `cfg_os` varchar(30) NOT NULL,
  `cfg_processor` varchar(30) NOT NULL,
  `cfg_graphics` varchar(30) NOT NULL,
  `cfg_storage` varchar(30) NOT NULL,
  `screenshot1` varchar(80) NOT NULL,
  `screenshot2` varchar(80) NOT NULL,
  `screenshot3` varchar(80) NOT NULL,
  `screenshot4` varchar(80) NOT NULL,
  `trailer` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `game_detail`
--

INSERT INTO `game_detail` (`gdt_id`, `about`, `cfg_os`, `cfg_processor`, `cfg_graphics`, `cfg_storage`, `screenshot1`, `screenshot2`, `screenshot3`, `screenshot4`, `trailer`) VALUES
(1, 'World of Tanks is a popular free to play multiplayer role playing team-based shooter game developed by Wargaming.net. World of Tanks is based around the middle of the 20th century, and features huge epic battles with various different game modes such as Standard, Assault, Encounter Battles, and an added bonus of 15 tanks vs 15 enemy tanks gameplay.The game starts off with quite easy gameplay but eventuates into a more difficult game as you progress, and because a typical game only takes between 5-10 minutes the game can get quite intense as well. Unlike other games in World of Tanks you cannot', 'Windows XP / Vista /', 'Nvidia GeForce 6800 ', 'Intel Pentium 4 2.2 ', '16 GB', 'https://www.freetogame.com/g/2/World-of-Tanks-1.jpg', 'https://www.freetogame.com/g/2/World-of-Tanks-2.jpg', 'https://www.freetogame.com/g/2/World-of-Tanks-3.jpg', 'https://www.freetogame.com/g/2/World-of-Tanks-4.jpg', 'https://www.freetogame.com/g/2/videoplayback.webm'),
(2, 'Warframe is a 3D free-to-play cooperative third-person shooter game set in an stunning sci-fi world. In the distant future, war against the Grineer Empire leads humanity to summon ancient warriors from the distant past. Called “Tenno,” these agile fighters are equally skilled in blades and guns, able to carve their way through scores of enemies with skill and aplomb. A vast arsenal of these human weapons are called upon in mankind’s darkest hour to rescue their brethren from total annihilation.As one of these Tenno, staked with protecting humanity, you’ll root out the Grineer from all their hi', 'Windows XP SP 3 or h', 'Nvidia GeForce 8600 ', 'Intel Core 2 Duo e64', '10 GB HD space ', 'https://www.freetogame.com/g/3/warframe-1.jpg', 'https://www.freetogame.com/g/3/warframe-2.jpg', 'https://www.freetogame.com/g/3/warframe-3.jpg', 'https://www.freetogame.com/g/3/warframe-4.jpg', 'https://www.freetogame.com/g/3/videoplayback.webm'),
(3, 'Darkflow Software’s Cuisine Royale has been reincarnated as the “brutal MMO last-man-standing shooter”, CRSED: F.O.A.D (Cuisine Royale Second Edition) This game replaces the original and is focused on massive PvP battles filled with dozens of players fighting for supremacy in one of four highly detailed locations. Of course, this is a battle royale, so in addition to dealing with each other, players must contend with the ever-shrinking map.Players can choose between seven different champions, each with a unique super power. Speaking of powers, there’s also a bit of mysticism involved, with anc', 'Windows 7 64bit /8 6', 'Nvidia GeForce 560 o', 'Intel Core i3', '6 GB available space', 'https://www.freetogame.com/g/4/crsed-1.jpg', 'https://www.freetogame.com/g/4/crsed-2.jpg', 'https://www.freetogame.com/g/4/crsed-3.jpg', 'https://www.freetogame.com/g/4/crsed-4.jpg', 'https://www.freetogame.com/g/4/videoplayback.webm'),
(4, 'Crossout is a free to play post-apocalyptic MMO vehicle combat game! Gaijin Entertainment is taking the vehicular multiplayer shooter genre full gear with Crossout.Following the double catastrophes of a failed genetic testing project and an alien invasion, players are thrown into a wasteland world not unlike that of Mad Max. The harsh, post-apocalyptic terrain of Crossout forces players to build and customize their vehicles to fight and endure the elements and other players. Hunker down in the in-game Workshop and use the countless parts earned in battle to craft a formidable death machine cap', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/5/Crossout-1.jpg', 'https://www.freetogame.com/g/5/Crossout-2.jpg', 'https://www.freetogame.com/g/5/Crossout-3.jpg', 'https://www.freetogame.com/g/5/Crossout-4.jpg', 'https://www.freetogame.com/g/5/videoplayback.webm'),
(5, 'Blade ', 'Windows XP', 'GeForce 8600 GT / AT', 'Intel Core 2 DUo E66', '15GB', 'https://www.freetogame.com/g/6/Blade-and-Soul-1.jpg', 'https://www.freetogame.com/g/6/Blade-and-Soul-2.jpg', 'https://www.freetogame.com/g/6/Blade-and-Soul-3.jpg', 'https://www.freetogame.com/g/6/Blade-and-Soul-4.jpg', 'https://www.freetogame.com/g/6/videoplayback.webm'),
(6, 'Armored Warfare is a free to play 3D team-based MMO tank game from Obsidian Entertainment where you control combat vehicles from the 1950s all the way to modern day vehicles.  It is set in the modern day and is heavily focused on PvP, but it does have a selection of PvE game modes.You can choose to play with one of five different classes: Main Battle Tanks, Light Tanks, Tank Destroyers, Armored Fighting Vehicles and Self-Propelled Guns. Each of the different classes comes with many different combat vehicles and many different combat styles.The games main focus is PvP it does have a PvE side to', 'Windows Vista / 7 / ', 'GeForce GTX 275 or b', 'Core i5-4440 @ 3.1 G', '10 GB', 'https://www.freetogame.com/g/7/armored-warfare-1.jpg', 'https://www.freetogame.com/g/7/armored-warfare-2.jpg', 'https://www.freetogame.com/g/7/armored-warfare-3.jpg', 'https://www.freetogame.com/g/7/armored-warfare-4.jpg', 'https://www.freetogame.com/g/7/videoplayback.webm'),
(7, 'If you’re thirsting for danger and lusting for loot, then I have just the game for you! Grab your fr', 'Vista 32-bit Service', 'Intel HD Graphics 30', 'Intel Core i5-2XXX @', '1 GB available space', 'https://www.freetogame.com/g/8/trove-1.jpg', 'https://www.freetogame.com/g/8/trove-2.jpg', 'https://www.freetogame.com/g/8/trove-3.jpg', 'https://www.freetogame.com/g/8/trove-4.jpg', 'https://www.freetogame.com/g/8/videoplayback.webm'),
(8, 'World of Warships is a 3D free to play naval action-themed MMO (massively multiplayer online) from t', 'Windows XP, Windows ', 'GeForce 9600GT (512 ', 'Core2 Duo E6750 (Pen', '30 GB', 'https://www.freetogame.com/g/9/World-of-Warships-1.jpg', 'https://www.freetogame.com/g/9/World-of-Warships-2.jpg', 'https://www.freetogame.com/g/9/World-of-Warships-3.jpg', 'https://www.freetogame.com/g/9/World-of-Warships-4.jpg', 'https://www.freetogame.com/g/9/videoplayback.webm'),
(9, 'ArcheAge is a free-to-play, hybrid fantasy/sandbox MMORPG brought to you by Trion Worlds. Set in the fantasy world of Erenor, players are sent out on a journey of their own choosing. Players start on one of two continents: Nuia, home of the elves or Harihara, home of the Ferres. After that, the choices are up to the player from where to go, to why, and what actions to perform.ArcheAge offers four unique races which possess their own innate qualities with an additional ten skill trees that create up to one hundred and twenty class options. By choosing three of the ten basic skill types, players', 'Windows XP / Sp3 / V', 'nVidia GeForce 8000 ', 'Intel Core 2 Duo', '40GB', 'https://www.freetogame.com/g/10/archeage-1.jpg', 'https://www.freetogame.com/g/10/archeage-2.jpg', 'https://www.freetogame.com/g/10/archeage-3.jpg', 'https://www.freetogame.com/g/10/archeage-4.jpg', 'https://www.freetogame.com/g/10/videoplayback.webm'),
(10, 'If you’re a fan of Dungeons and Dragons, have I got a game for you! Neverwinter, developed by Cryptic Studios and published by Perfect World Entertainment, is based on the critically acclaimed fantasy role playing game and the best part is ­ it’s free to play. In the world of Neverwinter, you will explore and defend one of the most beloved cities from the Dungeons and Dragons Forgotten Realms Campaign Setting, as it rises from the ashes of total destruction. In this totally immersive MMORPG you will go from the besieged walls of the city, to the subterranean passageways and search for forgotte', 'Windows® XP, Windows', 'Shader Model 2.0 or ', 'Dual-core 2.0GHz CPU', '4 GB available space', 'https://www.freetogame.com/g/11/Neverwinter-1.jpg', 'https://www.freetogame.com/g/11/Neverwinter-2.jpg', 'https://www.freetogame.com/g/11/Neverwinter-3.jpg', 'https://www.freetogame.com/g/11/Neverwinter-4.jpg', 'https://www.freetogame.com/g/11/videoplayback.webm'),
(11, 'War Thunder is a massively multiplayer shooter that puts you in command of hundreds of the finest combat vehicles of World War II. You’ll pilot warplanes in exciting PvP dogfights and rumble across the battlefield in tanks, battling against foes on across several vintage maps, featuring diverse terrain and offering several strategic options. There are many different ways to play War Thunder, ranging from quick arcade mode-style combat to competitive, realistic battles.The vehicles in War Thunder represent WWII-era tanks and planes from several different nations, including the United States, Gr', 'Windows XP SP2, Wind', 'Radeon X26XX / GeFor', '2.2 GHz', '3 GB available space', 'https://www.freetogame.com/g/12/War-Thunder-1.jpg', 'https://www.freetogame.com/g/12/War-Thunder-2.jpg', 'https://www.freetogame.com/g/12/War-Thunder-3.jpg', 'https://www.freetogame.com/g/12/War-Thunder-4.jpg', 'https://www.freetogame.com/g/12/videoplayback.webm'),
(12, 'Guild Wars 2 is a free-to-play open-world MMORPG, the follow-up to ArenaNet’s popular Guild Wars. Bu', 'Windows® XP Service ', 'NVIDIA® GeForce® 780', 'Intel® Core 2 Duo 2.', '35 GB available HDD ', 'https://www.freetogame.com/g/13/Guil-Wars-2-1.jpg', 'https://www.freetogame.com/g/13/Guil-Wars-2-2.jpg', 'https://www.freetogame.com/g/13/Guil-Wars-2-3.jpg', 'https://www.freetogame.com/g/13/Guil-Wars-2-4.jpg', 'https://www.freetogame.com/g/13/videoplayback.webm'),
(13, 'Star Trek Online (STO) is a free-to-play, 3D, Sci-Fi MMORPG based on the popular Star Trek series. I', 'Windows XP SP2 / Win', 'NVIDIA GeForce 7800 ', 'Intel Core 2 Duo 1.8', '10GB Free Disk Space', 'https://www.freetogame.com/g/14/Star-Trek-Online-1.jpg', 'https://www.freetogame.com/g/14/Star-Trek-Online-2.jpg', 'https://www.freetogame.com/g/14/Star-Trek-Online-3.jpg', 'https://www.freetogame.com/g/14/Star-Trek-Online-4.jpg', 'https://www.freetogame.com/g/14/videoplayback.webm'),
(14, 'Crossfire is a first person tactical shooter that has a huge selection of game modes to try out, a decent amount of character customization, and loads of weapons for every situation you could find yourself in. Crossfire features two groups, Blacklist and Global Risk, that are constantly at odds with one another. Players must join an online team and participate in various game modes with their selected faction to destroy their enemies.Never fear about running out of game modes to try out, Crossfire boasts 19 different game modes that you can play through time and time again. Team Deathmatch, De', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/275/Dragon-Saga-1.jpg', 'https://www.freetogame.com/g/275/Dragon-Saga-2.jpg', 'https://www.freetogame.com/g/275/Dragon-Saga-3.jpg', 'https://www.freetogame.com/g/275/Dragon-Saga-4.jpg', 'https://www.freetogame.com/g/15/videoplayback.webm'),
(15, 'Vindictus is a free to play action MMO game (MORPG) by Nexon, the same people who brought you Mabino', 'Windows XP / Vista /', 'GeForce 7800 GTX / R', 'Intel Core 2 Duo E46', '10 GB', 'https://www.freetogame.com/g/276/Vindictus-1.jpg', 'https://www.freetogame.com/g/276/Vindictus-2.jpg', 'https://www.freetogame.com/g/276/Vindictus-3.jpg', 'https://www.freetogame.com/g/276/Vindictus-4.jpg', 'https://www.freetogame.com/g/16/videoplayback.webm'),
(16, 'Mortal Online is a free to play First Person sandbox MMORPG with a huge medieval fantasy world. This', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/278/Mortal-Online-1.jpg', 'https://www.freetogame.com/g/278/Mortal-Online-2.jpg', 'https://www.freetogame.com/g/278/Mortal-Online-3.jpg', 'https://www.freetogame.com/g/278/Mortal-Online-4.jpg', 'https://www.freetogame.com/g/17/videoplayback.webm'),
(17, 'Second Life is a free to play 3D online virtual world with a huge reputation, is one of the oldest Online Virtual worlds, and is still running strong even today. Second Life is, as the name suggests, virtually a second life that the player can logged into.Unlike most games where there is a set “goal” or “end” to work toward, Second Life doesn’t really have a linear story, nor does it follow the normal standard for video games. In Second Life, you start with an avatar that can be customized with a huge database filled with different cosmetic items. From there, you can do virtually anything you ', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/380/DarkOrbit-Reloaded-screenshots-1.jpg', 'https://www.freetogame.com/g/380/DarkOrbit-Reloaded-screenshots-2.jpg', 'https://www.freetogame.com/g/380/DarkOrbit-Reloaded-screenshots-3.jpg', 'https://www.freetogame.com/g/380/DarkOrbit-Reloaded-screenshots-4.jpg', 'https://www.freetogame.com/g/18/videoplayback.webm'),
(18, 'Star Wars: The Old Republic is a 3D sci-fi MMORPG based on the popular Star Wars universe and brough', 'Windows 7 / 8', 'Nvidia GeForce 465 G', 'Intel Pentium Dual C', '15 GB', 'https://www.freetogame.com/g/257/Star-Wars-The-Old-Republic-1.jpg', 'https://www.freetogame.com/g/257/Star-Wars-The-Old-Republic-2.jpg', 'https://www.freetogame.com/g/257/Star-Wars-The-Old-Republic-3.jpg', 'https://www.freetogame.com/g/257/Star-Wars-The-Old-Republic-4.jpg', 'https://www.freetogame.com/g/19/videoplayback.webm'),
(19, 'All Points Bulletin (ABP): Reloaded is a free to play 3D massively multiplayer online third person s', 'Windows XP ', 'GeForce 7800 with 25', 'Intel Core 2 Duo E64', '7 GB HD space ', 'https://www.freetogame.com/g/258/APB-Reloaded-1.jpg', 'https://www.freetogame.com/g/258/APB-Reloaded-2.jpg', 'https://www.freetogame.com/g/258/APB-Reloaded-3.jpg', 'https://www.freetogame.com/g/258/APB-Reloaded-4.jpg', 'https://www.freetogame.com/g/20/videoplayback.webm'),
(20, 'Get ready to explore the solar system in Bungie’s Destiny 2. The game, available on PS4 and PC, has ', 'Windows Vista or new', 'GeForce 9800 GTX  or', 'Core 2 Duo 2.4G or b', '10 GB available spac', 'https://www.freetogame.com/g/21/Destiny-2-1.jpg', 'https://www.freetogame.com/g/21/Destiny-2-2.jpg', 'https://www.freetogame.com/g/21/Destiny-2-3.jpg', 'https://www.freetogame.com/g/21/Destiny-2-4.jpg', 'https://www.freetogame.com/g/21/videoplayback.webm'),
(21, 'Wild Terra Online is a medieval sandbox MMO designed with hardcore players in mind. The game, develo', 'Windows XP/Vista/7/8', '512 MB, WebGL suppor', '2.2 GHz or higher', '600 MB available spa', 'https://www.freetogame.com/g/22/wild-terra-1.jpg', 'https://www.freetogame.com/g/22/wild-terra-2.jpg', 'https://www.freetogame.com/g/22/wild-terra-3.jpg', 'https://www.freetogame.com/g/22/wild-terra-4.jpg', 'https://www.freetogame.com/g/22/videoplayback.webm'),
(22, 'If you’ve been looking for a game to scratch that open-world ARPG itch, one with perhaps a bit of As', 'Windows 7 SP1 64-bit', 'NVIDIA GeForce GTX 1', 'Intel Core i7 or equ', '30 GB', 'https://www.freetogame.com/g/20/splitgate-arena-warefare-4.jpg', 'https://www.freetogame.com/g/20/splitgate-arena-warefare-1.jpg', 'https://www.freetogame.com/g/20/splitgate-arena-warefare-2.jpg', 'https://www.freetogame.com/g/20/splitgate-arena-warefare-3.jpg', 'https://www.freetogame.com/g/23/videoplayback.webm'),
(23, 'Counter-Strike: Global Offensive is the popular multi-player shooter from Valve. One of the most pop', 'Windows® 7/Vista/XP', 'Video card must be 2', 'Intel® Core™ 2 Duo E', '15 GB available spac', 'https://www.freetogame.com/g/24/counter-strike-global-offensive-1.jpg', 'https://www.freetogame.com/g/24/counter-strike-global-offensive-2.jpg', 'https://www.freetogame.com/g/24/counter-strike-global-offensive-3.jpg', 'https://www.freetogame.com/g/24/counter-strike-global-offensive-4.jpg', 'https://www.freetogame.com/g/24/videoplayback.webm'),
(24, 'Bless Online is a free-to-play fantasy MMORPG featuring field battles, monster taming, and large 100', 'Windows 7, 8, 8.1, 1', 'NVIDIA GeForce GTX76', 'Intel Core i5 4670 /', '55 GB available spac', 'https://www.freetogame.com/g/25/Bless-1.jpg', 'https://www.freetogame.com/g/25/Bless-2.jpg', 'https://www.freetogame.com/g/25/Bless-3.jpg', 'https://www.freetogame.com/g/25/Bless-4.jpg', 'https://www.freetogame.com/g/25/videoplayback.webm'),
(25, 'Released in 2004, Metin 2 is a classic free to play 3D MMORPG with a retro feel to it. If you are so', 'Win 7, Win 8 ', 'Graphics card with m', 'Pentium 4 1.8 GHz', '3 GB', 'https://www.freetogame.com/g/333/Metin-2-1.jpg', 'https://www.freetogame.com/g/333/Metin-2-2.jpg', 'https://www.freetogame.com/g/333/Metin-2-3.jpg', 'undefined', 'https://www.freetogame.com/g/26/videoplayback.webm'),
(26, 'Dungeon Crawler games like Diablo have a surprisingly addictive quality to them, despite being based', 'Windows XP Service P', 'Geforce 6x00, Radeon', 'Pentium D 915 (2.8 G', '6 GB', 'https://www.freetogame.com/g/334/Mu-Online-1.jpg', 'https://www.freetogame.com/g/334/Mu-Online-2.jpg', 'https://www.freetogame.com/g/334/Mu-Online-3.jpg', 'undefined', 'https://www.freetogame.com/g/27/videoplayback.webm'),
(27, 'Ragnarok Online (RO) is free to play fantasy MMORPG with a isometric world to explore and solid game', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/335/Ragnarok-Online-1.jpg', 'https://www.freetogame.com/g/335/Ragnarok-Online-2.jpg', 'https://www.freetogame.com/g/335/Ragnarok-Online-3.jpg', 'undefined', 'https://www.freetogame.com/g/28/videoplayback.webm'),
(28, 'What happens when you add dynamic weather events, extreme sports, and more goals than simply surviving to a battle royale? You get Tencent Games’ Ring of Elysium. Like most battle royale games, Ring of Elysium drops 100 players on a map, with the primary goal being for them to make it out alive. Unlike other BR games, there’s an additional objective. Upon landing on the map, players will need to survive while making their way to a helicopter and escape the mountain. Four players can fit on the helicopter, so that means there can be more than one winner.A primary feature of the game is the dyna', 'Windows 7, Windows 8', 'NVIDIA GeForce GT 73', 'Intel i3 8130U(2Core', '10 GB available spac', 'https://www.freetogame.com/g/29/ring-of-elysium-1.jpg', 'https://www.freetogame.com/g/29/ring-of-elysium-2.jpg', 'https://www.freetogame.com/g/29/ring-of-elysium-3.jpg', 'https://www.freetogame.com/g/29/ring-of-elysium-4.jpg', 'https://www.freetogame.com/g/29/videoplayback.webm'),
(29, 'Quake Champions is a callback to the early days of the Quake IP, featuring the fast-paced action tha', 'Windows 7 and later', 'AMD R7 240 GB / Nvid', 'AMD Phenom II X4-945', '20 GB available spac', 'https://www.freetogame.com/g/30/quake-champions-1.jpg', 'https://www.freetogame.com/g/30/quake-champions-2.jpg', 'https://www.freetogame.com/g/30/quake-champions-3.jpg', 'https://www.freetogame.com/g/30/quake-champions-4.jpg', 'https://www.freetogame.com/g/30/videoplayback.webm'),
(30, 'Cosmos Invictus is a strategic collectible card game developed and published by Pegnio Ltd. Described by the developer as being filled with tactical elements not normally found in card games, Cosmos Invictus features customizable spaceships,pilots, and events that can have a great influence on the battle. The developer emphasizes that this game is “true, pure, hard sci-fi” with no magic involved.Players take on the role of Captain for one of two factions, Gaia Unity or High Frontier Alliance. Some cards will be determined by this choice. Decks are abuilt out of a selection of mechs (the main u', 'Windows XP, Windows ', 'NVIDIA GeForce 6800 ', 'Intel Pentium D or A', '1 GB available space', 'https://www.freetogame.com/g/31/cosmos-invictus-1.jpg', 'https://www.freetogame.com/g/31/cosmos-invictus-2.jpg', 'https://www.freetogame.com/g/31/cosmos-invictus-3.jpg', 'https://www.freetogame.com/g/31/cosmos-invictus-4.jpg', 'https://www.freetogame.com/g/31/videoplayback.webm'),
(31, 'Champions of Titan (originally Wild Buster on Steam) is a free-to-play sci-fi MMORPG from IDC/Games.', 'Windows 7, 8, 10', 'GeForce 560 GT', 'Intel i3', '4 GB available space', 'https://www.freetogame.com/g/32/champions-of-titan-1.jpg', 'https://www.freetogame.com/g/32/champions-of-titan-2.jpg', 'https://www.freetogame.com/g/32/champions-of-titan-3.jpg', 'https://www.freetogame.com/g/32/champions-of-titan-4.jpg', 'https://www.freetogame.com/g/32/videoplayback.webm'),
(32, 'Caller’s Bane is the free-to-play reboot of Mojang’s card/board game Scrolls. Place units on a battl', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/33/callers-bane-1.jpg', 'https://www.freetogame.com/g/33/callers-bane-2.jpg', 'https://www.freetogame.com/g/33/callers-bane-3.jpg', 'https://www.freetogame.com/g/33/callers-bane-4.jpg', 'https://www.freetogame.com/g/33/videoplayback.webm'),
(33, 'Runescape, is a popular free to play 3D browser based fantasy MMORPG boasting a huge player base and', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/32/champions-of-titan-1.jpg', 'https://www.freetogame.com/g/32/champions-of-titan-2.jpg', 'https://www.freetogame.com/g/32/champions-of-titan-3.jpg', 'https://www.freetogame.com/g/32/champions-of-titan-4.jpg', 'https://www.freetogame.com/g/34/videoplayback.webm'),
(34, 'Defiance 2050 is a re-imagining of Trion Worlds’ sci-fi shooter Defiance. Designed to take advantage of currently available hardware, 2050 recreates the original game from the ground up. The game offers playres a dynamic, post-apocalyptic open-world landscape to explore and experience battles and story-driven missions in. Players can participate in massive co-op battles using hundreds of weapons and skills.Created with the original Defiance community in mind, Defiance 2050 takes player feedback seriously. It updates not only the visuals, but also specific systems, such as the class system.', 'Windows 7 or newer', 'Nvidia GeForce GTX 6', 'Intel Core i5-2XXX @', '17 GB available spac', 'https://www.freetogame.com/g/35/Defiance-2050-1.jpg', 'https://www.freetogame.com/g/35/Defiance-2050-2.jpg', 'https://www.freetogame.com/g/35/Defiance-2050-3.jpg', 'https://www.freetogame.com/g/35/Defiance-2050-4.jpg', 'https://www.freetogame.com/g/35/videoplayback.webm'),
(35, 'Realm Royale Reforged is a free-to-play fantasy-themed battle royale game based on Hi-Rez Studio’s t', 'Windows 7', 'NVIDIA GeForce GTX 5', 'Intel(R) Core(TM) i5', '5 GB available space', 'https://www.freetogame.com/g/36/Realm-Royale-1.jpg', 'https://www.freetogame.com/g/36/Realm-Royale-2.jpg', 'https://www.freetogame.com/g/36/Realm-Royale-3.jpg', 'https://www.freetogame.com/g/36/Realm-Royale-4.jpg', 'https://www.freetogame.com/g/36/videoplayback.webm'),
(36, 'Crusaders of Light is a cross-platform MMORPG available on PC and mobile devices. Developed and publ', 'Windows XP sp3', 'Nvidia GTX 260', 'Intel Core i3-4130', '4 GB available space', 'https://www.freetogame.com/g/37/Crusaders-of-light-1.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-2.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-3.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-4.jpg', 'https://www.freetogame.com/g/37/videoplayback.webm'),
(37, 'The world of Magic comes to life in Perfect World Entertainment and Cryptic’s multiplayer ARPG Magic', 'Windows 8.1', 'GPU nVidia GTX 750', 'Intel i5 quad 2.3 GH', '10 GB', 'https://www.freetogame.com/g/37/Crusaders-of-light-1.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-2.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-3.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-4.jpg', 'https://www.freetogame.com/g/38/videoplayback.webm'),
(38, 'The world of Magic comes to life in Perfect World Entertainment and Cryptic’s multiplayer ARPG Magic', 'Windows 8.1', 'GPU nVidia GTX 750', 'Intel i5 quad 2.3 GH', '10 GB', 'https://www.freetogame.com/g/37/Crusaders-of-light-1.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-2.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-3.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-4.jpg', 'https://www.freetogame.com/g/39/videoplayback.webm'),
(39, 'Build armies and fight for control of the realm in Global Dodo Entertainment’s 1v1 strategy game Pri', 'Windows 7 or newer', 'Nvidia GeForce GTX 6', 'Intel(R) Core(TM) i5', '4 GB', 'https://www.freetogame.com/g/37/Crusaders-of-light-1.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-2.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-3.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-4.jpg', 'https://www.freetogame.com/g/477/videoplayback.webm'),
(40, 'If you’ve ever wanted to be a creature of myth and hang out with other mytical creatures, Wildworks’', '(Windows) Windows 7 ', 'Radeon 7000 Series a', 'Requires a 64-bit pr', '2 GB available space', 'https://www.freetogame.com/g/37/Crusaders-of-light-1.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-2.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-3.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-4.jpg', 'https://www.freetogame.com/g/41/videoplayback.webm'),
(41, 'Spellsworn is a free-to-play arena battle game developed and published by Frogsong Studios AB. Inspi', 'Windows 7 (64bit)', 'nVidia GeForce 8600/', 'Dual core from Intel', '3 GB available space', 'https://www.freetogame.com/g/42/spellsworn-1.jpg', 'https://www.freetogame.com/g/42/spellsworn-2.jpg', 'https://www.freetogame.com/g/42/spellsworn-3.jpg', 'https://www.freetogame.com/g/42/spellsworn-4.jpg', 'https://www.freetogame.com/g/42/videoplayback.webm'),
(42, 'The world of Magic comes to life in Perfect World Entertainment and Cryptic’s multiplayer ARPG Magic', 'Windows 8.1', 'GPU nVidia GTX 750', 'Intel i5 quad 2.3 GH', '10 GB', 'https://www.freetogame.com/g/37/Crusaders-of-light-1.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-2.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-3.jpg', 'https://www.freetogame.com/g/37/Crusaders-of-light-4.jpg', 'https://www.freetogame.com/g/43/videoplayback.webm'),
(43, 'Tale of Toast is a free-to-play open world MMO inspired by classic, core MMOs. Developed and publish', 'Windows 7 (SP1 )/8.1', 'Intel HD Graphics 40', 'Intel Core i3', '4 GB available space', 'https://www.freetogame.com/g/44/tale-of-toast-1.jpg', 'https://www.freetogame.com/g/44/tale-of-toast-2.jpg', 'https://www.freetogame.com/g/44/tale-of-toast-3.jpg', 'https://www.freetogame.com/g/44/tale-of-toast-4.jpg', 'https://www.freetogame.com/g/44/videoplayback.webm'),
(44, 'SoulWorker is a free to play anime action MMO based on the popular anime of the same title. Develope', 'Windows 7 32 bit', 'Nvidia GeForce 7600 ', 'Pentium 4 dual core', '4 GB available space', 'https://www.freetogame.com/g/45/soulworker-1.jpg', 'https://www.freetogame.com/g/45/soulworker-2.jpg', 'https://www.freetogame.com/g/45/soulworker-3.jpg', 'https://www.freetogame.com/g/45/soulworker-4.jpg', 'https://www.freetogame.com/g/45/videoplayback.webm'),
(45, 'Build armies and fight for control of the realm in Global Dodo Entertainment’s 1v1 strategy game Pri', 'Windows 7 or newer', 'Nvidia GeForce GTX 6', 'Intel(R) Core(TM) i5', '4 GB', 'https://www.freetogame.com/g/502/primordials-battle-of-gods-1.jpg', 'https://www.freetogame.com/g/502/primordials-battle-of-gods-2.jpg', 'https://www.freetogame.com/g/502/primordials-battle-of-gods-3.jpg', 'undefined', 'https://www.freetogame.com/g/46/videoplayback.webm'),
(46, 'Valve’s Artifact is two games in one. Whether you’re looking for the original Dota 2 trading card ga', '64-bit Windows 7 / 8', 'Integrated HD Graphi', 'Intel i5, 2.4 Ghz or', '7 GB available space', 'https://www.freetogame.com/g/503/artifact-1.jpg', 'https://www.freetogame.com/g/503/artifact-2.jpg', 'https://www.freetogame.com/g/503/artifact-3.jpg', 'undefined', 'https://www.freetogame.com/g/47/videoplayback.webm'),
(47, 'Ironsight is a free-to-play futuristic shooter published by Aeria Games. Set in the year 2025, the game places players in the roles of soldiers fighting over the last natural resources on Earth. All nuclear power plants on the Atlantic coast were wiped out following a Megatsunami in 2023, causing radioactive spills. The west has lost control over the Middle East and its resources, and as a result the US and Europe have teamed up to fight the Engergy Development Enterprise Network (EDEN) to regain control once again.Ironsight offers players more than 100 original weapons to choose from, allowin', 'Windows 7', 'NVIDIA GeForce 6900 ', 'Intel Core 2 Duo E75', '8 GB', 'https://www.freetogame.com/g/48/Ironsight-1.jpg', 'https://www.freetogame.com/g/48/Ironsight-2.jpg', 'https://www.freetogame.com/g/48/Ironsight-3.jpg', 'https://www.freetogame.com/g/48/Ironsight-4.jpg', 'https://www.freetogame.com/g/48/videoplayback.webm'),
(48, 'Dead Maze is a free-to-play 2D isometric MMO full of zombies. In order to survive the undead apocalypse, players will need to work together, gather resources, and craft supplies needed to keep themselves alive.Unlike most zombie games, Dead maze requires players to restore civilization, starting with improving their own camps. Once a camp is established, players can build and furnish their own home, planting seeds, breeding animals, and more.Of course, they will need to fight the undead. Luckily, there are over 500 weapons to do that with. They’ll also need to be aware of their health and do t', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/49/Dead-Maze-1.jpg', 'https://www.freetogame.com/g/49/Dead-Maze-2.jpg', 'https://www.freetogame.com/g/49/Dead-Maze-3.jpg', 'https://www.freetogame.com/g/49/Dead-Maze-4.jpg', 'https://www.freetogame.com/g/49/videoplayback.webm'),
(49, 'The world of Magic comes to life in Perfect World Entertainment and Cryptic’s multiplayer ARPG Magic', 'Windows 8.1', 'GPU nVidia GTX 750', 'Intel i5 quad 2.3 GH', '10 GB', 'https://www.freetogame.com/g/504/magic-legends-1.jpg', 'https://www.freetogame.com/g/504/magic-legends-2.jpg', 'https://www.freetogame.com/g/504/magic-legends-3.jpg', 'undefined', 'https://www.freetogame.com/g/50/videoplayback.webm'),
(50, 'Global Adventures is a free-to-play MMORPG developed by PixelSoft and Published by SubaGames. A game with a contemporary — somewhat real-world — setting, Global Adventures casts players in teh role of a newly recruited agent for the Treasure Hunters Association. The agent’s first task will be to explore Mayan Ruins… a task that doesn’t go quite as planned as there are other groups who will get in your way. These groups include the Black Flag Gang, the Shinobi Cabal a ninja group who’d really like their own undead army, and a secret order known as the Priory. Along the way, you’ll fight Vampire', 'Win 7 64 bit', 'GTX 770 or AMD R9 28', 'Intel i5 @2.5 GHz or', '5 GB available space', 'https://www.freetogame.com/g/506/totally-accurate-battlegrounds-1.jpg', 'https://www.freetogame.com/g/506/totally-accurate-battlegrounds-2.jpg', 'https://www.freetogame.com/g/506/totally-accurate-battlegrounds-3.jpg', 'undefined', 'https://www.freetogame.com/g/51/videoplayback.webm'),
(51, 'Closers is a free-to-play episodic anime beat-’em-up developed by Naddic Games and published by En M', 'Windows XP', 'Nvidia GeForce 7600 ', 'Intel Dual Core 2.0 ', '5 GB', 'https://www.freetogame.com/g/52/closers-1.jpg', 'https://www.freetogame.com/g/52/closers-2.jpg', 'https://www.freetogame.com/g/52/closers-3.jpg', 'https://www.freetogame.com/g/52/closers-4.jpg', 'https://www.freetogame.com/g/52/videoplayback.webm'),
(52, 'Super Mecha Champions is a PC port of the mobile anime PvP game from NetEease, featuring a variety o', 'Windows7, Windows 8.', 'Intel HD 530', 'Intel Core i3 4130 @', '4 GB available space', 'https://www.freetogame.com/g/507/super-mecha-champions-1.jpg', 'https://www.freetogame.com/g/507/super-mecha-champions-2.jpg', 'https://www.freetogame.com/g/507/super-mecha-champions-3.jpg', 'undefined', 'https://www.freetogame.com/g/53/videoplayback.webm'),
(53, 'Get ready to command your own World War II military squad in Gaijin and Darkflow Software’s squad-ba', 'Windows 7 / 8 / 10 6', 'Nvidia GeForce 660, ', 'Intel Core i3 or bet', '12GB', 'https://www.freetogame.com/g/508/enlisted-1.jpg', 'https://www.freetogame.com/g/508/enlisted-2.jpg', 'https://www.freetogame.com/g/508/enlisted-3.jpg', 'undefined', 'https://www.freetogame.com/g/54/videoplayback.webm'),
(54, 'Classic fairy tales get wild with 5minlab and LINE Games Corporation’s combat action game Smash Lege', 'WINDOWS® 7, 8, 8.1, ', 'GeForce GTX 450 or R', 'Intel Dual core 2.8G', '2 GB available space', 'https://www.freetogame.com/g/509/smash-legends-1.jpg', 'https://www.freetogame.com/g/509/smash-legends-2.jpg', 'https://www.freetogame.com/g/509/smash-legends-3.jpg', 'undefined', 'https://www.freetogame.com/g/55/videoplayback.webm'),
(55, 'Grab your Driftpacs and grappling hooks, it’s time to loot. Pick a character and dive into Blind Squ', 'Windows 10', 'Nvidia GTX 760 or be', 'Intel Core i5-6600K ', '30 GB available space', 'https://www.freetogame.com/g/510/drifters-loot-the-galaxy-1.jpg', 'https://www.freetogame.com/g/510/drifters-loot-the-galaxy-2.jpg', 'https://www.freetogame.com/g/510/drifters-loot-the-galaxy-3.jpg', 'undefined', 'https://www.freetogame.com/g/56/videoplayback.webm'),
(56, 'The legacy of Phantasy Star Online 2 continues a thousand years later, as the next generation of ARK', 'Windows 8.1', 'GeForce GTX 950 or R', 'Intel Core i5-9400 ', '100 GB', 'https://www.freetogame.com/g/511/PSO2NGS-1.jpg', 'https://www.freetogame.com/g/511/PSO2NGS-2.jpg', 'https://www.freetogame.com/g/511/PSO2NGS-3.jpg', 'undefined', 'https://www.freetogame.com/g/57/videoplayback.webm'),
(57, 'Cage Studio’s high action arcade shooter Sherwood Extreme sends players on a mission to save the kin', 'Windows 7', 'Intel HD 520', 'Dual core 2.0 GHz', '1 GB available space', 'https://www.freetogame.com/g/512/sherwood-extreme-1.jpg', 'https://www.freetogame.com/g/512/sherwood-extreme-2.jpg', 'https://www.freetogame.com/g/512/sherwood-extreme-3.jpg', 'undefined', 'https://www.freetogame.com/g/58/videoplayback.webm'),
(58, 'Insidia is a free-to-play tactical, turn-based dueling game developed and published by Bad Seed. Players build a team of four champions and compete against one another in (sort-of) turn-based combat. Unlike other turn-based games, Insidia features simultaneous turns, meaning both players take their turns at the same time and watch them play out. Because of this, players can knock out a match in less than 15 minutes.The team-building feature allows players to blend their champions’ abilities in order to create combos. And while there are four champion types on a team, there is a larger variety ', 'Windows 7 64 Bit', 'DirectX 10', 'Dual-Core 2.0', '2 GB', 'https://www.freetogame.com/g/59/insidia-1.jpg', 'https://www.freetogame.com/g/59/insidia-2.jpg', 'https://www.freetogame.com/g/59/insidia-3.jpg', 'https://www.freetogame.com/g/59/insidia-4.jpg', 'https://www.freetogame.com/g/59/videoplayback.webm'),
(60, 'Black Squad is a free-to-play military FPS developed by NS STUDIO and published by NEOWIZ. It is built using Unreal Engine 3 and boasts realistic graphics.The game offers players 10 different modes to choose from. These range from classic to massive multi-play modes. Team vs team modes include 5v5, 8v8, 10v10 and 16v16. The 16v16 mode allows players to call for airstrike and artillery support.Players will also be able to choose from a variety of modern firearms and over 20 maps.', 'Windows 7 64bit', 'NVIDIA GEFORCE 8600 ', 'Core2 Duo 2.4 / AMD ', '7 GB available space', 'https://www.freetogame.com/g/61/black-squad-1.jpg', 'https://www.freetogame.com/g/61/black-squad-2.jpg', 'https://www.freetogame.com/g/61/black-squad-3.jpg', 'https://www.freetogame.com/g/61/black-squad-4.jpg', 'https://www.freetogame.com/g/61/videoplayback.webm'),
(61, 'Kritika Online is a free-to-play hack-and-slash MMORPG with both a single-player adventure combat from En Masse Entertainment and ALL-M Co.Players can choose from four different classses: Gunmage, Warrior, Reaper, and Rogue. Each of these has two to three variations designed to make each player’s character even more unique.The game also boasts special areas known as Danger Zones which allow for quick play sessions without the need of excessive in game travel. Each has a massive boss for players to defeat.', 'Windows Vista or abo', 'GeForce 7600 or Rade', 'Dual Core 2.0 GHz or', '6GB', 'https://www.freetogame.com/g/62/kritika-1.jpg', 'https://www.freetogame.com/g/62/kritika-2.jpg', 'https://www.freetogame.com/g/62/kritika-3.jpg', 'https://www.freetogame.com/g/62/kritika-4.jpg', 'https://www.freetogame.com/g/62/videoplayback.webm'),
(62, 'Argo is a free-to-play “hardcore tactical first-person shooter” from Arma 3 developer and publisher ', 'Windows 7 SP1 And Up', 'NVIDIA GeFeorce 9800', ' Intel Dual-Core 2.4', '20 GB', 'https://www.freetogame.com/g/63/argo-1.jpg', 'https://www.freetogame.com/g/63/argo-2.jpg', 'https://www.freetogame.com/g/63/argo-3.jpg', 'https://www.freetogame.com/g/63/argo-4.jpg', 'https://www.freetogame.com/g/63/videoplayback.webm'),
(63, 'Secret World Legends is a free-to-play reboot of The Secret World. Developed by Funcom, Secret World', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/64/secret-world-legends-1.jpg', 'https://www.freetogame.com/g/64/secret-world-legends-2.jpg', 'https://www.freetogame.com/g/64/secret-world-legends-3.jpg', 'https://www.freetogame.com/g/64/secret-world-legends-4.jpg', 'https://www.freetogame.com/g/502/videoplayback.webm'),
(64, 'Pixel Worlds is a free-to-play, side-scroller MMO sandbox game developed and published by Kukouri Mo', 'Windows 7 or later', '256 MB HD 2600 or be', 'Intel Core 2 Duo 1.8', '300 MB available spa', 'https://www.freetogame.com/g/65/pixel-worlds-1.jpg', 'https://www.freetogame.com/g/65/pixel-worlds-2.jpg', 'https://www.freetogame.com/g/65/pixel-worlds-3.jpg', 'https://www.freetogame.com/g/65/pixel-worlds-4.jpg', 'https://www.freetogame.com/g/65/videoplayback.webm'),
(65, 'Gwent is a free-to-play card game for PC and XBox One, based on CD Projekt Red’s popular Witcher franchise. The game features both a multi-player and single-player mode with adventures, skirmishes and a player vs. AI mode. All of this is developed by the same team behind The Witcher III: Wild Hunt.In fact, the core game is based on the card game featured in Wild Hunt, but with several new additions. The stand alone card game features new card art, voice overs and skills. There is even a competitive PvP mode built completely from scratch for Gwent.As with any card game, players will be able to ', ' Windows 7/8/8.1/10 ', 'NVIDIA GeForce GT 71', 'Intel Celeron G1820 ', '4.5 GB available spa', 'https://www.freetogame.com/g/66/gwent-1.jpg', 'https://www.freetogame.com/g/66/gwent-2.jpg', 'https://www.freetogame.com/g/66/gwent-3.jpg', 'https://www.freetogame.com/g/66/gwent-4.jpg', 'https://www.freetogame.com/g/66/videoplayback.webm'),
(66, 'Awesomenauts is a 3v3 2D battle arena Developed by Ronimo games. Originally launched as a pay-to-pla', 'Windows 7, 8, or 10', 'AMD or NVIDIA with a', 'Any processor with 2', '3.5 GB', 'https://www.freetogame.com/g/67/awesomenauts-1.jpg', 'https://www.freetogame.com/g/67/awesomenauts-2.jpg', 'https://www.freetogame.com/g/67/awesomenauts-3.jpg', 'https://www.freetogame.com/g/67/awesomenauts-4.jpg', 'https://www.freetogame.com/g/67/videoplayback.webm'),
(67, 'Dreadnought is a free-to-play combat flight simulator developed by Yager Development and published by Grey Box. In Dreadnought, players pilot a massive battleship, ranging from the titular Dreadnought to the Tactical Cruiser. All ships are heavily armed with projectile weapons, and each has it’s own variety of advantages and issues. And, all ships are highly customizable — down to the smallest detail. This includes weapons and modules as well as the paint job (hull coatings and decals).Players take on the enemy in 5v5 class-based arena battles. With each ship having advantages and disadvantage', 'Windows 7 64-bit', 'DirectX 11-compatibl', 'Intel Core i5-4690T ', '11 GB space availabl', 'https://www.freetogame.com/g/68/dreadnought-1.jpg', 'https://www.freetogame.com/g/68/dreadnought-2.jpg', 'https://www.freetogame.com/g/68/dreadnought-3.jpg', 'https://www.freetogame.com/g/68/dreadnought-4.jpg', 'https://www.freetogame.com/g/68/videoplayback.webm'),
(68, 'Cabals: Card Blitz is a free-to-play game developed by Kyy Games and published by BISBOG SA. The str', 'Windows XP SP2 ', '128 MB DirectX 9.0c ', '2.33 GHz or faster x', '200 MB', 'https://www.freetogame.com/g/69/cabals-card-blitz-1.jpg', 'https://www.freetogame.com/g/69/cabals-card-blitz-2.jpg', 'https://www.freetogame.com/g/69/cabals-card-blitz-3.jpg', 'https://www.freetogame.com/g/69/cabals-card-blitz-4.jpg', 'https://www.freetogame.com/g/69/videoplayback.webm'),
(69, 'Alien Swarm: Reactive Drop is a free-to-play top-down tactical co-op expansion on the Alien swarm ga', 'Windows XP or above', 'DirectX 9 compatible', 'Pentium 4 3.0GHz', '10 GB', 'https://www.freetogame.com/g/70/alien-swarm-reactive-drop-1.jpg', 'https://www.freetogame.com/g/70/alien-swarm-reactive-drop-2.jpg', 'https://www.freetogame.com/g/70/alien-swarm-reactive-drop-3.jpg', 'https://www.freetogame.com/g/70/alien-swarm-reactive-drop-4.jpg', 'https://www.freetogame.com/g/70/videoplayback.webm'),
(70, 'Catan Universe is a free-to-play strategy game based on the classic board and card games. Players race to settle Catan, building road and towns, as well as a thriving trade.The game allows players to compete in duels against players around the world, offering 1v1v1 matches. Players can play the basic board in multiplayers as well as the introductory game, Catan — The Duel for free. Other modes are available as in-app purchases.Basic online features are available. Players can create their own avatar, engage in community functions such as chat, guilds, and more. The game can be played via client', ' Windows 7 32-big', 'Open GL 3.1  Complia', '1.5 Ghz Dual-Core In', '1 GB', 'https://www.freetogame.com/g/71/catan-universe-1.jpg', 'https://www.freetogame.com/g/71/catan-universe-2.jpg', 'https://www.freetogame.com/g/71/catan-universe-3.jpg', 'https://www.freetogame.com/g/71/catan-universe-4.jpg', 'https://www.freetogame.com/g/71/videoplayback.webm'),
(71, 'Kosmaga is a free-to-play CCG/tower defense hybrid developed by Ankama Studio and published by Ankama Games.  The game offers players fun in short, strategy-filled bursts… and features characters from both Dofus and Wakfu as controllable heroes.Players will take on the roll of a god, and control heroes on a battlefield using decks of cards. These decks can either be pre-made or created by the player. There are hundreds of cards available to build these decks with.The game features PvP battles in which players can challenge others, as well as adventures that can be taken on in a single player m', 'Windows 7 or higher', 'NVIDIA GeForce 6800 ', 'Intel Pentium D or A', '3GB', 'https://www.freetogame.com/g/72/krosmaga-1.jpg', 'https://www.freetogame.com/g/72/krosmaga-2.jpg', 'https://www.freetogame.com/g/72/krosmaga-3.jpg', 'https://www.freetogame.com/g/72/krosmaga-4.jpg', 'https://www.freetogame.com/g/72/videoplayback.webm'),
(72, 'Prepare yourself. It’s time for Mayhem. And you’ll get that from Bad Fox Studios’ Super Squad, a mul', 'Windows 7/8.1/10', 'Nvidia GTX 460 or eq', '2.6 GHz Dual Core', '16 GB available space', 'https://www.freetogame.com/g/513/Super-Squad-1.jpg', 'https://www.freetogame.com/g/513/Super-Squad-2.jpg', 'https://www.freetogame.com/g/513/Super-Squad-3.jpg', 'undefined', 'https://www.freetogame.com/g/73/videoplayback.webm'),
(73, 'Take a 4v4 tower defense game, add a touch of MOBA, and you have gamigo and Kinship Game Studio’s Sk', 'Windows 7/8/10 64 Bi', 'GeForce GTX 650 w/ 1', 'Intel Dual Core 2.4G', '5 GB available space', 'https://www.freetogame.com/g/514/skydome-1.jpg', 'https://www.freetogame.com/g/514/skydome-2.jpg', 'https://www.freetogame.com/g/514/skydome-3.jpg', 'undefined', 'https://www.freetogame.com/g/74/videoplayback.webm'),
(74, 'Take a 4v4 tower defense game, add a touch of MOBA, and you have gamigo and Kinship Game Studio’s Sk', 'Windows 7/8/10 64 Bi', 'GeForce GTX 650 w/ 1', 'Intel Dual Core 2.4G', '5 GB available space', 'https://www.freetogame.com/g/514/skydome-1.jpg', 'https://www.freetogame.com/g/514/skydome-2.jpg', 'https://www.freetogame.com/g/514/skydome-3.jpg', 'undefined', 'https://www.freetogame.com/g/75/videoplayback.webm'),
(75, 'For the first time ever, a free-to-play Halo experience is available in the form of Halo Infinite’s ', 'Windows 10 RS5 x64', 'AMD RX 570 or Nvidia', 'AMD Ryzen 5 1600 or ', '50 GB available space', 'https://www.freetogame.com/g/515/Halo-Infinite-1.jpg', 'https://www.freetogame.com/g/515/Halo-Infinite-2.jpg', 'https://www.freetogame.com/g/515/Halo-Infinite-3.jpg', 'undefined', 'https://www.freetogame.com/g/76/videoplayback.webm'),
(76, 'Revelation Online is a free-to-play fantasy MMO developed by NetEase and published by My.com.A game featuring flight, Revelation Online offers players a vast world to explore. There are ten provinces and three Great Cities in the game’s world. Each city boasts a castle of its own and the rest of the world is littered with castles — including some in the sky and others buried in the ocean.The game boasts a variety of content available for both single and group play. There are 5 – 10 player dungeons, 20 player raids, and a variety of world bosses. PvPers also have several different kinds of cont', '64-bit Windows 7, Wi', 'NVIDIA GeForce GTX 9', 'Intel Core i5-4430 /', '40 GB available space', 'https://www.freetogame.com/g/516/pubg-1.jpg', 'https://www.freetogame.com/g/516/pubg-2.jpg', 'https://www.freetogame.com/g/516/pubg-3.jpg', 'undefined', 'https://www.freetogame.com/g/77/videoplayback.webm'),
(77, 'Smilegate’s free-to-play multiplayer ARPG is a massive adventure filled with lands waiting to be exp', 'Windows 10 (64-bit o', 'NVIDIA GeForce GTX 4', 'Intel i3 or AMD Ryze', '50 GB available space', 'https://www.freetogame.com/g/517/lost-ark-1.jpg', 'https://www.freetogame.com/g/517/lost-ark-2.jpg', 'https://www.freetogame.com/g/517/lost-ark-3.jpg', 'undefined', 'https://www.freetogame.com/g/78/videoplayback.webm'),
(78, 'Explore a fantasy world based on Chinese mythology in Gameforge’s action MMORPG Swords of Legends On', 'Windows 10', 'GeForce GTX 760 or R', 'AMD FX-6300 or Intel', '80 GB available space', 'https://www.freetogame.com/g/518/swords-of-legends-online-1.jpg', 'https://www.freetogame.com/g/518/swords-of-legends-online-2.jpg', 'https://www.freetogame.com/g/518/swords-of-legends-online-3.jpg', 'undefined', 'https://www.freetogame.com/g/79/videoplayback.webm'),
(79, 'Isometric ARPG’s get a little bit crazy with Flying Wild Hog’s latest game, Space Punks. A single-pl', 'Windows 10', 'NVIDIA GeForce GTX 9', 'Intel Core i7- 3770 ', '10GB', 'https://www.freetogame.com/g/519/space-punks-1.jpg', 'https://www.freetogame.com/g/519/space-punks-2.jpg', 'https://www.freetogame.com/g/519/space-punks-3.jpg', 'undefined', 'https://www.freetogame.com/g/80/videoplayback.webm'),
(80, 'What if you could player roller derby, but in a more organized and less physically dangerous environ', 'Windows 10 Home (64b', 'AMD Radeon RX 560 (4', 'AMD Ryzen 3 1200 @ 3', '10 GB', 'https://www.freetogame.com/g/520/roller-champions-1.jpg', 'https://www.freetogame.com/g/520/roller-champions-2.jpg', 'https://www.freetogame.com/g/520/roller-champions-3.jpg', 'undefined', 'https://www.freetogame.com/g/81/videoplayback.webm'),
(81, 'Line of Sight is a free-to-play online FPS published by BlackSpot Entertainment. Described as “Bioshock meets Call of Duty,” the game has a modern military setting in a twisted universe.Like Bioshock, the game features super human abilities. It also offers players a pure military FPS experience and a “Classic Mode” in which players can play the game like any traditional online FPS.For more serious — or Pro players — the game features class ranking, clan and league systems, and features needed for eSports play.', 'Windows 7', 'NVIDIA GeForce 8600/', 'Dual Core 2.0GHz fro', '3 GB available space', 'https://www.freetogame.com/g/82/Line-of-Sight-1.jpg', 'https://www.freetogame.com/g/82/Line-of-Sight-2.jpg', 'https://www.freetogame.com/g/82/Line-of-Sight-3.jpg', 'https://www.freetogame.com/g/82/Line-of-Sight-4.jpg', 'https://www.freetogame.com/g/82/videoplayback.webm'),
(82, 'Heavy Metal Machines is a free-to-play multiplayer vehicular combat game based in a post-apocalyptic world. Developed by Brazilian game developer and Publisher Hoplon. The game features 4v4 arena combat using crazy Mad Max style vehicles. It features 8 playable characters and a system that unlocks skills, skins, and abilities.There are three types of roles: Interceptor — prevent enemies from taking the bomb, support — help carriers deliver the bomb by repairing and protecting them, and transporter — are experts in delivering the bomb. Each of the available characters comes with their own uniqu', 'Windows 7 or Newer', 'Intel Graphics HD 40', '2.0 GHz Dual core', '3 GB available space', 'https://www.freetogame.com/g/83/heavy-metal-machines-1.jpg', 'https://www.freetogame.com/g/83/heavy-metal-machines-2.jpg', 'https://www.freetogame.com/g/83/heavy-metal-machines-3.jpg', 'https://www.freetogame.com/g/83/heavy-metal-machines-4.jpg', 'https://www.freetogame.com/g/83/videoplayback.webm');
INSERT INTO `game_detail` (`gdt_id`, `about`, `cfg_os`, `cfg_processor`, `cfg_graphics`, `cfg_storage`, `screenshot1`, `screenshot2`, `screenshot3`, `screenshot4`, `trailer`) VALUES
(83, 'Play the most competitive massively multiplayer party royale game featuring beans ever for free on a', 'Windows 10 64bit', 'NVIDIA GTX 660 or AM', 'Intel Core i5 or AMD', '2 GB available space', 'https://www.freetogame.com/g/523/fall-guys-1.jpg', 'https://www.freetogame.com/g/523/fall-guys-2.jpg', 'https://www.freetogame.com/g/523/fall-guys-3.jpg', 'undefined', 'https://www.freetogame.com/g/84/videoplayback.webm'),
(84, 'Infestation: The New Z is a re-work of the open world zombie shooter game Infestation: Survivor Stories (or as it was formerly known “The War Z”).Developed by Fredaikis AB and published by OP Productions LLC, the game drops players into a world where they must survive by scavenging for the things they need and either teaming up with or fighting against other players while avoiding the dangers all around them.The New Z features different game modes, a lounge where players can trade loot, warm-up servers to get used to the game before hopping into PvP. For the more competitive players, there is ', 'Windows 8', 'HD graphics 620', '64-compatible, duo c', '1 GB', 'https://www.freetogame.com/g/524/temperia-1.jpg', 'https://www.freetogame.com/g/524/temperia-2.jpg', 'https://www.freetogame.com/g/524/temperia-3.jpg', 'undefined', 'https://www.freetogame.com/g/85/videoplayback.webm'),
(85, 'The Warner Bros lineup meets Smash in Player First Games’ MultiVersus, a platform fighter featuring ', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/525/multiversus-1.jpg', 'https://www.freetogame.com/g/525/multiversus-2.jpg', 'https://www.freetogame.com/g/525/multiversus-3.jpg', 'undefined', 'https://www.freetogame.com/g/86/videoplayback.webm'),
(86, 'MU Legend is a free-to-play MMORPG developed by Webzen and the followup to MU Online. A fantasy hack', 'WinXP SP3', 'GeForce 8800GT / Rad', 'Intel Quad Core/AMD ', '25 GB', 'https://www.freetogame.com/g/87/mu-legend-1.jpg', 'https://www.freetogame.com/g/87/mu-legend-2.jpg', 'https://www.freetogame.com/g/87/mu-legend-3.jpg', 'https://www.freetogame.com/g/87/mu-legend-4.jpg', 'https://www.freetogame.com/g/87/videoplayback.webm'),
(87, 'Shadowverse is a free-to-play strategic CCG developed and published by Cygamesm the creators of Rage', 'Windows 7', 'NVIDIA GeForce 7600G', 'Intel Core 2 Duo 2.4', '2 GB', 'https://www.freetogame.com/g/88/shadowverse-1.jpg', 'https://www.freetogame.com/g/88/shadowverse-2.jpg', 'https://www.freetogame.com/g/88/shadowverse-3.jpg', 'https://www.freetogame.com/g/88/shadowverse-4.jpg', 'https://www.freetogame.com/g/88/videoplayback.webm'),
(88, 'AdventureQuest 3D (AQ3D) is a free to play cross-platform fantasy MMORPG with colorful cartoony grap', 'Windows 7', '512 MB', 'Dual Core 1.8GHZ or ', '500 MB available spa', 'https://www.freetogame.com/g/89/AdventureQuest-3D-screenshots-1.jpg', 'https://www.freetogame.com/g/89/AdventureQuest-3D-screenshots-2.jpg', 'https://www.freetogame.com/g/89/AdventureQuest-3D-screenshots-3.jpg', 'https://www.freetogame.com/g/89/AdventureQuest-3D-screenshots-4.jpg', 'https://www.freetogame.com/g/89/videoplayback.webm'),
(89, 'Tower of Fantasy is a 3D open-world RPG, anime-style sci-fi MMO RPG game with unique characters and ', 'Windows 7 SP1 64-bit', 'NVIDIA GeForce GT 10', 'Intel Core i5 or equ', '25 GB', 'https://www.freetogame.com/g/529/tower-of-fantasy-1.jpg', 'https://www.freetogame.com/g/529/tower-of-fantasy-2.jpg', 'https://www.freetogame.com/g/529/tower-of-fantasy-3.jpg', 'undefined', 'https://www.freetogame.com/g/90/videoplayback.webm'),
(90, 'Take 40 people, throw them into a city, give them weapons and let them fight it out. That’s the reci', 'Windows 10', 'NVIDIA GeForce GTX 6', 'Intel Core i5-3470 o', '7 GB', 'https://www.freetogame.com/g/530/rumbleverse-1.jpg', 'https://www.freetogame.com/g/530/rumbleverse-2.jpg', 'https://www.freetogame.com/g/530/rumbleverse-3.jpg', 'https://www.freetogame.com/g/530/rumbleverse-1.jpg', 'https://www.freetogame.com/g/91/videoplayback.webm'),
(91, 'Magic Spellslingers is the latest entry based on Witzards of the Coast’s popular card game Magic: Th', 'Windows 10', 'GeForce GTX 560', 'Intel Core i5-4460 @', '12 GB', 'https://www.freetogame.com/g/531/magic-spellslingers-1.jpg', 'https://www.freetogame.com/g/531/magic-spellslingers-2.jpg', 'https://www.freetogame.com/g/531/magic-spellslingers-3.jpg', 'undefined', 'https://www.freetogame.com/g/92/videoplayback.webm'),
(92, 'Riding Club Championships is an online competitive horse riding game inspired by traditional equestr', 'Windows Vista, 7, 8,', 'NVidia GeForce 8800 ', 'Dual Core CPU 2.0 GH', '1 GB', 'https://www.freetogame.com/g/93/riding-club-championships-1.jpg', 'https://www.freetogame.com/g/93/riding-club-championships-2.jpg', 'https://www.freetogame.com/g/93/riding-club-championships-3.jpg', 'https://www.freetogame.com/g/93/riding-club-championships-4.jpg', 'https://www.freetogame.com/g/93/videoplayback.webm'),
(93, 'Battlerite is a free-to-play team arena brawler developed by Stunlock Studios. Players play as one o', 'Window 7 or later', 'Intel HD 3000', 'Dual core from Intel', '1500 MB', 'https://www.freetogame.com/g/94/battlerite-1.jpg', 'https://www.freetogame.com/g/94/battlerite-2.jpg', 'https://www.freetogame.com/g/94/battlerite-3.jpg', 'https://www.freetogame.com/g/94/battlerite-4.jpg', 'https://www.freetogame.com/g/94/videoplayback.webm'),
(94, 'Will to Live is a free-to-play MMORPG-shooter developed and published by AlphaSoft LLC. Set in a pos', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/434/Will_To_Live_Online-1.jpg', 'https://www.freetogame.com/g/434/Will_To_Live_Online-2.jpg', 'https://www.freetogame.com/g/434/Will_To_Live_Online-3.jpg', 'https://www.freetogame.com/g/434/Will_To_Live_Online-4.jpg', 'https://www.freetogame.com/g/95/videoplayback.webm'),
(95, 'Inferna is a cross-platform MMO from indie developer and publisher Inferna Limited, designed for pla', 'Windows 7', 'GTX 760', 'Dualcore 2.6 Ghz', '10 GB available space', 'https://www.freetogame.com/g/436/Inferna-1.jpg', 'https://www.freetogame.com/g/436/Inferna-2.jpg', 'https://www.freetogame.com/g/436/Inferna-3.jpg', 'undefined', 'https://www.freetogame.com/g/475/videoplayback.webm'),
(96, 'Otherland is a free-to-play MMO based on the popular novels by Tad Williams. Developed by Drago Ente', 'Windows 7', 'Intel HD4000', 'Intel Core 2 Duo 2.4', '16 GB', 'https://www.freetogame.com/g/97/otherland-1.jpg', 'https://www.freetogame.com/g/97/otherland-2.jpg', 'https://www.freetogame.com/g/97/otherland-3.jpg', 'https://www.freetogame.com/g/97/otherland-4.jpg', 'https://www.freetogame.com/g/97/videoplayback.webm'),
(97, 'Command your own medieval army, lead them into battle, and capture fortresses in Conquerors Blade, ', 'Windows 7 64 Bit', 'GTX 750 2GB / AMD HD', 'Intel i5-4460', '30 GB available space', 'https://www.freetogame.com/g/456/conquerors-blade-1.jpg', 'https://www.freetogame.com/g/456/conquerors-blade-2.jpg', 'https://www.freetogame.com/g/456/conquerors-blade-3.jpg', 'undefined', 'https://www.freetogame.com/g/504/videoplayback.webm'),
(98, 'Star Crusade: War for the Expanse is a free-to-play sci-fi themed collectable card game developed an', ' Windows XP, Vista, ', 'NVIDIA GeForce 6800 ', 'Intel Pentium D or A', '3 GB', 'https://www.freetogame.com/g/99/Star-Crusade-1.jpg', 'https://www.freetogame.com/g/99/Star-Crusade-2.jpg', 'https://www.freetogame.com/g/99/Star-Crusade-3.jpg', 'https://www.freetogame.com/g/99/Star-Crusade-4.jpg', 'https://www.freetogame.com/g/99/videoplayback.webm'),
(99, 'Twin Saga is a free-to-play, anime-style MMO developed by X-Legend Entertainment and published in No', 'Windows XP SP3 / Vis', 'nVidia GeForce 8400,', 'Intel Pentium4 2.8 G', '6 GB', 'https://www.freetogame.com/g/100/twin-saga-1.jpg', 'https://www.freetogame.com/g/100/twin-saga-2.jpg', 'https://www.freetogame.com/g/100/twin-saga-3.jpg', 'https://www.freetogame.com/g/100/twin-saga-4.jpg', 'https://www.freetogame.com/g/100/videoplayback.webm'),
(100, 'Legends of Runeterra is a free-to-play CCG based on Riot Games’ MOBA League of Legends. Choose from ', 'Windows 98/ME/2000/X', 'Any 32 MB card', ' 600 MHz Pentium 3 o', '1 GB available space', 'https://www.freetogame.com/g/441/legends-of-runeterra-1.jpg', 'https://www.freetogame.com/g/441/legends-of-runeterra-2.jpg', 'https://www.freetogame.com/g/441/legends-of-runeterra-3.jpg', 'undefined', 'https://www.freetogame.com/g/101/videoplayback.webm'),
(101, 'The Elder Scrolls: Legends is a free-to-play strategy card game based on the popular Bethesda Softworks Elder Scrolls franchise. It’s playable on both PC and iPad. Bethesda plans to launch the game in North America and Europe with localizations for English, French, Italian, German, Spanish, and Polish-speaking countries.Taking characters, creatures and lore from the vast world of the Elder Scrolls games, Bethesda has created a collectable card game with a variety of gameplay modes designed to give players freedom to choose how they want to play.In Elder Scrolls Legends, players are able to acq', 'Windows 7 or newer', 'Intel HD Graphics 40', 'Dual core from Intel', '3 GB available space', 'https://www.freetogame.com/g/442/Vainglory-1.jpg', 'https://www.freetogame.com/g/442/Vainglory-2.jpg', 'https://www.freetogame.com/g/442/Vainglory-3.jpg', 'undefined', 'https://www.freetogame.com/g/102/videoplayback.webm'),
(102, 'Described as a “living, breathing world defined and shaped by its player community,” Legends of Aria', 'Windows 7 or newer', 'DirectX 11 Compatibl', 'Core i3 2 series or ', '12 GB available space', 'https://www.freetogame.com/g/446/Legends_of_Aria-1.jpg', 'https://www.freetogame.com/g/446/Legends_of_Aria-2.jpg', 'https://www.freetogame.com/g/446/Legends_of_Aria-3.jpg', 'undefined', 'https://www.freetogame.com/g/103/videoplayback.webm'),
(103, 'Dota Underlords is a free-to-play auto battler strategy game set in the world of Valve’s Dota franch', '64-bit Windows 7 / 8', 'Integrated HD Graphi', 'Intel i5, 2.4 Ghz or', '7 GB available space', 'https://www.freetogame.com/g/447/Dota_Underlords-1.jpg', 'https://www.freetogame.com/g/447/Dota_Underlords-2.jpg', 'https://www.freetogame.com/g/447/Dota_Underlords-3.jpg', 'undefined', 'https://www.freetogame.com/g/104/videoplayback.webm'),
(104, 'KurtzPel is a free-to-play third-person action battle game from KOG Games. The anime-styled game fea', 'WINDOWS® 7, 8, 8.1, ', 'NVIDIA GeForce GTX 7', 'Intel® Core i3 6100 ', '25 GB available space', 'https://www.freetogame.com/g/448/KurtzPel-1.jpg', 'https://www.freetogame.com/g/448/KurtzPel-2.jpg', 'https://www.freetogame.com/g/448/KurtzPel-3.jpg', 'undefined', 'https://www.freetogame.com/g/105/videoplayback.webm'),
(105, 'Riders of Icarus is a free-to-play action MMORPG featuring mounted, in-air combat. Developed by WeMa', ' Windows 7, 8, 10', 'GeForce GTX 460 (1GB', 'Intel Core i5-2500k ', '30 GB', 'https://www.freetogame.com/g/106/riders-of-icarus-1.jpg', 'https://www.freetogame.com/g/106/riders-of-icarus-2.jpg', 'https://www.freetogame.com/g/106/riders-of-icarus-3.jpg', 'https://www.freetogame.com/g/106/riders-of-icarus-4.jpg', 'https://www.freetogame.com/g/106/videoplayback.webm'),
(106, 'Albion Online is a free-to-play cross-platform sandbox MMO developed and published by Sandbox Intera', 'Windows 7, 8 or 10 (', 'Graphics card with D', 'Intel/AMD CPU with S', '2 GB available space', 'https://www.freetogame.com/g/449/Albion_Online-1.jpg', 'https://www.freetogame.com/g/449/Albion_Online-2.jpg', 'https://www.freetogame.com/g/449/Albion_Online-3.jpg', 'undefined', 'https://www.freetogame.com/g/500/videoplayback.webm'),
(107, 'Battle Royale meets MOBA in Stunlock Studio’s Battlerite Royale. Team up with friends, or go in on y', 'Windows XP or newer', 'Intel HD 3000', 'Dual Core from Intel', '3 GB available space', 'https://www.freetogame.com/g/450/Battlerite_Royale-1.jpg', 'https://www.freetogame.com/g/450/Battlerite_Royale-2.jpg', 'https://www.freetogame.com/g/450/Battlerite_Royale-3.jpg', 'undefined', 'https://www.freetogame.com/g/108/videoplayback.webm'),
(108, 'Crystal Clash is a free-to-play fantasy RTS developed by Crunchy Leaf Games. Players collect units a', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/451/Rise_of_Legions-1.jpg', 'https://www.freetogame.com/g/451/Rise_of_Legions-2.jpg', 'https://www.freetogame.com/g/451/Rise_of_Legions-3.jpg', 'undefined', 'https://www.freetogame.com/g/109/videoplayback.webm'),
(109, 'UFO Online: Invasion is a free-to-play post-apocalyptic, turn-based tactical combat MMORPG developed', 'Windows XP, Vista, 7', 'any DirectX 9.0c com', '1GHz or higher', 'DirectX 9 compatible', 'https://www.freetogame.com/g/110/UFO-Online-Invasion-gameplay-screenshots-1.jpg', 'https://www.freetogame.com/g/110/UFO-Online-Invasion-gameplay-screenshots-2.jpg', 'https://www.freetogame.com/g/110/UFO-Online-Invasion-gameplay-screenshots-3.jpg', 'https://www.freetogame.com/g/110/UFO-Online-Invasion-gameplay-screenshots-4.jpg', 'https://www.freetogame.com/g/110/videoplayback.webm'),
(110, 'Call of Duty: Warzone is both a standalone free-to-play battle royale and modes accessible via Call ', 'Windows 7 64-Bit (SP', 'NVIDIA GeForce GTX 6', 'Intel Core i3-4340 o', '175GB HD space', 'https://www.freetogame.com/g/452/Call-of-Duty-Warzone-1.jpg', 'https://www.freetogame.com/g/452/Call-of-Duty-Warzone-2.jpg', 'https://www.freetogame.com/g/452/Call-of-Duty-Warzone-3.jpg', 'undefined', 'https://www.freetogame.com/g/503/videoplayback.webm'),
(111, 'Gotham City Impostors is a free to play multiplayer First Person Shooter (FPS) that pits vigilantes ', 'Windows-based (with ', 'Any with 3D Accelera', 'entium II, 400MHz (o', ' 2 GB', 'https://www.freetogame.com/g/453/Gotham-City-Impostors-1.jpg', 'https://www.freetogame.com/g/453/Gotham-City-Impostors-2.jpg', 'https://www.freetogame.com/g/453/Gotham-City-Impostors-3.jpg', 'undefined', 'https://www.freetogame.com/g/112/videoplayback.webm'),
(112, 'A 3D free-to-play fantasy MMORPG published by IDC/Games. \",\r\n    \"description\": \"Weapons of Mythology: New Age is a free-to-play fantasy MMORPG published by IDC/Games. Built on the Unity 3D engine, the game casts players in the role of the hero, tasking them stopping the “dark side”.\r\n\r\nThe game is set during the Chu Han Contention and focuses on the Zhan and Jie sects. These two sects each serve their own king in the fight for the ultimate ancient Relic.', 'Window 7/8/10 (64 bit)', 'Intel Core Duo E7500', 'GeForce 470 w/ Direc', '6 GB', 'https://www.freetogame.com/g/112/weapons-of-mythology-1.jpg', 'https://www.freetogame.com/g/112/weapons-of-mythology-3.jpg', 'https://www.freetogame.com/g/112/weapons-of-mythology-2.jpg', 'https://www.freetogame.com/g/112/weapons-of-mythology-1.jpg', 'https://www.freetogame.com/g/112/videoplayback.webm'),
(358, 'we are the champion my friend\r\n', 'window 8', 'intel 7', 'gtx', '7GB', 'https://www.freetogame.com/g/112/weapons-of-mythology-1.jpg', 'https://www.freetogame.com/g/112/weapons-of-mythology-3.jpg', 'https://www.freetogame.com/g/112/weapons-of-mythology-2.jpg', 'https://www.freetogame.com/g/530/rumbleverse-1.jpg', ''),
(363, 'sfbbs', 'window 8', 'intel 7', 'gtx', '7GB', 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg', 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg', 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg', 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg', 'https://www.freetogame.com/g/112/videoplayback.webm'),
(364, 'bdbwerbewbew', 'window 8', 'intel 7', 'gtx', '7GB', 'https://www.freetogame.com/g/112/weapons-of-mythology-1.jpg', 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg', 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg', 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg', 'https://www.freetogame.com/g/112/videoplayback.webm'),
(365, 'sbebwebwe', 'window 8', 'intel 7', 'gtx', '7GB', 'https://www.freetogame.com/g/112/weapons-of-mythology-1.jpg', 'https://www.freetogame.com/g/112/weapons-of-mythology-3.jpg', 'https://www.freetogame.com/g/112/weapons-of-mythology-2.jpg', 'https://www.freetogame.com/g/112/weapons-of-mythology-1.jpg', 'https://www.freetogame.com/g/112/videoplayback.webm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `genID` int(11) NOT NULL,
  `genName` varchar(30) DEFAULT NULL,
  `genStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`genID`, `genName`, `genStatus`) VALUES
(1, 'Action', 1),
(2, 'Adventure', 1),
(3, 'Role-playing', 1),
(4, 'Simulation', 1),
(5, 'Strategy', 1),
(6, 'Sports', 1),
(7, 'Racing', 1),
(8, 'Puzzle', 1),
(9, 'Platformer', 1),
(10, 'Fighting', 1),
(11, 'Stealth', 1),
(12, 'Survival', 1),
(13, 'Horror', 1),
(14, 'Educational', 1),
(15, 'Music', 1),
(16, 'Party', 1),
(17, 'Trivia', 1),
(18, 'Card and Board Games', 1),
(19, 'Visual Novel', 1),
(20, 'Virtual Reality', 1),
(30, 'hellowalwala', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import`
--

CREATE TABLE `import` (
  `impID` int(11) NOT NULL,
  `accID` int(11) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `import`
--

INSERT INTO `import` (`impID`, `accID`, `total_price`, `date_create`) VALUES
(1, 3, 4074, '2023-01-05'),
(2, 3, 530, '2023-09-05'),
(3, 3, 475, '2023-06-10'),
(4, 3, 651, '2022-07-10'),
(5, 3, 1909, '2023-03-03'),
(7, 3, 218, '2023-04-15'),
(8, 3, 1415, '2023-04-29'),
(9, 3, 20, '2023-05-05'),
(10, 3, 382, '2023-05-05'),
(11, 1, 20, '2023-05-05'),
(12, 1, 345, '2023-05-05'),
(13, 1, 860.48, '2023-05-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_cart`
--

CREATE TABLE `import_cart` (
  `cartID` int(11) NOT NULL,
  `accID` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `gname` varchar(256) DEFAULT NULL,
  `gquantity` int(11) DEFAULT NULL,
  `gprice` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_detail`
--

CREATE TABLE `import_detail` (
  `imp_detail_ID` int(11) NOT NULL,
  `impID` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `gname` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `suppID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `import_detail`
--

INSERT INTO `import_detail` (`imp_detail_ID`, `impID`, `gid`, `gname`, `quantity`, `price`, `suppID`) VALUES
(1, 1, 1, 'World of Tanks', 37, 998, 1),
(2, 1, 3, 'CRSED: F.O.A.D.', 42, 2897, 1),
(3, 1, 4, 'Crossout', 7, 178, 1),
(4, 2, 1, 'World of Tanks', 4, 107, 10),
(5, 2, 4, 'Crossout', 6, 152, 7),
(6, 2, 62, 'AdventureQuest 3D', 9, 269, 5),
(7, 3, 5, 'Blade and Soul', 1, 42, 5),
(8, 3, 4, 'Crossout', 17, 433, 6),
(9, 4, 77, 'Tree of Savior', 11, 97, 10),
(10, 4, 104, 'Gear Up', 18, 485, 5),
(11, 4, 31, 'Z1 Battle Royale', 17, 67, 1),
(12, 5, 17, 'Second Life', 15, 629, 1),
(13, 5, 59, 'Infestation: The New', 4, 275, 1),
(14, 5, 6, 'Armored Warfare', 17, 509, 1),
(15, 5, 42, 'Insidia', 75, 494, 1),
(19, 7, 1, 'World of Tanks', 1, 26, 1),
(20, 7, 3, 'CRSED: F.O.A.D.', 1, 68, 1),
(21, 7, 5, 'Blade and Soul', 1, 42, 1),
(22, 7, 11, 'War Thunder', 4, 79, 1),
(23, 8, 4, 'Crossout', 52, 1325, 1),
(24, 8, 8, 'World of Warships', 1, 13, 1),
(25, 8, 14, 'Crossfire', 3, 76, 1),
(26, 9, 365, 'abcd', 10, 20, 1),
(27, 10, 4, 'Crossout', 15, 25, 1),
(28, 11, 359, 'xmen', 6, 20, 1),
(29, 12, 359, 'xmen', 1, 20, 1),
(30, 12, 4, 'Crossout', 6, 25, 4),
(31, 12, 8, 'World of Warships', 13, 13, 3),
(32, 13, 4, 'Crossout', 12, 25.49, 7),
(33, 13, 40, 'Fortnite', 14, 23.9, 5),
(34, 13, 359, 'xmen', 11, 20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `orderID` int(11) NOT NULL,
  `accID` int(11) DEFAULT NULL,
  `total_price` varchar(20) DEFAULT NULL,
  `date_create` varchar(30) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `consignee_name` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`orderID`, `accID`, `total_price`, `date_create`, `order_status`, `consignee_name`, `address`, `phone_number`) VALUES
(1, 23, '3.28', '16:04 29/03/2023', 1, 'Tove', 'guandong', '0995088596'),
(2, 23, '3.34', '16:13 29/03/2023', 1, 'Tove', 'guandong', '0995088596'),
(3, 32, '36.34', '2023-04-28', 1, 'Huc Huynh', 'fqqfwfwqqfq,Afghanistan', '0938446903'),
(4, 33, '1.51', '2023-05-01', 2, 'Mach', '123abc,Viet Nam', '0902518641'),
(5, 34, '14.94', '2023-05-01', 2, 'Huchuynh', '123abc,Afghanistan', '0936299763'),
(7, 2, '2.47', '2023-05-05', 0, 'Brittany', 'dvsdvav,Afghanistan', '0969444682'),
(8, 2, '3.28', '2023-05-05', 0, 'Brittany', 'rbrebrb,Afghanistan', '0969444682'),
(9, 2, '4.15', '2023-05-05', 0, 'Brittany', '4n45n,Afghanistan', '0969444682'),
(10, 2, '75.5', '2023-05-05', 1, 'Brittany', 'tbt4b4,Afghanistan', '0969444682'),
(11, 32, '1.51', '2023-05-11', 0, 'Huc Huynh', 'guangdong,Afghanistan', '0938446903'),
(12, 35, '45.6', '2023-05-11', 1, 'abc', 'abc,Afghanistan', '0968644022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `orderID` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `gname` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_detail`
--

INSERT INTO `invoice_detail` (`orderID`, `gid`, `quantity`, `price`, `discount`, `gname`, `img`) VALUES
(1, 75, 1, '4.49', '3.28', 'UFO Online: Invasion', 'UFO-Online-Invasion.jpg'),
(2, 37, 2, '4.50', '1.67', 'Closers', 'Closers.jpg'),
(3, 36, 2, '3.26', '2.77', 'Global Adventures', 'Global-Adventures.jpg'),
(3, 363, 2, '20', '15.4', 'xmen', '4horseman.jpg'),
(4, 53, 1, '3.09', '1.51', 'Alien Swarm: Reactiv', 'Alien-Swarm-Reactive-Drop.jpg'),
(5, 24, 1, '8.99', '4.32', 'Spacelords', 'Spacelords.jpg'),
(5, 36, 1, '3.26', '2.77', 'Global Adventures', 'Global-Adventures.jpg'),
(5, 28, 1, '11.89', '7.85', 'Realm Royale Reforged', 'Realm-Royale-Reforged.jpg'),
(7, 93, 1, '3.99', '2.47', 'Fishing Planet', 'Fishing-Planet.jpg'),
(8, 19, 1, '4.49', '3.28', 'Splitgate: Arena War', 'Splitgate-Arena-Warfare.jpg'),
(9, 81, 1, '5.51', '2.48', 'Luna Online: Reborn', 'Luna-Online-Reborn.jpg'),
(9, 37, 1, '4.50', '1.67', 'Closers', 'Closers.jpg'),
(10, 53, 50, '3.09', '1.51', 'Alien Swarm: Reactiv', 'Alien-Swarm-Reactive-Drop.jpg'),
(11, 108, 1, '3.09', '1.51', 'Eldevin', 'Eldevin.jpg'),
(12, 52, 4, '21.50', '11.4', 'Cabals: Card Blitz', 'Cabals-Card-Blitz.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `gid` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `review_text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`gid`, `acc_id`, `review_text`) VALUES
(17, 31, 'hello'),
(17, 11, 'allo'),
(17, 22, 'fk'),
(17, 30, 'yeah'),
(17, 12, 'im LINDA'),
(88, 31, 'Im Vi Hao'),
(37, 31, 'I am Vi Hao'),
(37, 12, 'I am Linda'),
(31, 2, 'hello'),
(17, 3, 'hello world'),
(37, 2, 'hello, im brittany');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

CREATE TABLE `supplier` (
  `suppID` int(11) NOT NULL,
  `suppName` varchar(100) DEFAULT NULL,
  `suppMail` varchar(100) DEFAULT NULL,
  `suppTel` varchar(15) DEFAULT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`suppID`, `suppName`, `suppMail`, `suppTel`, `Status`) VALUES
(1, 'Nintendo', 'nintendonyc@noa.nintendo.com', '1-800-255-3700', 1),
(2, 'Ubisoft', 'ir@ubisoft.fr', '44-193-257-800', 1),
(3, 'Electronic Arts', 'contact_eahelp@ea.com', '(650) 628-1500', 1),
(4, 'PopCap Games', 'contact_eahelp@ea.com', '(650) 628-1500', 1),
(5, 'Epic Games', 'help@epicgames.com', '(919) 854-0070', 1),
(6, 'Riot', 'support@riotgames.com', '(424) 231-1111', 1),
(7, 'Fromsoftware', 'web-support@fromsoftware.co.jp', '81 570-001-300', 1),
(8, 'Square enix', 'dmca@us.square-enix.com', '(310) 846-0400', 1),
(9, 'Blizzard', 'peering@blizzard.com', '(877) 566-3886', 1),
(10, 'Valve Corporation', 'questions@valvesoftware.com', '(425) 889-9642', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `usertypeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userID`, `fullname`, `phone`, `address`, `usertypeID`) VALUES
(1, 'Admin', '0908134822', 'Guang Dong', 2),
(2, 'Brittany', '0969444682', '638 ... Houston, TX', 1),
(3, 'Cinderella', '0913814596', '5631 ... Houston, TX', 1),
(4, 'Diana', '0920770841', '975 ... Humble, TX', 1),
(5, 'Eva', '0932376271', '450 ... Bellaire, TX', 2),
(6, 'Fiona', '0947871207', '291 ... Bellaire, TX', 2),
(7, 'Gunda', '0937629123', '980 ... Bellaire, TX', 1),
(8, 'Hege', '0964302380', '3321 ... Spring, TX', 1),
(9, 'Inga', '0932658801', '731 ... Houston, TX', 1),
(10, 'Johanna', '0915276065', '638 ... Houston, TX', 1),
(11, 'Kitty', '0926455073', '5631 ... Houston, TX', 2),
(12, 'Linda', '0989482821', '975 ... Humble, TX', 1),
(13, 'Nina', '0972128393', '450 ... Bellaire, TX', 2),
(14, 'Ophelia', '0932165409', '291 ... Bellaire, TX', 1),
(15, 'Petunia', '0950650967', '980 ... Bellaire, TX', 2),
(16, 'Amanda', '0965371892', '3321 ... Spring, TX', 2),
(17, 'Raquel', '0981397248', '731 ... Houston, TX', 1),
(18, 'Cindy', '0937044015', '638 ... Houston, TX', 1),
(19, 'Doris', '0955643777', '5631 ... Houston, TX', 1),
(20, 'Eve', '0918493162', '975 ... Humble, TX', 1),
(21, 'Evita', '0927426157', '450 ... Bellaire, TX', 1),
(22, 'Sunniva', '0980115920', '291 ... Bellaire, TX', 2),
(23, 'Tove', '0995088596', '980 ... Bellaire, TX', 1),
(24, 'Unni', '0912234429', '3321 ... Spring, TX', 1),
(25, 'Violet', '0987254958', '731 ... Houston, TX', 1),
(26, 'Liza', '0965705179', '638 ... Houston, TX', 2),
(27, 'Elizabeth', '0965449095', '5631 ... Houston, TX', 2),
(28, 'Ellen', '0953278167', '975 ... Humble, TX', 2),
(29, 'Wenche', '0946353313', '980 ... Bellaire, TX', 2),
(30, 'Vicky', '0952992867', '3321 ... Spring, TX', 1),
(32, 'Huc Huynh', '0938446903', 'guangdong', 1),
(34, 'Huchuynh', '0936299763', 'Address hasn\'t been set ', 1),
(35, 'abc', '0968644022', 'abc', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `usertype`
--

CREATE TABLE `usertype` (
  `usertypeID` int(11) NOT NULL,
  `typeName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `usertype`
--

INSERT INTO `usertype` (`usertypeID`, `typeName`) VALUES
(1, 'customer'),
(2, 'employee');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accid`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD KEY `userID` (`userID`),
  ADD KEY `groupID` (`groupID`);

--
-- Chỉ mục cho bảng `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`groupID`);

--
-- Chỉ mục cho bảng `auth_group_detail`
--
ALTER TABLE `auth_group_detail`
  ADD KEY `auth_group_detail_ibfk_1` (`groupID`),
  ADD KEY `auth_group_detail_ibfk_2` (`feaID`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD KEY `cUser_id` (`cUser_id`),
  ADD KEY `cItem_id` (`cItem_id`);

--
-- Chỉ mục cho bảng `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`feaID`);

--
-- Chỉ mục cho bảng `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `genreID` (`genreID`);

--
-- Chỉ mục cho bảng `game_detail`
--
ALTER TABLE `game_detail`
  ADD KEY `game_detail_ibfk_1` (`gdt_id`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genID`);

--
-- Chỉ mục cho bảng `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`impID`),
  ADD KEY `accID` (`accID`);

--
-- Chỉ mục cho bảng `import_cart`
--
ALTER TABLE `import_cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `accID` (`accID`),
  ADD KEY `gid` (`gid`);

--
-- Chỉ mục cho bảng `import_detail`
--
ALTER TABLE `import_detail`
  ADD PRIMARY KEY (`imp_detail_ID`),
  ADD KEY `impID` (`impID`),
  ADD KEY `gid` (`gid`),
  ADD KEY `suppID` (`suppID`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`orderID`);

--
-- Chỉ mục cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `gid` (`gid`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `gid` (`gid`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`suppID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `usertypeID` (`usertypeID`);

--
-- Chỉ mục cho bảng `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `accid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `features`
--
ALTER TABLE `features`
  MODIFY `feaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `games`
--
ALTER TABLE `games`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `genID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `import`
--
ALTER TABLE `import`
  MODIFY `impID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `import_cart`
--
ALTER TABLE `import_cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `import_detail`
--
ALTER TABLE `import_detail`
  MODIFY `imp_detail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `suppID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `auth_group` (`groupID`),
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`groupID`) REFERENCES `auth_group` (`groupID`),
  ADD CONSTRAINT `account_ibfk_4` FOREIGN KEY (`groupID`) REFERENCES `auth_group` (`groupID`);

--
-- Các ràng buộc cho bảng `auth_group_detail`
--
ALTER TABLE `auth_group_detail`
  ADD CONSTRAINT `auth_group_detail_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `auth_group` (`groupID`),
  ADD CONSTRAINT `auth_group_detail_ibfk_2` FOREIGN KEY (`feaID`) REFERENCES `features` (`feaID`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cUser_id`) REFERENCES `account` (`accid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cItem_id`) REFERENCES `games` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`genreID`) REFERENCES `genres` (`genID`);

--
-- Các ràng buộc cho bảng `game_detail`
--
ALTER TABLE `game_detail`
  ADD CONSTRAINT `game_detail_ibfk_1` FOREIGN KEY (`gdt_id`) REFERENCES `games` (`gid`);

--
-- Các ràng buộc cho bảng `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_ibfk_2` FOREIGN KEY (`accID`) REFERENCES `account` (`accid`);

--
-- Các ràng buộc cho bảng `import_cart`
--
ALTER TABLE `import_cart`
  ADD CONSTRAINT `import_cart_ibfk_1` FOREIGN KEY (`accID`) REFERENCES `account` (`accid`),
  ADD CONSTRAINT `import_cart_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `games` (`gid`);

--
-- Các ràng buộc cho bảng `import_detail`
--
ALTER TABLE `import_detail`
  ADD CONSTRAINT `import_detail_ibfk_1` FOREIGN KEY (`impID`) REFERENCES `import` (`impID`),
  ADD CONSTRAINT `import_detail_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `games` (`gid`),
  ADD CONSTRAINT `import_detail_ibfk_3` FOREIGN KEY (`suppID`) REFERENCES `supplier` (`suppID`);

--
-- Các ràng buộc cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `invoice` (`orderID`),
  ADD CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `games` (`gid`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`usertypeID`) REFERENCES `usertype` (`usertypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
