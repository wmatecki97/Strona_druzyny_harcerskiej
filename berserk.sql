-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lut 2017, 17:55
-- Wersja serwera: 10.1.19-MariaDB
-- Wersja PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `berserk`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glosowanie`
--

CREATE TABLE `glosowanie` (
  `nr_glosowania` int(11) NOT NULL,
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
  `v10` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `glosowanie`
--

INSERT INTO `glosowanie` (`nr_glosowania`, `temat`, `status`, `v1`, `v2`, `v3`, `v4`, `v5`, `v6`, `v7`, `v8`, `v9`, `v10`) VALUES
(3, 'styl semestru', 'trwa', 'piwowarski', 'ogladanie filmow', 'glupie zarty', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glosy`
--

CREATE TABLE `glosy` (
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

--
-- Zrzut danych tabeli `glosy`
--

INSERT INTO `glosy` (`id`, `nr_glosowania`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`) VALUES
(1, 3, 300, 400, 535, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osoby`
--

CREATE TABLE `osoby` (
  `id` int(11) NOT NULL,
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
  `rola` tinytext COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `osoby`
--

INSERT INTO `osoby` (`id`, `imie`, `nazwisko`, `rocznik`, `data_dolaczenia`, `nick`, `punkty`, `semestr`, `ranga`, `stopien`, `login`, `haslo`, `rola`) VALUES
(1, 'Wiktor', 'Matecki', 1997, '2017-01-28', 'wiktor', 1235, 335, 'ADMIN', 'MASTER', 'wiktor', '$2y$10$Mp9HZ.o.DFL83eXY3HsUuObvH0aocwMDJvyon66g.70t.AWq1cR7C', 'admin'),
(2, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(3, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(4, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(5, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(6, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(7, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(8, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(9, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(10, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin'),
(11, 'Szymon', 'Socha', 1992, '2017-01-29', 'Szymek', 300, 200, 'Szlachetny', 'MASTER', 'szymon', '$2y$10$AEtDInneIP3SrxUMr8lWIO1Wy040YPaNJnOzQVqLExkeeBHO1jK6O', 'Admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polecajacy`
--

CREATE TABLE `polecajacy` (
  `nowy` int(11) NOT NULL,
  `stary` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `proby`
--

CREATE TABLE `proby` (
  `nr_proby` int(11) NOT NULL,
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
  `26` text COLLATE utf8_unicode_ci NOT NULL,
  `27` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `proby`
--

INSERT INTO `proby` (`nr_proby`, `id`, `realizowany_stopien`, `otwarcie`, `status`, `uwagi`, `zad1`, `zad2`, `zad3`, `zad4`, `zad5`, `zad6`, `zad7`, `zad8`, `zad9`, `zad10`, `zad11`, `zad12`, `zad13`, `zad14`, `zad15`, `zad16`, `zad17`, `zad18`, `zad19`, `zad20`, `zad21`, `zad22`, `zad23`, `zad24`, `zad25`, `26`, `27`) VALUES
(0, 0, 'odkrywca', '0000-00-00', 'treść', '', '1. Określiłem swoją największą słabość i podejmę próbę wyeliminowania jej.', '2. Aktywnie realizuję obowiązki wynikające z mojej wiary.', '3. Wykazałem, że potrafię poświęcić własną przyjemność na rzecz obowiązku.', '4. Zdobyłem nową umiejętność przydatną w gospodarstwie domowym.', '5. Rzetelnie wykonuję swoje obowiązki domowe.\r\n', '6. Zapisuję ustalone terminy i wyznaczone zadania, jestem punktualny i obowiązkowy.\r\n', '7. Wziąłem udział w zaplanowaniu i zorganizowaniu akcji zarobkowej dla drużyny.', '8. Dbam o sprzęt drużyny. Brałem udział w jego konserwacji.', '9. Dbam o zdrowie i pamiętam o aktywnym odpoczynku, odpowiedniej ilości snu, prawidłowym odżywianiu się, umiem radzić sobie z\r\nproblemami okresu dojrzewania.\r\n', '10. Załatwiłem powierzoną mi sprawę w instytucji lub urzędzie.\r\n', '11. Zorganizowałem wyjście zastępu lub drużyny (grupy kolegów) do kina, teatru, na koncert, do muzeum lub inną imprezę kulturalną.', '12. Potrafię w prostych sytuacjach porozumieć się w języku obcym.', '13. Umiejętnie korzystam z Internetu (wyszukuję potrzebne informacje, posiadam adres\r\ne-mail).', '1. Potrafię wskazać główne etapy w dziejach harcerstwa.', '2. Odwiedziłem komendę mojego hufca. Znam adres komendy mojej chorągwi i Głównej Kwatery. Wiem, jak nazywa się komendant\r\nhufca, komendant chorągwi, Naczelnik ZHP\r\ni Przewodniczący ZHP.', '3. Wiem, jakie inne organizacje harcerskie działają w Polsce.\r\n', '4. Czytam książki o tematyce harcerskiej.', '5. Znam strukturę ZHP.', '6. Potrafię ocenić czynności życiowe (tętno i oddech), znam prawidłowe tętno dzieci\r\ni dorosłych. Potrafię postąpić w przypadku utraty przytomności, ułożyć chorego w pozycji bocznej bezpiecznej. Umiem zastosować\r\nróżne sposoby przenoszenia poszkodowanych. Potrafię postępować w przypadku zatrucia pokarmowego.', '7. Odnalazłem na mapie miejsce, w którym się znajduję, poprowadziłem w czasie gry terenowej lub wycieczki zastęp wg mapy\r\ntopograficznej. Na podstawie mapy topograficznej określiłem długość trasy, nachylenie terenu, przybliżony czas marszu, azymut na\r\ndany punkt. Zmierzyłem w terenie odległość i wysokość.', '8. Kierowałem budową urządzenia obozowego wg własnego projektu. Umiem sprawnie posługiwać się sprzętem pionierskim.\r\nPotrafię zawiązać co najmniej 10 węzłów i ich zastosowanie.', '9. Brałem udział w organizacji wycieczki zastępu lub drużyny.', '10. Wyrobiłem w sobie pożyteczne nawyki ekologiczne (oszczędzam wodę, gaszę światło, segreguję odpady).', '.11. Wiem, co to jest park narodowy, park krajobrazowy i rezerwat przyrody. Wymienię kilka polskich parków narodowych oraz wskażę\r\nwystępujące w nich osobliwości przyrodnicze. Odwiedziłem jeden z parków narodowych, krajobrazowych lub rezerwatów.', '1. Poznaję historię swojej miejscowości. Wiem, co wyróżnia ją spośród innych (np. znane postacie, historyczne wydarzenia, zabytki,\r\nsztuka ludowa).', '2. Wiem, na czym polega demokracja. Brałem udział w demokratycznym podejmowaniu decyzji', 'W okresie próby uczestniczyłem w obozie lub zimowisku harcerskim oraz w co najmniej dwóch biwakach lub rajdach,zrealizowałem co\r\nnajmniej trzy projekty, w tym przynajmniej jeden na rzecz środowiska (np. szkoły, osiedla).'),
(1, 0, 'ćwik', '0000-00-00', 'treść', '', '1. Znam swoje dobre strony. Rozwijam je i potrafię je wykorzystać na rzecz innych.', '2. Poszukuję autorytetów. Czerpię z nich motywację do pracy nad sobą.', '3. Czynnie uczestniczę w formach rozwoju duchowego, np. kuźnica, dyskusja, rekolekcje, pielgrzymka.', '4. Racjonalnie organizuję własny czas. Planuje przebieg dnia, tygodnia.', '5. Znam zasady dobrego wychowania, potrafię ubrać się odpowiednio do sytuacji.\r\n', '6. Potrafię korzystać z osiągnięć postępu technicznego, przestrzegam przy tym zasad kultury (np. znam zasady netykiety,\r\nwiem, jak korzystać z telefonu komórkowego w miejscach publicznych, kontroluję czas spędzany przy komputerze).', '7. Udoskonaliłem swoją technikę uczenia się lub poprawiłem oceny z wybranych przedmiotów szkolnych.', '8. Systematycznie oszczędzam pieniądze na określony cel.', '9. Uczę się języka obcego i potrafię wykorzystać jego znajomość (np. przetłumaczyłem artykuł, nawiązałem\r\nkorespondencję ze skautem lub skautką).', '10. Zrobiłem przegląd swego tygodniowego jadłospisu pod kątem wartości odżywczych, wyciągnąłem wnioski i\r\nwprowadziłem poprawki na przyszłość. Znam skutki niedożywienia i przejadania się.', '11. Potrafię udzielić pierwszej pomocy, w razie potrzeby potrafię zastosować resuscytację (ogól czynności prowadzących do\r\nprzywrócenia podstawowych czynności życiowych).', '12. Włączyłem się do prowadzenia gospodarstwa domowego. W trakcie próby przejąłem na siebie dodatkowe obowiązki.', '13. Załatwiłem sprawy organizacyjne biwaku, wycieczki, obozu (np. zakup biletu zbiorowego, ubezpieczenie, przygotowanie\r\nwykazu potrzebnego sprzętu, prowadzenie rachunków).', '1. Wyspecjalizowałem się w wybranej dziedzinie harcerskiej (techniki harcerskie lub inna dziedzina pomocna w pracy\r\ndrużyny). Kierowałem projektem dotyczącym tej dziedziny.', '2. Przeczytałem przynajmniej jedną książkę, która pogłębiła moją wiedzę o dziejach ruchu harcerskiego lub skautowego.\r\nZaprezentuję innym (w zastępie, drużynie lub w klasie) wybrane zagadnienie lub znaczącą postać z dziejów harcerstwa.', '3. Zorganizowałem według własnego pomysłu akcję zarobkową w drużynie lub nawiązałam pożyteczne dla drużyny\r\nkontakty (z osobą, instytucją).', '4. Znam cele działania Związku Harcerstwa Polskiego.', '1. Jestem wrażliwy na potrzeby drugiego człowieka – świadomie i odpowiedzialnie podejmuje stałą służbę.', '2. Sporządziłem „mapę potrzeb” występujących w najbliższej okolicy i uczestniczyłem w projekcie (zadaniu)\r\nodpowiadającym na którąś ze wskazanych potrzeb.', '3. Orientuję się w bieżących wydarzeniach politycznych, gospodarczych i kulturalnych kraju.', '4. Znam najważniejsze prawa i obowiązki obywateli RP.', '5. Przeprowadziłem zwiad tematyczny (np. poznając przyrodę, kulturę, historię, współczesne życie społeczne i\r\ngospodarcze, poznając ciekawe osoby, mało znane miejsca, zapomniane pamiątki historyczne). Sporządziłem\r\ndokumentację zwiadu (zawierającą np. opisy, wywiady, pamiątki, fotografie,spislektur na wybrany temat). W interesujący\r\nsposób przedstawiłem ją w drużynie.', 'W okresie próby uczestniczyłem w co najmniej trzech projektach', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `punkty`
--

CREATE TABLE `punkty` (
  `nr` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `za_co` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `ile` int(11) NOT NULL,
  `status` tinytext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `punkty`
--

INSERT INTO `punkty` (`nr`, `id`, `data`, `za_co`, `ile`, `status`) VALUES
(1, 1, '2017-01-30 00:00:00', 'zdobycie zloego grala', 200, 'zweryfikowano'),
(2, 1, '2017-01-30 00:00:00', 'organizacja zbiórki', 10, 'zatwierdzono'),
(3, 0, '0000-00-00 00:00:00', '', 0, ''),
(4, 0, '2017-01-30 00:00:00', '', 0, ''),
(5, 1, '2017-01-30 22:16:58', 'obecność na zbiórce', 10, 'zweryfikowano'),
(6, 1, '2017-01-30 22:17:28', 'obecność na zbiórce', 10, 'zatwierdzono'),
(7, 1, '2017-01-30 22:24:56', 'za darmo', 15, 'zatwierdzono'),
(8, 1, '2017-01-31 00:58:05', 'obecność na zbiórce', 10, 'odrzucono'),
(9, 1, '2017-01-31 01:00:05', 'obecność na zbiórce', 10, 'odrzucono'),
(10, 1, '2017-02-02 12:03:27', 'obecność na zbiórce', 10, 'weryfikacja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specjalne`
--

CREATE TABLE `specjalne` (
  `nrzadania` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `punkty` int(11) NOT NULL,
  `status` tinytext CHARACTER SET utf32 COLLATE utf32_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `glosowanie`
--
ALTER TABLE `glosowanie`
  ADD PRIMARY KEY (`nr_glosowania`);

--
-- Indexes for table `osoby`
--
ALTER TABLE `osoby`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `polecajacy`
--
ALTER TABLE `polecajacy`
  ADD PRIMARY KEY (`nowy`,`stary`);

--
-- Indexes for table `proby`
--
ALTER TABLE `proby`
  ADD PRIMARY KEY (`nr_proby`);

--
-- Indexes for table `punkty`
--
ALTER TABLE `punkty`
  ADD PRIMARY KEY (`nr`);

--
-- Indexes for table `specjalne`
--
ALTER TABLE `specjalne`
  ADD PRIMARY KEY (`nrzadania`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `glosowanie`
--
ALTER TABLE `glosowanie`
  MODIFY `nr_glosowania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `osoby`
--
ALTER TABLE `osoby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `punkty`
--
ALTER TABLE `punkty`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `specjalne`
--
ALTER TABLE `specjalne`
  MODIFY `nrzadania` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
