-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for mydb
CREATE DATABASE IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mydb`;


-- Dumping structure for table mydb.course
CREATE TABLE IF NOT EXISTS `course` (
  `courseID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseCode` varchar(45) NOT NULL,
  `courseName` varchar(45) NOT NULL,
  `credits` int(11) NOT NULL,
  `type` enum('CORE','DELECT','GELECT') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`courseID`),
  UNIQUE KEY `courseCode_UNIQUE` (`courseCode`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.course: ~7 rows (approximately)
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` (`courseID`, `courseCode`, `courseName`, `credits`, `type`, `created`, `modified`) VALUES
	(1, 'SOEN 100', 'Course 100', 3, 'CORE', '2013-11-16 14:08:53', '2013-11-16 14:08:53'),
	(2, 'SOEN 101', 'Course 101', 3, 'CORE', '2013-11-16 14:08:53', '2013-11-16 14:08:53'),
	(3, 'SOEN 102', 'Course 102', 3, 'CORE', '2013-11-16 14:09:44', '2013-11-16 14:08:53'),
	(4, 'SOEN 103', 'Course 103', 3, 'DELECT', '2013-11-16 14:09:44', '2013-11-16 14:09:44'),
	(5, 'SOEN 200', 'Course 200', 3, 'CORE', '2013-11-16 14:11:05', '2013-11-16 14:11:05'),
	(6, 'SOEN 201', 'Course 201', 3, 'CORE', '2013-11-16 14:11:05', '2013-11-16 14:11:05'),
	(7, 'SOEN 300', 'Course 300', 3, 'CORE', '2013-11-16 14:11:31', '2013-11-16 14:11:31');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;


-- Dumping structure for table mydb.enrollment
CREATE TABLE IF NOT EXISTS `enrollment` (
  `EnrollmentID` int(11) NOT NULL AUTO_INCREMENT,
  `associatedStudentID` bigint(20) NOT NULL,
  `associatedSubSectionID` int(11) NOT NULL,
  `associatedCourseID` int(10) unsigned NOT NULL,
  `status` enum('SAVED','REGISTERED','DROPPED','WAITLISTED','ENROLLED','COMPLETED') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`EnrollmentID`),
  KEY `aStuK_idx` (`associatedStudentID`),
  KEY `eSecK_idx` (`associatedSubSectionID`),
  KEY `eCouK_idx` (`associatedCourseID`),
  CONSTRAINT `aStuK` FOREIGN KEY (`associatedStudentID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `eSecK` FOREIGN KEY (`associatedSubSectionID`) REFERENCES `subsection` (`SubsectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `eCouK` FOREIGN KEY (`associatedCourseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.enrollment: ~0 rows (approximately)
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;


-- Dumping structure for table mydb.grade
CREATE TABLE IF NOT EXISTS `grade` (
  `gradeID` int(11) NOT NULL AUTO_INCREMENT,
  `gradeCode` varchar(5) NOT NULL,
  `gradeValue` float NOT NULL,
  PRIMARY KEY (`gradeID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.grade: ~13 rows (approximately)
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` (`gradeID`, `gradeCode`, `gradeValue`) VALUES
	(1, 'A+', 4.3),
	(2, 'A', 4),
	(3, 'A-', 3.7),
	(4, 'B+', 3.3),
	(5, 'B', 3),
	(6, 'B-', 2.7),
	(7, 'C+', 2.3),
	(8, 'C', 2),
	(9, 'C-', 1.7),
	(10, 'D+', 1.3),
	(11, 'D', 1),
	(12, 'D-', 0.7),
	(13, 'F', 0);
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;


-- Dumping structure for table mydb.messaging
CREATE TABLE IF NOT EXISTS `messaging` (
  `messagingID` int(11) NOT NULL AUTO_INCREMENT,
  `fromID` bigint(20) NOT NULL,
  `toID` bigint(20) NOT NULL,
  `message` longtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`messagingID`),
  KEY `AscStudentFk_idx` (`fromID`),
  KEY `AscProfessorFk_idx` (`toID`),
  CONSTRAINT `AscStudentFk` FOREIGN KEY (`fromID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `AscProfessorFk` FOREIGN KEY (`toID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.messaging: ~0 rows (approximately)
/*!40000 ALTER TABLE `messaging` DISABLE KEYS */;
/*!40000 ALTER TABLE `messaging` ENABLE KEYS */;


-- Dumping structure for table mydb.prerequisite
CREATE TABLE IF NOT EXISTS `prerequisite` (
  `PrerequisiteID` int(11) NOT NULL AUTO_INCREMENT,
  `associatedCourseID` int(10) unsigned NOT NULL,
  `prerequisiteCourseID` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`PrerequisiteID`),
  KEY `cCode_idx` (`associatedCourseID`),
  KEY `pCode_idx` (`prerequisiteCourseID`),
  CONSTRAINT `cCode` FOREIGN KEY (`associatedCourseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pCode` FOREIGN KEY (`prerequisiteCourseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.prerequisite: ~4 rows (approximately)
/*!40000 ALTER TABLE `prerequisite` DISABLE KEYS */;
INSERT INTO `prerequisite` (`PrerequisiteID`, `associatedCourseID`, `prerequisiteCourseID`, `created`, `modified`) VALUES
	(1, 5, 1, '2013-11-16 14:18:06', '2013-11-16 14:18:06'),
	(2, 5, 2, '2013-11-16 14:20:31', '2013-11-16 14:20:31'),
	(3, 6, 2, '2013-11-16 14:22:48', '2013-11-16 14:22:48'),
	(4, 7, 5, '2013-11-16 14:23:11', '2013-11-16 14:23:11');
/*!40000 ALTER TABLE `prerequisite` ENABLE KEYS */;


-- Dumping structure for table mydb.section
CREATE TABLE IF NOT EXISTS `section` (
  `sectionID` int(11) NOT NULL AUTO_INCREMENT,
  `associatedCourseID` int(10) unsigned NOT NULL,
  `assignedProfessorID` bigint(20) NOT NULL,
  `sectionCode` varchar(5) NOT NULL,
  `semester` enum('FALL','WINTER','SUMMER') NOT NULL,
  `academicYear` varchar(4) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`sectionID`),
  KEY `courseID_idx` (`associatedCourseID`),
  KEY `userID_idx` (`assignedProfessorID`),
  CONSTRAINT `courseAsc` FOREIGN KEY (`associatedCourseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `profAsc` FOREIGN KEY (`assignedProfessorID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.section: ~7 rows (approximately)
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` (`sectionID`, `associatedCourseID`, `assignedProfessorID`, `sectionCode`, `semester`, `academicYear`, `created`, `modified`) VALUES
	(1, 1, 6145847, 'HS100', 'FALL', '2013', '2013-11-16 14:26:17', '2013-11-16 14:27:52'),
	(2, 2, 6145847, 'IS101', 'FALL', '2013', '2013-11-16 14:26:41', '2013-11-16 14:28:15'),
	(3, 3, 6145847, 'JS102', 'FALL', '2013', '2013-11-16 14:27:09', '2013-11-16 14:28:31'),
	(4, 4, 6145847, 'KS103', 'FALL', '2013', '2013-11-16 14:29:04', '2013-11-16 14:29:44'),
	(5, 5, 6145847, 'LS200', 'WINTER', '2013', '2013-11-16 14:30:07', '2013-11-16 14:30:07'),
	(6, 6, 6145847, 'MS201', 'SUMMER', '2013', '2013-11-16 14:30:35', '2013-11-16 14:30:35'),
	(7, 7, 6145847, 'NS300', 'FALL', '2013', '2013-11-16 14:30:58', '2013-11-16 14:30:58');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;


-- Dumping structure for table mydb.sectiontime
CREATE TABLE IF NOT EXISTS `sectiontime` (
  `SectionTimeID` int(11) NOT NULL AUTO_INCREMENT,
  `associatedSubSection` int(11) NOT NULL,
  `day` enum('MON','TUE','WED','THU','FRI','SAT','SUN') NOT NULL,
  `fromTime` time NOT NULL,
  `toTime` time NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`SectionTimeID`),
  KEY `AscSubSectionFk` (`associatedSubSection`),
  CONSTRAINT `AscSubSectionFk` FOREIGN KEY (`associatedSubSection`) REFERENCES `subsection` (`SubsectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.sectiontime: ~7 rows (approximately)
/*!40000 ALTER TABLE `sectiontime` DISABLE KEYS */;
INSERT INTO `sectiontime` (`SectionTimeID`, `associatedSubSection`, `day`, `fromTime`, `toTime`, `created`, `modified`) VALUES
	(1, 1, 'WED', '11:00:00', '12:15:00', '2013-11-16 14:42:00', '2013-11-16 14:45:26'),
	(2, 2, 'THU', '12:00:00', '13:30:00', '2013-11-16 15:02:04', '2013-11-16 15:57:26'),
	(3, 3, 'MON', '12:45:00', '14:00:00', '2013-11-16 15:02:19', '2013-11-16 15:02:34'),
	(4, 4, 'WED', '12:45:00', '14:00:00', '2013-11-16 15:03:01', '2013-11-16 15:03:20'),
	(5, 5, 'FRI', '12:30:00', '14:00:00', '2013-11-16 15:03:41', '2013-11-16 15:03:41'),
	(6, 6, 'FRI', '10:45:00', '14:30:00', '2013-11-16 15:04:08', '2013-11-16 15:04:08'),
	(8, 9, 'WED', '12:30:00', '13:45:00', '2013-11-16 16:21:50', '2013-11-16 16:21:50');
/*!40000 ALTER TABLE `sectiontime` ENABLE KEYS */;


-- Dumping structure for table mydb.subsection
CREATE TABLE IF NOT EXISTS `subsection` (
  `SubsectionID` int(11) NOT NULL AUTO_INCREMENT,
  `associatedSectionID` int(11) NOT NULL,
  `sectionCode` varchar(5) NOT NULL,
  `classType` varchar(5) NOT NULL,
  `roomNumber` int(11) NOT NULL,
  `buildingCode` varchar(5) NOT NULL,
  `sectionSize` int(11) NOT NULL,
  `currentSectionSize` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`SubsectionID`),
  KEY `AsciSectionFk_idx` (`associatedSectionID`),
  CONSTRAINT `AsciSectionFk` FOREIGN KEY (`associatedSectionID`) REFERENCES `section` (`sectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.subsection: ~9 rows (approximately)
/*!40000 ALTER TABLE `subsection` DISABLE KEYS */;
INSERT INTO `subsection` (`SubsectionID`, `associatedSectionID`, `sectionCode`, `classType`, `roomNumber`, `buildingCode`, `sectionSize`, `currentSectionSize`, `created`, `modified`) VALUES
	(1, 1, 'H', 'LECT', 300, 'H', 60, 0, '2013-11-16 14:38:38', '2013-11-16 14:38:38'),
	(2, 2, 'I', 'LECT', 301, 'H', 60, 0, '2013-11-16 14:39:15', '2013-11-16 14:39:15'),
	(3, 3, 'J', 'LECT', 302, 'H', 60, 0, '2013-11-16 14:39:43', '2013-11-16 14:39:43'),
	(4, 4, 'K', 'LECT', 303, 'H', 60, 0, '2013-11-16 14:40:04', '2013-11-16 14:40:04'),
	(5, 5, 'L', 'LECT', 304, 'H', 60, 0, '2013-11-16 14:40:33', '2013-11-16 14:40:33'),
	(6, 6, 'M', 'LECT', 305, 'H', 60, 0, '2013-11-16 14:41:00', '2013-11-16 14:41:00'),
	(7, 7, 'N', 'LECT', 306, 'H', 60, 0, '2013-11-16 14:41:18', '2013-11-16 14:41:18'),
	(8, 4, 'KA', 'TUTO', 917, 'H', 30, 0, '2013-11-16 16:08:32', '2013-11-16 16:08:32'),
	(9, 4, 'KB', 'TUTO', 917, 'H', 30, 0, '2013-11-16 16:09:52', '2013-11-16 16:09:52');
/*!40000 ALTER TABLE `subsection` ENABLE KEYS */;


-- Dumping structure for table mydb.transcript
CREATE TABLE IF NOT EXISTS `transcript` (
  `transcriptID` int(11) NOT NULL AUTO_INCREMENT,
  `associatedStudentID` bigint(20) NOT NULL,
  `associatedSectionID` int(11) NOT NULL,
  `associatedCourseID` int(10) unsigned NOT NULL,
  `gradeID` int(11) NOT NULL,
  `status` enum('PASS','FAIL','DISC') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`transcriptID`),
  KEY `ascUserFk_idx` (`associatedStudentID`),
  KEY `ascSectionFk_idx` (`associatedSectionID`),
  KEY `ascCourseFk_idx` (`associatedCourseID`),
  KEY `ascGradeFk_idx` (`gradeID`),
  CONSTRAINT `ascUserFk` FOREIGN KEY (`associatedStudentID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ascCourseFk` FOREIGN KEY (`associatedCourseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ascGradeFk` FOREIGN KEY (`gradeID`) REFERENCES `grade` (`gradeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ascSectionFk` FOREIGN KEY (`associatedSectionID`) REFERENCES `section` (`sectionID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.transcript: ~2 rows (approximately)
/*!40000 ALTER TABLE `transcript` DISABLE KEYS */;
INSERT INTO `transcript` (`transcriptID`, `associatedStudentID`, `associatedSectionID`, `associatedCourseID`, `gradeID`, `status`, `created`, `modified`) VALUES
	(4, 6934153, 2, 2, 1, 'PASS', '2013-11-16 15:19:36', '2013-11-16 15:19:37'),
	(5, 6934153, 1, 1, 1, 'PASS', '2013-11-16 15:19:36', '2013-11-16 15:19:37');
/*!40000 ALTER TABLE `transcript` ENABLE KEYS */;


-- Dumping structure for table mydb.user
CREATE TABLE IF NOT EXISTS `user` (
  `userID` bigint(20) NOT NULL,
  `userStatusID` int(11) NOT NULL,
  `roleID` enum('STUDENT','PROFESSOR','ADMIN') NOT NULL,
  `deptID` varchar(5) NOT NULL,
  `netName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `emailAddress` varchar(45) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email_address_UNIQUE` (`emailAddress`),
  UNIQUE KEY `netName_UNIQUE` (`netName`),
  KEY `ascUserStatusfk_idx` (`userStatusID`),
  CONSTRAINT `ascUserStatusfk` FOREIGN KEY (`userStatusID`) REFERENCES `userstatus` (`userStatusID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userID`, `userStatusID`, `roleID`, `deptID`, `netName`, `password`, `firstName`, `lastName`, `emailAddress`, `lastLogin`, `created`, `modified`) VALUES
	(6144444, 1, 'ADMIN', 'SOEN', 'admin', 'cc03e747a6afbbcbf8be7668acfebee5', 'SOEN', 'ADMIN', 'admin_soen@concordia.ca', '2013-11-16 16:07:50', '2013-11-16 14:13:07', '2013-11-16 14:13:07'),
	(6145847, 1, 'PROFESSOR', 'SOEN', 'fancott', 'cc03e747a6afbbcbf8be7668acfebee5', 'Terrill', 'Fancott', 'fancott@live.concordia.ca', NULL, '2013-11-16 14:06:17', '2013-11-16 14:06:17'),
	(6413439, 1, 'STUDENT', 'COMP', 'k_altoum', 'cc03e747a6afbbcbf8be7668acfebee5', 'Khalid', 'Altoum', 'k_altoum@live.concordia.ca', NULL, '2013-11-16 14:05:35', '2013-11-16 14:05:35'),
	(6934153, 1, 'STUDENT', 'SOEN', 'pr_danie', 'cc03e747a6afbbcbf8be7668acfebee5', 'Pradeep Samuel', 'Daniel', 'pr_danie@live.concordia.ca', '2013-11-16 15:58:09', '2013-11-16 14:04:40', '2013-11-16 14:04:40');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table mydb.userstatus
CREATE TABLE IF NOT EXISTS `userstatus` (
  `userStatusID` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`userStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table mydb.userstatus: ~1 rows (approximately)
/*!40000 ALTER TABLE `userstatus` DISABLE KEYS */;
INSERT INTO `userstatus` (`userStatusID`, `status`, `description`, `created`, `modified`) VALUES
	(1, 'ACTIVE', NULL, '2013-11-16 14:03:18', '2013-11-16 14:03:18');
/*!40000 ALTER TABLE `userstatus` ENABLE KEYS */;


-- Dumping structure for procedure mydb.getStudentEligibleCourse
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentEligibleCourse`(IN `inStudentID` BIGINT, IN `inYear` VARCHAR(4))
BEGIN
SELECT course.courseID,course.courseCode,course.courseName,course.credits,course.`type`,
       section.sectionID,section.semester,
       subsection.SubsectionID,subsection.sectionCode,subsection.classType,subsection.roomNumber,
		 subsection.buildingCode,subsection.sectionSize,subsection.currentSectionSize,
		 sectiontime.SectionTimeID,sectiontime.`day`,sectiontime.fromTime,sectiontime.toTime


from section  INNER JOIN course
 				 			ON section.associatedCourseID = course.courseID
				  INNER JOIN subsection
 							ON section.sectionID = subsection.associatedSectionID
 					INNER JOIN sectiontime
 							ON sectiontime.associatedSubSection = subsection.SubsectionID 
 							
WHERE  section.academicYear = inYear
       and
      -- exclude courses already passed by this student 
      section.associatedCourseID NOT IN 
								(SELECT transcript.associatedCourseID FROM transcript WHERE transcript.associatedStudentID=inStudentID and transcript.`status`='PASS')
	

      AND -- exclude courses have been enrolled by this student 
		section.associatedCourseID NOT IN 
								(SELECT enrollment.associatedCourseID FROM enrollment WHERE enrollment.associatedStudentID=inStudentID and (enrollment.`status`= 'REGISTERED'   or enrollment.`status`='ENROLLED'    or enrollment.`status`= 'COMPLETED'   ) )
								
      AND 
	   section.associatedCourseID in
		      (  -- include courses without prerequisite 
		      			select s.associatedCourseID 
							from section s  
							where s.associatedCourseID not in (
							select p0.associatedCourseID from prerequisite p0)
							group by s.associatedCourseID
						
						   UNION ALL
					-- include courses which all prerequisite have been taken 		
							SELECT p1.associatedCourseID a
							from prerequisite p1
							group by associatedCourseID 
							having count(*) = 
							(
								select count(*) 
								from prerequisite p2 INNER JOIN transcript on (p2.prerequisiteCourseID=transcript.associatedCourseID)  
								where (p2.associatedCourseID = p1.associatedCourseID) AND (transcript.associatedStudentID = inStudentID)
								
							
							)
				)
				GROUP BY section.sectionID
		      ORDER BY course.courseCode;

END//
DELIMITER ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
