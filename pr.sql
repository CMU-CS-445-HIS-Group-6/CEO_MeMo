-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.5.10-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table pr.payrates
CREATE TABLE IF NOT EXISTS `payrates` (
  `idPayRates` int(11) NOT NULL AUTO_INCREMENT,
  `PayRateName` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `TaxPercentage` double NOT NULL,
  `PayType` int(11) NOT NULL,
  `PayAmount` double NOT NULL,
  `PT-Level` double NOT NULL,
  PRIMARY KEY (`idPayRates`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pr.payrates: ~0 rows (approximately)
/*!40000 ALTER TABLE `payrates` DISABLE KEYS */;
/*!40000 ALTER TABLE `payrates` ENABLE KEYS */;

-- Dumping structure for table pr.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `idEmployee` int(11) NOT NULL,
  `EmployeeNumber` int(11) DEFAULT NULL,
  `LastName` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SSN` int(11) DEFAULT NULL,
  `PayRate` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PayRates_idPayRates` int(11) DEFAULT NULL,
  `VacationDays` int(11) NOT NULL DEFAULT 0,
  `PaidToDays` double NOT NULL DEFAULT 0,
  `PaidLastYear` double NOT NULL DEFAULT 0,
  KEY `employee_payrates_idpayrates_foreign` (`PayRates_idPayRates`),
  CONSTRAINT `employee_payrates_idpayrates_foreign` FOREIGN KEY (`PayRates_idPayRates`) REFERENCES `payrates` (`idPayRates`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pr.employee: ~11 rows (approximately)
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`idEmployee`, `EmployeeNumber`, `LastName`, `FirstName`, `SSN`, `PayRate`, `PayRates_idPayRates`, `VacationDays`, `PaidToDays`, `PaidLastYear`) VALUES
	(15, NULL, 'Zieme', 'Dannie', NULL, '99123983', NULL, 2, 813.38, 6454),
	(6, NULL, 'Macejkovic', 'Martina', NULL, '3594055', NULL, 4, 96454.09, 14482),
	(78, NULL, 'Armstrong', 'Felicity', NULL, '9', NULL, 4, 2664.73, 7781),
	(30, NULL, 'O\'Keefe', 'Lyla', NULL, '712018550', NULL, 0, 40801.55, 12049),
	(84, NULL, 'Schiller', 'Raheem', NULL, '6058', NULL, 2, 65188.23, 10413),
	(38, NULL, 'Pfannerstill', 'Lynn', NULL, '1', NULL, 1, 28822.81, 10204),
	(90, NULL, 'Osinski', 'Chyna', NULL, '71098', NULL, 1, 4271.04, 12572),
	(56, NULL, 'Rau', 'Milo', NULL, '3780480', NULL, 0, 37937.96, 10611),
	(25, NULL, 'Renner', 'Keon', NULL, '66380457', NULL, 5, 43666.12, 9772),
	(66, NULL, 'Terry', 'Torey', NULL, '449738043', NULL, 2, 1609.27, 8638),
	(100, NULL, 'Nguyễn Đăng', 'Quang Huy', NULL, NULL, NULL, 0, 0, 0);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
