
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 21 Mar 2017, 06:53
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `u251061751_ber`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glosowanie`
--

CREATE TABLE IF NOT EXISTS `glosowanie` (
  `nr_glosowania` int(11) NOT NULL AUTO_INCREMENT,
  `temat` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `status` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v1` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v2` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v3` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v4` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v5` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v6` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v7` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v8` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v9` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `v10` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`nr_glosowania`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glosy`
--

CREATE TABLE IF NOT EXISTS `glosy` (
  `id` int(11) NOT NULL,
  `nr_glosowania` int(11) NOT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE IF NOT EXISTS `kontakt` (
  `kolejnosc` int(11) NOT NULL AUTO_INCREMENT,
  `funkcja` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `dodatkowe` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`kolejnosc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `kontakt`
--

INSERT INTO `kontakt` (`kolejnosc`, `funkcja`, `imie`, `nazwisko`, `email`, `telefon`, `dodatkowe`) VALUES
(1, 'Drużynowy', 'Robert', 'Szczygieł', '', '', ''),
(2, 'Przyboczny', 'Wiktor', 'Matecki', 'W_matecki@wp.pl', '665436889', ''),
(3, '', 'Wiktor', 'Kasprzak', 'ewiktor340@wp.pl', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoby`
--

CREATE TABLE IF NOT EXISTS `osoby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` tinytext COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` tinytext COLLATE utf8_polish_ci NOT NULL,
  `rocznik` year(4) NOT NULL,
  `data_dolaczenia` date NOT NULL,
  `nick` tinytext COLLATE utf8_polish_ci NOT NULL,
  `punkty` int(11) NOT NULL,
  `semestr` int(11) NOT NULL,
  `ranga` tinytext COLLATE utf8_polish_ci NOT NULL,
  `stopien` tinytext COLLATE utf8_polish_ci NOT NULL,
  `login` tinytext COLLATE utf8_polish_ci NOT NULL,
  `haslo` tinytext COLLATE utf8_polish_ci NOT NULL,
  `rola` tinytext COLLATE utf8_polish_ci NOT NULL,
  `email` tinytext COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=28 ;

--
-- Zrzut danych tabeli `osoby`
--

INSERT INTO `osoby` (`id`, `imie`, `nazwisko`, `rocznik`, `data_dolaczenia`, `nick`, `punkty`, `semestr`, `ranga`, `stopien`, `login`, `haslo`, `rola`, `email`) VALUES
(1, 'Wiktor', 'Matecki', 1997, '2017-01-28', 'wiktor', 20, 20, 'ADMIN', 'MASTER', 'wiktor', '$2y$10$oH8ab6qHptKGbgavf42Ui.vnNPTwSw1.D8fude7VhRRkinXfd/MaK', 'admin', 'wiktor@kkk.pl'),
(18, 'Patryk', 'Gryska', 2001, '2017-03-18', 'Grycha', 10, 10, 'nowicjusz', '', 'Grycha', '$2y$10$mlLEv0SnLS3tpaePDU7QT.fIeQ.FlsUNFYCgqgNpVRwjUfgIcTsVO', 'user', 'mrgrycha@gmail.com'),
(19, 'Jacek', 'Zawal', 2003, '2017-03-18', 'Jason Pawulo', 10, 10, 'nowicjusz', '', 'jzawal', '$2y$10$0Pzlg2qqV5OmaGYcDdOj6O9wgjMMzLO/itc05sx9vMStEQFQ4y66i', 'user', 'rejkon4@interia.pl'),
(20, 'Szymon', 'Ludwiczak', 2002, '2017-03-18', 'SimonZHP', 10, 10, 'nowicjusz', '', 'ludwiksimon', '$2y$10$H/xlCuB1yzNHK/1.WBsMbeLYjbMcfRhqHoHOfAlg.ggL9ym.S4056', 'user', 'motoszelency@gmail.com'),
(21, 'Patryk', 'Sulikowski', 2003, '2017-03-18', 'patryksul', 10, 10, 'nowicjusz', '', 'patryksul', '$2y$10$kJD8KibIo/6hSfSpxWV.leqQe4Jkfm3j9j/JLQPaF2mT6BpWlkckC', 'user', 'patryksul2003@wp.pl'),
(22, 'Wiktor', 'Kasprzak', 1999, '2017-03-18', 'Viciu', 10, 10, 'nowicjusz', '', 'Viciu', '$2y$10$EaWZrekrSRx22B.lPMoYPuuQND5mTAakBZihRHmO52wEooQV8aR6K', 'admin', 'ewiktor340@wp.pl'),
(23, 'Kacper', 'Kiliński', 2004, '2017-03-18', 'ziomeczekkapi', 10, 10, 'nowicjusz', '', 'Rododendron', '$2y$10$S7lgko03e3TvG0vqWx6d2u569dMkbbp/9GhOuI0STJhgbQbGuzdjy', 'user', 'kkilinski0@gmail.com'),
(24, 'Mateusz', 'Marciniak', 2003, '2017-03-19', 'Ghost', 0, 0, 'nowicjusz', '', 'Ghost', '$2y$10$NPCQ/MDlZ0PsOYbCaUOZrOoKCB3sC7FTb7uWQN41Am0oxhYaXxrN6', 'user', 'dragonmatik@gmail.com'),
(25, 'Robert', 'Szczygieł', 1996, '2017-03-19', 'Hoggie', 0, 0, 'nowicjusz', '', 'Hoggie', '$2y$10$k7WZwKA8gzDvA9HTR8d3Xe4A.vsjz6l10sXeUJyOCalkdft9t5AeO', 'admin', 'robert.szczygiel22@gmail.com'),
(26, 'Szymon', 'Próchniak', 2001, '2017-03-19', 'BABAS', 0, 0, 'nowicjusz', '', 'Babas1', '$2y$10$UVhAzCfuBBdBobN2p5xn/OhgbryzsgfvNl4P4HXHBBWtZKMISb6Cu', 'user', 'szymon.prochniak@op.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polecajacy`
--

CREATE TABLE IF NOT EXISTS `polecajacy` (
  `nowy` int(11) NOT NULL,
  `stary` int(11) NOT NULL,
  PRIMARY KEY (`nowy`,`stary`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `proby`
--

CREATE TABLE IF NOT EXISTS `proby` (
  `nr_proby` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `realizowany_stopien` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `otwarcie` date NOT NULL,
  `status` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `uwagi` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `zad1` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad2` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad3` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad4` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad5` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad6` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad7` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad8` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad9` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad10` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad11` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad12` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad13` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad14` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad15` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad16` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad17` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad18` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad19` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad20` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad21` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad22` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad23` text CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `zad24` text COLLATE utf8_unicode_ci NOT NULL,
  `zad25` text COLLATE utf8_unicode_ci NOT NULL,
  `zad26` text COLLATE utf8_unicode_ci NOT NULL,
  `zad27` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nr_proby`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `proby`
--

INSERT INTO `proby` (`nr_proby`, `id`, `realizowany_stopien`, `otwarcie`, `status`, `uwagi`, `zad1`, `zad2`, `zad3`, `zad4`, `zad5`, `zad6`, `zad7`, `zad8`, `zad9`, `zad10`, `zad11`, `zad12`, `zad13`, `zad14`, `zad15`, `zad16`, `zad17`, `zad18`, `zad19`, `zad20`, `zad21`, `zad22`, `zad23`, `zad24`, `zad25`, `zad26`, `zad27`) VALUES
(1, 0, 'odkrywca', '0000-00-00', 'treść', '', '1. Określiłem swoją największą słabość i podejmę próbę wyeliminowania jej.', '2. Aktywnie realizuję obowiązki wynikające z mojej wiary.', '3. Wykazałem, że potrafię poświęcić własną przyjemność na rzecz obowiązku.', '4. Zdobyłem nową umiejętność przydatną w gospodarstwie domowym.', '5. Rzetelnie wykonuję swoje obowiązki domowe.\r\n', '6. Zapisuję ustalone terminy i wyznaczone zadania, jestem punktualny i obowiązkowy.\r\n', '7. Wziąłem udział w zaplanowaniu i zorganizowaniu akcji zarobkowej dla drużyny.', '8. Dbam o sprzęt drużyny. Brałem udział w jego konserwacji.', '9. Dbam o zdrowie i pamiętam o aktywnym odpoczynku, odpowiedniej ilości snu, prawidłowym odżywianiu się, umiem radzić sobie z\r\nproblemami okresu dojrzewania.\r\n', '10. Załatwiłem powierzoną mi sprawę w instytucji lub urzędzie.\r\n', '11. Zorganizowałem wyjście zastępu lub drużyny (grupy kolegów) do kina, teatru, na koncert, do muzeum lub inną imprezę kulturalną.', '12. Potrafię w prostych sytuacjach porozumieć się w języku obcym.', '13. Umiejętnie korzystam z Internetu (wyszukuję potrzebne informacje, posiadam adres\r\ne-mail).', '1. Potrafię wskazać główne etapy w dziejach harcerstwa.', '2. Odwiedziłem komendę mojego hufca. Znam adres komendy mojej chorągwi i Głównej Kwatery. Wiem, jak nazywa się komendant\r\nhufca, komendant chorągwi, Naczelnik ZHP\r\ni Przewodniczący ZHP.', '3. Wiem, jakie inne organizacje harcerskie działają w Polsce.\r\n', '4. Czytam książki o tematyce harcerskiej.', '5. Znam strukturę ZHP.', '6. Potrafię ocenić czynności życiowe (tętno i oddech), znam prawidłowe tętno dzieci\r\ni dorosłych. Potrafię postąpić w przypadku utraty przytomności, ułożyć chorego w pozycji bocznej bezpiecznej. Umiem zastosować\r\nróżne sposoby przenoszenia poszkodowanych. Potrafię postępować w przypadku zatrucia pokarmowego.', '7. Odnalazłem na mapie miejsce, w którym się znajduję, poprowadziłem w czasie gry terenowej lub wycieczki zastęp wg mapy\r\ntopograficznej. Na podstawie mapy topograficznej określiłem długość trasy, nachylenie terenu, przybliżony czas marszu, azymut na\r\ndany punkt. Zmierzyłem w terenie odległość i wysokość.', '8. Kierowałem budową urządzenia obozowego wg własnego projektu. Umiem sprawnie posługiwać się sprzętem pionierskim.\r\nPotrafię zawiązać co najmniej 10 węzłów i ich zastosowanie.', '9. Brałem udział w organizacji wycieczki zastępu lub drużyny.', '10. Wyrobiłem w sobie pożyteczne nawyki ekologiczne (oszczędzam wodę, gaszę światło, segreguję odpady).', '.11. Wiem, co to jest park narodowy, park krajobrazowy i rezerwat przyrody. Wymienię kilka polskich parków narodowych oraz wskażę\r\nwystępujące w nich osobliwości przyrodnicze. Odwiedziłem jeden z parków narodowych, krajobrazowych lub rezerwatów.', '1. Poznaję historię swojej miejscowości. Wiem, co wyróżnia ją spośród innych (np. znane postacie, historyczne wydarzenia, zabytki,\r\nsztuka ludowa).', '2. Wiem, na czym polega demokracja. Brałem udział w demokratycznym podejmowaniu decyzji', 'W okresie próby uczestniczyłem w obozie lub zimowisku harcerskim oraz w co najmniej dwóch biwakach lub rajdach,zrealizowałem co\r\nnajmniej trzy projekty, w tym przynajmniej jeden na rzecz środowiska (np. szkoły, osiedla).'),
(2, 0, 'ćwik', '0000-00-00', 'treść', '', '1. Znam swoje dobre strony. Rozwijam je i potrafię je wykorzystać na rzecz innych.', '2. Poszukuję autorytetów. Czerpię z nich motywację do pracy nad sobą.', '3. Czynnie uczestniczę w formach rozwoju duchowego, np. kuźnica, dyskusja, rekolekcje, pielgrzymka.', '4. Racjonalnie organizuję własny czas. Planuje przebieg dnia, tygodnia.', '5. Znam zasady dobrego wychowania, potrafię ubrać się odpowiednio do sytuacji.\r\n', '6. Potrafię korzystać z osiągnięć postępu technicznego, przestrzegam przy tym zasad kultury (np. znam zasady netykiety,\r\nwiem, jak korzystać z telefonu komórkowego w miejscach publicznych, kontroluję czas spędzany przy komputerze).', '7. Udoskonaliłem swoją technikę uczenia się lub poprawiłem oceny z wybranych przedmiotów szkolnych.', '8. Systematycznie oszczędzam pieniądze na określony cel.', '9. Uczę się języka obcego i potrafię wykorzystać jego znajomość (np. przetłumaczyłem artykuł, nawiązałem\r\nkorespondencję ze skautem lub skautką).', '10. Zrobiłem przegląd swego tygodniowego jadłospisu pod kątem wartości odżywczych, wyciągnąłem wnioski i\r\nwprowadziłem poprawki na przyszłość. Znam skutki niedożywienia i przejadania się.', '11. Potrafię udzielić pierwszej pomocy, w razie potrzeby potrafię zastosować resuscytację (ogól czynności prowadzących do\r\nprzywrócenia podstawowych czynności życiowych).', '12. Włączyłem się do prowadzenia gospodarstwa domowego. W trakcie próby przejąłem na siebie dodatkowe obowiązki.', '13. Załatwiłem sprawy organizacyjne biwaku, wycieczki, obozu (np. zakup biletu zbiorowego, ubezpieczenie, przygotowanie\r\nwykazu potrzebnego sprzętu, prowadzenie rachunków).', '1. Wyspecjalizowałem się w wybranej dziedzinie harcerskiej (techniki harcerskie lub inna dziedzina pomocna w pracy\r\ndrużyny). Kierowałem projektem dotyczącym tej dziedziny.', '2. Przeczytałem przynajmniej jedną książkę, która pogłębiła moją wiedzę o dziejach ruchu harcerskiego lub skautowego.\r\nZaprezentuję innym (w zastępie, drużynie lub w klasie) wybrane zagadnienie lub znaczącą postać z dziejów harcerstwa.', '3. Zorganizowałem według własnego pomysłu akcję zarobkową w drużynie lub nawiązałam pożyteczne dla drużyny\r\nkontakty (z osobą, instytucją).', '4. Znam cele działania Związku Harcerstwa Polskiego.', '1. Jestem wrażliwy na potrzeby drugiego człowieka – świadomie i odpowiedzialnie podejmuje stałą służbę.', '2. Sporządziłem „mapę potrzeb” występujących w najbliższej okolicy i uczestniczyłem w projekcie (zadaniu)\r\nodpowiadającym na którąś ze wskazanych potrzeb.', '3. Orientuję się w bieżących wydarzeniach politycznych, gospodarczych i kulturalnych kraju.', '4. Znam najważniejsze prawa i obowiązki obywateli RP.', '5. Przeprowadziłem zwiad tematyczny (np. poznając przyrodę, kulturę, historię, współczesne życie społeczne i\r\ngospodarcze, poznając ciekawe osoby, mało znane miejsca, zapomniane pamiątki historyczne). Sporządziłem\r\ndokumentację zwiadu (zawierającą np. opisy, wywiady, pamiątki, fotografie,spislektur na wybrany temat). W interesujący\r\nsposób przedstawiłem ją w drużynie.', 'W okresie próby uczestniczyłem w co najmniej trzech projektach', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `punkty`
--

CREATE TABLE IF NOT EXISTS `punkty` (
  `nr` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `za_co` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ile` int(11) NOT NULL,
  `status` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`nr`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Zrzut danych tabeli `punkty`
--

INSERT INTO `punkty` (`nr`, `id`, `data`, `za_co`, `ile`, `status`) VALUES
(23, 1, '2017-03-18 09:03:02', 'obecność na zbiórce', 10, 'zatwierdzono'),
(24, 19, '2017-03-18 09:14:18', 'obecność na zbiórce', 10, 'zatwierdzono'),
(25, 18, '2017-03-18 09:14:33', 'obecność na zbiórce', 10, 'zatwierdzono'),
(26, 20, '2017-03-18 09:14:51', 'obecność na zbiórce', 10, 'zatwierdzono'),
(27, 21, '2017-03-18 09:15:57', 'obecność na zbiórce', 10, 'zatwierdzono'),
(28, 22, '2017-03-18 11:18:13', 'obecność na zbiórce', 10, 'zatwierdzono'),
(30, 23, '2017-03-18 21:57:42', 'obecność na zbiórce', 10, 'zatwierdzono');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specjalne`
--

CREATE TABLE IF NOT EXISTS `specjalne` (
  `nrzadania` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `punkty` int(11) NOT NULL,
  `status` tinytext CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL,
  PRIMARY KEY (`nrzadania`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
