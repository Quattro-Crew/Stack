-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 20, 2025 at 01:37 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiszki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fiszka`
--

CREATE TABLE `fiszka` (
  `id` int(11) NOT NULL,
  `poziom` int(11) NOT NULL,
  `tresc` text NOT NULL,
  `nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fiszka`
--

INSERT INTO `fiszka` (`id`, `poziom`, `tresc`, `nazwa`) VALUES
(1, 1, 'Giełda to rynek, na którym kupuje się i sprzedaje papiery wartościowe, takie jak akcje i obligacje.', 'Co to jest giełda?'),
(2, 1, 'Akcja to papier wartościowy potwierdzający udział w kapitale spółki.', 'Akcja'),
(3, 1, 'Obligacja to dłużny papier wartościowy — kupujący pożycza pieniądze emitentowi.', 'Obligacja'),
(4, 1, 'Indeks to wskaźnik, który pokazuje zmiany cen grupy wybranych akcji (np. WIG20).', 'Indeks giełdowy'),
(5, 1, 'GPW to Giełda Papierów Wartościowych w Warszawie – główna giełda w Polsce.', 'GPW'),
(6, 1, 'Makler to osoba pośrednicząca w transakcjach na giełdzie.', 'Makler'),
(7, 1, 'To instrukcja kupna lub sprzedaży akcji złożona na giełdzie.', 'Zlecenie giełdowe'),
(8, 1, 'Miejsce, gdzie papiery wartościowe trafiają do inwestorów po raz pierwszy.', 'Rynek pierwotny'),
(9, 1, 'Miejsce, gdzie inwestorzy odsprzedają papiery między sobą.', 'Rynek wtórny'),
(10, 1, 'Część zysku spółki wypłacana akcjonariuszom.', 'Dywidenda'),
(11, 2, 'Okres długotrwałego wzrostu cen akcji na giełdzie.', 'Hossa'),
(12, 2, 'Okres długotrwałych spadków cen akcji.', 'Bessa'),
(13, 2, 'Zbiór aktywów finansowych posiadanych przez inwestora.', 'Portfel inwestycyjny'),
(14, 2, 'Strategia zmniejszająca ryzyko przez inwestowanie w różne aktywa.', 'Dywersyfikacja'),
(15, 2, 'Zysk ze sprzedaży akcji po wyższej cenie niż zakupiona.', 'Zysk kapitałowy'),
(16, 2, 'Metoda oceny papierów wartościowych na podstawie wykresów i trendów cen.', 'Analiza techniczna'),
(17, 2, 'Ocena wartości spółki na podstawie jej danych finansowych i otoczenia rynkowego.', 'Analiza fundamentalna'),
(18, 2, 'Firma, której akcje są notowane na giełdzie.', 'Spółka notowana'),
(19, 2, 'Pierwsza oferta publiczna – debiut spółki na giełdzie.', 'IPO'),
(20, 2, 'Liczba transakcji danego papieru w określonym czasie.', 'Wolumen'),
(21, 3, 'Stosunek ceny akcji do zysku na jedną akcję – wskaźnik wyceny spółki.', 'P/E Ratio'),
(22, 3, 'Sprzedaż akcji pożyczonych z zamiarem ich odkupu po niższej cenie.', 'Short selling'),
(23, 3, 'Inwestowanie z wykorzystaniem pożyczonych środków.', 'Dźwignia finansowa'),
(24, 3, 'Fundusz notowany na giełdzie, odwzorowujący wyniki indeksu lub sektora.', 'ETF'),
(25, 3, 'Zlecenie sprzedaży w celu ograniczenia strat.', 'Stop loss'),
(26, 3, 'Indeks siły względnej – wskaźnik analizy technicznej.', 'RSI'),
(27, 3, 'Wartość wszystkich akcji spółki (liczba akcji × cena).', 'Kapitalizacja rynkowa'),
(28, 3, 'Kwota, jaką musisz mieć, by otworzyć pozycję z dźwignią.', 'Marża zabezpieczająca'),
(29, 3, 'Podział jednej akcji na kilka nowych, o niższej cenie.', 'Split akcji'),
(30, 3, 'Korekta portfela, by utrzymać założony podział aktywów.', 'Rebalansowanie'),
(31, 4, 'Polityka banku centralnego polegająca na skupie aktywów w celu pobudzenia gospodarki.', 'Quantitative easing'),
(32, 4, 'Miara zmienności akcji w stosunku do rynku.', 'Beta'),
(33, 4, 'Instrumenty pochodne dające prawo (ale nie obowiązek) kupna lub sprzedaży aktywa.', 'Opcje'),
(34, 4, 'Credit Default Swap – ubezpieczenie od niewypłacalności obligacji.', 'CDS'),
(35, 4, 'Model wyceny aktywów kapitałowych, opisujący zależność ryzyka i oczekiwanego zysku.', 'CAPM'),
(36, 4, 'Testowanie strategii inwestycyjnej na danych historycznych.', 'Backtesting'),
(37, 4, 'Wykorzystanie różnic cen tego samego aktywa na różnych rynkach.', 'Arbitrage'),
(38, 4, 'Miara efektywności inwestycji – stosunek zysku do ryzyka.', 'Sharpe ratio'),
(39, 4, 'Nagły i gwałtowny spadek cen na rynku, zwykle spowodowany handlem algorytmicznym.', 'Flash crash'),
(40, 4, 'Prywatne platformy obrotu, umożliwiające duże transakcje poza publiczną giełdą.', 'Dark pools');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `fiszka`
--
ALTER TABLE `fiszka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fiszka`
--
ALTER TABLE `fiszka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
