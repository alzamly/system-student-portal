-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 12:25 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE IF NOT EXISTS `absences` (
  `AId` int(11) NOT NULL AUTO_INCREMENT,
  `AStudentId` int(11) NOT NULL,
  `AClassId` int(11) NOT NULL,
  `ADivId` int(11) NOT NULL,
  `AMaterialId` int(11) NOT NULL,
  `ATeacherId` int(11) NOT NULL,
  `AAbsenceDate` date NOT NULL,
  `ADate` date NOT NULL,
  `ALessonsId` int(11) NOT NULL,
  PRIMARY KEY (`AId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `accept_reject_notifications`
--

CREATE TABLE IF NOT EXISTS `accept_reject_notifications` (
  `ARNId` int(11) NOT NULL AUTO_INCREMENT,
  `ARNFamilyId` int(11) NOT NULL,
  `ARNNotificationId` int(11) NOT NULL,
  `ARNDate` date NOT NULL,
  `ARNAcceptOrReject` varchar(6) NOT NULL,
  `ARNNotificationType` varchar(7) NOT NULL,
  PRIMARY KEY (`ARNId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `CId` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` varchar(20) NOT NULL,
  `CDepartmentFoundationId` int(11) NOT NULL,
  PRIMARY KEY (`CId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `daily_duties`
--

CREATE TABLE IF NOT EXISTS `daily_duties` (
  `DDId` int(11) NOT NULL AUTO_INCREMENT,
  `DDClassId` int(11) NOT NULL,
  `DDDivId` int(11) NOT NULL,
  `DDMaterialId` int(11) NOT NULL,
  `DDTeacherId` int(11) NOT NULL,
  `DailyDutyText` text NOT NULL,
  `DDLessonsId` int(11) NOT NULL,
  `DDDutyDate` date NOT NULL,
  `DDDate` date NOT NULL,
  `DDDutyDay` varchar(10) NOT NULL,
  PRIMARY KEY (`DDId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `DayId` int(11) NOT NULL AUTO_INCREMENT,
  `DayName` varchar(12) NOT NULL,
  PRIMARY KEY (`DayId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`DayId`, `DayName`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `departments_foundation`
--

CREATE TABLE IF NOT EXISTS `departments_foundation` (
  `DFId` int(11) NOT NULL AUTO_INCREMENT,
  `DFName` varchar(200) NOT NULL,
  `DFDate` date NOT NULL,
  `DFType` varchar(15) NOT NULL,
  `DFStructure` varchar(10) NOT NULL,
  PRIMARY KEY (`DFId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `departments_foundation`
--

INSERT INTO `departments_foundation` (`DFId`, `DFName`, `DFDate`, `DFType`, `DFStructure`) VALUES
(1, 'حضانة الاوائل', '2019-03-10', 'school', 'sp_nurs'),
(2, 'روضة الاوائل', '2019-03-10', 'school', 'sp_school'),
(3, 'مدرسة الاوائل الابتدائية المختلطة', '2019-03-10', 'school', 'sp_school'),
(4, 'ثانوية الاوائل للبنات', '2019-03-10', 'school', 'sp_school'),
(5, 'التسجيل والحسابات', '2019-03-11', 'administrative', 'sp_account'),
(6, 'المدير', '2019-03-11', 'administrative', 'sp_admin'),
(8, 'ثانوية الاوائل للبنين', '2019-03-17', 'school', 'sp_school');

-- --------------------------------------------------------

--
-- Table structure for table `discount_percentage`
--

CREATE TABLE IF NOT EXISTS `discount_percentage` (
  `DPId` int(11) NOT NULL AUTO_INCREMENT,
  `DPDiscount` int(11) NOT NULL,
  PRIMARY KEY (`DPId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `discount_percentage`
--

INSERT INTO `discount_percentage` (`DPId`, `DPDiscount`) VALUES
(1, 0),
(2, 5),
(3, 10),
(4, 20),
(5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `DId` int(11) NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) NOT NULL,
  `DivisionName` varchar(1) NOT NULL,
  PRIMARY KEY (`DId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_cases`
--

CREATE TABLE IF NOT EXISTS `evaluation_cases` (
  `ECId` int(11) NOT NULL AUTO_INCREMENT,
  `ECCase` text NOT NULL,
  PRIMARY KEY (`ECId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `evaluation_cases`
--

INSERT INTO `evaluation_cases` (`ECId`, `ECCase`) VALUES
(1, 'ضعف التركيز'),
(2, 'لا يستجيب عندما يناديه احد باسمه'),
(3, 'غير واعي بمشاعر الاخرين'),
(4, 'لديه فرط حركة كثير'),
(5, 'لديه تشتت كثير'),
(6, 'عدم الاستجابة لتعليمات المعلمة'),
(7, 'عدم الدخول للصف الدراسي'),
(8, 'اللعب المستمر وبدون توقف'),
(9, 'عدم الاختلاط مع التلاميذ الاخرين في اللعب او الصف وانما يفضل الجلوس او اللعب وحده'),
(10, 'يتحرك باستمرار'),
(11, 'لديه اندفاع غير طبيعي'),
(12, 'كلامه غير مفهوم كانه يغني عند التحدث'),
(13, 'ينبهر من اشياء بسيطة'),
(14, 'يعاني من مرض التوحد'),
(15, 'لديه سلوك عدواني مع التلاميذ الاخرين'),
(16, 'كثير البكاء'),
(17, 'غير اجتماعي مع التلاميذ الاخرين'),
(18, 'لديه الفاظ غير لائقة بعمر التلاميذ'),
(19, 'لديه سلوكيات خاطئة'),
(20, 'عدم تقبله الدوام بالمدرسة');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_level`
--

CREATE TABLE IF NOT EXISTS `evaluation_level` (
  `ELId` int(11) NOT NULL AUTO_INCREMENT,
  `ELStudentId` int(11) NOT NULL,
  `ELCaseId` int(11) NOT NULL,
  `ELNotes` text NOT NULL,
  `ELDate` date NOT NULL,
  PRIMARY KEY (`ELId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exams_table`
--

CREATE TABLE IF NOT EXISTS `exams_table` (
  `ETId` int(11) NOT NULL AUTO_INCREMENT,
  `ETClassId` int(11) NOT NULL,
  `ETMaterialId` int(11) NOT NULL,
  `ETExamNotes` text NOT NULL,
  `ETDay` varchar(10) NOT NULL,
  `ETExamDate` date NOT NULL,
  `ETDate` date NOT NULL,
  `ETTitleExamId` int(11) NOT NULL,
  PRIMARY KEY (`ETId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `FId` int(11) NOT NULL AUTO_INCREMENT,
  `FStudentId` int(11) NOT NULL,
  `FUsername` varchar(50) NOT NULL,
  `FPassword` varchar(50) NOT NULL,
  PRIMARY KEY (`FId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

CREATE TABLE IF NOT EXISTS `governorates` (
  `GId` int(11) NOT NULL AUTO_INCREMENT,
  `GName` varchar(20) NOT NULL,
  PRIMARY KEY (`GId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`GId`, `GName`) VALUES
(1, 'كركوك'),
(2, 'بغداد'),
(3, 'اربيل'),
(4, 'سليمانية'),
(5, 'موصل'),
(6, 'صلاح الدين'),
(7, 'بابل'),
(8, 'ديالى');

-- --------------------------------------------------------

--
-- Table structure for table `grades_students`
--

CREATE TABLE IF NOT EXISTS `grades_students` (
  `GSId` int(11) NOT NULL AUTO_INCREMENT,
  `GSStudentId` int(11) NOT NULL,
  `GSClassId` int(11) NOT NULL,
  `GSMaterialId` int(11) NOT NULL,
  `GSDegree` int(11) NOT NULL,
  `GSDate` date NOT NULL,
  `GSTitleGradesStudentsId` int(11) NOT NULL,
  PRIMARY KEY (`GSId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `LId` int(11) NOT NULL AUTO_INCREMENT,
  `LessonName` varchar(15) NOT NULL,
  PRIMARY KEY (`LId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`LId`, `LessonName`) VALUES
(1, 'الدرس الاول'),
(2, 'الدرس الثاني'),
(3, 'الدرس الثالث'),
(4, 'الدرس الرابع'),
(5, 'الدرس الخامس'),
(6, 'الدرس السادس');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `MId` int(11) NOT NULL AUTO_INCREMENT,
  `MName` varchar(20) NOT NULL,
  `MClassId` int(11) NOT NULL,
  PRIMARY KEY (`MId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `NId` int(11) NOT NULL AUTO_INCREMENT,
  `NTitle` varchar(60) NOT NULL,
  `NText` text NOT NULL,
  `NType` varchar(7) NOT NULL,
  `NStudentId` int(11) NOT NULL,
  `NAddOptionAcceptOrReject` varchar(3) NOT NULL,
  `NDate` date NOT NULL,
  PRIMARY KEY (`NId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outly`
--

CREATE TABLE IF NOT EXISTS `outly` (
  `OId` int(11) NOT NULL AUTO_INCREMENT,
  `OTypeOutly` int(11) NOT NULL,
  `OAmount` float NOT NULL,
  `ONotes` text NOT NULL,
  `OOutlyDate` date NOT NULL,
  `ODate` date NOT NULL,
  `ODepartmentsFoundationId` int(11) NOT NULL,
  PRIMARY KEY (`OId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_installments`
--

CREATE TABLE IF NOT EXISTS `payment_installments` (
  `PIId` int(11) NOT NULL AUTO_INCREMENT,
  `PIPayment` int(11) NOT NULL,
  `PIDatePaid` date NOT NULL,
  `PITuitionFeesId` int(11) NOT NULL,
  `PISchoolYeartId` int(11) NOT NULL,
  `PIDate` date NOT NULL,
  `PINote` text NOT NULL,
  PRIMARY KEY (`PIId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE IF NOT EXISTS `school_year` (
  `SYId` int(11) NOT NULL AUTO_INCREMENT,
  `SYStudentId` int(11) NOT NULL,
  `SYSchoolYearValuesId` int(11) NOT NULL,
  `SYDepartmentsFoundationId` int(11) NOT NULL,
  `SYClassId` int(11) NOT NULL,
  `SYDivId` int(11) NOT NULL,
  `SYDiscountTuitionFeesId` int(11) NOT NULL,
  `SYDiscountNotOrPartOrAll` varchar(4) NOT NULL,
  `SYIdTuitionFees` int(11) NOT NULL,
  `SYTypePayTuitionFees` varchar(4) NOT NULL,
  `SYDate` date NOT NULL,
  PRIMARY KEY (`SYId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school_year_values`
--

CREATE TABLE IF NOT EXISTS `school_year_values` (
  `SYVId` int(11) NOT NULL AUTO_INCREMENT,
  `SYVFromYear` int(11) NOT NULL,
  `SYVToYear` int(11) NOT NULL,
  `SYVIsRunning` varchar(3) NOT NULL,
  PRIMARY KEY (`SYVId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `school_year_values`
--

INSERT INTO `school_year_values` (`SYVId`, `SYVFromYear`, `SYVToYear`, `SYVIsRunning`) VALUES
(1, 2019, 2020, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `SId` int(11) NOT NULL AUTO_INCREMENT,
  `SName` varchar(50) NOT NULL,
  `SFatherName` varchar(50) NOT NULL,
  `SFatherJob` varchar(50) NOT NULL,
  `SHomeAddress` varchar(50) NOT NULL,
  `StudentHometownGovernorate` int(11) NOT NULL,
  `SPlaceOfBirth` varchar(45) NOT NULL,
  `SDateOfBirth` date NOT NULL,
  `SNationalityCertificateNumber` varchar(40) NOT NULL,
  `SCivilStatusIDNumber` varchar(40) NOT NULL,
  `SSchoolTransferredFromThem` varchar(50) NOT NULL,
  `SGovernorateTransferredFromThem` varchar(50) NOT NULL,
  `SNumberOfDocument` varchar(40) NOT NULL,
  `SDateOfDocument` date NOT NULL,
  `SDateCommencementAtSchool` date NOT NULL,
  `SClassWhichHeAccepted` varchar(30) NOT NULL,
  `SDoesHeHaveFailureAtPrimarySchool` varchar(20) NOT NULL,
  `SMobileNumberFather` varchar(11) NOT NULL,
  `SMobileNumberMother` varchar(11) NOT NULL,
  `SNumberFamilyMembers` int(11) NOT NULL,
  `SOrderStudentBetweenTheSons` int(11) NOT NULL,
  `SNumberOfBrothers` int(11) NOT NULL,
  `SNumberOfSister` int(11) NOT NULL,
  `SHouseNumber` varchar(30) NOT NULL,
  `SSheet` varchar(40) NOT NULL,
  `SRecord` varchar(30) NOT NULL,
  `SEducationalAchievementOfFather` varchar(50) NOT NULL,
  `SEducationalAchievementOfMother` varchar(50) NOT NULL,
  `SNumberRoomsOccupiedByTheFamily` int(11) NOT NULL,
  `SPhoto` varchar(50) NOT NULL,
  `SDate` date NOT NULL,
  `SDivisionId` int(11) NOT NULL,
  `SClassId` int(11) NOT NULL,
  `DepartmentsFoundationId` int(11) NOT NULL,
  `SStudentType` varchar(10) NOT NULL,
  PRIMARY KEY (`SId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `titles_exams`
--

CREATE TABLE IF NOT EXISTS `titles_exams` (
  `TEId` int(11) NOT NULL AUTO_INCREMENT,
  `TETitleExam` varchar(100) NOT NULL,
  `TEClassId` int(11) NOT NULL,
  `TEDate` date NOT NULL,
  PRIMARY KEY (`TEId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `title_grades_students`
--

CREATE TABLE IF NOT EXISTS `title_grades_students` (
  `TGSId` int(11) NOT NULL AUTO_INCREMENT,
  `TGSTitleGradesStudents` varchar(100) NOT NULL,
  `TGSFullGrades` int(11) NOT NULL,
  `TGSDate` date NOT NULL,
  `TGSClassId` int(11) NOT NULL,
  PRIMARY KEY (`TGSId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tuition_fees`
--

CREATE TABLE IF NOT EXISTS `tuition_fees` (
  `TFId` int(11) NOT NULL AUTO_INCREMENT,
  `TFTuitionFeesAmount` int(11) NOT NULL,
  `TFTuitionFeesType` varchar(5) NOT NULL,
  `TFDepartmentsFoundation` int(11) NOT NULL,
  `TFClassId` int(11) NOT NULL,
  `TFDate` date NOT NULL,
  `TFTuitionFeesName` varchar(50) NOT NULL,
  `TFSchoolYearValueId` int(11) NOT NULL,
  PRIMARY KEY (`TFId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tuition_fees`
--

INSERT INTO `tuition_fees` (`TFId`, `TFTuitionFeesAmount`, `TFTuitionFeesType`, `TFDepartmentsFoundation`, `TFClassId`, `TFDate`, `TFTuitionFeesName`, `TFSchoolYearValueId`) VALUES
(1, 125000, 'month', 1, 0, '2019-05-07', 'قسط الحضانة الشهري', 1),
(2, 125000, 'month', 2, 11, '2019-05-07', 'قسط الروضة الشهري', 1),
(3, 125000, 'month', 2, 12, '2019-05-07', 'قسط الروضة الشهري', 1),
(4, 500000, 'year', 3, 1, '2019-05-07', 'القسط الاول', 1),
(5, 250000, 'year', 3, 1, '2019-05-17', 'القسط الثاني', 1),
(6, 250000, 'year', 3, 1, '2019-05-17', 'القسط الثالث', 1),
(7, 500000, 'year', 3, 1, '2019-05-17', 'القسط الاخير', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_outly`
--

CREATE TABLE IF NOT EXISTS `type_outly` (
  `TOId` int(11) NOT NULL AUTO_INCREMENT,
  `TOName` varchar(100) NOT NULL,
  PRIMARY KEY (`TOId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `type_outly`
--

INSERT INTO `type_outly` (`TOId`, `TOName`) VALUES
(1, 'الايجارات'),
(3, 'قوائم الماء والكهرباء والكهرباء السحب ( المولد الخارجي )'),
(4, 'مصاريف المولدات'),
(5, 'التغذية'),
(6, 'المنظفات'),
(7, 'المشتريات'),
(8, 'الصيانة'),
(9, 'الاعلانات'),
(10, 'الضرائب'),
(11, 'تجديد الاجازات'),
(12, 'الرواتب'),
(13, 'القرطاسية'),
(14, 'الزي الموحد والزي الرياضي');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UId` int(11) NOT NULL AUTO_INCREMENT,
  `UName` varchar(50) NOT NULL,
  `UUsername` varchar(40) NOT NULL,
  `UPassword` varchar(50) NOT NULL,
  `UBlock` varchar(1) NOT NULL,
  `UDepartmentFoundationId` int(11) NOT NULL,
  PRIMARY KEY (`UId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UId`, `UName`, `UUsername`, `UPassword`, `UBlock`, `UDepartmentFoundationId`) VALUES
(1, 'خالد عبدالله محمد', 'khalid', '123', '', 6),
(29, 'user1', 'user1', '123', '', 1),
(30, 'user2', 'user2', '123', '', 2),
(31, 'user3', 'user3', '123', '', 3),
(32, 'user4', 'user4', '123', '', 4),
(34, 'user5', 'user5', '123', '', 5),
(38, 'tr', 'tr', 'tr', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users_permission`
--

CREATE TABLE IF NOT EXISTS `users_permission` (
  `UPId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`UPId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `weekly_quota_table`
--

CREATE TABLE IF NOT EXISTS `weekly_quota_table` (
  `WQTId` int(11) NOT NULL AUTO_INCREMENT,
  `WQTMaterialId` int(11) NOT NULL,
  `WQTUserId` int(11) NOT NULL,
  `WQTDayId` int(11) NOT NULL,
  `WQTLessonId` int(11) NOT NULL,
  `WQTClassId` int(11) NOT NULL,
  `WQTDivisionId` int(11) NOT NULL,
  `WQTDate` date NOT NULL,
  PRIMARY KEY (`WQTId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
