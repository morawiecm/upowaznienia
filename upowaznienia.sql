-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Wrz 2016, 15:20
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `upowaznienia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `dataBackupu` datetime NOT NULL,
  `nazwaBackupu` text COLLATE utf8_polish_ci NOT NULL,
  `ktoUtworzyl` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ewidencja_upowaznienia`
--

CREATE TABLE `ewidencja_upowaznienia` (
  `id` int(11) NOT NULL,
  `id_usera_rejestracja` int(11) NOT NULL,
  `data_rejestracji` datetime NOT NULL,
  `nr_kadrowy` text COLLATE utf8_polish_ci NOT NULL,
  `imie_nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `nr_upowaznienia` text COLLATE utf8_polish_ci NOT NULL,
  `typ_wniosku` int(11) NOT NULL,
  `data_nadania` date NOT NULL,
  `data_ustania` date NOT NULL,
  `kto_edytowal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ewidencja_upowaznienia`
--

INSERT INTO `ewidencja_upowaznienia` (`id`, `id_usera_rejestracja`, `data_rejestracji`, `nr_kadrowy`, `imie_nazwisko`, `nr_upowaznienia`, `typ_wniosku`, `data_nadania`, `data_ustania`, `kto_edytowal`) VALUES
(1, 1, '2016-09-20 11:18:08', 'A18184', 'Morawiec Mariusz', '2/2016', 2, '2016-01-01', '0000-00-00', 0),
(2, 1, '2016-09-20 13:40:18', '123456', 'Jan Iks', '3/2016', 2, '2012-02-02', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista_zmian`
--

CREATE TABLE `lista_zmian` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `top` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `grupa` int(11) NOT NULL,
  `imie` text NOT NULL,
  `typ_osoby` int(11) NOT NULL,
  `nazwisko` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `wydzial` varchar(255) NOT NULL,
  `sekcja` text NOT NULL,
  `pomieszczenie` text NOT NULL,
  `logowanie_data` varchar(255) NOT NULL,
  `uprawienia` text NOT NULL,
  `specialne` int(11) DEFAULT NULL,
  `logowanie_ip` text NOT NULL,
  `funkcja` int(11) NOT NULL,
  `user_regdate` int(10) UNSIGNED NOT NULL,
  `data_ustania_uprawnien` date NOT NULL,
  `data_zmiany_hasla` date NOT NULL,
  `data_niepoprawnego_logowania` datetime NOT NULL,
  `liczba_niepoprawnych_logowan` int(11) NOT NULL,
  `aktywny` int(11) NOT NULL,
  `reset_hasla` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `grupa`, `imie`, `typ_osoby`, `nazwisko`, `user_email`, `wydzial`, `sekcja`, `pomieszczenie`, `logowanie_data`, `uprawienia`, `specialne`, `logowanie_ip`, `funkcja`, `user_regdate`, `data_ustania_uprawnien`, `data_zmiany_hasla`, `data_niepoprawnego_logowania`, `liczba_niepoprawnych_logowan`, `aktywny`, `reset_hasla`) VALUES
(1, 'admin', '482de21110d50380a8a74cc86745dc884d9551c4', 1, 'Mariusz', 0, 'Morawiec', 'morawiec@vp.pl', 'Wydział Łączności i Informatyki', 'Sekcja Wsparcia Merytorycznego i Technologii', '', '2016-08-31, 15:24', '1', 1, '::1', 0, 1413359118, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0),
(2, 'arkadiusz.hatlas', '482de21110d50380a8a74cc86745dc884d9551c4', 0, 'Arkadiusz', 0, 'Hatłas', 'arkadiusz.hatlas@go.policja.gov.pl', 'Ochrony Informacji Niejawnych', '', '', '', '1', 1, '', 1, 1474353427, '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ustawienia`
--

CREATE TABLE `ustawienia` (
  `id` int(11) NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `funkcja` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ustawienia`
--

INSERT INTO `ustawienia` (`id`, `tresc`, `funkcja`) VALUES
(1, '01/10/2016', 'data wersji programu'),
(2, '3', 'nr upowaznienia'),
(3, '1.0', 'wersja progamu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_grupy`
--

CREATE TABLE `uzytkownicy_grupy` (
  `id` int(11) NOT NULL,
  `nazwa_grupy` text COLLATE utf8_polish_ci NOT NULL,
  `id_kierownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy_grupy`
--

INSERT INTO `uzytkownicy_grupy` (`id`, `nazwa_grupy`, `id_kierownika`) VALUES
(1, 'OIN', 2),
(2, 'Policjanci', 2),
(3, 'Cywile', 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ewidencja_upowaznienia`
--
ALTER TABLE `ewidencja_upowaznienia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lista_zmian`
--
ALTER TABLE `lista_zmian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ustawienia`
--
ALTER TABLE `ustawienia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy_grupy`
--
ALTER TABLE `uzytkownicy_grupy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `ewidencja_upowaznienia`
--
ALTER TABLE `ewidencja_upowaznienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `lista_zmian`
--
ALTER TABLE `lista_zmian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy_grupy`
--
ALTER TABLE `uzytkownicy_grupy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
