-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Lip 2022, 15:03
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `transport`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authorization`
--

CREATE TABLE `authorization` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `TicketDate` datetime NOT NULL,
  `FileTranslationName` varchar(255) NOT NULL,
  `FileTransferName` varchar(255) NOT NULL,
  `Authorization` varchar(255) NOT NULL,
  `FolderName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `authorization`
--

INSERT INTO `authorization` (`id`, `Username`, `TicketDate`, `FileTranslationName`, `FileTransferName`, `Authorization`, `FolderName`) VALUES
(1, 'maciek', '2022-05-05 23:28:27', 'maciek050522Sprawozdanie_2 (3).pdf', 'maciek050522Sprawozdanie_2 (2).pdf', 'E:XAMPP	mpphp4864.tmp', 'maciek050522'),
(2, 'maciek', '2022-05-05 23:30:02', 'maciek050522Sprawozdanie_2 (3).pdf', 'maciek050522Sprawozdanie_2 (2).pdf', 'E:XAMPP	mpphpBD73.tmp', 'maciek050522'),
(3, 'maciek', '2022-05-05 23:32:28', 'maciek050522Sprawozdanie_2 (3).pdf', 'maciek050522Sprawozdanie_2 (2).pdf', 'E:XAMPP	mpphpF510.tmp', 'maciek050522'),
(4, 'maciek', '2022-05-05 23:34:49', 'maciek050522Sprawozdanie_2 (3).pdf', 'maciek050522Sprawozdanie_2 (2).pdf', 'maciek050522Sprawozdanie_2 (1).pdf', 'maciek050522'),
(5, 'maciek', '2022-05-05 23:37:24', 'maciek050522Sprawozdanie_2 (3).pdf', 'maciek050522Sprawozdanie_2 (2).pdf', 'maciek050522Sprawozdanie_2 (1).pdf', 'maciek050522');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `idZgloszenia` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `nazwaUzytkownika` varchar(255) NOT NULL,
  `tresc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `idZgloszenia`, `data`, `nazwaUzytkownika`, `tresc`) VALUES
(1, 71, '2022-07-04 22:35:07', 'Admin', 'Test 1'),
(2, 71, '2022-07-04 22:36:14', 'Admin', 'Test 2'),
(3, 71, '2022-07-04 22:36:38', 'Admin', 'Test 3'),
(4, 71, '2022-07-04 23:06:49', 'Admin', 'Test 4\r\n\r\nAAA'),
(5, 70, '2022-07-04 23:07:38', 'maciek', 'Test 1 konto maciek'),
(6, 70, '2022-07-04 23:08:05', 'Admin', 'Test 2\r\nodpowiedz admina'),
(7, 70, '2022-07-05 10:17:05', 'maciek', 'Test 3'),
(8, 71, '2022-07-12 11:32:29', 'Admin', 'Test 5\r\n\r\naaa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Company_Name` varchar(255) NOT NULL,
  `Eori` varchar(255) NOT NULL,
  `Contact_Email` varchar(255) NOT NULL,
  `Contact_Number` varchar(255) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `contact`
--

INSERT INTO `contact` (`id`, `Date`, `Subject`, `Company_Name`, `Eori`, `Contact_Email`, `Contact_Number`, `Message`) VALUES
(1, '2022-06-08 12:21:04', 'Contact1', 'Contact1', 'Contact1', 'Contact1@wp.pl', 'Contact1', 'Contact1Contact1Contact1Contact1'),
(2, '2022-06-08 12:23:48', 'Contact2', 'Contact2', 'Contact2', 'Contact2', '', 'Contact2Contact2'),
(3, '2022-06-08 12:24:13', 'Contact3', 'Contact3', 'Contact3', 'Contact3', '', 'Contact3Contact3'),
(4, '2022-06-08 12:26:28', 'Contact4', 'Contact4', 'Contact4', 'Contact4@wp.pl', '', 'Contact4Contact4'),
(5, '2022-06-08 12:28:13', 'Contact5', 'Contact5', 'Contact5', 'Contact5@wp.pl', '', 'Contact5Contact5Contact5'),
(6, '2022-06-08 16:39:57', 'Contact6', 'Contact6', 'Contact6', 'Contact6@wp.pl', 'Contact6', 'Contact6Contact6Contact6Contact6');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `TicketDate` datetime NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Eori` varchar(100) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `VehicleNationality` varchar(150) NOT NULL,
  `PostalCode` varchar(50) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `RegistrationNumber` varchar(100) NOT NULL,
  `DepartureName` varchar(100) NOT NULL,
  `TransportName` varchar(100) NOT NULL,
  `DepartureNumber` varchar(50) NOT NULL,
  `TransportNumber` varchar(50) NOT NULL,
  `DateArrival` datetime NOT NULL,
  `ImportAlso` varchar(10) NOT NULL,
  `DestiantionName` varchar(100) NOT NULL,
  `DestinationNumber` varchar(100) NOT NULL,
  `DateDriverArrival` datetime NOT NULL,
  `T1` varchar(20) NOT NULL,
  `CountryOfOrigin` varchar(100) NOT NULL,
  `CommodityCode` varchar(100) NOT NULL,
  `DescriptionOfGoods` varchar(255) NOT NULL,
  `PackagesType` varchar(100) NOT NULL,
  `NetWeight` varchar(100) NOT NULL,
  `GrossWeight` varchar(100) NOT NULL,
  `ItemValue` varchar(100) NOT NULL,
  `Currency` varchar(30) NOT NULL,
  `Quantity` varchar(100) NOT NULL,
  `TotalPackages` varchar(100) NOT NULL,
  `TotalNetWeight` varchar(100) NOT NULL,
  `TotalGrossWeight` varchar(100) NOT NULL,
  `InvoiceNumber` varchar(150) NOT NULL,
  `TotalValue` varchar(150) NOT NULL,
  `FreightCharges` varchar(40) NOT NULL,
  `Incoterms` varchar(255) NOT NULL,
  `AdditionalNotes` varchar(300) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `FileInvoiceName` varchar(255) NOT NULL,
  `FileAwbCmrName` varchar(255) NOT NULL,
  `FileAddDocName` varchar(255) NOT NULL,
  `FolderName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `tickets`
--

INSERT INTO `tickets` (`id`, `Username`, `Type`, `TicketDate`, `Status`, `Eori`, `PhoneNumber`, `Address`, `Email`, `City`, `VehicleNationality`, `PostalCode`, `Street`, `Number`, `Country`, `RegistrationNumber`, `DepartureName`, `TransportName`, `DepartureNumber`, `TransportNumber`, `DateArrival`, `ImportAlso`, `DestiantionName`, `DestinationNumber`, `DateDriverArrival`, `T1`, `CountryOfOrigin`, `CommodityCode`, `DescriptionOfGoods`, `PackagesType`, `NetWeight`, `GrossWeight`, `ItemValue`, `Currency`, `Quantity`, `TotalPackages`, `TotalNetWeight`, `TotalGrossWeight`, `InvoiceNumber`, `TotalValue`, `FreightCharges`, `Incoterms`, `AdditionalNotes`, `Name`, `Surname`, `FileInvoiceName`, `FileAwbCmrName`, `FileAddDocName`, `FolderName`) VALUES
(1, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(2, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(3, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(4, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(5, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(6, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(7, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(8, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(9, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(10, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(11, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(12, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(13, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(14, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(15, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(16, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(17, '', '[value-2]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(18, '', '[export]', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(19, '', 'export', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(20, '', 'export', '0000-00-00 00:00:00', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(21, '', 'export', '2022-04-28 00:20:40', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(22, '', 'export', '2022-04-28 00:22:53', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(23, '', 'export', '2022-04-28 00:25:25', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(24, '', 'export', '2022-04-28 10:32:15', 'sent', '2', '2', '2', 'maciejcieplowski@gmail.com', '2', 'Poland', '[value-11]', '[value-12]', '[value-13]', '[value-14]', '[value-15]', '[value-16]', '[value-17]', '[value-18]', '[value-19]', '0000-00-00 00:00:00', '[value-21]', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(25, '', 'export', '2022-04-28 10:35:26', 'sent', '2', '2', '2', 'maciejcieplowski@gmail.com', '2', 'Poland', '2', '2', '2', 'Poland', '2', '2', '2', '2', '2', '2022-04-28 00:26:00', 'yes', '[value-22]', '[value-23]', '0000-00-00 00:00:00', '[value-25]', '[value-26]', '[value-27]', '[value-28]', '[value-29]', '[value-30]', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(26, '', 'export', '2022-04-28 10:37:48', 'sent', '2', '2', '2', 'maciejcieplowski@gmail.com', '2', 'Poland', '2', '2', '2', 'Poland', '2', '2', '2', '2', '2', '2022-04-28 00:26:00', 'yes', 'yes', '2', '2022-04-28 04:22:00', 'yes', '2', '2', '2', 'pallets', '2', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(27, '', 'export', '2022-04-28 10:40:03', 'sent', '3', '3', '3', '3@wp.pl', '3', 'Poland', '3', '3', '3', 'Poland', '3', '3', '3', '3', '3', '2022-04-28 10:44:00', 'yes', 'yes', '3', '2022-04-28 10:44:00', 'yes', '3', '3', '3', 'pallets', '3', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(28, '', 'export', '2022-04-28 10:41:44', 'sent', '3', '3', '3', '3@wp.pl', '3', 'Poland', '3', '3', '3', 'Poland', '3', '3', '3', '3', '3', '2022-04-28 10:44:00', 'yes', 'yes', '3', '2022-04-28 10:44:00', 'yes', '3', '3', '3', 'pallets', '3', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(29, '', 'export', '2022-04-28 10:42:43', 'sent', '3', '3', '3', '3@wp.pl', '3', 'Poland', '3', '3', '3', 'Poland', '3', '3', '3', '3', '3', '2022-04-28 10:44:00', 'yes', 'yes', '3', '2022-04-28 10:44:00', 'yes', '3', '3', '3', 'pallets', '3', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(30, '', 'export', '2022-04-28 10:43:47', 'sent', '3', '3', '3', '3@wp.pl', '3', 'Poland', '3', '3', '3', 'Poland', '3', '3', '3', '3', '3', '2022-04-28 10:44:00', 'yes', 'yes', '3', '2022-04-28 10:44:00', 'yes', '3', '3', '3', 'pallets', '3', '[value-31]', '[value-32]', '[value-33]', '[value-34]', '[value-35]', '[value-36]', '[value-37]', '[value-38]', '[value-39]', '[value-40]', '', '[value-41]', '[value-42]', '[value-43]', '', '', '', ''),
(31, '', 'export', '2022-04-28 10:47:12', 'sent', '+48692334807', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(32, '', 'export', '2022-04-28 10:48:28', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(33, '', 'export', '2022-04-28 10:51:00', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(34, '', 'export', '2022-04-28 10:51:20', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(35, '', 'export', '2022-04-28 10:52:58', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(36, '', 'export', '2022-04-28 10:57:29', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(37, '', 'export', '2022-04-28 10:57:29', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(38, '', 'export', '2022-04-28 11:02:38', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(39, '', 'export', '2022-04-28 11:02:38', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(40, '', 'export', '2022-04-28 11:05:43', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(41, '', 'export', '2022-04-28 11:05:43', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(42, '', 'export', '2022-04-28 11:07:09', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(43, '', 'export', '2022-04-28 11:07:09', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(44, '', 'export', '2022-04-28 11:08:05', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(45, '', 'export', '2022-04-28 11:08:05', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(46, '', 'export', '2022-04-28 11:11:44', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(47, '', 'export', '2022-04-28 11:11:44', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(48, '', 'export', '2022-04-28 11:12:30', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(49, '', 'export', '2022-04-28 11:12:30', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-30 10:00:00', 'no', 'no', '123', '2022-04-28 10:50:00', 'yes', 'Polska', '123', '1234565aaaaaaaaaaaa', 'in_bulk', '123.8', '60.2', '1000', 'euro', '123', '123', '123.9', '123', '1234', '1231231', 'no', '', '11111', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(50, '', 'export', '2022-04-28 11:14:27', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'England', '123', '123', '123', '123', '123', '2022-04-28 11:18:00', 'yes', 'yes', '123', '2022-04-28 11:18:00', 'yes', '123', '123', '123', 'pallets', '123', '123', '132', 'dolar', '123', '123', '123', '123', '123', '123', 'no', '', '123', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(51, '', 'export', '2022-04-28 11:14:27', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'England', '123', '123', '123', '123', '123', '2022-04-28 11:18:00', 'yes', 'yes', '123', '2022-04-28 11:18:00', 'yes', '123', '123', '123', 'pallets', '123', '123', '132', 'dolar', '123', '123', '123', '123', '123', '123', 'no', '', '123', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(52, '', 'export', '2022-04-28 11:22:43', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'England', '123', '123', '123', '123', '123', '2022-04-28 11:18:00', 'yes', 'yes', '123', '2022-04-28 11:18:00', 'yes', '123', '123', '123', 'pallets', '123', '123', '132', 'dolar', '123', '123', '123', '123', '123', '123', 'no', '', '123', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(53, '', 'export', '2022-04-28 11:23:29', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'England', '123', '123', '123', '123', '123', '2022-04-28 11:18:00', 'yes', 'yes', '123', '2022-04-28 11:18:00', 'yes', '123', '123', '123', 'pallets', '123', '123', '132', 'dolar', '123', '123', '123', '123', '123', '123', 'no', '', '123', 'Maciej Ciepłowski', 'Ciepłowski', '', '', '', ''),
(54, '', 'export', '2022-04-28 12:36:34', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', '', '', '', ''),
(55, '', 'export', '2022-04-28 12:37:06', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', '', '', '', ''),
(56, '', 'export', '2022-04-28 12:39:15', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', '', '', '', ''),
(57, '', 'export', '2022-04-28 12:41:22', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', '', '', '', ''),
(58, '', 'export', '2022-04-28 12:42:14', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', '', '', '', ''),
(59, '', 'export', '2022-04-28 12:42:39', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', '', '', '', ''),
(60, '', 'export', '2022-04-28 12:43:52', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', '', '', '', ''),
(61, '', 'export', '2022-04-28 12:46:47', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', 'maciek280422Sprawozdanie_2 (2).pdf', '', '', ''),
(62, '', 'export', '2022-04-28 12:49:40', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', 'maciek280422Sprawozdanie_2 (2).pdf', 'maciek280422baza.pdf', 'maciek280422python.pdf', ''),
(63, 'maciek', 'export', '2022-04-28 12:56:51', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', 'dep number', '1', '2022-04-28 12:38:00', 'yes', 'yes', 'dest number', '2022-04-28 14:33:00', 'yes', 'Polska', '123', '123', 'pallets', '321', '132', '123', 'euro', '123', '312', '123', '12312', '123', '312', 'yes', '', '3123', 'Maciej Ciepłowski', '312', 'maciek280422Sprawozdanie_2 (2).pdf', 'maciek280422baza.pdf', 'maciek280422python.pdf', ''),
(64, 'maciek', 'export', '2022-04-29 01:26:05', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-29 07:25:00', 'yes', 'yes', '123', '2022-04-29 01:29:00', 'yes', '123', '123', '123', 'pallets', '123', '123', '123', 'euro', '123', '123123', '123', '123', '123', '123', 'yes', '', '123', 'Maciej Ciepłowski', 'Ciepłowski', 'maciek290422Sprawozdanie_2 (2).pdf', 'maciek290422Sprawozdanie_2 (1).pdf', 'maciek290422Sprawozdanie_2.pdf', ''),
(65, 'maciek', 'export', '2022-04-29 10:16:55', 'sent', '123', '+48692334807', '123', 'maciejcieplowski@gmail.com', '123', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', '123', '123', '123', '123', '2022-04-29 13:16:00', 'yes', 'yes', '123', '2022-04-29 10:19:00', 'yes', '123', '123', '123', 'pallets', '123', '123', '123', 'euro', '123', '123', '123', '1231', '123', '213', 'no', '', '123', '123', '123', 'maciek290422Sprawozdanie_2 (2).pdf', 'maciek290422Sprawozdanie_2 (1).pdf', 'maciek290422Sprawozdanie_2.pdf', ''),
(66, 'Admin', 'import', '2022-05-04 12:52:00', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', 'null', 'null', 'null', 'null', '0000-00-00 00:00:00', 'null', 'null', '123', '2022-05-04 12:39:00', 'null', 'Polska', '123', '123', 'cartons', '123', '123', '123', 'euro', '123', '123', '123', '123', '123', '123', 'no', '', '123', 'Maciej Ciepłowski', 'Ciepłowski', 'Admin0405221651661520Sprawozdanie_2 (3).pdf', 'Admin0405221651661520Sprawozdanie_2 (2).pdf', 'Admin0405221651661520Sprawozdanie_2 (1).pdf', ''),
(67, 'Admin', 'import', '2022-05-04 12:57:48', 'sent', '123456', '+48692334807', 'Targowa', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'Poland', '123', 'null', 'null', 'null', 'null', '0000-00-00 00:00:00', 'null', 'null', '123', '2022-05-04 12:39:00', 'null', 'Polska', '123', '123', 'cartons', '123', '123', '123', 'euro', '123', '123', '123', '123', '123', '123', 'no', '', '123', 'Maciej Ciepłowski', 'Ciepłowski', 'Admin040522Sprawozdanie_2 (3).pdf', 'Admin040522Sprawozdanie_2 (2).pdf', 'Admin040522Sprawozdanie_2 (1).pdf', 'Admin040522'),
(68, 'maciek', 'export', '2022-05-05 16:48:47', 'sent', 'test1', '+48692334807', 'test1', 'maciejcieplowski@gmail.com', 'Biłoraj', 'Poland', '23-400', 'Targowa', '7', 'England', 'test1', 'test1', 'test1', 'test1', 'test1', '2022-05-05 16:53:00', 'no', 'no', 'test1', '0000-00-00 00:00:00', 'yes', 'test1', 'test1', 'test1', 'pallets', 'test1', 'test1', 'test1', 'dolar', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'in the european union', 'test1', 'test1', 'test1', 'test1', 'maciek050522Sprawozdanie_2 (3).pdf', 'maciek050522Sprawozdanie_2 (2).pdf', 'maciek050522Sprawozdanie_2 (1).pdf', 'maciek050522'),
(69, 'Admin', 'import', '2022-05-05 18:32:20', 'sent', 'test2', 'test2', 'test2', 'test2@wp.pl', 'test2', 'England', 'test2', 'test2v', 'test2', 'Poland', 'test2', 'null', 'null', 'null', 'null', '0000-00-00 00:00:00', 'null', 'test2', 'test2', '2022-05-05 18:34:00', 'null', 'test2', 'test2', 'test2', 'pallets', 'test2', 'test2', 'test2', 'euro', 'vtest2', 'test2', 'test2', 'test2', 'test2', 'test2test2', 'in the european union', 'vtest2', 'test2', 'test2', 'test2', 'Admin050522Sprawozdanie_2 (3).pdf', 'Admin050522Sprawozdanie_2 (2).pdf', 'Admin050522Sprawozdanie_2 (1).pdf', 'Admin050522'),
(70, 'maciek', 'export', '2022-06-08 18:34:20', 'sent', 'Test', 'Test', 'Test', 'Test@wp.pl', 'Test', 'Poland', 'Test', 'Test', 'Test', 'Poland', 'Test', 'Test', 'Test', 'Test', 'Test', '2022-06-08 18:37:00', 'no', 'Test', 'Test', '2022-06-08 18:38:00', 'yes', 'Test', 'Test', 'Test', 'pallets', 'Test', 'Test', 'Test', 'dolar', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'in the european union', 'Test', 'Test', 'Test', 'Test', 'maciek080622upoważnienie_bezpośrednie_stałe_WEGA (2).pdf', 'maciek080622upoważnienie_bezpośrednie_jednorazowe_WEGA (7).pdf', 'maciek080622direct_Authorisation_ENG_PL_WEGA-A_one-time.pdf', 'maciek080622'),
(71, 'Test', 'import', '2022-06-08 18:36:26', 'sent', 'Test', 'Test', 'Test', 'Test@wp.pl', 'Test', 'England', 'Test', 'Test', 'Test', 'Poland', 'Test', 'null', 'null', 'null', 'null', '0000-00-00 00:00:00', 'null', 'TestTest', 'Test', '2022-06-08 18:37:00', 'null', 'Test', 'Test', 'Test', 'pallets', 'Test', 'vTest', 'Test', 'euro', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'in the european union', 'Test', 'Test', 'Test', 'Test', 'Test080622upoważnienie_bezpośrednie_stałe_WEGA (2).pdf', 'Test080622upoważnienie_bezpośrednie_jednorazowe_WEGA (7).pdf', 'Test080622direct_Authorisation_ENG_PL_WEGA-A_permanent (1).pdf', 'Test080622');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyAddress1` varchar(255) NOT NULL,
  `CompanyAddress2` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `EmailCompany` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `VatAccounting` varchar(100) NOT NULL,
  `EoriNumber` varchar(255) NOT NULL,
  `CompanyRegNo` varchar(255) NOT NULL,
  `DutyDefermentAccount` varchar(255) NOT NULL,
  `Currency` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `PositionInCompany` varchar(255) NOT NULL,
  `Consent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `CompanyName`, `CompanyAddress1`, `CompanyAddress2`, `City`, `Country`, `EmailCompany`, `Phone`, `VatAccounting`, `EoriNumber`, `CompanyRegNo`, `DutyDefermentAccount`, `Currency`, `FirstName`, `LastName`, `PositionInCompany`, `Consent`) VALUES
(13, 'user1', 'user1@wp.pl', '$2y$10$Eb6vq0brq5vbIy20/L4PDuo2mpkN5p0c9b3Gtoh44vsRVgneP/5Ze', 'user', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'user2', 'user2@wp.pl', '$2y$10$mrvA6O2chqtTfHbqVy9D1.c9sN2pWv.XaPW2dGVAYpw7gJGLVm.HW', 'user', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'Admin', 'admin@admin.pl', '$2y$10$KNbVwl/uExEKktSAagGz5.uncJ6ZM3zg//778hxTrsRzpB4/.LkL2', 'admin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'Wojtek', 'wojtek@wojtek.pl', '$2y$10$CANynAukFjo6t6VgkBeVU.XpentHSKSvD7MyF0BJFbYML7LuO0gSe', 'user', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'maciek', 'maciek@gmail.com', '$2y$10$DwGQ03mTrF8MpRPTijh5nOf4b9p8FNrskQpeXz1VdTIdvua525mmm', 'user', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'Wojti', 'maciejcieplowski@gmail.com', '$2y$10$PuWdd.qzBpdMF.oDPv7l8O7.ieV3U8BUgKgT25wS.i3zh8HaHzdua', 'user', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 'pracownik1', 'pracownik1@wp.pl', '$2y$10$IyNltexfVkPx.kfxaatlHObWMaui62fZ.gRCGZng7CIOck87S7v9y', 'employee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 'NoweLogowanie', 'NoweLogowanie@wp.pl', '$2y$10$XDYcsAMyA9a7N6Ke/iFRW.eDc0iUgs6irUgYjiBL/MWvSK7wkxyKq', 'user', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 'Customer1', 'Customer1@wp.pl', '$2y$10$xg7O0NyMONd/BHzZ0FNMvOcFJtYMyA5TgI5KVweQvalnYp2lz2WSS', 'user', 'Customer1', 'Customer1', 'Customer1', 'Customer1', 'England', 'Customer1', 'Yes', 'Customer1', 'Customer1', 'Customer1', 'euro', 'Customer1', 'Customer1', 'Customer1', 'Customer1@wp.pl', 'Accepted'),
(22, 'Customer2', 'Customer2@wp.pl', '$2y$10$8Op4Za9Ns87JKE73e3Xe1.4xa6qEOn.ZGec6wRwHBLUV.PaJYE796', 'user', 'Customer2', 'Customer2', 'Customer2', 'Customer2', 'England', 'Customer2@wp.pl', 'Customer2', 'Yes', 'Customer2', 'Customer2', 'Customer2', 'dolar', 'Customer2', 'Customer2', 'Customer2', 'Accepted'),
(23, 'Pracownik2', 'pracownik2@wp.pl', '$2y$10$yb4sS.Z/8awZbOfRb1Od6.kEI2fWLEN.ZZIKHiA.WxOgXn1cgPC86', 'employee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 'Test', 'Test@wp.pl', '$2y$10$cnLsavoE/xu9hj/C8q9T1enAVH6sm1cCiQk5xvxtq.aDnBIVNjX3C', 'user', 'Test', 'Test', 'Test', 'Test', 'England', 'Test@wp.pl', 'Test', 'No', 'Test', 'Test', '', 'euro', 'Test', 'Test', 'Test', 'Accepted'),
(25, 'Administrator', 'admin@gmail.com', '$2y$10$bWYkboMN.53vJ8zGSqNefedjtvotVUWJGy9WigT400o.1h8ZQAcGq', 'admin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `authorization`
--
ALTER TABLE `authorization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
