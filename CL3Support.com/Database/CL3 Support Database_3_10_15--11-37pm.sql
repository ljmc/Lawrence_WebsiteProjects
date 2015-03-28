-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2015 at 11:37 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ljmc308_cl3`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq_answers`
--

CREATE TABLE IF NOT EXISTS `faq_answers` (
  `id` int(11) NOT NULL,
  `question` varchar(256) NOT NULL,
  `response` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_answers`
--

INSERT INTO `faq_answers` (`id`, `question`, `response`, `category_id`, `order_number`) VALUES
(130, '<center><b><h4 style="color:#434a54;">Teamspeak</h4></b></center>', 'FAQ''s Regarding Teamspeak', 28, 0),
(131, 'I have requested an interview on Teamspeak, but I can''t find the password for the server to get on? ', 'You need to be validated and then once you are a full member, you can find it on the "How to install city life" page.', 28, 1),
(132, 'I keep getting kicked from ts3 for (Fix your name: ***)', 'You need to make sure that your name that you are connecting to Teamspeak with is identical to the one you signed up with on the forums.', 28, 2),
(133, 'Why does it says I need to increase my security level.', 'The CL3 Teamspeak server requires a security level of 27 in order to connect.\r\n<br>\r\nIt can take up to 30minutes to get this high level.\r\n<br>\r\nThe point behind it is that most spammers aren''t going to sit and wait for their security level to rise just to come in and get banned again.', 28, 3),
(134, 'How can I get the CIV channels passwords for teamspeak?', 'Join the "Need Passwords" channel on Teamspeak and a Helper will assist you.', 28, 4),
(135, 'How do I increase my security level?', 'In TS goto Setting ---> Identities ---><br>\r\nThen you can see your current level, next to that is a button called "Improve"...\r\n<br>\r\nType the number you want it to be (ex: 27), click "Start" button and wait.\r\n', 28, 5),
(136, 'What is the Teamspeak Server Name?', 'Server Name: City Life RPG', 28, 6),
(137, 'How do I backup/import my Teamspeak 3 ID?', 'To backup your Team Speak 3 ID do the following.<br>\r\nHold Ctrl - I within team speak or Select Settings -> Identities <br>\r\nA window will open with your TS ID select export and save it to a safe location.<br>\r\nTo import your Team Speak 3 ID follow the above options except on the identities windows select import and select your backup of your TS ID.<br>', 28, 7),
(138, 'Why Was I Moved to the AFK Channel on Team Speak?', 'In order to automatically moved to the AFK channel;<br>\r\n- Mute your microphone<br>\r\n- Mute your speakers<br>\r\n- Record via TeamSpeak<br>\r\n- Switch TeamSpeak server<br>', 28, 8),
(139, 'I don''t have a working mic, but I can text in the chat even faster.', 'You cannot join this server without a working mic. It is a requirement to play on our mod.\r\n<br>\r\nNo exceptions.', 28, 9),
(140, 'How do I create a company icon tag for Teamspeak?', 'You need to create an image that is 16x16 and transparent and contact a ts helper.', 28, 10),
(141, 'Where can i find the Teamspeak Server Address?', 'On the how to install page on www.cityliferpg.com. If you cannot see this page then your account is still being validated by an admin.', 28, 11),
(142, 'What is the TS IP i have looked at the other TS responses and they don''t seem to work?', 'You can only get that once you have full forum access', 28, 12),
(144, '<center><b><h4 style="color:#434a54;">New Members</h4></b></center>', 'FAQ for new members that need info.', 28, 13),
(145, 'Roughly how long does the verification process take?', 'Whenever we are free we will process accounts. This can take from 10mins to 2weeks this is due to the amount of people that we are getting applications for.', 28, 14),
(146, 'How much time does it take to get an interview?', 'This time will fluctuate on how many helpers are available and how many people are waiting for interviews.', 28, 15),
(147, 'What is City Life RPG?', 'City Life RPG is an Online RPG built on the Arma 3 engine offering an online environment for you to enjoy. What sets us aside from other RPG Mods is our custom made addons built around our own systems. Our systems have been built by our development team over a long period of time making it one of the longest running mods in the Armed Assault series. We rely heavily on the feedback of our players as the players are the building blocks of the mods success inspiring us with ideas and giving us new goals to reach, so with that in mind i would like to welcome your donations via this online store where you are rewarded for helping with server costs. We would just like to say a big thank you to all the beta testers, development team and not forgetting addon makers that have allowed us to use their content in the mod.', 28, 16),
(148, 'How do I sign up to play City Life?', '1. <a href="http://www.cityliferpg.com/forum/index.php?app=core&module=global&section=register">Register Here</a><br>\r\n2. Post a interview request<br>\r\n3. Once you have been validated then <a href="http://www.cityliferpg.com/forum/index.php?/topic/7345-how-to-install-city-life-rpg-2/">Install City Life RPG</a><br>\r\n4. Make sure you lick "Update CityLife" so you download the Mod and the Launcher, then go to the "Waiting for my interview channel."\r\n', 28, 17),
(149, 'I have made an account but it wont be verified, also I dont know the TS login.', 'If you account is at the stage of Verifying you must wait for an administrator to accept you. Once your account is accepted you will see how to install City Life and the TS.\r\n<br>\r\nPlease do not pm or ask how long it will take to be validated via the QnA. Your question will be deleted.', 28, 18),
(150, 'Where are the Rules?', '<a href="https://forum.cityliferpg.com/index.php?app=tos"> Link to the Rules!</a>', 28, 19),
(151, 'I have requested an interview, but I can''t find the password for the server to get on it', 'Once you are validated go to <a href="http://forum.cityliferpg.com/topic/7345-how-to-install-city-life-rpg-3/">How to isntall</a> and go to the TS password.', 28, 20),
(152, 'Why wont any helper or admin''s come up to help us?', 'The helpers and admins are very busy people and they may not know you are up there. When time allows and they know you are up there they will assist you to the best of their possibility. ', 28, 21),
(153, 'I need help but I don''t know where to start!?', '1st: View the <a href="https://cliki.cityliferpg.com/index.php?title=Main_Page">Cliki</a>\r\n2nd: Ask your Friends\r\n3rd: Browse the Forums or QnA''s\r\n4th: Jump into a Team Speak Support Channel that is related to your problem\r\n4A: If you cannot access Team Speak ask a question on the Need Help Topic on the forums and/or submit them to the QnA.\r\n5th: Contact a Helper\r\n6th: A Helper will contact a TS Admin if he or she cannot fix your issue.\r\n7th: A TS Admin will contact a Super Admin if he or she cannot fix your problem.', 28, 22),
(154, '<center><b><h4 style="color:#434a54;">CL3 Launcher</h4></b></center>', 'FAQ''s regarding the game launcher.', 28, 23),
(155, 'How do I manually update the cl launcher?', 'Install the launcher(*See How to install)<br>\r\nOpen folder:<br>\r\n32bit:C:\\Program Files\\City Life RPG\\CL2 Launcher<br>\r\n64bit:C:\\Program Files (x86)\\City Life RPG\\CL2 Launcher<br>\r\nEdit updater.xml and change 1.0.0.*** to 1.0.0.1<br>\r\nRun CL2Launcher Updater.exe<br>\r\nClick download<br>\r\nClick install<br>\r\nRun CL3Launcher.exe<br>\r\nIf this fails re-download the setup.exe and install again<br>', 28, 24),
(156, 'How do I find my RPT file?', '1. Go to the settings panel\n2. Bottom right click RTP Path\n3. Look for latest modified one and that is the most recent RPT', 28, 25),
(157, '<center><b><h4 style="color:#434a54;">Forums</h4></b></center>', 'FAQ''s For the Forums.\r\n', 28, 30),
(158, 'I made an account posted an interview but now like seconds after posting it wouldnt let me do anything the top says error you do not have permission', 'You need to be validated before you gain permission.', 28, 31),
(159, 'Why cant I access anything on the forum or use the launcher? I have registered', 'You need to be validated by an admin first.', 28, 32),
(160, 'How can I edit my profile?', 'Go to your profile in the top right. Then when it is loaded above your name to the right there is a edit my profile button.', 28, 33),
(161, 'How to I tag a name?', 'Use the [member=<i>USERNAME</i>] BBCode to mention someone''s name.', 28, 34),
(162, 'How do I add a YouTube video to a post?', 'Use [youtube]https://www.youtube.com/watch?v=VLCbD8_jLQo[/youtube]', 28, 35),
(163, 'Im having trouble creating an account on the website as it says The administrator is currently not accepting new membership registrations.', 'The administration team will close applications for our mod when we have too many members already active.', 28, 36),
(165, '<center><b><h4 style="color:#434a54;">Administration Issues</h4></b></center>', 'This FAQ covers questions about administration issues.', 28, 38),
(166, 'Is it possible for an exception to be made so my brother and i can both play on the server from the same ip?', 'No, you will both be banned for duplicate accounts.', 28, 39),
(167, 'If you were permed for a reason you think is silly, or want to discuss with the admin, how do you get in contact with them?', 'If you believe you where banned for a "silly" reason head over to the forums and navigate to Unban Request area. Here you can post an unban request.', 28, 40),
(168, 'I am banned and Can''t Access the Website to Post an Unban Request', 'Then you have been permanently banned. ', 28, 41),
(169, 'How can I close my account?', 'You cannot.', 28, 42),
(170, 'Do people get banned for no reason?', 'No.\r\n<br>\r\nEvery ban is put into action for a reason.\r\n<br>\r\nTo prevent yourself from facing a ban we urge you to read the rules on a regular basic so you can stay up to date on what might cause a ban to be put into place and the consequence.\r\n<br>\r\nTo review the rules of our Game Server go to\r\n<a href="http://www.cityliferpg.com/forum/index.php?app=tos">Rules</a>', 28, 43),
(171, 'Why Was I Banned?', 'If you where banned* and what to find out why you here banned go to the forums and find the category Ban Request or search your username in the search field. You should find a post about why you where banned.\r\n<br>\r\n*banned. If you have been perm banned you may not have access to the forums.', 28, 44),
(172, 'Is there any way to be unbanned', 'Post a <a href="http://forum.cityliferpg.com/forum/31-unban-request/"> Unbann Request</a>\r\n<br>\r\nThe admins will discuss and vote on if they want to unban you.', 28, 45),
(173, '<center><b><h4 style="color:#434a54;">In Game</h4></b></center>', 'FAQ''s regarding the in game questions.', 28, 46),
(174, 'Where can I find my ArmA Player ID?', 'Start regular ArmA, click on your player name on the top left of the title screen and select your player name and hit "edit" In the bottom right corner is the ArmA Player ID, which belongs to exactly one copy of ArmA.', 28, 47),
(175, 'In-game can I upgrade my vehicles as in logos, engines, seats, and aftermarket parts?', 'Currently you can only upgrade your speed.', 28, 48),
(176, ' Do you know if i can use my XBox controller on this game it works on most games on my PC but don''t know if it will on this one.', ' I think you can but if you get banned by BE then its your own fault', 28, 49),
(177, 'How do houses work?', 'Houses can be used for storing items, saving your account and storing vehicles there. Some of the houses you can walk through. Good for rp.', 28, 50),
(178, 'Once I launch into the mod and select a civilian slot, how do I register / log in to the log in screen?', 'Once you have launched into the mod, selected your civilian/bluefor slot, clicked connect, loaded the data base, and either skipped or watched the into you will have the login screen appear on your screen.\r\n<br>\r\nYou will see a D.O.B. (Date of birth) box and a password box.\r\nSelect your correct D.O.B. and type a custom password of your choice that contains letters and numbers (NO SPECIAL CHARACTERS) (a-z 0-9). Now click register. This window will refresh. Retype your credentials and proceed.\r\n<br>\r\nLOG IN WITH THESE DETAILS EVERY TIME YOU JOIN THE MOD.\r\n**IF YOU FORGET YOUR PASSWORD IT WILL COST 5 POUNDS TO REPLACE**', 28, 51),
(183, '<center><b><h4 style="color:#434a54;">XML''s</h4></b></center>', 'FAQ''s for XML''s', 28, 52),
(184, 'Where can I host an xml?', 'You can only host your XML on a non advert site like <a href="http://sh2.armatechsquad.com/inc/userfunctions.php?action=login>ArMaTeC''s"></a> website.', 28, 53),
(185, 'How do I add my XML to my character in game?', 'In your profile click edit and you will see Squad URL. Paste it there.', 28, 54),
(186, 'I have a problem getting the xml to work in game?', 'With this system there is 2 ways to add your XML to your game<br>\r\nhttp://sh2.armatechsquad.com/squad/army_ARMYNAME.xml\r\n<br>(Replaceing ARMYNAME with your army''s name after joining one)<br>\r\nor if your creating a player for an exsiting army<br>\r\nhttp://sh2.armatechsquad.com/squad/player_INGAMEPLAYERNAME.xml<br>\r\n(Replaceing INGAMEPLAYERNAME with your player)\r\n<br>Please take a look at this link it may help you\r\n<br>http://sh2.armatechsquad.com/inc/userfunctions.php?action=help', 28, 55),
(187, 'Sign Up: Why is there no submit button on the sign-up form?', 'The submit button will appear when you fill in all relevant information', 28, 56),
(188, 'Sign Up: What is the check button for? ', 'This is a user-name checking system it will check if your requested user-name is available and if it is not it will show you some options that you can chose.', 28, 57),
(189, 'My Launcher says: A referral was returned from the server.', 'If you have installed the launcher and it fails to update you will need to setup some permissions.<br>\r\nRight click City Life RPG Launcher shortcut and click properties<br>\r\nClick Open File Location<br>\r\nRight click CL3Launcher.exe and click properties<br>\r\nClick on compatibility tab<br>\r\nSelect Run this program in compatibility mode for: Windows XP (Servive Pack 3)<br>\r\nSelect Privilege Level: Run this program as an administrator<br>\r\nClick Apply and try and launch the launcher again<br>', 28, 26),
(190, 'CL launcher says I need to join teamspeak but I am both in teamspeak and have my tags. What can I do?', 'Run TS as Admin', 28, 27),
(191, 'Sys Check Fail: Please join the Team Speak Server.', 'Here are a few options to fix this issue<br>\r\n\r\nOption 1<br>\r\nGo to your CL2 Launcher<br>\r\nNavigate to the Settings Tab<br>\r\nLook in the Forum Security Login section<br>\r\nHere you will see your username you have logged into <br>the cl2 launcher with. Make sure your username is <br>the EXACT SAME AS YOUR FORUM USERNAME:<br>\r\nExample<br>\r\nForum Username: TeStUser101<br>\r\nCL2 Launcher Username: testuser101<br>', 28, 28),
(192, 'How large size wise is all the necessary mod files? i''m bandwidth capped and just curious.', '~ 9 GB', 28, 29),
(194, 'I love this mod, can I donate?', 'Yes, we do accept donations on the main forum page.', 28, 37),
(196, 'How to reinstall the Launcher?', 'Reinstalling the launcher without wiping the repo is simple. Navigate to to the launchers files. You can find the launcher''s files by right clicking the icon on your desktop and going to "Properties" -> "Open File Location" Once here you should see a folder called "@CL3Synq". Move that folder to your desktop or another drive that has enough space to hold the repo. (Around 8-11GBs) Once you have backed up the folder uninstall the launcher by clicking the "CL3 Launcher uninst.exe" in the same location you retrieved the "@CL3Synq" folder. After the uninstall has completed reinstall normally following this tutorial: Here . Make sure you open the launcher and login to update the launcher once again. Once updated close the launcher and open its file location again. Place the "@CL3Synq" folder you backed up into the launchers files. Open the launcher and update City Life. The launcher will recognize the repo is there. You have now reinstall your launcher without wiping the repo.\r\n', 29, 196);

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

CREATE TABLE IF NOT EXISTS `faq_category` (
  `id_category` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `order_number` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_category`
--

INSERT INTO `faq_category` (`id_category`, `title`, `order_number`) VALUES
(28, 'Frequently Asked Questions', 0),
(29, 'Common Issues & Fixes ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_conversations`
--

CREATE TABLE IF NOT EXISTS `web_conversations` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `ticket_user` varchar(255) NOT NULL,
  `ticket_mail` varchar(255) DEFAULT NULL,
  `ticket_body` varchar(506) NOT NULL,
  `ticket_time` int(11) NOT NULL,
  `ticket_supporter` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_conversations`
--

INSERT INTO `web_conversations` (`id`, `ticket_id`, `ticket_user`, `ticket_mail`, `ticket_body`, `ticket_time`, `ticket_supporter`) VALUES
(328, '4859-8833-7337-9609', 'Lawrence', NULL, 'Do this and that', 1425608209, 1),
(329, '4859-8833-7337-9609', 'Lawrence', NULL, 'Fixed', 1425608234, 0),
(330, '8656-3762-3465-2750', 'billy', 'help@cl3support.com', 'le test', 1425616412, 0),
(331, '8656-3762-3465-2750', 'Zerotoxins', NULL, 'Le close', 1425616442, 1),
(332, '3212-6311-3059-9089', 'JefferyDahmer', 'james.slattery777@gmail.com', 'Hi', 1425618505, 0),
(333, '3212-6311-3059-9089', 'JefferyDahmer', NULL, 'My Launcher does not work!', 1425618534, 0),
(334, '3212-6311-3059-9089', 'Lawrence', NULL, 'Have you tried re-installing it? Here is an article that shows you how to re-install without wiping your repo.  https://cl3support.com/kb.php#Reinstall', 1425618686, 1),
(335, '1483-1922-9746-7970', 'TestTicket', 'james.slattery777@gmail.com', 'test123', 1425623242, 0),
(336, '1483-1922-9746-7970', 'JefferyDahmer', NULL, 'test response ', 1425623261, 1),
(337, '1483-1922-9746-7970', 'JefferyDahmer', NULL, 'Closing Ticket', 1425623381, 1),
(338, '3212-6311-3059-9089', 'JefferyDahmer', NULL, 'Closing Ticket', 1425623400, 1),
(339, '4628-7053-5218-3125', 'Lawrence', 'ljmcmullen99@gmail.com', 'MySQL injection patch test.', 1425873628, 0),
(340, '4628-7053-5218-3125', 'Lawrence', NULL, 'Works', 1425873795, 0),
(341, '9074-4431-9472-7324', 'Lawrence', 'test@test.com', 'test!', 1426047821, 0),
(342, '9074-4431-9472-7324', 'Lawrence', NULL, 'Test', 1426048268, 1),
(343, '9074-4431-9472-7324', 'Lawrence', NULL, ' ', 1426048343, 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_supporter`
--

CREATE TABLE IF NOT EXISTS `web_supporter` (
  `id` int(11) NOT NULL,
  `auth_code` int(11) NOT NULL,
  `auth_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_supporter`
--

INSERT INTO `web_supporter` (`id`, `auth_code`, `auth_name`) VALUES
(2, 2620, 'Lawrence'),
(3, 2621, 'Zerotoxins'),
(4, 433153066, 'JefferyDahmer'),
(5, 956584, 'ArMaTeC'),
(6, 4544, 'UnkownCobra');

-- --------------------------------------------------------

--
-- Table structure for table `web_tickets`
--

CREATE TABLE IF NOT EXISTS `web_tickets` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `ticket_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_tickets`
--

INSERT INTO `web_tickets` (`id`, `ticket_id`, `ticket_status`) VALUES
(184, '4859-8833-7337-9609', 0),
(186, '3212-6311-3059-9089', 0),
(187, '1483-1922-9746-7970', 0),
(188, '4628-7053-5218-3125', 0),
(189, '9074-4431-9472-7324', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq_answers`
--
ALTER TABLE `faq_answers`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_question_response_Category` (`category_id`);

--
-- Indexes for table `faq_category`
--
ALTER TABLE `faq_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `web_conversations`
--
ALTER TABLE `web_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_supporter`
--
ALTER TABLE `web_supporter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_tickets`
--
ALTER TABLE `web_tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq_answers`
--
ALTER TABLE `faq_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=197;
--
-- AUTO_INCREMENT for table `faq_category`
--
ALTER TABLE `faq_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `web_conversations`
--
ALTER TABLE `web_conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=344;
--
-- AUTO_INCREMENT for table `web_supporter`
--
ALTER TABLE `web_supporter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `web_tickets`
--
ALTER TABLE `web_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=190;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
