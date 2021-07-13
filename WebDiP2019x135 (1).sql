-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2020 at 11:43 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.25-1+0~20191128.32+debian8~1.gbp108445

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2019x135`
--

-- --------------------------------------------------------

--
-- Table structure for table `donacija`
--

CREATE TABLE `donacija` (
  `id_donacija` int(11) NOT NULL,
  `id_projekt` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `iznos` double NOT NULL,
  `datum_donacije` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donacija`
--

INSERT INTO `donacija` (`id_donacija`, `id_projekt`, `id_korisnik`, `iznos`, `datum_donacije`) VALUES
(1, 1, 4, 300, '2020-04-07 12:00:00'),
(2, 2, 5, 200, '2020-04-07 11:00:00'),
(3, 3, 6, 100, '2020-04-07 10:00:00'),
(4, 4, 7, 800, '2020-04-07 09:00:00'),
(5, 5, 8, 1000, '2020-04-07 08:00:00'),
(6, 1, 9, 655, '2020-04-07 07:00:00'),
(7, 2, 10, 758, '2020-04-07 12:00:00'),
(8, 3, 4, 255, '2020-04-07 15:00:00'),
(9, 4, 5, 450, '2020-04-07 17:00:00'),
(10, 5, 6, 350, '2020-04-07 18:00:00'),
(11, 10, 2, 1000, '2020-06-15 13:06:17'),
(12, 2, 2, 0, '2020-06-15 13:06:31'),
(13, 2, 2, 500, '2020-06-15 13:06:38'),
(14, 2, 1, 0, '2020-06-16 11:59:00'),
(15, 2, 1, 0, '2020-06-16 11:59:27'),
(16, 2, 1, 0, '2020-06-16 12:02:07'),
(17, 2, 1, 0, '2020-06-16 12:05:53'),
(18, 2, 1, 0, '2020-06-16 12:05:55'),
(19, 2, 1, 0, '2020-06-16 12:08:02'),
(20, 2, 20, 500, '2020-06-16 21:40:06'),
(21, 2, 1, 99842, '2020-06-16 22:40:20'),
(22, 5, 1, 250000, '2020-06-16 23:15:28'),
(23, 1, 1, 500000, '2020-06-16 23:16:40'),
(24, 3, 1, 2000000, '2020-06-16 23:18:12'),
(25, 4, 1, 50000, '2020-06-16 23:20:09'),
(26, 2, 1, 1000000, '2020-06-16 23:29:10');

--
-- Triggers `donacija`
--
DELIMITER $$
CREATE TRIGGER `azuriraj_iznos` AFTER INSERT ON `donacija` FOR EACH ROW BEGIN
DECLARE ukupni_iznos  float DEFAULT 0;
select  iznos into ukupni_iznos from donacija where id_donacija=NEW.id_donacija;
UPDATE projekt set trenutni_iznos_donacija=trenutni_iznos_donacija+ukupni_iznos where id_projekt=NEW.id_projekt;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dz4_obrazac`
--

CREATE TABLE `dz4_obrazac` (
  `id_obrazac` int(11) NOT NULL,
  `url` text CHARACTER SET utf8 NOT NULL,
  `datum` datetime NOT NULL,
  `telefonski_broj` varchar(20) CHARACTER SET utf8 NOT NULL,
  `naslov` varchar(100) CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `tema` varchar(255) CHARACTER SET utf8 NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8 NOT NULL,
  `memorija` int(11) NOT NULL,
  `boja` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lokacija_slike` varchar(255) CHARACTER SET utf8 NOT NULL,
  `preporuka` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dz4_obrazac`
--

INSERT INTO `dz4_obrazac` (`id_obrazac`, `url`, `datum`, `telefonski_broj`, `naslov`, `text`, `tema`, `brand`, `memorija`, `boja`, `lokacija_slike`, `preporuka`) VALUES
(29, 'www.apple.com', '2020-05-08 11:11:00', '+385955252634', 'iPhone 11', '6,1-inčni (dijagonalno) zaslon LCD Multi-Touch od ruba do ruba\r\nČip A13 Bionic\r\nNeural Engine 3. generacije\r\n2 kamere', 'Recenzija Novost ', 'Apple,Samsung', 32, '#000000', '../uploads/iphone11.jpg', 'DA'),
(30, 'www.apple.com', '2020-05-16 11:11:00', '003859412356', 'iPhone 11 Pro Max', '6,5-inčni (dijagonalno) OLED Multi-Touch zaslon od ruba do ruba\r\nČip A13 Bionic\r\nNeural Engine 3. generacije\r\n3 kamere', 'Recenzija Novost ', 'Apple,Samsung', 256, '#000000', '../uploads/iphone11pro.jpg', 'DA'),
(31, 'www.samsung.com', '2020-05-22 02:22:00', '+1234567896', 'Samsung Galaxy S20 Ultra', 'Ekran 6.9-inch\r\nRAM 16 GB\r\n4 Kamere 108MP/48MP/12MP/Time-of-flight sensor\r\nBaterija 5,000 mAh', 'Recenzija Novost ', 'Samsung,Huawei', 512, '#000000', '../uploads/Web_1index.png', 'NE'),
(32, 'www.samsung.hr', '2020-05-16 14:33:00', '+385915405623', 'Samsung Galaxy S20', 'Ekran 6.7-inch\r\nRAM 12 GB\r\n4 Kamere 12MP/64MP/12MP/Time-of-flight sensor\r\nBaterija 4,500 mAh', 'Novost Software Hardware ', 'Apple,Samsung', 256, '#ffffff', '../uploads/galaxyA.jpg', 'DA'),
(33, 'www.huawei.com', '2020-05-14 15:23:00', '+3258964845', 'Huawei P30 Pro', 'Veličina zaslona: 6,47 inča\r\nHuawei Kirin 980 osmojezgreni procesor\r\n8 GB RAM + 256 GB ROM', 'Recenzija Novost Usporedba ', 'Samsung,Huawei,Xiaomi', 512, '#000080', '../uploads/huaweip40.png', 'DA'),
(34, 'https://www.w3schools.com', '0001-01-01 01:01:00', '00', 'Test', 'Test', 'Recenzija Novost ', 'Samsung,Huawei', 74, '#000000', '../uploads/Web_1index.png', 'DA');

-- --------------------------------------------------------

--
-- Table structure for table `dz4_registracija`
--

CREATE TABLE `dz4_registracija` (
  `id_korisnik` int(11) NOT NULL,
  `ime` varchar(100) CHARACTER SET utf8 NOT NULL,
  `prezime` varchar(100) CHARACTER SET utf8 NOT NULL,
  `korisnicko_ime` varchar(100) CHARACTER SET utf8 NOT NULL,
  `godina_rodenja` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lozinka` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lozinka_sh1` varchar(40) CHARACTER SET utf8 NOT NULL,
  `id_uloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dz4_registracija`
--

INSERT INTO `dz4_registracija` (`id_korisnik`, `ime`, `prezime`, `korisnicko_ime`, `godina_rodenja`, `email`, `lozinka`, `lozinka_sh1`, `id_uloga`) VALUES
(1, 'Karlo', 'Teskera', 'kteskera', 1997, 'kteskera@foi.hr', 'Teskera', '7daef40a6a3a2df1043ff76bb6b3db37d0131095', 1),
(33, 'registrirani', 'registrirani', 'registrirani', 2000, 'registrirani@mail.com', 'registrirani', '16d54566d9bc94b9ea7347123f2db92c0168738f', 3),
(34, 'voditelj', 'voditelj', 'voditelj', 2000, 'voditelj@mail.com', 'voditelj', 'fd5bef8ed26b6f50e056b565646230195988ea22', 2),
(35, 'a', 'a', 'kteskera', 2000, 'a@a', '1', '0240484169e90a8598ac7f48d21db5351d57c90f', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dz4_uloga`
--

CREATE TABLE `dz4_uloga` (
  `id_uloga` int(11) NOT NULL,
  `naziv` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dz4_uloga`
--

INSERT INTO `dz4_uloga` (`id_uloga`, `naziv`) VALUES
(1, 'Administrator'),
(2, 'Voditelj'),
(3, 'Registrirani'),
(4, 'Neregistrirani');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id_kategorija` int(11) NOT NULL,
  `naziv_kategorije` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id_kategorija`, `naziv_kategorije`) VALUES
(1, 'Crveni križ'),
(2, 'Udruga pomoć protiv COVID-19'),
(3, 'Udruga prijatelj životinja i prirode'),
(4, 'Udruga za pomoć starijima'),
(5, 'Udruga za nezbrinutu dijecu'),
(6, 'Udruga za samohrane roditelje'),
(7, 'Udruga za zoocity'),
(8, 'Udruga donacija bolnicama'),
(9, 'Udruga za pomoć potrebnima'),
(10, 'Udruga za osobe s invaliditetom');

-- --------------------------------------------------------

--
-- Table structure for table `kompetencije`
--

CREATE TABLE `kompetencije` (
  `id_kompetencije` int(11) NOT NULL,
  `naziv` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kompetencije`
--

INSERT INTO `kompetencije` (`id_kompetencije`, `naziv`) VALUES
(1, 'Dizajner'),
(2, 'Programer'),
(3, 'Tester'),
(4, 'Rukovoditelj'),
(5, 'Računovođa'),
(6, 'Izvršitelj projekta'),
(7, 'Usmjerenos na tim'),
(8, 'Utjecaj na druge'),
(9, 'Prilagodljivost'),
(10, 'Inovativnost'),
(11, 'Komunikacija'),
(12, 'Analitičar'),
(13, 'Usmjerenost na klijenta');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(11) NOT NULL,
  `uloga_id_uloga` int(11) NOT NULL,
  `ime` varchar(25) NOT NULL,
  `prezime` varchar(25) NOT NULL,
  `korisnicko_ime` varchar(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `lozinka` varchar(25) NOT NULL,
  `lozinka_sh1` char(40) NOT NULL,
  `datum_registracije` datetime NOT NULL,
  `potvrda_racuna` tinyint(1) DEFAULT NULL,
  `aktivacijski_token` text,
  `blokiran_racun` tinyint(1) DEFAULT NULL,
  `uvjeti` datetime DEFAULT NULL,
  `neuspjesna_prijava` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `uloga_id_uloga`, `ime`, `prezime`, `korisnicko_ime`, `email`, `lozinka`, `lozinka_sh1`, `datum_registracije`, `potvrda_racuna`, `aktivacijski_token`, `blokiran_racun`, `uvjeti`, `neuspjesna_prijava`) VALUES
(1, 1, 'Karlo', 'Teskera', 'kteskera', 'kteskera@foi.hr', 'AdminStranice', '7d3cef2233564740ad31004103c903314cf82b10', '2020-04-04 05:00:00', 1, NULL, NULL, '2020-06-16 12:13:41', 0),
(2, 2, 'Pero', 'Perić', 'pperic', 'pperic@mail.com', 'Moderator1Stranice', '4f865d8f8e829dbe3c99efa91da654b7f33fb748', '2020-04-04 08:00:00', 1, NULL, NULL, '2020-04-04 08:00:00', 0),
(3, 2, 'Ivo', 'Ivić', 'iivic', 'iivic@mail.com', 'Moderator2Stranice', 'a89527f3fb0b43cd2c4364c371d0e0890cecfa73', '2020-04-04 08:00:00', 1, NULL, NULL, '2020-04-04 08:00:00', NULL),
(4, 3, 'Ana', 'Anić', 'aanic', 'aanic@mail.com', 'Suradnik1', '29713e62fb68eceea2cbf389608fbe38a11e5274', '2020-04-04 10:00:00', 1, NULL, 0, '2020-04-04 10:00:00', 0),
(5, 3, 'Krešimir', 'Krešo', 'kkreso', 'kkreso@mail.com', 'Suradnik2', '91d217974836a0de5c50ee5f8905c849e75159ac', '2020-04-04 10:00:00', 1, NULL, NULL, '2020-04-04 10:00:00', 0),
(6, 3, 'Filip', 'Filipović', 'ffilipovic', 'ffilipovic@mail.com', 'Suradnik3', '354dbfe7a89a37c2b5e7caa3994fd9673ee8426c', '2020-04-04 10:00:00', 1, NULL, NULL, '2020-04-04 11:00:00', 0),
(7, 3, 'Ante', 'Suradnić', 'asuradnic', 'asuradnic@mail.com', 'Suradnik4', 'f0766df033faf20bb74155c2c7aae0963e00a261', '2020-04-04 10:00:00', 1, NULL, NULL, '2020-04-04 11:00:00', 0),
(8, 3, 'Igor', 'Radnik', 'iradnik', 'iradnik@mail.com', 'Suradnik5', 'a444cc09ef75f95c3ce3ba31b9b183870e549a10', '2020-04-04 12:00:00', 1, NULL, NULL, '2020-04-04 12:00:00', 0),
(9, 3, 'Minea', 'Valjak', 'mvaljak', 'mvaljak@mail.com', 'Suradnik6', '2f36b2c07c7df086dad8bffa2e14cd6a0f024691', '2020-04-04 14:00:00', 1, NULL, NULL, '2020-04-04 14:00:00', 0),
(10, 3, 'Josip', 'Volak', 'jvolak', 'jvolak@mail.com', 'Suranik7', 'ce4c3a8bdcacc2302a04e0004ad3609a22e97913', '2020-04-04 16:00:00', 1, NULL, NULL, '2020-04-04 16:00:00', 0),
(20, 3, 'Ivan', 'Ivancic', 'iivancic', 'spotifykar@gmail.com', '123456', 'b05af499a23d93b1d2d57350e3b3aa0310098cd5', '2020-06-16 21:34:56', 1, NULL, NULL, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `odabir_kompetencije`
--

CREATE TABLE `odabir_kompetencije` (
  `id_odabir_kompetencije` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `id_kompetencije` int(11) NOT NULL,
  `datum_odabira` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `odabir_kompetencije`
--

INSERT INTO `odabir_kompetencije` (`id_odabir_kompetencije`, `id_korisnik`, `id_kompetencije`, `datum_odabira`) VALUES
(1, 4, 1, '2020-04-06 12:00:00'),
(2, 4, 2, '2020-04-06 12:00:00'),
(3, 5, 5, '2020-04-06 12:00:00'),
(4, 6, 6, '2020-04-06 12:00:00'),
(5, 7, 7, '2020-04-06 12:00:00'),
(6, 8, 8, '2020-04-06 12:00:00'),
(7, 9, 9, '2020-04-06 12:00:00'),
(8, 10, 10, '2020-04-06 12:00:00'),
(9, 5, 12, '2020-04-06 12:00:00'),
(10, 6, 10, '2020-04-06 12:00:00'),
(12, 1, 1, '2020-06-15 14:16:56'),
(13, 4, 4, '2020-06-15 14:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `odabir_moderatora`
--

CREATE TABLE `odabir_moderatora` (
  `id_korisnik` int(11) NOT NULL,
  `id_kategorija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `odabir_moderatora`
--

INSERT INTO `odabir_moderatora` (`id_korisnik`, `id_kategorija`) VALUES
(2, 1),
(3, 2),
(2, 3),
(3, 4),
(2, 5),
(3, 6),
(2, 7),
(3, 8),
(2, 9),
(2, 10),
(3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `projekt`
--

CREATE TABLE `projekt` (
  `id_projekt` int(11) NOT NULL,
  `id_kategorija` int(11) NOT NULL,
  `naziv_projekta` varchar(45) NOT NULL,
  `akronim` varchar(20) NOT NULL,
  `datum_pocetka` datetime NOT NULL,
  `datum_zavrsetka` datetime NOT NULL,
  `opis_zahtjeva` text NOT NULL,
  `min_iznos_donacija` double NOT NULL,
  `trenutni_iznos_donacija` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projekt`
--

INSERT INTO `projekt` (`id_projekt`, `id_kategorija`, `naziv_projekta`, `akronim`, `datum_pocetka`, `datum_zavrsetka`, `opis_zahtjeva`, `min_iznos_donacija`, `trenutni_iznos_donacija`) VALUES
(1, 2, 'Pomoć starijima COVID-19', 'PSCOVID19', '2020-04-04 11:00:00', '2020-06-24 00:00:00', 'Prikupljaju se novcana sredstva kako bi se pomoglo starijim ljudima pri kupovini namirnica. Potrebno je kreirati nekoliko video isjecaka kako bi pokazali kako se lako može naruciti hrana online.', 500000, 500955),
(2, 1, 'Pomoć stradalima u potresu', 'PSEQ2020', '2020-04-01 10:00:00', '2020-07-01 00:00:00', 'Strašni potres pogodio je Zagreb i okolicu. Mnogi su ostali bez svojih kuća. Potrebno je skupljati donacije kako bi se pomoglo ljudima kojima je kuca nastradala te trebaju financijsku pomoć. Nakon minimalnog sakupljenog iznosa potrebno je postaviti video gdje se pokazuje gdje se ta sredstva doniraju. Važno je prikazati stanje kuća.', 1000000, 1101800),
(3, 8, 'Respiratori za bolnice', 'RESKB2020', '2020-04-04 07:00:00', '2020-06-17 03:00:00', 'Zbog novonastale situacije zbog COVID_19 potrebno je skupljati donacije za respiratora. Očekuje se još bolesnika, no RH nema dovoljno respiratora stoga je svaka pomoc dobrodošla. Glavna žarišta su Grad Zagreb, Split, Rijeka i Pula.Nakon skupljenoga minimalnoga iznosa potrebno je postaviti nekoliko videa sa usporedbom respiratora kako bi se moglo utvrditi koji je najbolji s obzirom na raspoloživu cifru.', 2000000, 2000355),
(4, 3, 'Prikupljanje sredstava za pse lutalice', 'PSPL2020', '2020-04-16 07:00:00', '2020-06-17 07:00:00', 'Psi lutalice veliki su problem za gradove. Zna se kako nemaju adekvatnu brigu, imaju zarazne bolesti i u opasnosti je grad zbog širenja bjesnoce. Potrebno je povecanje kapaciteta kako bi se moglo smjestiti još životinja. Nakon minimalnog iznosa potrebno je postaviti nekoliko video sadržaja koji informira o trenutacnom stanju.', 50000, 51250),
(5, 4, 'Domovi za starije- sredstva', 'DZSS2020', '2020-04-20 08:00:00', '2020-06-23 00:00:00', 'U nekoliko domova fali medicinske opreme i odjece za starije osobe. Prikupljaju se sredstva kako bi olakšali svojim sugradanima. Potrebno je obici domove, dokumentirati novonastale situacije i pronaci rješenje za njih.', 250000, 251350),
(6, 6, 'Prikupljanje sredstava za samohrane roditelje', 'PSZSR2020', '2020-04-18 14:00:00', '2020-05-15 18:00:00', 'Skupiti odgovarajući iznos.', 100000, 0),
(7, 7, 'Skupljanje sredstava za zoo Maksimir', 'ZOOMAKSIMIR2020', '2020-04-21 00:00:00', '2020-06-08 09:00:00', 'Skupiti odgovarajući iznos.', 250000, 0),
(8, 8, 'Skupljanje sredstava za inkubatore', 'SSINCB2020', '2020-04-25 17:00:00', '2020-06-11 00:00:00', 'Skupiti odgovarajući iznos.', 600000, 0),
(9, 9, 'Pomoć ljudima u nehigijenskim uvijetima', 'PKLT2020', '2020-04-30 00:00:00', '2020-06-26 09:00:00', 'Skupiti odgovarajući iznos.', 300000, 0),
(10, 10, 'Potreban novac za invalidske instrumente', 'INVNO2020', '2020-05-14 00:00:00', '2020-07-17 00:00:00', 'Skupiti odgovarajući iznos.', 750000, 1000),
(12, 1, 'Update', 'Update', '2020-06-11 23:33:00', '2020-06-30 23:33:00', 'Update', 500, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(11) NOT NULL,
  `naziv` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Registrirani korisnik'),
(4, 'Neregistrirani korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `id_zadatak` int(11) NOT NULL,
  `naziv_videa` varchar(45) NOT NULL,
  `lokacija` text NOT NULL,
  `vidljivost` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `id_zadatak`, `naziv_videa`, `lokacija`, `vidljivost`) VALUES
(7, 17, 'VideoZad7', 'Videos\\Captures\\video7.mp4', 1),
(9, 19, 'VideoZad9', 'Videos\\Captures\\video9.mp4', 0),
(11, 22, 'Snimke nadzornih kamera', 'uploads/snimke2.mp4', 1),
(12, 23, 'Postupak dezinfekcije', 'uploads/respirator.mp4', 1),
(13, 24, 'Inkubator', 'uploads/innk.mp4', 1),
(14, 25, 'Potres snimljen u obiteljskom stanu.', 'uploads/stan.mp4', 1),
(15, 26, 'eKupi Fino Dostava', 'uploads/ekupi.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zadatak`
--

CREATE TABLE `zadatak` (
  `id_zadatak` int(11) NOT NULL,
  `id_projekt` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `opis` text NOT NULL,
  `datum_pocetka` datetime NOT NULL,
  `datum_zavrsetka` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zadatak`
--

INSERT INTO `zadatak` (`id_zadatak`, `id_projekt`, `id_korisnik`, `opis`, `datum_pocetka`, `datum_zavrsetka`) VALUES
(11, 1, 4, 'Snimiti video za online kupnju.', '2020-04-19 04:00:00', '2020-04-21 12:00:00'),
(15, 3, 8, 'Usporedba najjefitnijeg i najskupljeg respiratora.', '2020-04-21 00:00:00', '2020-04-21 12:20:00'),
(17, 4, 10, 'Snimiti video posljedicama prijenosa zaraze medu psima lutalicama.', '2020-04-22 00:00:00', '2020-04-21 23:00:00'),
(18, 4, 4, 'Snimiti trenutacne uvijete ustanova.', '2020-04-22 00:00:00', '2020-04-21 22:00:00'),
(19, 5, 5, 'Snimiti kratak video o najpotrebnijim proizvodima u domovima za starije.', '2020-04-23 00:00:00', '2020-04-21 12:00:00'),
(22, 2, 6, 'Snimiti video o urušenim kucama na podrucju Cucerje.', '2020-05-03 22:49:00', '2020-06-15 22:53:00'),
(23, 3, 8, 'Dezinfekcija respiratora- održavanje.', '2020-06-09 22:57:00', '2020-06-15 23:02:17'),
(24, 8, 7, 'Informacije o inkubatorima.', '2020-06-01 23:05:00', '2020-06-15 23:11:46'),
(25, 2, 7, 'Snimke nazdorznih kamera u Zagrebu.', '2020-06-01 23:29:00', '2020-06-15 23:33:09'),
(26, 1, 5, 'Preporučiti dobar online servis za dostavu hrane.', '2020-06-01 23:36:00', '2020-06-15 23:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `zahtjev_za_sudjelovanje`
--

CREATE TABLE `zahtjev_za_sudjelovanje` (
  `id_zahtjev_za_sujedjelovanje` int(11) NOT NULL,
  `id_projekt` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL,
  `opis` text NOT NULL,
  `datum_zahtjeva` datetime NOT NULL,
  `potvrda` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zahtjev_za_sudjelovanje`
--

INSERT INTO `zahtjev_za_sudjelovanje` (`id_zahtjev_za_sujedjelovanje`, `id_projekt`, `id_korisnik`, `opis`, `datum_zahtjeva`, `potvrda`) VALUES
(1, 1, 4, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 03:05:04', 1),
(2, 1, 5, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 03:05:04', 1),
(3, 2, 6, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 09:04:00', 1),
(4, 2, 7, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 18:14:17', 1),
(5, 3, 8, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 07:27:10', 1),
(6, 3, 9, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 10:15:45', 1),
(7, 4, 10, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 07:21:40', 1),
(8, 4, 4, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 07:22:34', 1),
(9, 5, 5, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 12:13:30', 1),
(10, 5, 6, 'Pozivamo vas na suradnju na našem projektu.', '2020-04-13 13:18:20', 1),
(12, 8, 7, 'Pozivamo vas na sudjelovanje.', '2020-06-15 23:04:48', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donacija`
--
ALTER TABLE `donacija`
  ADD PRIMARY KEY (`id_donacija`),
  ADD KEY `fk_donacija_projekt1_idx` (`id_projekt`),
  ADD KEY `fk_donacija_korisnik1_idx` (`id_korisnik`);

--
-- Indexes for table `dz4_obrazac`
--
ALTER TABLE `dz4_obrazac`
  ADD PRIMARY KEY (`id_obrazac`);

--
-- Indexes for table `dz4_registracija`
--
ALTER TABLE `dz4_registracija`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `uloga_fk` (`id_uloga`);

--
-- Indexes for table `dz4_uloga`
--
ALTER TABLE `dz4_uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id_kategorija`);

--
-- Indexes for table `kompetencije`
--
ALTER TABLE `kompetencije`
  ADD PRIMARY KEY (`id_kompetencije`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `fk_korinsik_uloga_idx` (`uloga_id_uloga`);

--
-- Indexes for table `odabir_kompetencije`
--
ALTER TABLE `odabir_kompetencije`
  ADD PRIMARY KEY (`id_odabir_kompetencije`),
  ADD KEY `fk_odabir_kompetencije_korisnik1_idx` (`id_korisnik`),
  ADD KEY `fk_odabir_kompetencije_kompetencije1_idx` (`id_kompetencije`);

--
-- Indexes for table `odabir_moderatora`
--
ALTER TABLE `odabir_moderatora`
  ADD PRIMARY KEY (`id_korisnik`,`id_kategorija`),
  ADD KEY `fk_korisnik_has_kategorija_kategorija1_idx` (`id_kategorija`),
  ADD KEY `fk_korisnik_has_kategorija_korisnik1_idx` (`id_korisnik`);

--
-- Indexes for table `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`id_projekt`),
  ADD KEY `fk_projekt_kategorija1_idx` (`id_kategorija`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `fk_video_zadatak1_idx` (`id_zadatak`);

--
-- Indexes for table `zadatak`
--
ALTER TABLE `zadatak`
  ADD PRIMARY KEY (`id_zadatak`),
  ADD KEY `fk_zadatak_korisnik1_idx` (`id_korisnik`),
  ADD KEY `fk_zadatak_projekt1_idx` (`id_projekt`);

--
-- Indexes for table `zahtjev_za_sudjelovanje`
--
ALTER TABLE `zahtjev_za_sudjelovanje`
  ADD PRIMARY KEY (`id_zahtjev_za_sujedjelovanje`),
  ADD KEY `fk_zahtjev_za_sujedlovanje_projekt1_idx` (`id_projekt`),
  ADD KEY `fk_zahtjev_za_sujedlovanje_korisnik1_idx` (`id_korisnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donacija`
--
ALTER TABLE `donacija`
  MODIFY `id_donacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `dz4_obrazac`
--
ALTER TABLE `dz4_obrazac`
  MODIFY `id_obrazac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `dz4_registracija`
--
ALTER TABLE `dz4_registracija`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `dz4_uloga`
--
ALTER TABLE `dz4_uloga`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_kategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kompetencije`
--
ALTER TABLE `kompetencije`
  MODIFY `id_kompetencije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `odabir_kompetencije`
--
ALTER TABLE `odabir_kompetencije`
  MODIFY `id_odabir_kompetencije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `projekt`
--
ALTER TABLE `projekt`
  MODIFY `id_projekt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `zadatak`
--
ALTER TABLE `zadatak`
  MODIFY `id_zadatak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `zahtjev_za_sudjelovanje`
--
ALTER TABLE `zahtjev_za_sudjelovanje`
  MODIFY `id_zahtjev_za_sujedjelovanje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donacija`
--
ALTER TABLE `donacija`
  ADD CONSTRAINT `fk_donacija_korisnik1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_donacija_projekt1` FOREIGN KEY (`id_projekt`) REFERENCES `projekt` (`id_projekt`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dz4_registracija`
--
ALTER TABLE `dz4_registracija`
  ADD CONSTRAINT `uloga_fk` FOREIGN KEY (`id_uloga`) REFERENCES `dz4_uloga` (`id_uloga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korinsik_uloga` FOREIGN KEY (`uloga_id_uloga`) REFERENCES `uloga` (`id_uloga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `odabir_kompetencije`
--
ALTER TABLE `odabir_kompetencije`
  ADD CONSTRAINT `fk_odabir_kompetencije_kompetencije1` FOREIGN KEY (`id_kompetencije`) REFERENCES `kompetencije` (`id_kompetencije`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_odabir_kompetencije_korisnik1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `odabir_moderatora`
--
ALTER TABLE `odabir_moderatora`
  ADD CONSTRAINT `fk_korisnik_has_kategorija_kategorija1` FOREIGN KEY (`id_kategorija`) REFERENCES `kategorija` (`id_kategorija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_has_kategorija_korisnik1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projekt`
--
ALTER TABLE `projekt`
  ADD CONSTRAINT `fk_projekt_kategorija1` FOREIGN KEY (`id_kategorija`) REFERENCES `kategorija` (`id_kategorija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `fk_video_zadatak1` FOREIGN KEY (`id_zadatak`) REFERENCES `zadatak` (`id_zadatak`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zadatak`
--
ALTER TABLE `zadatak`
  ADD CONSTRAINT `fk_zadatak_korisnik1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zadatak_projekt1` FOREIGN KEY (`id_projekt`) REFERENCES `projekt` (`id_projekt`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zahtjev_za_sudjelovanje`
--
ALTER TABLE `zahtjev_za_sudjelovanje`
  ADD CONSTRAINT `fk_zahtjev_za_sujedlovanje_korisnik1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zahtjev_za_sujedlovanje_projekt1` FOREIGN KEY (`id_projekt`) REFERENCES `projekt` (`id_projekt`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
