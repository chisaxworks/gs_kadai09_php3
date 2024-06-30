-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 6 月 30 日 10:33
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai_php`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_php2`
--

CREATE TABLE `gs_kadai_php2` (
  `id` int(12) NOT NULL,
  `sname` varchar(64) NOT NULL,
  `url` varchar(500) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `plan` varchar(64) NOT NULL,
  `payment` varchar(64) NOT NULL,
  `note` varchar(500) NOT NULL,
  `color` varchar(12) NOT NULL,
  `ogpimg` varchar(500) DEFAULT NULL,
  `createDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_kadai_php2`
--

INSERT INTO `gs_kadai_php2` (`id`, `sname`, `url`, `mail`, `plan`, `payment`, `note`, `color`, `ogpimg`, `createDate`, `modifyDate`) VALUES
(48, 'Adobe Creative Cloud', 'https://creativecloud.adobe.com/cc?locale=ja', 'chisaxworks@gmail.com', 'Creative Cloudコンプリートプラン', '月払い', '', 'pink', '', '2024-06-30 12:49:43', '2024-06-30 12:49:43'),
(49, 'freee', 'https://www.freee.co.jp/', 'chisaxworks@gmail.com', 'スタンダードプラン', '年払い', '会計ソフトのみ', 'blue', 'https://www.freee.co.jp/assets/image/img_freee_201908.png', '2024-06-30 12:50:22', '2024-06-30 12:50:22'),
(50, 'Misoca', 'https://www.yayoi-kk.co.jp/seikyusho/', 'chisaxworks@gmail.com', '無料プラン', '無料', '', 'green', 'https://www.yayoi-kk.co.jp/seikyusho/common/img/acq/og.png', '2024-06-30 12:51:01', '2024-06-30 12:51:01'),
(51, 'Slack', 'https://slack.com/intl/ja-jp', 'chisaxworks@gmail.com', 'プロ', '無料', '', 'purple', 'https://a.slack-edge.com/ec3a92a/marketing/img/homepage/true-prospects/unfurl/slack-e2e-homepage-unfurl.ja-JP.jpg', '2024-06-30 12:52:19', '2024-06-30 12:52:19'),
(52, 'エックスサーバー', 'https://www.xserver.ne.jp/', 'chisaxworks@gmail.com', 'スタンダードプラン', '年払い', '事業HP用', 'gray', 'https://www.xserver.ne.jp/img/common/ogp.png?date=210415', '2024-06-30 12:52:54', '2024-06-30 12:52:54'),
(53, 'さくらのレンタルサーバ', 'https://rs.sakura.ad.jp/', 'chisaxworks@gmail.com', 'スタンダード', '年払い', 'gs用', 'yellow', 'https://rs.sakura.ad.jp/images/ogp.png', '2024-06-30 12:53:23', '2024-06-30 12:53:23');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_kadai_php2`
--
ALTER TABLE `gs_kadai_php2`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_kadai_php2`
--
ALTER TABLE `gs_kadai_php2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
