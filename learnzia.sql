-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2022 pada 09.22
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnzia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `channel`
--

CREATE TABLE `channel` (
  `id_channel` int(10) NOT NULL,
  `id_classroom` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `channel_name` varchar(20) NOT NULL,
  `channel_description` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `channel`
--

INSERT INTO `channel` (`id_channel`, `id_classroom`, `id_user`, `channel_name`, `channel_description`, `datetime`) VALUES
(11, 1, 1, 'error4041w', 'holaaaaaslkdjalsdw', '2022-07-21 05:35:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `classforummessage`
--

CREATE TABLE `classforummessage` (
  `id_message` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `text` varchar(400) NOT NULL,
  `id_classroom` int(30) NOT NULL,
  `id_channel` int(10) NOT NULL,
  `imageURL` varchar(150) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `classforummessage`
--

INSERT INTO `classforummessage` (`id_message`, `id_user`, `text`, `id_classroom`, `id_channel`, `imageURL`, `datetime`) VALUES
(1, 1, 'hello', 1, 0, 'null', '2022-02-07 10:54:30'),
(2, 2, 'too. so cause this is a new class. i want everyone to introduce yourself', 1, 0, 'null', '2022-02-07 10:54:30'),
(5, 1, 'my name is Leo (20). im from Papua, Indonesia. im love coding, history too especially about europe n some shit', 1, 0, 'null', '2022-02-08 01:21:35'),
(6, 1, 'what about u? founder?', 1, 0, 'null', '2022-02-16 08:26:43'),
(15, 1, 'halo', 1, 0, 'null', '2022-07-16 03:29:43'),
(17, 1, 'halo', 3, 0, 'null', '2022-07-16 03:30:30'),
(20, 1, 'hallo', 1, 11, 'null', '2022-07-21 06:09:21'),
(21, 1, 'test', 1, 11, 'flazefysimplehistory1120220721060946', '2022-07-21 06:09:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `classroom`
--

CREATE TABLE `classroom` (
  `id_classroom` int(8) NOT NULL,
  `classname` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL,
  `imageURL` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `classroom`
--

INSERT INTO `classroom` (`id_classroom`, `classname`, `category`, `description`, `imageURL`, `type`, `date`) VALUES
(1, 'simplyhistory', 'history', 'tezt', 't70Ot52IR8lbvUTVwJN4xAwlXZaihP', 'public', '2022-02-01'),
(3, 'fullstacker', 'coding', 'We discuss about web and mobile programming include front-end and back-end. Newbie only, req if u want to join. Dont toxic and and dont copy-paste answers if u dont understand ', 'q5x9jZMqDWVIu7cr3iHh1JGhO1baEr', 'private', '2022-02-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `classroom-activity`
--

CREATE TABLE `classroom-activity` (
  `id_activity` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_classroom` int(10) NOT NULL,
  `context` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `classroom-activity`
--

INSERT INTO `classroom-activity` (`id_activity`, `id_user`, `id_classroom`, `context`, `datetime`) VALUES
(1, 1, 1, 'flazefy created a new channel called Bacot', '2022-07-16 01:50:10'),
(2, 1, 1, 'flazefy created a new channel called tester', '2022-07-16 03:30:09'),
(3, 1, 1, 'flazefy created a new channel called Bacot2', '2022-07-21 01:45:21'),
(4, 1, 1, 'flazefy deleted Bacot2 channel', '2022-07-21 02:31:22'),
(5, 1, 1, 'flazefy created a new channel called testttt', '2022-07-21 05:35:26'),
(6, 1, 1, 'flazefy has changed error404\' profile', '2022-07-21 05:57:39'),
(7, 1, 1, 'flazefy has changed error4041\' profile', '2022-07-21 05:59:04'),
(8, 1, 1, 'flazefy deleted Bacot channel', '2022-07-21 06:08:48'),
(9, 1, 1, 'flazefy has changed error4041 channel\'s profile', '2022-07-21 06:09:06'),
(10, 1, 1, 'flazefy has changed simplyhistory profile', '2022-07-21 11:45:11'),
(11, 1, 1, 'flazefy has changed simplyhistory profile', '2022-07-21 11:48:44'),
(12, 1, 1, 'flazefy has changed simplehistory profile', '2022-07-21 11:52:07'),
(13, 1, 1, 'flazefy has changed simplehistory profile', '2022-07-21 11:54:32'),
(14, 1, 1, 'flazefy has changed simplyhistory profile', '2022-07-21 11:54:49'),
(15, 1, 1, 'flazefy has changed error4041 channel\'s profile', '2022-07-22 12:03:47'),
(16, 1, 1, 'flazefy has changed error4041w channel\'s profile', '2022-07-22 12:05:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discussion`
--

CREATE TABLE `discussion` (
  `id_discussion` int(8) NOT NULL,
  `id_user` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `question` varchar(400) NOT NULL,
  `datetime` datetime NOT NULL,
  `discussion_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `discussion`
--

INSERT INTO `discussion` (`id_discussion`, `id_user`, `category`, `subject`, `question`, `datetime`, `discussion_image`) VALUES
(1, 1, 'history', 'World War 2', 'Why the fuck germany declare war on america, when pearl harbour got attacked by japanese?', '2022-01-20 02:16:48', 'null'),
(2, 1, 'history', 'Testing', 'hello world', '2022-01-22 04:52:16', 'null'),
(3, 1, 'math', 'Sum', '1+1=?', '2022-01-23 01:07:17', 'null'),
(5, 4, 'math', 'Integral', 'does anyone know how to solve this problem? pls give me the detail steps by steps', '2022-01-27 03:21:37', 'teresevy20220128101512'),
(11, 1, 'design', 'test', 'asjdlaksjd', '2022-07-25 06:45:01', '59d455f873adf7faa5f419f206d091'),
(12, 1, 'coding', 'MVC', 'Whats the difference between if we declare \'required\' in html element or in the controller?', '2022-07-30 06:57:17', 'null'),
(13, 1, 'history', 'WW2', 'are nazi still live until today?', '2022-07-30 09:03:15', 'null');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invitation`
--

CREATE TABLE `invitation` (
  `id_invitation` int(8) NOT NULL,
  `id_user_sender` int(10) NOT NULL,
  `id_user_receiver` int(10) NOT NULL,
  `invitation_type` varchar(30) NOT NULL,
  `id_context` int(10) NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id_message` int(8) NOT NULL,
  `id_social` int(10) NOT NULL,
  `id_user_sender` int(10) NOT NULL,
  `message` varchar(200) NOT NULL,
  `message_image` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id_message`, `id_social`, `id_user_sender`, `message`, `message_image`, `datetime`) VALUES
(1, 1, 1, 'Hello man, how r u', 'null', '2022-01-19 16:50:10'),
(2, 1, 3, 'who the fck r u', 'null', '2022-01-19 19:30:15'),
(3, 7, 1, 'what?', 'null', '2022-01-20 02:07:20'),
(32, 1, 1, 'hola', 'null', '2022-07-23 08:25:55'),
(33, 7, 1, '', '2d5d5cb35f341a8a5d28454dee09ab', '2022-07-23 08:26:15'),
(35, 7, 1, 'test', 'null', '2022-07-23 11:42:42'),
(36, 1, 1, '1', 'discussion', '2022-07-23 11:44:04'),
(37, 7, 1, '1', 'discussion', '2022-07-23 11:44:04'),
(39, 1, 1, 'hola', '6caff35fd8b18e143b7555a3a51a9a', '2022-07-25 07:07:41'),
(40, 1, 1, '2', 'discussion', '2022-07-30 05:24:00'),
(41, 7, 1, '2', 'discussion', '2022-07-30 05:24:00'),
(42, 1, 1, '11', 'discussion', '2022-07-30 05:24:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relation`
--

CREATE TABLE `relation` (
  `id_relation` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_classroom` int(10) NOT NULL,
  `typeRelation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `relation`
--

INSERT INTO `relation` (`id_relation`, `id_user`, `id_classroom`, `typeRelation`) VALUES
(1, 3, 1, 'founder'),
(2, 1, 1, 'co-founder'),
(4, 5, 3, 'founder'),
(5, 4, 3, 'member'),
(9, 1, 3, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reply`
--

CREATE TABLE `reply` (
  `id_reply` int(8) NOT NULL,
  `id_user` int(10) NOT NULL,
  `replytext` varchar(1000) NOT NULL,
  `id_discussion` int(6) NOT NULL,
  `datetime` datetime NOT NULL,
  `reply_image` varchar(50) NOT NULL,
  `reply_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reply`
--

INSERT INTO `reply` (`id_reply`, `id_user`, `replytext`, `id_discussion`, `datetime`, `reply_image`, `reply_status`) VALUES
(2, 1, 'what???', 1, '2022-01-20 16:59:35', 'null', 'null'),
(3, 1, 'pls dont spamming u bitch', 1, '2022-01-22 07:21:12', 'null', 'null'),
(6, 4, 'bruh its 2. very ez', 3, '2022-01-23 05:29:48', 'null', 'verified'),
(9, 4, 'because the japanese want to take all resource in SEA for their war supply. And at the time, SEA are ducth, british, and USA colony. so the japanese think thats is good idea when they have suprised att the USA naval base in hawaii. Cause u know there is know way japan could stand againt the uk and usa navy', 1, '2022-01-26 03:02:29', 'null', 'verified'),
(12, 5, 'like this maybe', 5, '2022-01-29 02:45:59', 'rosemonde20220129024559', 'verified'),
(16, 1, 'test', 3, '2022-07-25 05:54:45', 'null', 'null'),
(17, 1, 'thank u', 5, '2022-07-25 06:06:06', 'flazefy20220725060606', 'null'),
(18, 1, 'loh heh', 2, '2022-07-25 06:42:50', 'e4cf7e8639fda3335da26646056f96', 'null'),
(19, 1, 'wtf is this', 5, '2022-07-30 06:25:11', 'null', 'null'),
(20, 3, 'it will be more secure if u declare required on controller validation than in html element', 12, '2022-07-30 06:58:20', 'null', 'verified'),
(21, 5, 'for me, i always preffered to do the validation and other algorithm in the backend', 12, '2022-07-30 07:24:46', 'null', 'null'),
(22, 4, 'the party is no more, but i think there\'s some ppl out there still believe that ideology', 13, '2022-07-30 09:07:20', 'null', 'verified'),
(23, 4, 'it will be more easy to manage if you want to add other validation requirement like length or email format', 12, '2022-07-30 09:10:54', 'null', 'null'),
(24, 5, 'here in argentine, you may find some old man have ss medal', 13, '2022-07-30 09:12:17', 'null', 'null'),
(25, 1, 'thanks for your answers', 12, '2022-07-30 09:21:26', 'null', 'null');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social`
--

CREATE TABLE `social` (
  `id_social` int(10) NOT NULL,
  `id_user_1` int(10) NOT NULL,
  `id_user_2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `social`
--

INSERT INTO `social` (`id_social`, `id_user_1`, `id_user_2`) VALUES
(1, 3, 1),
(6, 4, 3),
(7, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `up`
--

CREATE TABLE `up` (
  `id_up` int(10) NOT NULL,
  `id_context` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `up_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `up`
--

INSERT INTO `up` (`id_up`, `id_context`, `id_user`, `up_type`) VALUES
(2, 5, 5, 'discussion'),
(3, 3, 1, 'discussion'),
(7, 5, 1, 'discussion'),
(10, 1, 1, 'discussion'),
(15, 9, 1, 'reply'),
(16, 6, 1, 'reply'),
(17, 12, 1, 'reply'),
(18, 19, 1, 'reply'),
(20, 12, 5, 'discussion'),
(22, 21, 5, 'reply'),
(24, 9, 5, 'reply'),
(25, 1, 5, 'discussion'),
(26, 12, 5, 'reply'),
(27, 12, 1, 'discussion'),
(29, 9, 4, 'reply'),
(30, 12, 4, 'reply'),
(31, 21, 4, 'reply'),
(32, 20, 4, 'reply'),
(33, 13, 4, 'discussion'),
(34, 22, 4, 'reply'),
(35, 23, 4, 'reply'),
(36, 13, 5, 'discussion'),
(37, 24, 5, 'reply');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `country` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `imageURL` varchar(100) NOT NULL,
  `datejoin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `fullname`, `email`, `password`, `description`, `country`, `status`, `imageURL`, `datejoin`) VALUES
(1, 'flazefy', 'Leonardho R Sitanggang', 'flazen.edu@gmail.com', 'nopass123', 'Where the fuck i am?...', 'Indonesia', 'offline', 'user_K49TQYXuZbUqvGymfk1M1yKrJZ6Bxm', '2022-01-20'),
(3, 'richardkyle', 'Richard Kyle', 'flazen.edu@gmail.com', 'tester123', 'Hey its me kyleee', 'United States of America', 'offline', 'user_9KBocUyIEGX2lEGKVMoP8lJp2NjHBX', '2022-01-22'),
(4, 'teresevy', 'Terese Evy', 'leonardho81@gmail.com', 'nopassword', 'hello i am terese', 'United States of America', 'offline', 'user_tYMfBAB07JPSlWQ2qMq91uvkByrvly', '2022-01-25'),
(5, 'rosemonde', 'Lya Rosemonde', 'lyarosemond3@gmail.com', 'fisheye123', 'My name is rose. I love coding especially in web programming. i have 5 years of experience', 'United Kingdom', 'offline', 'user_afm0xH5pC1yamXswc2NU3Kg61vliOb', '2022-01-28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indeks untuk tabel `classforummessage`
--
ALTER TABLE `classforummessage`
  ADD PRIMARY KEY (`id_message`);

--
-- Indeks untuk tabel `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id_classroom`);

--
-- Indeks untuk tabel `classroom-activity`
--
ALTER TABLE `classroom-activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indeks untuk tabel `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id_discussion`);

--
-- Indeks untuk tabel `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id_invitation`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indeks untuk tabel `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id_relation`);

--
-- Indeks untuk tabel `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indeks untuk tabel `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id_social`);

--
-- Indeks untuk tabel `up`
--
ALTER TABLE `up`
  ADD PRIMARY KEY (`id_up`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `channel`
--
ALTER TABLE `channel`
  MODIFY `id_channel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `classforummessage`
--
ALTER TABLE `classforummessage`
  MODIFY `id_message` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id_classroom` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `classroom-activity`
--
ALTER TABLE `classroom-activity`
  MODIFY `id_activity` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id_discussion` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id_invitation` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `relation`
--
ALTER TABLE `relation`
  MODIFY `id_relation` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `reply`
--
ALTER TABLE `reply`
  MODIFY `id_reply` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `social`
--
ALTER TABLE `social`
  MODIFY `id_social` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `up`
--
ALTER TABLE `up`
  MODIFY `id_up` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
