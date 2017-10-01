-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 02 2017 г., 00:03
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `php_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contenttype`
--

CREATE TABLE IF NOT EXISTS `contenttype` (
  `contenttypeid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`contenttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `contenttype`
--

INSERT INTO `contenttype` (`contenttypeid`, `name`) VALUES
(22, 'topic'),
(23, 'reply');

-- --------------------------------------------------------

--
-- Структура таблицы `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `nodeid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contenttypeid` smallint(6) NOT NULL,
  `publishdate` int(11) DEFAULT NULL,
  `title` varchar(512) DEFAULT NULL,
  `parentid` int(11) NOT NULL,
  `lastcontent` int(11) NOT NULL DEFAULT '0',
  `lastcontentid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`nodeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=134 ;

--
-- Дамп данных таблицы `node`
--

INSERT INTO `node` (`nodeid`, `contenttypeid`, `publishdate`, `title`, `parentid`, `lastcontent`, `lastcontentid`, `userid`) VALUES
(82, 22, 1505341382, 'Chapter 1 The Boy Who Lived', 81, 1505341423, 86, 29),
(83, 23, 1505341394, '', 82, 1505341394, 83, 29),
(84, 23, 1505341404, '', 82, 1505341404, 84, 30),
(85, 23, 1505341414, '', 82, 1505341414, 85, 29),
(86, 23, 1505341423, '', 82, 1505341423, 86, 29),
(87, 22, 1505341463, 'Chapter 2 The Vanishing Glass', 81, 1505341463, 87, 29),
(88, 22, 1505341493, 'Chapter 3 Letters from No One', 81, 1505341514, 90, 30),
(89, 23, 1505341505, '', 88, 1505341505, 89, 29),
(90, 23, 1505341514, '', 88, 1505341514, 90, 30),
(91, 22, 1505341543, 'Chapter 4 The Keeper of the Keys', 81, 1505341543, 91, 30),
(92, 22, 1505341576, 'Chapter 5 Diagon Alley', 81, 1505341588, 93, 30),
(93, 23, 1505341588, '', 92, 1505341588, 93, 29),
(111, 23, 1505858466, '', 82, 1505858466, 0, 30),
(112, 23, 1505858669, '', 82, 1505858669, 0, 30),
(113, 23, 1505859015, '', 82, 1505859015, 0, 29),
(114, 23, 1505859177, '', 82, 1505859177, 114, 29),
(115, 23, 1505859226, '', 87, 1505859226, 115, 29),
(116, 23, 1505859239, '', 87, 1505859239, 116, 30),
(117, 23, 1505859272, '', 87, 1505859272, 117, 29),
(118, 23, 1505860498, '', 82, 1505860498, 118, 29),
(119, 23, 1505860525, '', 82, 1505860525, 119, 30),
(120, 23, 1505860541, '', 82, 1505860541, 120, 30),
(121, 23, 1505860633, '', 82, 1505860633, 121, 30),
(122, 23, 1505860969, '', 82, 1505860969, 122, 29),
(123, 23, 1505861138, '', 82, 1505861138, 123, 30),
(124, 23, 1505861217, '', 82, 1505861217, 124, 0),
(125, 23, 1505861819, '', 82, 1505861819, 125, 0),
(126, 23, 1505881994, '', 82, 1505881994, 126, 0),
(127, 23, 1505884363, '', 82, 1505884363, 127, 0),
(128, 23, 1505884369, '', 82, 1505884369, 128, 0),
(129, 23, 1506151015, '', 82, 1506151015, 129, 0),
(130, 23, 1506706702, '', 82, 1506706702, 130, 29),
(131, 23, 1506729966, '', 82, 1506729966, 131, 29),
(132, 23, 1506732191, '', 82, 1506732191, 132, 29),
(133, 23, 1506891434, '', 82, 1506891434, 133, 32);

-- --------------------------------------------------------

--
-- Структура таблицы `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `nodeid` int(10) unsigned NOT NULL,
  `rawtext` mediumtext,
  PRIMARY KEY (`nodeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `text`
--

INSERT INTO `text` (`nodeid`, `rawtext`) VALUES
(0, 'testlogin'),
(82, 'Mr. and Mrs. Dursley, of number four, Privet Drive, were proud to say that they were perfectly normal, thank you very much. They were the last people you''d expect to be involved in anything strange or mysterious, because they just didn''t hold with such nonsense.'),
(83, 'Mr. Dursley was the director of a firm called Grunnings, which made drills. He was a big, beefy man with hardly any neck, although he did have a very large mustache. Mrs. Dursley was thin and blonde and had nearly twice the usual amount of neck, which came in very useful as she spent so much of her time craning over garden fences, spying on the neighbors. The Dursleys had a small son called Dudley and in their opinion there was no finer boy anywhere.'),
(84, 'The Dursleys had everything they wanted, but they also had a secret, and their greatest fear was that somebody would discover it. They didn''t think they could bear it if anyone found out about the Potters. Mrs. Potter was Mrs. Dursley''s sister, but they hadn''t met for several years; in fact, Mrs. Dursley pretended she didn''t have a sister, because her sister and her good-for-nothing husband were as unDursleyish as it was possible to be. The Dursleys shuddered to think what the neighbors would say if the Potters arrived in the street. The Dursleys knew that the Potters had a small son, too, but they had never even seen him. This boy was another good reason for keeping the Potters away; they didn''t want Dudley mixing with a child like that.'),
(85, 'When Mr. and Mrs. Dursley woke up on the dull, gray Tuesday our story starts, there was nothing about the cloudy sky outside to suggest that strange and mysterious things would soon be happening all over the country. Mr. Dursley hummed as he picked out his most boring tie for work, and Mrs. Dursley gossiped away happily as she wrestled a screaming Dudley into his high chair.\n\nNone of them noticed a large, tawny owl flutter past the window.'),
(86, 'At half past eight, Mr. Dursley picked up his briefcase, pecked Mrs. Dursley on the cheek, and tried to kiss Dudley good-bye but missed, because Dudley was now having a tantrum and throwing his cereal at the walls.\n\n"Little tyke," chortled Mr. Dursley as he left the house. He got into his car and backed out of number four''s drive.\n'),
(87, 'Nearly ten years had passed since the Dursleys had woken up to find their nephew on the front step, but Privet Drive had hardly changed at all. The sun rose on the same tidy front gardens and lit up the brass number four on the Dursleys'' front door; it crept into their living room, which was almost exactly the same as it had been on the night when Mr. Dursley had seen that fateful news report about the owls. Only the photographs on the mantelpiece really showed how much time had passed. Ten years ago, there had been lots of pictures of what looked like a large pink beach ball wearing different-colored bonnets -- but Dudley Dursley was no longer a baby, and now the photographs showed a large blond boy riding his first bicycle, on a carousel at the fair, playing a computer game with his father, being hugged and kissed by his mother. The room held no sign at all that another boy lived in the house, too.'),
(88, 'The escape of the Brazilian boa constrictor earned Harry his longest-ever punishment. By the time he was allowed out of his cupboard again, the summer holidays had started and Dudley had already broken his new video camera, crashed his remote control airplane, and, first time out on his racing bike, knocked down old Mrs. Figg as she crossed Privet Drive on her crutches.\n\nHarry was glad school was over, but there was no escaping Dudley''s gang, who visited the house every single day. Piers, Dennis, Malcolm, and Gordon were all big and stupid, but as Dudley was the biggest and stupidest of the lot, he was the leader. The rest of them were all quite happy to join in Dudley''s favorite sport: Harry Hunting.'),
(89, 'This was why Harry spent as much time as possible out of the house, wandering around and thinking about the end of the holidays, where he could see a tiny ray of hope. When September came he would be going off to secondary school and, for the first time in his life, he wouldn''t be with Dudley. Dudley had been accepted at Uncle Vernon''s old private school, Smeltings. Piers Polkiss was going there too. Harry, on the other hand, was going to Stonewall High, the local public school. Dudley thought this was very funny.\n\n"They stuff people''s heads down the toilet the first day at Stonewall," he told Harry. "Want to come upstairs and practice?"\n\n"No, thanks," said Harry. "The poor toilet''s never had anything as horrible as your head down it -- it might be sick." Then he ran, before Dudley could work out what he''d said.'),
(90, 'One day in July, Aunt Petunia took Dudley to London to buy his Smeltings uniform, leaving Harry at Mrs. Figg''s. Mrs. Figg wasn''t as bad as usual. It turned out she''d broken her leg tripping over one of her cats, and she didn''t seem quite as fond of them as before. She let Harry watch television and gave him a bit of chocolate cake that tasted as though she''d had it for several years.\n\nThat evening, Dudley paraded around the living room for the family in his brand-new uniform. Smeltings'' boys wore maroon tailcoats, orange knickerbockers, and flat straw hats called boaters. They also carried knobbly sticks, used for hitting each other while the teachers weren''t looking. This was supposed to be good training for later life.'),
(91, 'BOOM. They knocked again. Dudley jerked awake.\n\n"Where''s the cannon?" he said stupidly.\n\nThere was a crash behind them and Uncle Vernon came skidding into the room. He was holding a rifle in his hands - now they knew what had been in the long, thin package he had brought with them.\n\n"Who''s there?" he shouted. "I warn you -- I''m armed!"\n\nThere was a pause. Then --\n\nSMASH!'),
(92, 'Harry woke early the next morning. Although he could tell it was daylight, he kept his eyes shut tight.\n\n"It was a dream, he told himself firmly. "I dreamed a giant called Hagrid came to tell me I was going to a school for wizards. When I open my eyes I''ll be at home in my cupboard."\n\nThere was suddenly a loud tapping noise.\n\nAnd there''s Aunt Petunia knocking on the door, Harry thought, his heart sinking. But he still didn''t open his eyes. It had been such a good dream.\n\nTap. Tap. Tap.\n\n"All right," Harry mumbled, "I''m getting up."\n\nHe sat up and Hagrid''s heavy coat fell off him. The hut was full of sunlight, the storm was over, Hagrid himself was asleep on the collapsed sofa, and there was an owl rapping its claw on the window, a newspaper held in its beak.'),
(93, 'Harry scrambled to his feet, so happy he felt as though a large balloon was swelling inside him. He went straight to the window and jerked it open. The owl swooped in and dropped the newspaper on top of Hagrid, who didn''t wake up. The owl then fluttered onto the floor and began to attack Hagrid''s coat.\n\n"Don''t do that."\n\nHarry tried to wave the owl out of the way, but it snapped its beak fiercely at him and carried on savaging the coat.'),
(111, 'test final'),
(112, 'test final2'),
(113, 'test final3'),
(114, 'test final4'),
(115, 'test chapter 2 1'),
(116, 'test chapter 2 2'),
(117, 'test chapter 2 3'),
(118, 'test'),
(119, 'test 2'),
(120, 'test 3'),
(121, 'test 4'),
(122, 'test'),
(123, 'tsedfgse'),
(124, 'sdafsadf'),
(125, 'dsfdsf'),
(126, 'dfgsdgsg'),
(127, 'sghfsgh'),
(128, 'qewrqewr'),
(129, 'fxgnfgxhd'),
(130, 'testlogin'),
(131, 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww'),
(132, 'ww www wwwwwwwww wwwwww wwwwwwwwwww wwwww www wwwww wwwwww wwwwwwwww wwwwwwasdfsadfsad wwwww wwwasdfsadfsadf ww asdfsadfsdaf adsfsadfasdf sadfsafsadf www wwwwwww wwwwwwww wwwwwww wwwwww wwwwwwww af asdfsadf  sfdsf adsf dsa d sa'),
(133, 'Test4');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(29, 'Test', '$2y$10$qC3TiWMjE1MB8PXzY9lzWuHXtn0ENiuT0z01GxSe3jNmq3uECMpJi', '1506631088'),
(30, 'Test2', '$2y$10$QGbKtgChoGDWLLFRuSvwl.THDxP54sfQQR54lnOV2Fvxw8bQlKc12', '1506631635'),
(31, 'Test3', '$2y$10$itiyFpVFgZngxln/t1PA7OuzVCYkI/NraJ244nPWlxbSdRXzOYAq6', '1506888209'),
(32, 'Test4', '$2y$10$bRZDTB7ueYqcTgIbc724y.OTaGcRwO.8gze0dPP3q7ufm/VVML5lW', '1506891143');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
