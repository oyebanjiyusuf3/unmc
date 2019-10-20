-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 12:41 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `categ_id` int(5) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `tags` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(250) NOT NULL,
  `hits` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `user_id`, `categ_id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `tags`, `date_added`, `image`, `hits`, `status`) VALUES
(1, 1, 1, 'First Article', 'first-article', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod&amp;nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', '', '', '', '2018-10-24 23:02:30', '9055960f-1.jpg', 0, 'active'),
(2, 1, 2, 'This is a new article', 'this-is-a-new-article', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do \r\neiusmod&amp;nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad \r\nminim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip \r\nex ea commodo consequat. Duis aute is a goal of the month in the montj of october&lt;br&gt;&lt;/p&gt;', '', '', '', '2018-10-25 10:49:44', '3ed9bdcc-3.jpg', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categ_id` int(10) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categ_id`, `title`, `slug`, `description`, `active`) VALUES
(1, 'News', 'news', '', 1),
(2, 'Articles', 'articles', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `message_id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`message_id`, `name`, `email`, `subject`, `message`, `time`, `ip`, `is_read`) VALUES
(1, 'David Guetta', 'contact@website.com', 'Test message subject', 'This message is posted here using XRumer + XEvil 4.0 \r\nXEvil 4.0 is a revolutionary application that can bypass almost any anti-botnet protection. \r\nCaptcha Recognition Google (ReCaptcha-1, ReCaptcha-2), Facebook, Yandex, VKontakte, Captcha Com and over 8.4 million other types! \r\nYou read this - it means it works! ;) \r\nDetails on the official website of XEvil.Net, there is a free demo version.', '2017-11-15 07:13:14', '192.124.125.125', 1),
(2, 'John Doe', 'office@website.com', 'I want your help please', 'Lorem ipsum dolor sit amet, probo omnis fugit vis in. Tale summo quaeque vim eu, pro sumo omnium at. Ad illud facilisi vix, nostrud dolores expetenda id vim. Et affert constituto percipitur qui. Ad purto choro has. &#34;fdfs&#34;fsds&#39;dfasdfsd!!! \r\n\r\nConsul erroribus pri ut. Has no veniam consul molestie. Id eum zril graece, cu iusto alterum dignissim sit. Eos possit dictas no, eu accusamus necessitatibus sit. Per blandit voluptaria an, case illum error cu nec.Quaestio antiopam ut has, erant maluisset et vix. Error movet', '2017-11-29 18:47:13', '79.112.97.75', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages_rep`
--

CREATE TABLE `contact_messages_rep` (
  `id` int(10) NOT NULL,
  `message_id` int(10) NOT NULL,
  `sender_user_id` int(5) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_messages_rep`
--

INSERT INTO `contact_messages_rep` (`id`, `message_id`, `sender_user_id`, `message`, `time`) VALUES
(1, 2, 1, 'Lorem ipsum dolor sit amet, probo omnis fugit vis in. Tale summo quaeque vim eu, pro sumo omnium at. Ad illud facilisi vix, nostrud dolores expetenda id vim. Et affert constituto percipitur qui. Ad purto choro has. \"fdfs\"fsds&#39;dfasdfsd!!! \r\n\r\nConsul erroribus pri ut. Has no veniam consul molestie. Id eum zril graece, cu iusto alterum dignissim sit. Eos possit dictas no, eu accusamus necessitatibus sit. Per blandit voluptaria an, case illum error cu nec.Quaestio antiopam ut has, erant maluisset et vix. Error movet', '2017-11-29 18:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(10) NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `content` longtext NOT NULL,
  `active` tinyint(1) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `redirect_url` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `title`, `slug`, `content`, `active`, `meta_title`, `meta_description`, `meta_keywords`, `redirect_url`) VALUES
(4, 'Privacy', 'privacy', '&lt;p&gt;&lt;strong&gt;&lt;em&gt;Lorem ipsum dolor sit amet, &lt;/em&gt;&lt;/strong&gt;consectetur adipiscing elit. Sed iaculis urna et sapien malesuada sagittis. Proin id elementum mi. Donec vitae augue hendrerit, laoreet enim gravida, varius magna. Sed placerat sollicitudin purus, quis scelerisque sapien cursus ut. Nunc dui ligula, ornare semper nisi eu, laoreet gravida lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse sodales fringilla iaculis. Ut vitae imperdiet elit. Ut feugiat, sapien a rutrum rhoncus, nibh mi place.&lt;/p&gt;&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at urna accumsan, euismod sem in, consectetur dui. Nullam facilisis quam diam, ornare feugiat est varius sed. Duis eu laoreet tortor, nec varius velit. Donec ac nisl lacus. Proin congue tortor ullamcorper lectus elementum, fermentum interdum neque fringilla. In a lacus non elit iaculis rutrum. Donec nisi neque, imperdiet vel placerat quis, tempor sed nunc.\r\n&lt;/p&gt;\r\n&lt;p&gt;Suspendisse non massa justo. Pellentesque consectetur nec mauris nec varius. Curabitur luctus neque sem, eget ultrices odio iaculis eu. Pellentesque velit nisl, ultricies id erat vitae, congue consectetur urna. Sed tincidunt tempor ultricies. Donec luctus consequat ullamcorper. Sed ullamcorper risus ut nisi auctor consectetur.\r\n&lt;/p&gt;\r\n&lt;p&gt;Sed ac diam vel ante sodales porttitor quis eu ante. Vivamus vulputate mi odio, vel congue nibh sodales laoreet. Nulla facilisi. Sed nibh orci, tempus et purus vel, finibus egestas tortor. Curabitur interdum tincidunt malesuada. Fusce sit amet odio a velit viverra malesuada ut quis ante. Fusce ut condimentum erat, non dictum nisi. Integer semper elit in lacus porttitor, et aliquam est egestas. Cras varius mauris in vestibulum condimentum. Praesent a est auctor, vestibulum felis at, laoreet odio. Etiam finibus erat sit amet tincidunt viverra. Maecenas eget hendrerit velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis faucibus cursus tempor. Integer ac posuere nisi, in malesuada lectus.\r\n&lt;/p&gt;\r\n&lt;p&gt;Cras imperdiet, justo vel elementum consectetur, odio orci vestibulum eros, quis pretium libero quam sit amet erat. Aenean mollis, neque nec sagittis efficitur, odio odio semper nisl, quis vestibulum lacus nisl a purus. Pellentesque eget suscipit nulla. Integer quis semper nibh, pulvinar varius tellus. Nulla eu maximus diam, eget suscipit mi. Duis arcu tellus, rhoncus ut diam eget, ornare pretium felis. Suspendisse eros urna, malesuada quis est vel, mattis ornare magna. Nunc urna mi, lobortis eu consectetur id, placerat porta ex. Morbi non nisi velit. Vestibulum id metus tincidunt, hendrerit nisi sit amet, faucibus ligula. Integer aliquam metus mauris, vitae accumsan enim tempor eget. Vivamus pharetra dolor eget metus convallis, nec ullamcorper nisi malesuada. Aenean fermentum consequat euismod. Integer et neque nulla. Integer felis velit, sodales ut convallis non, tristique non diam. Sed facilisis ullamcorper nibh, et gravida ligula facilisis a.\r\n&lt;/p&gt;\r\n&lt;p&gt;Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer a velit in lectus maximus venenatis eu vel augue. Vestibulum ornare elit ut massa convallis, vitae fermentum dui blandit. Mauris non sodales neque, at commodo velit. Duis interdum justo ut mauris volutpat, eu molestie augue lobortis. Donec quam tellus, dignissim in volutpat ac, faucibus ut odio. Vestibulum in velit viverra, ornare augue non, tristique odio. Duis dictum nisi eu mauris venenatis egestas.&lt;/p&gt;', 1, 'Privacy meta title', 'Privacy meta description', '', ''),
(6, 'Terms of use', 'terms-of-use', '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Lorem ipsum dolor sit amet&lt;/strong&gt;, probo omnis fugit vis in.&amp;nbsp;Tale summo quaeque vim eu, pro sumo omnium at. Ad illud facilisi vix, nostrud dolores expetenda id vim. Et affert constituto percipitur qui. Ad purto choro has.Consul erroribus pri ut.&amp;nbsp;Has no veniam consul molestie. Id eum zril graece, cu iusto alterum dignissim sit. Eos possit dictas no, eu accusamus necessitatibus sit. Per blandit voluptaria an, case illum error cu nec.Quaestio antiopam ut has, erant maluisset et vix. Error movet homero qui id, ea mel homero debitis delicata, ut mea erant scaevola.&amp;nbsp;Pri euismod laoreet mnesarchum ei, putant theophrastus te quo. Per aliquam utroque eu, pri wisi ignota dolorem et, dolor vidisse percipitur sit eu. Aeque aliquid mandamus mea eu.Cras imperdiet, justo vel elementum consectetur, odio orci vestibulum eros, quis pretium libero quam sit amet erat. Aenean mollis, neque nec sagittis efficitur, odio odio semper nisl, quis vestibulum lacus nisl a purus. Pellentesque eget suscipit nulla. Integer quis semper nibh, pulvinar varius tellus. Nulla eu maximus diam, eget suscipit mi. Duis arcu tellus, rhoncus ut diam eget, ornare pretium felis.&amp;nbsp;&lt;/p&gt;&lt;br&gt;&lt;p&gt;Suspendisse eros urna, malesuada quis est vel, mattis ornare magna. Nunc urna mi, lobortis eu consectetur id, placerat porta ex. Morbi non nisi velit. Vestibulum id metus tincidunt, hendrerit nisi sit amet, faucibus ligula. Integer aliquam metus mauris, vitae accumsan enim tempor eget. Vivamus pharetra dolor eget metus convallis, nec ullamcorper nisi malesuada. Aenean fermentum consequat euismod.Integer et neque nulla. Integer felis velit, sodales ut convallis non, tristique non diam. Sed facilisis ullamcorper nibh, et gravida ligula facilisis a.  Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer a velit in lectus maximus venenatis eu vel augue. Vestibulum ornare elit ut massa convallis, vitae fermentum dui blandit. Mauris non sodales neque, at commodo velit. Duis interdum justo ut mauris volutpat, eu molestie augue lobortis. Donec quam tellus, dignissim in volutpat ac, faucibus ut odio. Vestibulum in velit viverra, ornare augue non, tristique odio. Duis dictum nisi eu mauris venenatis egestas.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;', 1, 'Lorem ipsum dolor sit amet', 'Suspendisse eros urna, malesuada quis est vel, mattis ornare magna', 'keyword1, keyword2', ''),
(13, 'Test page', 'test-page', 'This is a test page&lt;br&gt;', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'cfg_site_title', 'UNMC'),
(2, 'cfg_site_meta_title', 'UNMC - United Nigeria Movement for Change'),
(3, 'cfg_site_meta_description', 'United Nigeria Movement for Change'),
(4, 'cfg_site_meta_keywords', 'United Nigeria Movement for Change'),
(5, 'cfg_site_email', ''),
(6, 'cfg_mail_sending_option', 'php'),
(7, 'cfg_mail_smtp_encryption', 'tls'),
(8, 'cfg_mail_smtp_server', 'smtp.mailgun.org'),
(9, 'cfg_mail_smtp_user', ''),
(10, 'cfg_mail_smtp_password', ''),
(11, 'cfg_mail_smtp_port', '587'),
(12, 'cfg_footer_content', 'Copyright 2018 <strong>UNMC</strong>'),
(29, 'cfg_registration_email_verification_enabled', '1'),
(13, 'cfg_facebook_page', 'https://www.facebook.com/unmc'),
(14, 'cfg_homepage_content', 'This is a call to action text for the home page, this is very interesting I love it. Many text are to follow after this particular one thanks for your time you took in reviewing this. I love you all. Let me show you that this can also go a way further to get more content on the page<br>'),
(15, 'cfg_twitter_page', ''),
(16, 'cfg_registration_enabled', '1'),
(17, 'cfg_logo_image', '5a7205cd-favicon.png'),
(18, 'cfg_site_meta_author', 'SolveStation'),
(19, 'cfg_site_email_name', 'UNMC HQ'),
(20, 'cfg_google_maps_api_key', ''),
(21, 'cfg_analytics_code', ''),
(22, 'cfg_registration_user_role', '4'),
(23, 'cfg_registration_captcha_enabled', '1'),
(24, 'cfg_google_recaptcha_key', ''),
(25, 'cfg_google_recaptcha_registration_enabled', '0'),
(26, 'cfg_google_recaptcha_contact_enabled', '0'),
(27, 'cfg_google_recaptcha_site_key', ''),
(28, 'cfg_google_recaptcha_secret_key', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(5) NOT NULL,
  `title` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `image` varchar(250) COLLATE utf8_bin NOT NULL,
  `position` int(5) DEFAULT NULL,
  `url` text COLLATE utf8_bin,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `content`, `image`, `position`, `url`, `active`) VALUES
(1, 'Slide 2 title', 'Nulla lacinia volutpat massa, vitae mattis neque sodales vel. Nam venenatis arcu risus, sit amet scelerisque leo aliquet sit amet. Nunc convallis, nisl a sollicitudin volutpat, eros orci interdum ante.', 'd64350cc-2.jpg', 2, 'https://www.pikephp.com/pike-admin-frontend/news/3-maecenas-consequat-maximus-urna-id-dictum', 1),
(2, 'Slide 1 Title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lacus ullamcorper, consectetur mi quis, cursus nulla. Nunc placerat lacus sed pharetra hendrerit. Nulla risus quam, commodo cursus rhoncus a, consectetur sit amet eros.', '9bcef6d2-1.jpg', 1, '', 1),
(3, 'Slide 3 Title', 'Duis vehicula, dolor pretium finibus interdum, sem mi suscipit enim, in tristique magna diam eget purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', '8ac7ee62-3.jpg', 3, 'https://www.pikephp.com/pike-admin-frontend/news/6-quisque-ac-justo-porttitor-mi-egestas-fermentum', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `password` varchar(60) NOT NULL,
  `token` varchar(100) NOT NULL,
  `role_id` int(3) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `email_verified` tinyint(1) NOT NULL,
  `protected` tinyint(1) NOT NULL,
  `last_activity` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `permalink`, `avatar`, `password`, `token`, `role_id`, `active`, `email_verified`, `protected`, `last_activity`) VALUES
(1, 'absyinka@gmail.com', 'Abbas Adeyinka', 'abbas-adeyinka', '72c1bff3-photo.jpg', '$2a$08$eAwHNWQx3.mACBZ3IR2FreJEERAvDP5LICTHqR46OMyeB8LKgYtvq', '272022abd69dbb15ae459a0c1bdce2a41d66a87fddf9a0a35d6c91c194e68b00', 1, 1, 1, 1, '2018-10-25 12:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `users_extra`
--

CREATE TABLE `users_extra` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `value` longtext NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_extra`
--

INSERT INTO `users_extra` (`id`, `user_id`, `name`, `value`, `description`) VALUES
(15, 1, 'register_host', '123-112-11-059.fiberlink.com', ''),
(13, 1, 'register_time', '2017-11-24 20:32:29', ''),
(14, 1, 'register_ip', '112.112.11.59', ''),
(17, 1, 'country', 'RO', ''),
(18, 1, 'skype', 'absyinka1', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `role_id` int(5) NOT NULL,
  `role` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `protected` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `role_description` text NOT NULL,
  `is_staff` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`role_id`, `role`, `title`, `protected`, `active`, `role_description`, `is_staff`) VALUES
(1, 'admin', 'Administrator', 1, 1, 'Have full access to all sections', 1),
(2, 'manager', 'Manager', 1, 1, 'Have access to website content (all authors / users). Can add / edit any content.', 1),
(3, 'author', 'Author', 1, 1, 'Can add content. Have access to own content only.', 1),
(4, 'user', 'User', 1, 1, 'Registered user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `contact_messages_rep`
--
ALTER TABLE `contact_messages_rep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_extra`
--
ALTER TABLE `users_extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categ_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages_rep`
--
ALTER TABLE `contact_messages_rep`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_extra`
--
ALTER TABLE `users_extra`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
