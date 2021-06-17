-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 10:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localtourguidebooking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tourguideid` int(11) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogid`, `image`, `title`, `description`, `tourguideid`, `postdate`) VALUES
(1, '20200513050827_kyoto-2895857_640.jpg', 'Kyoto Facts', '<p>KYOTO (315 miles southwest of Tokyo and 25 miles east of Osaka) was the home of the Japanese Emperor, the center of Japanese civilization and the capital of Japan for about 1,100 years or its 1,200 years of existence. Today it known best for its geishas, great temples, beautiful gardens and works of art. It is also the home of Nintendo and more than its share of urban sprawl.</p><p>When visiting Kyoto, it is important to keep in mind that it is both a modern city and historical treasure with the old and new often placed side by side. Temples and pagodas share the skyline with office complexes; traditional crafts shops and old neighborhoods are intermixed with modern shopping malls and subway stations; and geishas walk down the streets next to salarymen, office ladies and skateboard punks. Yes, there are many lovely, historical buildings but there are also traffic jams, McDonalds and Mister Donuts.</p><p>Kyoto is home to about 1.5 million residents. Around 50 million tourists visit Kyoto every year---including 1 million foreigners, of whom 100,000 are Americans. The number of tourists dipped somewhat after the Kobe earthquake, even though Kyoto was not seriously damaged (the Golden Temple developed cracks and a 9th century statue of a Goddess of Mercy in the Koryuji Temple lost a right arm, but that was about it) but soon returned to normal<br></p>', 3, '2020-05-13 10:38:28'),
(2, '20200513051132_japan-4141578_640.jpg', 'Busy Tokyo', '<p>Just look at any Tokyo facts and you\'ll see many around the city\'s massive population. People who visit Japan for the first time are often surprised by the sheer mass of people in Tokyo’s rush-hour trains or in Shibuya Crossing, the busiest intersection on the planet. Sightseeing spots, too, are always crowded and even when walking down the street in a popular area, it\'s often hard to not bump into someone.</p><p>According to the 2019 update of Demographia World Urban Areas, Tokyo is the largest \"Megacity\" in the world!</p><p>Tokyo houses about 10% of Japan\'s population. If you include the greater Tokyo metro area of Kanagawa, Saitama, and Chiba, the total population of Tokyo reaches 38 million people! The total population of Japan is about 127 million people, so that’s a whopping 30% - and makes Tokyo the most populous urban area in the world.</p><p>Here, we compare the population of Tokyo to other Japanese prefectures and cities around the world, and will also take a look at changes and issues regarding the future.</p>', 1, '2020-05-13 10:41:32'),
(3, '20200513051640_girl-3954232_640.jpg', 'Have you ever Heard About Paris?!', '<p>Believe it or not though, Paris wasn’t always called “Paris,” and the Eiffel Tower wasn’t supposed to be a permanent fixture. Here are 10 interesting facts about Paris.</p><ol><li>The Eiffel Tower was supposed to be a temporary installation, intended to stand for 20 years after being built for the 1889 World Fair.</li><li>Paris was originally a Roman City called “Lutetia.”</li><li>It’s believed that Paris only has one stop sign in the entire city.</li><li>A flat in Paris was left unoccupied under lock and key for 70 years, but the rent was paid every month; when the renter passed away, a painting by Boldini valued at more than $2 million was found inside.</li><li>There are at least three replicas of the Statue of Liberty in Paris. The most famous of them exists on an island in the middle of the Seine and looks towards her sister statue in New York.</li><li>The main bell of the Notre Dame Cathedral is named Emmanuel and weighs over 13 tonnes.</li><li>There are 6,100 rues – or streets – in Paris; the shortest one, Rue des Degrés, is just 5.75 metres long and can be found in the 2nd arrondissement.</li><li>The French army was the first to use camouflage, which comes from the French verb “to make up for the stage.” The army began wearing camouflage in 1915 during World War I.</li><li>The first public screening of a movie was by French brothers Auguste and Louis Lumière in December 1895. They used their invention “the cinématographe” to show 10 films of about 50 seconds each.</li><li>Visitors to the Eiffel Tower have to climb 1,665 steps to reach the top – unless they take the elevator! There are a mere 270 steps to reach the Basilica of the Sacré Cœur.</li></ol>', 5, '2020-05-13 10:46:41'),
(4, '20200513051824_yangon-5050076_640.jpg', 'Yangon, Once Capital', '<p>Yangon was founded as Dagon in the 6th century AD by the Mons, who ruled Lower Burma at that time. Dagon was a small fishing village centered about the Shwedagon Pagoda. In 1755, King Alaungpaya conquered Dagon and renamed it \"Yangon\". The British captured Yangon during the First Anglo-Burmese War (1824–26) but returned it to Burma after the war. The city was destroyed by a fire in 1841.</p><p>The British took Yangon and all of Lower Burma in the Second Anglo-Burmese War of 1852, and then changed Yangon into the most important city of British Burma. The British constructed a new city on a grid plan on delta land. It was bound to the east by the Pazundaung Creek and to the south and west by the Yangon River. Yangon became the capital of all British Burma after the British had captured Upper Burma in the Third Anglo-Burmese War of 1885. By the 1890s Yangon\'s increasing population and commerce gave birth to prosperous residential suburbs to the north of Royal Lake (Kandawgyi) and Inya Lake. The British also established hospitals including Rangoon General Hospital and colleges including Rangoon University. Colonial Yangon, with its spacious parks and lakes and mix of modern buildings and traditional wooden architecture, was known as \"the garden city of the East.\" By the early 20th century, Yangon had public services and infrastructure on par with London.</p><p>Before World War II, about 55% of Yangon\'s population of 500,000 was Indian or South Asian, and only about a third was Bamar (Burman). Karens, the Chinese, the Anglo-Burmese and others made up the rest.</p><p>After World War I, Yangon became the center of Burmese independence movement. The leftist Rangoon University students led the way. Three nationwide strikes against the British Empire in 1920, 1936 and 1938 began in Yangon. Yangon was under Japan\'s occupation (1942–45), and was heavily damaged during World War II. Yangon became the capital of Union of Burma on 4 January 1948 when the country regained independence from the British Empire.</p>', 4, '2020-05-13 10:48:24'),
(5, '20200513052210_japan-4379452_640.jpg', 'Tokyo Facts', '<p>Tokyo is a vast metropolis, and it would take more than a lifetime to properly get to know it. Here is a collection of basic facts about Tokyo for a 5-minute overview of Japan\'s capital city.</p><p>Tokyo is the capital city of Japan, and the biggest city in Japan in terms of population and area. Tokyo is located roughly in the middle of the Japanese archipelago facing the Pacific Ocean. Tokyo is on the Kanto plain, bordering Tokyo Bay, 35 degrees 41 minutes north latitude and 139 degrees 46 minutes east longitude.</p><p>The Tokyo Megalopolis Region, or Greater Tokyo Area (Shutoen 首都圏), comprises Tokyo and the three adjacent prefectures of Chiba, Saitama, and Kanagawa. The Tokyo region contains about 26% of Japan\'s total population. Another definition of \"Shutoen\" is, in English, the National Capital Region and comprises Tokyo and seven surrounding prefectures: Chiba, Saitama, Kanagawa, Gunma, Tochigi, Yamanashi, and Ibaraki.</p><p>Two major rivers flow through Tokyo: the Sumida River, running north-to-south into Tokyo Bay, and the Tama River, running west-to-east, and forming the border between Tokyo and Kawasaki. The other major rivers are the Edo, Arakawa, and Kanda rivers.</p><p>Tokyo has a total land area of 2187.42 square km (about 845 square miles) and is home to about 10% of the population of Japan. Including the neighboring prefectures of Saitama, Chiba and Kanagawa, the Tokyo conurbation has a total population of over 37 million inhabitants, one of the largest population agglomerations in the world.</p><p><b>Tokyo climate and weather</b></p><p>Tokyo has an average temperature of about 16.5 degrees Celsius (62 degrees F), an average minimum temperature of about 13 degrees Celsius (55 degrees F), and an average maximum temperature of about 20 degrees Celsius (68 degrees F). Average humidity is about 60%.</p><p>January and February are the coldest months in Tokyo with an average of 5 degrees Celsius (41 degrees F) and average humidity of 44%. January is the sunniest month, with an average of 55% sunshine hours.</p><p>Summer in Tokyo is sweltering: very hot and humid. July is the hottest month in Tokyo with an average of about 26 degrees Celsius (79 degrees F) and average humidity of 74%. Daytime temperatures in summer in Tokyo are typically in the lower 30 degrees Celsius (86 - 95 degrees Fahrenheit). July is also the cloudiest month in Tokyo, with an average of 13% sunshine hours.</p><p>Tokyo\'s total rainfall in 2018 was 1651.5 mm. September and October often form the wettest period, with April not far behind. February is often the driest month.</p><p><b>Tokyo time</b></p><p>Tokyo\'s time zone is 9 hours ahead of Greenwich Mean Time. Tokyo does not have daylight saving.</p><p><b>Tokyo earthquakes</b></p><p>Tokyo experiences numerous earthquakes. Before the March 11 2011 Tohoku earthquake, 2005 was the year when Tokyo had had the most earthquakes of over 1 on the Richter scale, with 85 earthquakes. The Tohoku earthquake was an upper 5 on the Japan Meteorological Agency (JMA) scale and the aftershocks over the next two months were innumerable. The yearly average for earthquakes over 1 on the Richter scale in Tokyo is about 50.</p>', 1, '2020-05-13 10:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(10) UNSIGNED NOT NULL,
  `tourid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bookdate` date NOT NULL,
  `startingtime` varchar(30) NOT NULL,
  `meetingpoint` varchar(255) NOT NULL,
  `nooftotalpeople` int(11) NOT NULL,
  `noofchild` int(11) NOT NULL,
  `totalprice` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment` text DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `cancellationreason` text DEFAULT NULL,
  `reviewstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `tourid`, `userid`, `bookdate`, `startingtime`, `meetingpoint`, `nooftotalpeople`, `noofchild`, `totalprice`, `created_at`, `comment`, `status`, `cancellationreason`, `reviewstatus`) VALUES
(1, 2, 1, '2020-05-21', '08:00 AM', 'In front of Tokyo Hotel', 3, 0, 120, '2020-04-22 08:46:56', 'We would like to go Akibihara.', 'cancelled', 'I\'m sorry. I have other plans on that day.', NULL),
(2, 1, 1, '2020-05-26', '09:00 AM', 'Tokyo statium', 2, 0, 182, '2020-05-13 09:03:40', 'We are happy to use public transportation', 'completed', NULL, NULL),
(3, 1, 2, '2020-06-10', '09:30 AM', 'Hotel Naruto', 2, 0, 182, '2020-05-13 16:04:32', 'I don\'t eat beef', 'booked', NULL, NULL),
(4, 6, 3, '2020-04-21', '09:00 AM', 'Hotal', 2, 1, 240, '2020-04-15 10:48:50', 'I want to focus on food.', 'completed', NULL, 'rated'),
(5, 5, 1, '2020-06-10', '08:00 AM', 'Bagan Hotel', 6, 0, 100, '2020-05-31 02:11:52', 'I want to explore culture.', 'booked', NULL, NULL),
(6, 5, 1, '2020-06-16', '08:00 AM', 'Bagan Hotel', 4, 0, 100, '2020-05-31 03:01:04', 'I want to know about culture', 'booked', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `countrycode` varchar(2) NOT NULL,
  `countryname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countrycode`, `countryname`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of the Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'How do I book a tour?', '<p><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">STEP 1:</b><span style=\"color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"> Go to our LocalsOne website.</span></p><p><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">STEP 2:</b><span style=\"color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"> In the search box, type in your destination.</span></p><p><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">STEP 3:</b><span style=\"color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"> You\'ll be taken to a page with many tour option. Here you can refine your search, or Click on </span><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">\'LEARN MORE\'</b><span style=\"color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"> on any tour for all the details.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"></p>'),
(2, 'I want a private tour. What do I need to do?', '<p><span style=\"color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">You\'ve come to the right place! Every one of our tours is private: just you, your travel companions and the guide.</span></p><p><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">STEP 1:</b><span style=\"color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">&nbsp;Enter your destination (we have guides in over 1000 cities, and 160 different countries!)</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">STEP 2:</b><span style=\"color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">&nbsp;Browse through the available tours; you can filter by date, special interest, length of tour, activity level, and more. Alternatively, you can browse guide profiles, choosing the professional who most closely matches your travel interests.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">STEP 3:</b><span style=\"color: rgb(49, 49, 49); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\">&nbsp;Book and pay online for your selected tour, or send a direct message to any guide to design a customized itinerary for you.</span><br></p>'),
(3, 'What should I do if I feel unsafe during the tour?', '<p><span style=\"color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\">If you feel unsafe, communicate your concerns to your guide-partner </span><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\">immediately</b><span style=\"color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\">.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\"><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\"><span style=\"color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\">You have the right to stop the tour at any time. At your request, your guide-partner will return you to the agreed ending point by the transportation method(s) set out in the tour description.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\"><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\"><span style=\"color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\">Please report the incident </span><b style=\"box-sizing: inherit; font-weight: bold; color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\">immediately</b><span style=\"color: rgb(49, 49, 49); font-family: \"Open Sans\", sans-serif;\"> to Customer Support using the 24-hour emergency only traveller hotline number printed on your booking confirmation.</span><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `languageid` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`languageid`, `name`) VALUES
(1, 'English'),
(2, 'Afar'),
(3, 'Abkhazian'),
(4, 'Afrikaans'),
(5, 'Amharic'),
(6, 'Arabic'),
(7, 'Assamese'),
(8, 'Aymara'),
(9, 'Azerbaijani'),
(10, 'Bashkir'),
(11, 'Belarusian'),
(12, 'Bulgarian'),
(13, 'Bihari'),
(14, 'Bislama'),
(15, 'Bengali/Bangla'),
(16, 'Tibetan'),
(17, 'Breton'),
(18, 'Catalan'),
(19, 'Corsican'),
(20, 'Czech'),
(21, 'Welsh'),
(22, 'Danish'),
(23, 'German'),
(24, 'Bhutani'),
(25, 'Greek'),
(26, 'Esperanto'),
(27, 'Spanish'),
(28, 'Estonian'),
(29, 'Basque'),
(30, 'Persian'),
(31, 'Finnish'),
(32, 'Fiji'),
(33, 'Faeroese'),
(34, 'French'),
(35, 'Frisian'),
(36, 'Irish'),
(37, 'Scots/Gaelic'),
(38, 'Galician'),
(39, 'Guarani'),
(40, 'Gujarati'),
(41, 'Hausa'),
(42, 'Hindi'),
(43, 'Croatian'),
(44, 'Hungarian'),
(45, 'Armenian'),
(46, 'Interlingua'),
(47, 'Interlingue'),
(48, 'Inupiak'),
(49, 'Indonesian'),
(50, 'Icelandic'),
(51, 'Italian'),
(52, 'Hebrew'),
(53, 'Japanese'),
(54, 'Yiddish'),
(55, 'Javanese'),
(56, 'Georgian'),
(57, 'Kazakh'),
(58, 'Greenlandic'),
(59, 'Cambodian'),
(60, 'Kannada'),
(61, 'Korean'),
(62, 'Kashmiri'),
(63, 'Kurdish'),
(64, 'Kirghiz'),
(65, 'Latin'),
(66, 'Lingala'),
(67, 'Laothian'),
(68, 'Lithuanian'),
(69, 'Latvian/Lettish'),
(70, 'Malagasy'),
(71, 'Maori'),
(72, 'Macedonian'),
(73, 'Malayalam'),
(74, 'Mongolian'),
(75, 'Moldavian'),
(76, 'Marathi'),
(77, 'Malay'),
(78, 'Maltese'),
(79, 'Burmese'),
(80, 'Nauru'),
(81, 'Nepali'),
(82, 'Dutch'),
(83, 'Norwegian'),
(84, 'Occitan'),
(85, '(Afan)/Oromoor/Oriya'),
(86, 'Punjabi'),
(87, 'Polish'),
(88, 'Pashto/Pushto'),
(89, 'Portuguese'),
(90, 'Quechua'),
(91, 'Rhaeto-Romance'),
(92, 'Kirundi'),
(93, 'Romanian'),
(94, 'Russian'),
(95, 'Kinyarwanda'),
(96, 'Sanskrit'),
(97, 'Sindhi'),
(98, 'Sangro'),
(99, 'Serbo-Croatian'),
(100, 'Singhalese'),
(101, 'Slovak'),
(102, 'Slovenian'),
(103, 'Samoan'),
(104, 'Shona'),
(105, 'Somali'),
(106, 'Albanian'),
(107, 'Serbian'),
(108, 'Siswati'),
(109, 'Sesotho'),
(110, 'Sundanese'),
(111, 'Swedish'),
(112, 'Swahili'),
(113, 'Tamil'),
(114, 'Telugu'),
(115, 'Tajik'),
(116, 'Thai'),
(117, 'Tigrinya'),
(118, 'Turkmen'),
(119, 'Tagalog'),
(120, 'Setswana'),
(121, 'Tonga'),
(122, 'Turkish'),
(123, 'Tsonga'),
(124, 'Tatar'),
(125, 'Twi'),
(126, 'Ukrainian'),
(127, 'Urdu'),
(128, 'Uzbek'),
(129, 'Vietnamese'),
(130, 'Volapuk'),
(131, 'Wolof'),
(132, 'Xhosa'),
(133, 'Yoruba'),
(134, 'Chinese'),
(135, 'Zulu');

-- --------------------------------------------------------

--
-- Table structure for table `languagedetail`
--

CREATE TABLE `languagedetail` (
  `tourguideid` int(11) NOT NULL,
  `languageid` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languagedetail`
--

INSERT INTO `languagedetail` (`tourguideid`, `languageid`, `level`) VALUES
(1, 1, 3),
(1, 53, 4),
(3, 1, 4),
(3, 53, 4),
(4, 1, 4),
(4, 79, 4),
(4, 134, 3),
(5, 1, 4),
(5, 94, 3),
(6, 1, 3),
(6, 53, 4),
(7, 1, 3),
(7, 79, 4);

-- --------------------------------------------------------

--
-- Table structure for table `likecount`
--

CREATE TABLE `likecount` (
  `id` int(11) NOT NULL,
  `blogid` int(10) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likecount`
--

INSERT INTO `likecount` (`id`, `blogid`, `userid`) VALUES
(1, 1, 1),
(2, 5, 3),
(3, 2, 3),
(4, 3, 1),
(5, 2, 1),
(6, 1, 2),
(7, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(10) UNSIGNED NOT NULL,
  `bookingid` int(10) UNSIGNED DEFAULT NULL,
  `name_on_card` varchar(255) NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `expirymonth` int(11) NOT NULL,
  `expiryyear` int(11) NOT NULL,
  `cvc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `bookingid`, `name_on_card`, `cardnumber`, `expirymonth`, `expiryyear`, `cvc`) VALUES
(1, 1, 'b0224a78b9d954a34776f6bfffe5869cfccf498d', '96521f9c62274987e09388afc5d472c3c31e37bc', 9, 2025, 2183),
(2, 2, 'b0224a78b9d954a34776f6bfffe5869cfccf498d', '582c706cdc286287a9e3c9ceaa5bcfe850226acf', 8, 2030, 2879),
(3, 3, 'd6ac022931a66a2bcc244db91818ebec76ce5e18', '89623c2153c9c1996abcae79b5bb6db36ed0685e', 12, 2038, 565),
(4, 4, 'bc5351ffae3efe8067951f5deba4b294bf863f86', '0611bc5f5e8c5be4a656c73af60379cd7b0ac57e', 11, 2035, 2443),
(5, 5, '9f8a2389a20ca0752aa9e95093515517e90e194c', '3e535ac6dfa3cd292b51a109495e1572b802f71d', 7, 2026, 1239),
(6, 6, '9f8a2389a20ca0752aa9e95093515517e90e194c', 'f8b37c30da79a84e15f4c9718c47e3dffeb0c31c', 3, 2027, 9812);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rateid` int(10) UNSIGNED NOT NULL,
  `tourguideid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rateid`, `tourguideid`, `userid`, `rating`, `feedback`, `date`) VALUES
(1, 3, 2, 5, 'We met Ren on our first day in Kyoto. She provided an introduction to the city, public transportation, and was able to make many recommendations that were great for our family of 5 including our kids at ages 8 to 13. Most of all we enjoyed walking the streets of Tokyo with Ren who was able to tell us about Japan\'s history, culture and traditions. She answered all of our questions and more. Thank you Reni!', '2020-05-13 10:16:02'),
(2, 5, 3, 5, 'Really nice trip. Thanks Krystal. Wonderful food and culture, really amazing.', '2020-05-14 11:01:18'),
(3, 4, 3, 3, 'The trip didn\'t go well. Glad we manage our own car. You should know about your town more.', '2020-05-14 11:06:04'),
(4, 7, 3, 4, 'Yeah, the trip was awesome. Bhone is really kind and patient. I would like to go one more again.', '2020-05-14 11:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `regionid` int(10) UNSIGNED NOT NULL,
  `regionname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`regionid`, `regionname`, `country`) VALUES
(1, 'Tokyo', 'Japan'),
(2, 'Kyoto', 'Japan'),
(3, 'Bagan', 'Myanmar'),
(4, 'Yangon', 'Myanmar'),
(5, 'Paris', 'France'),
(6, 'New York', 'United States'),
(7, 'Hong Kong', 'China');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestid` int(11) NOT NULL,
  `tourguideid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `duration` int(11) NOT NULL,
  `tourdescription` text NOT NULL,
  `totalpeople` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL,
  `tourguidereply` text DEFAULT NULL,
  `reviewstatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestid`, `tourguideid`, `userid`, `startdate`, `enddate`, `duration`, `tourdescription`, `totalpeople`, `message`, `created_at`, `status`, `tourguidereply`, `reviewstatus`) VALUES
(1, 3, 2, '2020-04-27', '2020-04-29', 3, 'I would like to go Sanjusangendo Temple, Fushimi Inari Shrine, Silver Pavilion.', 5, 'We already have a car. But for lunch break, I would like you to recommend.  ', '2020-04-23 09:40:53', 'completed', 'Okay, I will plan detail for you.', 'rated'),
(2, 3, 1, '2020-05-16', '2020-05-17', 2, 'We planned to travel Sanjusangendo Temple, Fushimi Inari Shrine, Silver Pavilion with public transportation.', 4, 'I would like to meet at station in the early morning around 8:00.', '2020-05-13 09:44:18', 'cancelled by user', NULL, NULL),
(3, 4, 3, '2020-03-30', '2020-04-02', 4, 'We planned a family trip. You know, Get the best views of Bagan\'s 8,000 temples and pagodas on a hot-air balloon flight\r\nAn extra-special experience ideal for couples\r\nWitness the sunrise and see the area at the most magical time of day\r\nConvenient hotel pickup and drop-off are included', 4, 'Well, I want to take many photos', '2020-03-09 11:03:34', 'completed', 'Okay, I will show you.', 'rated'),
(4, 7, 3, '2020-04-20', '2020-04-21', 2, 'Hello, I would like to go Bagan for 2 days with my family. I don\'t really have plan for my trip. You can suggest me good places.', 2, 'I really want to see sunset', '2020-04-08 11:07:41', 'completed', NULL, 'rated');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(10) UNSIGNED NOT NULL,
  `staffname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profilepicture` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `staffname`, `email`, `phone`, `address`, `password`, `profilepicture`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '+959123456789', 'Yangon, Myanmar', '1b3f4918d3a422805063e1e3c12aa487d56b9cba', 'profile/staff.png', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tourid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tourguideid` int(11) NOT NULL,
  `tourtypeid` int(11) NOT NULL,
  `transportationid` int(11) DEFAULT NULL,
  `transportation` varchar(255) DEFAULT NULL,
  `tourprice` double NOT NULL,
  `noofpeoplelimit` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tourroute` text NOT NULL,
  `restriction` text NOT NULL,
  `meetingpoint` varchar(255) NOT NULL,
  `endingpoint` varchar(255) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `regionid` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`tourid`, `name`, `tourguideid`, `tourtypeid`, `transportationid`, `transportation`, `tourprice`, `noofpeoplelimit`, `duration`, `image`, `description`, `tourroute`, `restriction`, `meetingpoint`, `endingpoint`, `staffid`, `regionid`, `status`, `created_at`) VALUES
(1, 'Beautiful Tokyo', 1, 1, NULL, 'Walk, Public Transport', 182, 3, 3, 'japan-4379452_640.jpg', 'This guided trip will have you exploring the sights and sounds of Harajuku and Shibuya, including the famous Shibuya Scramble, before heading on over to Shinjuku to explore Kabukicho and Golden Gai.', '<p>Firstly, Harajuku and Shibuya</p><p>At Shibuya, we will go to see the famous Shibuya Scramble</p><p>Then, Kabukicho and Golden Gai</p><p>Along the tour, I will introduce you famous food and restaurants</p>', 'I am not a driver. I can accompany you in your vehicle or I can arrange for a separate car and driver.', 'Hotel, Airport (we will pick you up)', 'Shinjuku', 1, 1, 'approved', '2020-05-13 06:45:06'),
(2, 'Attraction in Tokyo', 1, 5, NULL, 'Walking, public transport', 120, 3, 3, 'japan-4141578_640.jpg', 'This tour visits the most popular highlight spots in Tokyo. In one day, you can see the characteristic of Tokyo. Tokyo\'s attraction is a fusion of Old and New. You can see it having fun and learning Japanese history!', '<p><font color=\"#313131\" face=\"Nunito\">1. Tsukiji- We will visit Tsukiji Honganji temple, very unique Buddhist temple, and to Large Tsukiji market where variety foods and things are selling.</font></p><p><font color=\"#313131\" face=\"Nunito\">(closed on Sundays and on some Wednesdays)</font></p><p><font color=\"#313131\" face=\"Nunito\">2. Kabukiza - Kabuki is a long-history Japanese traditional play.</font></p><p><font color=\"#313131\" face=\"Nunito\">3. Ginza - This area is said to be a fancy shopping town, also like a whole art gallery itself. There are many things to see!</font></p><p><font color=\"#313131\" face=\"Nunito\">4. The imperial palace - We will visit the east garden of Imperial palace. (Gardens are closed on Monday and Friday) This is an amazingly quiet place located among central Tokyo.</font></p><p><font color=\"#313131\" face=\"Nunito\">5. Asakusa- You can feel old days Tokyo. Famous Sensoji temple\'s red gate called Kamiraimon, or literally thunder gate is a symbol of Tokyo.</font></p>', 'I am not a driver. I can accompany you in your vehicle or I can arrange for a separate car and driver.', 'Hotel (we will pick you up)', 'Your Hotel', 1, 1, 'approved', '2020-05-13 07:08:52'),
(3, 'Ancient Kyoto', 3, 1, 2, NULL, 240, 4, 2, 'architecture-1869216_640.jpg', 'Although the standard start time slots are 8:00 am or 8:30 am, I may be able to be flexible.\r\nPlease contact me for the details.\r\n\r\nOn this tour, I will take you to the must-see sites that are probably on your radar. With your limited time to spend here in Kyoto, I\'m certain that having me, the City of Kyoto official tour guide, will help you to make the most of your time and you will find out local insights that you would\'ve missed out on otherwise.', '<p>Here are the sample itineraries for this 4-hour tour:</p><p>Recommendation to cover off-the-beaten-path places:</p><ul><li>Kinkakuji Temple ( the golden pavilion)</li><li>Daitokuji Zen temple</li><li>Shimogamo Shrine</li></ul><p><br></p>', 'I am not a driver. I can accompany you in separately arranged car with separate driver.', 'Kyoto Station', 'Shimogamo Shrine', 1, 2, 'approved', '2020-05-13 07:34:20'),
(4, 'Bagan Discovery Myanmar( Full days)', 4, 1, 1, NULL, 90, 6, 1, 'bagan-1137015_640.jpg', 'This amazing trip will take you so thrillingly to the spotlights of Bagan while breathtaking landscapes of Bagan in a way that you experience most holiest pagoda of Myanmar. Learn architectural wonders of priceless ancient treasures of Bagan and local handicrafts (Lacquerware) of Bagan era that have been handed down for ages.', '<p>Spotlights of Bagan</p><p>In the morning, you will be picked up by your local EXPERT. We start off with Sula-mani temple where you can learn more about mural paintings before going for Nandammanya temple, minnanthu villgage to observe the life of local villager before heading to historic Hti-Lo-Min-Lo temple . After lunch, we visit Ananda Temple, masterpiece of Bagan which is commonly referred to as one of the four great temples in Bagan. Continue to sunset boat ride over the irrawaddy river. Conclude your unique experiences.</p>', 'Hello! As I don\'t drive the car, I can accompany you in your vehicle or I can arrange for a separate car and driver during your tour. Thank you for your consideration.', 'Cruise Ship Port, Airport, Hotel (We will pick you up)', 'Sunset', 1, 3, 'approved', '2020-05-13 07:38:00'),
(5, 'Explore Bagan', 4, 1, 3, NULL, 100, 10, 2, 'bagan-1577961_640_(1).jpg', 'Bagan with over 2000 Pagodas and Temples in upper Myanmar and you can visit Bagan all year round as there is no actual rainy Season like in the lower parts of Myanmar, therefore we called it Sommer Season. Bagan with their Pagodas and Temples dating back more than 1500 years of history is the most fascinating place for visitors.', '<p>Day-1: Bagan Arrival</p><p>You can be Welcome at Nyaung you airport or picked up at Hotel to do the Bagan sightseeing:</p><p>- the busy Nyaung you Market</p><p>- Pagoda Shwezigon, and Temple Ananda built in 1091 is considered the masterpiece of Bagan\'s surviving Mon architecture.</p><p>- Htilomino Temple with the best 11 century plaster work and stucco carving.</p><p>- A visit to Myinkabar village to see the thriving lacquer ware industry.</p><p>- Then stop at Myaceidi to study the colourful mural painting and very old stone inscription.</p><p>-Sulamani Temple where you can study the biggest mural Paintings.</p><p>- Manu Har Temple and Nan Phaya</p><p>- Temple Dhammayangyi</p><p>-Gu Byauk Gyi Temple and Bagan Sunset.</p><p><br></p><p>Day 2: Sale and Mt. Popa.</p><p>Drive to Sale. You will explore around Yoke Sone Kyaung Monaster docorated beautifully with teak wood carvings and Bamboo Buddha Images.</p><p>Then we will continue to Mt. Poapa, a house for Nats (spiritual being). Stop at farmers\' working place on the way back to Bagan to see real local life.</p>', 'Hello! As I don\'t drive the car, I can accompany you in your vehicle or I can arrange for a separate car and driver during your tour. Thank you for your consideration.', 'We will pick you up', 'With sunset', 1, 3, 'approved', '2020-05-13 07:41:46'),
(6, 'First Trip in Paris', 5, 5, 2, NULL, 240, 3, 2, 'eiffel-tower-768501_640.jpg', 'This tour will be a \"beginners\" tour which will guide you what you like to see more.\r\nAfter this tour you will know how to use the public transport and also how to walk in Paris to get the real feeling of the city of love. You also will know how to order the water, how to tip at the café etc.\r\nAll you may need to know during your days in Paris are at this tour, you will learn how to be a Parisian . . .', '<p>After meeting at your hotel we will go to see the Eiffel Tower from the best point of the city and just after we will taste the famous Macarone.</p><p>Walking down to the street while seeing where to what and crossing the Alma Bridge, will take the bus to Saint Germain des Press and feeling the cities art and literature side, going to the Notre Dame (only from outside) and ille St Louise via Latine Quarter of the city.</p><p>We will continue to Marais which is one of the oldest part of Paris where you will discover the cities history.</p><p>WE ALWAYS CAN CHANGE OUR ITINERARY WITH YOUR WISHES AND WE CAN GO WHEREVER YOU MAY HAVE HEARED OF BEFORE AND WOULD LIKE TO SEE AT FIRST.</p><p>While we are having our coffee I will let you know the details like using public transport, how to tip, where to eat etc.</p><p>This will not be an educational day, it will be a fun day for your holiday!</p>', 'I am not permitted to guide in state own museums, museum guides can be hired', 'Don\'t worry. We will pick you up', 'Eiffel Tower', 1, 5, 'approved', '2020-05-13 07:45:31'),
(7, 'Tokyo Private Tour', 6, 5, NULL, 'Walking, subway', 100, 3, 1, 'japanese-1409839_640.jpg', 'The tour offers you the popular sightseeing places in central Tokyo in 6 hours. The itinerary includes 4 spots and lunch.\r\nThe tour guide would also custmize the itinerary upon your preference.', '<p>9:30am Meet the customer.</p><p>Proceed those places below by public transportation.</p><p>- Meiji Shrine and Harajuku</p><p>- Imperial Palace Plaza</p><p>- East Garden, a traditional Japanese inside the precinct of Imperial Palace</p><p>- Asakusa, old Tokyo area</p><p>The tour disbands in Ginza at 3:30pm.</p><p>The tour guide suggests the customer how to get back to the hotel.</p><p>** I am happy to make a customized tour for you; please feel free to contact me.</p>', 'I only give my service in English & Japanese.', 'Rail or Bus Station, Hotel, Address or Intersection, Monument/Building', 'back to your hotel', 1, 1, 'appending', '2020-05-13 07:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `tourguide`
--

CREATE TABLE `tourguide` (
  `tourguideid` int(10) UNSIGNED NOT NULL,
  `tourguidename` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `regionid` int(11) NOT NULL,
  `level` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profilepicture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `credentials` text NOT NULL,
  `experience` varchar(255) NOT NULL,
  `feesperday` double NOT NULL,
  `staffid` int(11) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourguide`
--

INSERT INTO `tourguide` (`tourguideid`, `tourguidename`, `email`, `phone`, `address`, `regionid`, `level`, `gender`, `password`, `profilepicture`, `description`, `credentials`, `experience`, `feesperday`, `staffid`, `registered_at`) VALUES
(1, 'Miyuki Lin', 'guide@gmail.com', '0912345678', 'Tokyo, Japan', 1, 'Expert', 'Female', '2401d737fc9e8e154075ad1474a3fd252377cc99', 'profile/t1_team-4.jpg', '<p>My name is Miyuki Lin. I\'m active tour guide. I can show you around Tokyo and its wonderful places.</p>', 'BE (Eng)', '5+ years', 45, 1, '2020-05-13 04:38:55'),
(3, 'Ren', 'ren@gmail.com', '0912345678', 'Kyoto, Japan', 2, 'Senior', 'Female', 'b3d107d02ea95b885435a0138b827dce64f7bf6d', 'profile/t3_team-2.jpg', '<p>Hello, I\'m ren. Kyoto is the really beautiful city. I was born in Kyoto and I started working as a tour guide since 2017. I can explain well about Kyoto Interesting Places and Culture.</p>', 'Government licensed national tour guide in English', '3+ years', 39, 1, '2020-05-13 05:22:07'),
(4, 'Kyaw Swar', 'kyaw@gmail.com', '0912345678', 'Myanmar', 3, 'Senior', 'Male', '2353b638ef4e0f516bd200b3357eb85d017e98f4', 'profile/t4_avatar-2.jpg', '<p><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">When you have any questions about the tour or you don\'t find exactly what you\'re looking for, please be free to contact me. I will create a custom-made itinerary for you and can offer you recommendable spots considering your interest.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: &quot;Gentium Book Basic&quot;, serif;\"><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">I am always so excited at serving you as a tour-guide for your making wonderful memories and experiences, which remains in your recollections for your lifetime.</span><br></p>', 'Authorized tour conductor', '3+ years', 25, 1, '2020-05-13 05:22:57'),
(5, 'Krystal', 'krystal@gmail.com', '0912345678', 'Paris, France', 5, 'Junior', 'Female', '5083b2929d9e16f5e332bd1ab4f7b33cba0908f3', 'profile/user.png', '<p>Hello, all,&nbsp;<span style=\"color: rgb(49, 49, 49); font-family: Nunito; font-size: 1rem;\">My goal is to help you make memories to cherish for a lifetime!</span></p>', 'Specialist degree in International Relations from Russian State University for the Humanities', '1+ year', 40, 1, '2020-05-13 05:24:24'),
(6, 'Kageyama', 'kageyama@gmail.com', '+959123456', 'Tokyo, Japan', 1, 'Junior', 'Male', '62e04f7e53a07245774a6715dc5bf93b5f049776', 'profile/t6_team-1.jpg', '<p><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">I specialize in tours of Kyoto, Nara and Osaka. But I can take you to different cities, as well.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: &quot;Gentium Book Basic&quot;, serif;\"><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: &quot;Gentium Book Basic&quot;, serif;\"><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">I have been professionally licensed since 2006 and since then I have guided many people from many countries - <span style=\"font-family: Nunito;\">individuals, couples and groups.</span></span></p><p><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: &quot;Gentium Book Basic&quot;, serif;\"><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">My favorite way to guide you is with walking tours. That way, you can feel the real charms of the places in a relaxed mood.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: &quot;Gentium Book Basic&quot;, serif;\"><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">You will feel as if you are with a close friend who is both knowledgeable and kind.</span><br></p>', 'I\'m a national licensed English speaking tour guide.', '1+ year', 30, 1, '2020-05-13 05:25:39'),
(7, 'Bhone', 'bhone@gmail.com', '+9591234567', 'Bagan, Myanmar', 3, 'Senior', 'Male', '491054b4b9fe964747202833727a7c6e3c063f90', 'profile/t7_team-3.jpg', '<p><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">I am totally passionate about my country and its culture One of the things I love most is to see people smile and</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: &quot;Gentium Book Basic&quot;, serif;\"><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">hear them say \"wow\" when they learn or see something new. There is an intimacy on my private tours.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: &quot;Gentium Book Basic&quot;, serif;\"><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">And when I am planning the tour with you, I can arrange everything in advance.</span><br style=\"box-sizing: inherit; color: rgb(49, 49, 49); font-family: &quot;Gentium Book Basic&quot;, serif;\"><span style=\"color: rgb(49, 49, 49); font-family: Nunito;\">Best of all, when you work with me on your plans, it helps to create a relationship even before you get here.</span><br></p>', 'I graduated from Doshisha University, English Literature Department.', '3+ years', 30, 1, '2020-05-13 05:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `tourtype`
--

CREATE TABLE `tourtype` (
  `tourtypeid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourtype`
--

INSERT INTO `tourtype` (`tourtypeid`, `name`) VALUES
(1, 'Local Experience'),
(2, 'Adventure'),
(4, 'Family Trip'),
(5, 'Private Tour'),
(6, 'Trip for Kid');

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `transportationtype` varchar(100) NOT NULL,
  `facility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `name`, `transportationtype`, `facility`) VALUES
(1, 'Toyota Saloon', 'Private Car', 'Private air-conditioned car'),
(2, 'Toyota Sedan', 'Private Car', 'Private air-conditioned car'),
(3, 'Hyundai County', 'Mini Bus', 'Air-conditioned bus, with safety driver');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `country` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profilepicture` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `phone`, `country`, `gender`, `password`, `profilepicture`) VALUES
(1, 'User', 'user@gmail.com', '+959123456', 'Japan', 'Female', 'c249631e35a709ee04f8db8fca4127cdf8ae9af2', '20200513024942_2.jpg'),
(2, 'Mike', 'mike@gmail.com', '+959123456789', 'United Kingdom', 'Male', 'c35aecb4ae5a29be57187d6ff6b61c94e185e50c', '20200513040608_avatar-1.jpg'),
(3, 'Jack', 'jack@gmail.com', '0912345678', 'Australia', 'Male', '73f0906d962f29963491f6ef18d11df1780ae4ae', '20200514051745_avatar-3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `tourid` (`tourid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`languageid`);

--
-- Indexes for table `languagedetail`
--
ALTER TABLE `languagedetail`
  ADD PRIMARY KEY (`tourguideid`,`languageid`);

--
-- Indexes for table `likecount`
--
ALTER TABLE `likecount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog` (`blogid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `fk_bookingid` (`bookingid`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rateid`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`regionid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tourid`);

--
-- Indexes for table `tourguide`
--
ALTER TABLE `tourguide`
  ADD PRIMARY KEY (`tourguideid`);

--
-- Indexes for table `tourtype`
--
ALTER TABLE `tourtype`
  ADD PRIMARY KEY (`tourtypeid`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `languageid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `likecount`
--
ALTER TABLE `likecount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rateid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `regionid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tourid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tourguide`
--
ALTER TABLE `tourguide`
  MODIFY `tourguideid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tourtype`
--
ALTER TABLE `tourtype`
  MODIFY `tourtypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`tourid`) REFERENCES `tour` (`tourid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likecount`
--
ALTER TABLE `likecount`
  ADD CONSTRAINT `fk_blog` FOREIGN KEY (`blogid`) REFERENCES `blog` (`blogid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_bookingid` FOREIGN KEY (`bookingid`) REFERENCES `booking` (`bookingid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
