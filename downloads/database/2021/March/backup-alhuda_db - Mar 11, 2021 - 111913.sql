CREATE DATABASE IF NOT EXISTS `alhuda_db`;

USE `alhuda_db`;

SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `backup`;

CREATE TABLE `backup` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` int(50) NOT NULL,
  `path` varchar(250) NOT NULL,
  `user` varchar(15) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emp_type` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`),
  UNIQUE KEY `name_2` (`name`,`emp_type`,`email`,`contact`,`address`),
  KEY `emp_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `employee` VALUES ("EM2101","Admin User","Manager","Male","cr@jtech.so",615551999,"Wadajir","EM2101_photo.png","Active","USR0001","2020-03-28","2020-03-28 11:50:34"),
("EM2102","Abdirahman Hassan Haji","Manager","Male","cajmaan33@gmail.com",618946816,"Hodan","G2102_photo.png","Active","USR0001","2020-12-18","2020-12-18 20:11:51"),
("EM2103","Asha Abdikadir Osman","Cashier","Female","asha@gmail.com",618946854,"Heliwaa","G2103_photo.png","Active","USR0001","2020-12-27","2020-12-27 15:57:27"),
("EM2104","Abdisamad Ali Mohamed","Cashier","Male","kiish@just.edu.so",615873313,"Heliwaa","EM2104_photo.png","Active","USR0001","2021-03-07","2021-03-07 14:51:35"),
("EM2105","Ahmed Jamac","Manager","Male","ali@gmai.com",2147483647,"Digfeer","EM2105_photo.png","Active","USR0001","2021-03-11","2021-03-11 10:22:36");



DROP TABLE IF EXISTS `family`;

CREATE TABLE `family` (
  `Family_id` varchar(25) NOT NULL,
  `Family_Name` varchar(50) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `responsible` varchar(30) NOT NULL,
  `Registered_Date` date NOT NULL,
  `Modified_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(15) NOT NULL,
  PRIMARY KEY (`Family_id`),
  UNIQUE KEY `Family_Name` (`Family_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `family` VALUES ("FM011","Moha ",1232109,"","2021-03-09","2021-03-09 16:13:40","USR0001"),
("FM012","Gashan",123213,"Mohamed Gashan","2021-03-09","2021-03-09 16:28:03","USR0001"),
("FM013","Guhad",12312,"","2021-03-09","2021-03-09 16:35:26","USR0001"),
("FM014","Gurxan",14411,"","2021-03-09","2021-03-09 16:37:29","USR0001"),
("FM015","Xaaji","","","2021-03-09","2021-03-09 16:40:44","USR0001"),
("FM016","Maxamud","+23524434213","Bashiir Mohamed","2021-03-09","2021-03-09 16:52:57","USR0001"),
("FM017","Maxamudl","+23524434213","Bashiir Mohamed","2021-03-09","2021-03-09 16:54:55","USR0001"),
("FM018","Maxamudu","+23524434213","Bashiir Mohamed","2021-03-09","2021-03-09 16:55:40","USR0001"),
("FM021","Gelle","","","2021-03-09","2021-03-09 17:02:24","USR0001"),
("FM022","fadsf","","","2021-03-10","2021-03-10 13:30:02","USR0001"),
("FM023","Maxamud laki","","","2021-03-10","2021-03-10 14:05:34","USR0001"),
("FM024","haaaji alid","","","2021-03-10","2021-03-10 14:35:56","USR0001"),
("FM025","Husein",21131,"Bashiir Mohamed","2021-03-11","2021-03-11 09:32:19","USR0001"),
("FM026","abdulla","","","2021-03-11","2021-03-11 09:34:57","USR0001"),
("FM027","Abdirahman Haji","","","2021-03-11","2021-03-11 10:05:15","USR0001");



DROP TABLE IF EXISTS `member_delete_logs`;

CREATE TABLE `member_delete_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

INSERT INTO `member_delete_logs` VALUES (5,"2021-03-04 17:18:30","USR0001","HUM0002 ~ Abdirahman Haji ~ ahmed ~ ahmed ~ Fere ~ Male ~ bs124112 ~  ~ 2132112 ~ Naqib12@naq.so ~ Str.1 FLorida ~ 2021-03-04 ~ 2021-03-04 17:18:25 ~ USR0001 ~ Individual ~ Active"),
(6,"2021-03-09 13:49:55","USR0001","HUM0007 ~ Ali ~  ~  ~  ~ 12121 ~ 0 ~  ~  ~  ~ 2021-03-09 ~ 2021-03-09 13:06:13 ~ USR0001 ~ Individual ~ Active"),
(7,"2021-03-09 13:49:55","USR0001","HUM0007 ~ Ali ~  ~  ~  ~ 12121 ~ 0 ~  ~  ~  ~ 2021-03-09 ~ 2021-03-09 13:06:13 ~ USR0001 ~ Individual ~ Active"),
(8,"2021-03-09 13:49:55","USR0001","HUM0007 ~ Ali ~  ~  ~  ~ 12121 ~ 0 ~  ~  ~  ~ 2021-03-09 ~ 2021-03-09 13:06:13 ~ USR0001 ~ Individual ~ Active"),
(9,"2021-03-09 13:49:55","USR0001","HUM0007 ~ Ali ~  ~  ~  ~ 12121 ~ 0 ~  ~  ~  ~ 2021-03-09 ~ 2021-03-09 13:06:13 ~ USR0001 ~ Individual ~ Active"),
(10,"2021-03-09 13:49:55","USR0001","HUM0007 ~ Ali ~  ~  ~  ~ 12121 ~ 0 ~  ~  ~  ~ 2021-03-09 ~ 2021-03-09 13:06:13 ~ USR0001 ~ Individual ~ Active"),
(11,"2021-03-09 13:49:55","USR0001","HUM0007 ~ Ali ~  ~  ~  ~ 12121 ~ 0 ~  ~  ~  ~ 2021-03-09 ~ 2021-03-09 13:06:13 ~ USR0001 ~ Individual ~ Active"),
(12,"2021-03-09 13:49:55","USR0001","HUM0007 ~ Ali ~  ~  ~  ~ 12121 ~ 0 ~  ~  ~  ~ 2021-03-09 ~ 2021-03-09 13:06:13 ~ USR0001 ~ Individual ~ Active"),
(13,"2021-03-09 13:49:55","USR0001","HUM0007 ~ Ali ~  ~  ~  ~ 12121 ~ 0 ~  ~  ~  ~ 2021-03-09 ~ 2021-03-09 13:06:13 ~ USR0001 ~ Individual ~ Active"),
(21,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(22,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(23,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(24,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(25,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(26,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(27,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(28,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(29,"2021-03-09 16:08:31",""," ~ Naqib ~ Ali ~  ~  ~  ~ 12313 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:07:25 ~ USR0001 ~ individual ~ FM005 ~ Active"),
(36,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(37,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(38,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(39,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(40,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(41,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(42,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(43,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(44,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(45,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(46,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(47,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(48,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(49,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(50,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(51,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(52,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(53,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(54,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active"),
(55,"2021-03-09 16:36:21","","HUM0011 ~ Mohamed  ~ Farah ~  ~  ~  ~ 13233111 ~  ~  ~ 2021-03-09 ~ 2021-03-09 16:10:33 ~ USR0001 ~ individual ~ FM009 ~ Active");



DROP TABLE IF EXISTS `member_update_logs`;

CREATE TABLE `member_update_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `row` varchar(100) NOT NULL,
  `column` varchar(100) NOT NULL,
  `old_value` varchar(100) NOT NULL,
  `new_value` varchar(100) NOT NULL,
  `old_user` varchar(20) NOT NULL,
  `new_user` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

INSERT INTO `member_update_logs` VALUES (18,"2021-03-04 16:51:32","HUM0001","National ID",4541114,"BS4541114","USR0002","USR0001"),
(19,"2021-03-04 16:54:04","HUM0001","Nick Name","gedi","gediyow","USR0001","USR0001"),
(20,"2021-03-04 16:54:04","HUM0001","Phone",2132112,2132155,"USR0001","USR0001"),
(21,"2021-03-06 10:24:04","HUM0001","Status","Active","Deceased","USR0001","USR0001"),
(22,"2021-03-06 10:24:26","HUM0001","Status","Deceased","Active","USR0001","USR0001"),
(23,"2021-03-06 10:42:52","HUM0001","Status","Active","Moved","USR0001","USR0001"),
(24,"2021-03-06 11:27:22","HUM0002","Status","Active","Moved","USR0001","USR0001"),
(25,"2021-03-06 11:27:37","HUM0001","Status","Moved","Deceased","USR0001","USR0001"),
(26,"2021-03-06 11:27:57","HUM0001","Status","Deceased","Active","USR0001","USR0001"),
(27,"2021-03-06 11:28:03","HUM0002","Status","Moved","Active","USR0001","USR0001"),
(28,"2021-03-06 11:39:34","HUM0001","Status","Active","Disputed","USR0001","USR0001"),
(29,"2021-03-06 16:12:04","HUM0001","Status","Disputed","Active","USR0001","USR0001"),
(30,"2021-03-06 16:19:11","HUM0001","Status","Active","Deceased","USR0001","USR0001"),
(31,"2021-03-06 16:19:27","HUM0001","Status","Deceased","Active","USR0001","USR0001"),
(32,"2021-03-06 17:07:00","HUM0004","Phone",00710101,0071010112,"USR0002","USR0002"),
(33,"2021-03-07 10:15:37","HUM0001","Status","Active","Disputed","USR0001","USR0001"),
(34,"2021-03-07 10:15:57","HUM0002","Status","Active","Deceased","USR0001","USR0001"),
(35,"2021-03-07 10:16:03","HUM0002","Status","Deceased","Active","USR0001","USR0001"),
(36,"2021-03-07 10:16:08","HUM0001","Status","Disputed","Active","USR0001","USR0001"),
(37,"2021-03-07 15:03:16","HUM0005","Status","Active","Disputed","USR0001","USR0001"),
(38,"2021-03-07 15:03:26","HUM0005","Status","Disputed","Active","USR0001","USR0001"),
(39,"2021-03-07 15:03:38","HUM0005","Phone",615441415,615441414,"USR0001","USR0001"),
(40,"2021-03-07 15:15:34","HUM0005","Status","Active","Deceased","USR0001","USR0001"),
(41,"2021-03-07 15:15:47","HUM0005","Status","Deceased","Active","USR0001","USR0001"),
(42,"2021-03-07 16:44:42","HUM0001","Status","Active","Moved","USR0001","USR0001"),
(43,"2021-03-08 10:27:52","HUM0003","National ID","BA123123",123123,"USR0001","USR0001"),
(44,"2021-03-08 10:27:57","HUM0004","National ID","NB121212",121212,"USR0002","USR0002"),
(45,"2021-03-08 10:28:00","HUM0001","National ID","454111AB",454111,"USR0001","USR0001"),
(46,"2021-03-08 10:28:06","HUM0002","National ID","MN12191",12191,"USR0001","USR0001"),
(47,"2021-03-08 11:45:10","HUM0006","Status","Active","Deceased","USR0001","USR0001"),
(48,"2021-03-08 11:46:10","HUM0005","Status","Active","Deceased","USR0001","USR0001"),
(49,"2021-03-08 11:46:18","HUM0005","Status","Deceased","Disputed","USR0001","USR0001"),
(50,"2021-03-08 16:13:52","HUM0005","Status","Disputed","Active","USR0001","USR0001"),
(51,"2021-03-08 16:13:57","HUM0006","Status","Deceased","Active","USR0001","USR0001"),
(52,"2021-03-09 13:41:21","HUM0008","Status","Active","Disputed","USR0001","USR0001"),
(53,"2021-03-09 13:41:26","HUM0008","Status","Disputed","Active","USR0001","USR0001"),
(54,"2021-03-09 13:49:48","HUM0008","Nick Name","","Fere","USR0001","USR0001"),
(55,"2021-03-09 13:49:48","HUM0008","Address"," ~  ~ ","  ~    ~  ","USR0001","USR0001"),
(56,"2021-03-09 13:56:38","HUM0006","Status","Active","Deceased","USR0001","USR0001"),
(57,"2021-03-10 11:09:26","HUM0001","Status","Moved","Disputed","USR0001","USR0001"),
(58,"2021-03-11 11:08:46","HUM0002","Status","Active","Disputed","USR0001","USR0001"),
(59,"2021-03-11 11:08:58","HUM0003","Status","Active","Disputed","USR0001","USR0001"),
(60,"2021-03-11 11:09:10","HUM0005","Status","Active","Disputed","USR0001","USR0001"),
(61,"2021-03-11 11:09:28","HUM0004","Status","Active","Moved","USR0002","USR0002"),
(62,"2021-03-11 11:09:35","HUM0012","Status","Active","Moved","USR0001","USR0001"),
(63,"2021-03-11 11:09:42","HUM0008","Status","Active","Moved","USR0001","USR0001"),
(64,"2021-03-11 11:09:50","HUM0009","Status","Active","Moved","USR0001","USR0001");



DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `Member_Id` varchar(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `SecondName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Nickname` varchar(50) NOT NULL,
  `mother_name` varchar(30) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `NationalID` bigint(20) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(25) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Registered_Date` date NOT NULL,
  `Modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(15) NOT NULL,
  `MemberType` varchar(25) NOT NULL DEFAULT 'Individual',
  `Family_id` varchar(20) DEFAULT '''''',
  `Status` varchar(25) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`Member_Id`),
  UNIQUE KEY `NationalID` (`NationalID`),
  UNIQUE KEY `Phone` (`Phone`),
  KEY `MemberAndfFamily` (`Family_id`),
  CONSTRAINT `MemberAndfFamily` FOREIGN KEY (`Family_id`) REFERENCES `family` (`Family_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `members` VALUES ("HUM0001","Mohamed","ahmed","Hassan","Naqib","","Male",454111,45453322,"ali@gmai.com","Somaliland Berahan","2021-03-04","2021-03-04 17:17:52","USR0001","Individual",NULL,"Disputed"),
("HUM0002","Ali ","Ahmed","Mohamed","farah","","Male",12191,1212222,"ali@gmai.com","Muqdisho Somalia","2021-03-06","2021-03-06 10:29:42","USR0001","Family","FM011","Disputed"),
("HUM0003","Abdirahman Haji","jaamac","Gelle","gedi","","Male",123123,12009191,"haji@gmail.com","Muqdisho - Somalia ","2021-03-06","2021-03-06 10:30:37","USR0001","Family","FM011","Disputed"),
("HUM0004","Naqib","Ali","Hassan","Naqib","","Male",121212,0071010112,"Naqib12@naq.so","Benadir Muqdisho","2021-03-06","2021-03-06 00:00:00","USR0002","Family","FM011","Moved"),
("HUM0005","Mohamed","Ahmed","Nour","ahmed","","Male",4541114,615441414,"ahmed@gmail.com","Yaaqshid","2021-03-07","2021-03-07 00:00:00","USR0001","Family","FM011","Disputed"),
("HUM0006","Hassan","Mohamed","Bashir","hassan","","Male",45411145,615874474,"hasan@just.edu.so","Yaaqshid","2021-03-07","2021-03-07 15:14:51","USR0001","Individual",NULL,"Deceased"),
("HUM0008","Tester","Ali","","Fere","Asho","Male",12121,12312,"","  ~    ~  ","2021-03-09","2021-03-09 00:00:00","USR0001","Family","FM011","Moved"),
("HUM0009","Tester","Ali","ahmed","Fere","Asho","Male",121211,123423,"c@w.so","Digfeer ~ OS121 ~ Benaadir","2021-03-09","2021-03-09 13:42:12","USR0001","Family","FM011","Moved"),
("HUM0010","Tester","Ali","","","","Male",12122,"","","KM4 ~ TLX01 ~ Cabdi Qaasim","2021-03-09","2021-03-09 13:53:45","USR0001","Family","FM011","Active"),
("HUM0012","Mohamed ","Farah","","","","",132331116,NULL,"","","2021-03-09","2021-03-09 16:11:06","USR0001","Family","FM011","Moved"),
("HUM0013","Mohamed ","Ali","","","","",1122113,NULL,"","","2021-03-09","2021-03-09 16:13:40","USR0001","Family","FM011","Active"),
("HUM0014","Naqib","Farah","","","","",65755656,NULL,"","","2021-03-09","2021-03-09 16:13:40","USR0001","Family","FM011","Active"),
("HUM0015","Jimcaale","hashi","","","","",8904854,NULL,"","","2021-03-09","2021-03-09 16:13:41","USR0001","Family","FM011","Active"),
("HUM0016","yasin","Omar","","","","",867868,NULL,"","","2021-03-09","2021-03-09 16:13:41","USR0001","Family","FM011","Active"),
("HUM0017","Mohamed","Gashaan","","","","Male",12121212,NULL,"","","2021-03-09","2021-03-09 16:28:03","USR0001","Family","FM012","Active"),
("HUM0018","Mustafa","Dahir","","","","Male",2147483647,NULL,"","","2021-03-09","2021-03-09 16:28:03","USR0001","Family","FM012","Active"),
("HUM0019","hussein","Hasan","","","","Male",1213552234,NULL,"","","2021-03-09","2021-03-09 16:28:03","USR0001","Family","FM012","Active"),
("HUM0020","mustaf","Mohamed","","","","Male",13411,NULL,"","","2021-03-09","2021-03-09 16:35:26","USR0001","Family","FM013","Active"),
("HUM0021","Naqib","Ali","","","","Male",12311231,NULL,"","","2021-03-09","2021-03-09 16:35:26","USR0001","Family","FM013","Active"),
("HUM0022","","","","","","Male",0,NULL,"","","2021-03-09","2021-03-09 16:35:26","USR0001","Family","FM027","Active"),
("HUM0023","mustaf","Mohamed","","","","Male",1341134,NULL,"","","2021-03-09","2021-03-09 16:37:30","USR0001","Family","FM014","Active"),
("HUM0024","Naqib","Ali","","","","Male",1231123199,NULL,"","","2021-03-09","2021-03-09 16:37:30","USR0001","Family","FM014","Active"),
("HUM0025","Abdi qaasim","Mohamed","","","","Male",65474655,NULL,"","","2021-03-09","2021-03-09 16:40:44","USR0001","Family","FM015","Active"),
("HUM0026","Abdikarim","Hashi","","","","Male",11889900,NULL,"","","2021-03-09","2021-03-09 16:40:44","USR0001","Family","FM015","Active"),
("HUM0027","Farxaan Mohamed","Jamac","","","","Male",44252323,NULL,"","","2021-03-09","2021-03-09 16:40:44","USR0001","Family","FM015","Active"),
("HUM0028","Bashiir","Mohamed","","","","Male",9191013,NULL,"","","2021-03-09","2021-03-09 16:52:57","USR0001","Family","FM016","Active"),
("HUM0029","Bashiir","Mohamed","","","","Male",91910134,NULL,"","","2021-03-09","2021-03-09 16:54:55","USR0001","Family","FM017","Active"),
("HUM0030","Bashiir","Mohamed","","","","Male",919101347,NULL,"","","2021-03-09","2021-03-09 16:55:40","USR0001","Family","FM018","Active"),
("HUM0031","Hashim","Gel","","","","Male",11559767,NULL,"","","2021-03-09","2021-03-09 17:02:24","USR0001","Family","FM021","Active"),
("HUM0032","Abdi qaasimq","Mohamed1","","","","Male",224121756,NULL,"","","2021-03-09","2021-03-09 17:02:24","USR0001","Family","FM021","Active"),
("HUM0033","Bashiiry","Mohamed12","","","","Male",12435545,NULL,"","","2021-03-09","2021-03-09 17:02:24","USR0001","Family","FM021","Active"),
("HUM0034","Tester","Ali","","","","Male",1212165756,NULL,""," ~  ~ ","2021-03-10","2021-03-10 11:29:18","USR0001","Family","FM012","Active"),
("HUM0035","Tester","Ali","","","","Male",121212339,NULL,""," ~  ~ ","2021-03-10","2021-03-10 11:30:19","USR0001","Family","FM012","Active"),
("HUM0036","Tester","Ali","","","","Male",12121111113,NULL,"cajmaan33@gmail.com"," ~  ~ ","2021-03-10","2021-03-10 12:33:50","USR0001","Family","FM012","Active"),
("HUM0037","Tester","Ali","","","","Male",12123166778,NULL,""," ~  ~ ","2021-03-10","2021-03-10 13:17:01","USR0001","Family","FM012","Active"),
("HUM0038","Tester","Ali","","","","Male",12121211311,NULL,""," ~  ~ ","2021-03-10","2021-03-10 13:17:40","USR0001","Family","FM012","Active"),
("HUM0039","asho","Ali","","","","Male",3542342,NULL,"","","2021-03-10","2021-03-10 13:30:02","USR0001","Family","FM022","Active"),
("HUM0040","fdsf","dfsdf","","","","Male",12121211111,NULL,"","","2021-03-10","2021-03-10 14:05:34","USR0001","Family","FM023","Active"),
("HUM0041","fbdf","vbvbf","","","","Male",11111111111,NULL,"","","2021-03-10","2021-03-10 14:05:34","USR0001","Family","FM023","Active"),
("HUM0042","fvxfr","vsf","","","","Male",12124532453,NULL,"","","2021-03-10","2021-03-10 14:05:34","USR0001","Family","FM023","Active"),
("HUM0043","Hashim","bashiir","","","","",11122233345,NULL,"","","2021-03-10","2021-03-10 14:35:56","USR0001","Family","FM024","Active"),
("HUM0044","Mohamed","hsdf","","","","",88899955533,NULL,"","","2021-03-10","2021-03-10 14:35:56","USR0001","Family","FM024","Active"),
("HUM0045","Naqib","Gashaan","","","","",55877523211,NULL,"","","2021-03-10","2021-03-10 14:35:56","USR0001","Family","FM024","Active"),
("HUM0046","Tester","Moha","","","","Male",12121121210,NULL,"","","2021-03-10","2021-03-10 14:52:40","USR0001","Family","FM026","Active"),
("HUM0047","Tester","Alif","Garad","Hashi","fadumo","Male",12121673676,743336765,"ali@gmail.com","laami yaraha # 343 # Soope","2021-03-10","2021-03-10 14:54:11","USR0001","Family","FM026","Active"),
("HUM0048","kamaal","Ahmed","Muhumad","RA","Faadumo","Male",12121765627,091001011,"me@test.so","Abdiqasim # 1223 # Hodan","2021-03-11","2021-03-11 09:29:49","USR0001","Family","FM027","Active"),
("HUM0049","Ridwan","Ahmed","","","","Male",13121231212,NULL,"","","2021-03-11","2021-03-11 00:00:00","USR0001","Family","FM025","Active"),
("HUM0050","Dahir","Mohamed","","","","",24234313234,NULL,"","","2021-03-11","2021-03-11 09:32:19","USR0001","Family","FM025","Active"),
("HUM0051","Faadumo","Ali","","","","",23423321332,NULL,"","","2021-03-11","2021-03-11 09:32:19","USR0001","Family","FM025","Active");

DROP TRIGGER IF EXISTS `members_update_tr`;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` TRIGGER `members_update_tr` AFTER UPDATE ON `members` FOR EACH ROW BEGIN

IF OLD.`FirstName` <> NEW.`FirstName` THEN

call new_log_sp(OLD.`Member_Id`,'First Name',OLD.`FirstName`,NEW.`FirstName`, OLD.`user_id`, NEW.`user_id`);

END IF;

IF OLD.`SecondName` <> NEW.`SecondName` THEN

call new_log_sp(OLD.`Member_Id`,'Second Name',OLD.`SecondName`,NEW.`SecondName`, OLD.`user_id`, NEW.`user_id`);

END IF;

IF OLD.`Surname` <> NEW.`Surname` THEN

call new_log_sp(OLD.`Member_Id`,'Sur Name',OLD.`Surname`,NEW.`Surname`, OLD.`user_id`, NEW.`user_id`);

END IF;

IF OLD.`Nickname` <> NEW.`Nickname` THEN

call new_log_sp(OLD.`Member_Id`,'Nick Name', OLD.`Nickname`,NEW.`Nickname`, OLD.`user_id`, NEW.`user_id`);

END IF;
IF OLD.`NationalID` <> NEW.`NationalID` THEN

call new_log_sp(OLD.`Member_Id`,'National ID', OLD.`NationalID`,NEW.`NationalID`, OLD.`user_id`, NEW.`user_id`);

END IF;
IF OLD.`Phone` <> NEW.`Phone` THEN

call new_log_sp(OLD.`Member_Id`,'Phone',OLD.`Phone`,NEW.`Phone`, OLD.`user_id`, NEW.`user_id`);

END IF;

IF OLD.`Address` <> NEW.`Address` THEN

call new_log_sp(OLD.`Member_Id`,'Address',OLD.`Address`,NEW.`Address`, OLD.`user_id`, NEW.`user_id`);

END IF;

IF OLD.`Status` <> NEW.`Status` THEN

call new_log_sp(OLD.`Member_Id`,'Status',OLD.`Status`,NEW.`Status`, OLD.`user_id`, NEW.`user_id`);

END IF;

IF OLD.`Family_id` <> NEW.`Family_id` THEN

call new_log_sp(OLD.`Member_Id`,'Family',OLD.`Family_id`,NEW.`Family_id`, OLD.`user_id`, NEW.`user_id`);

END IF;


END$$

DELIMITER ;

DROP TRIGGER IF EXISTS `members_delete_tr`;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` TRIGGER `members_delete_tr` AFTER DELETE ON `members` FOR EACH ROW BEGIN

INSERT INTO `member_delete_logs`(`date_time`, `user_id`, `data`) 

SELECT CURRENT_TIMESTAMP(), @log_user_deletes, concat_ws(' ~ ',OLD.`Member_Id`, OLD.`FirstName`, OLD.`SecondName`, OLD.`Surname`, OLD.`Nickname`, OLD.`Gender`, OLD.`NationalID`, OLD.`Phone`, OLD.`Email`, OLD.`Address`, OLD.`Registered_Date`, OLD.`Modified_date`, OLD.`user_id`, OLD.`MemberType`, OLD.`Family_id`, OLD.`Status`) FROM `members`;



END$$

DELIMITER ;



DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menu_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`,`module`),
  KEY `menu_user_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` VALUES ("MN001","Dashbaords","Dashboard","fa-chart-line","USR0001","2020-08-19","2020-08-19 16:21:33"),
("MN003","Manage Employees","HRM","fa-user-tie","USR0001","2020-08-19","2020-08-19 16:26:35"),
("MN004","Menu","Setting","fa-bars","USR0001","2020-08-19","2020-08-19 16:22:21"),
("MN005","Permissions","Setting","fa-cog","USR0001","2020-08-19","2020-08-19 16:22:29"),
("MN006","User","Setting","fa fa-user","USR0001","2020-08-29","2020-08-29 10:38:13"),
("MN023","Manage Families","Family","fa-users","USR0001","2021-02-16","2021-02-16 15:01:00"),
("MN024","Manage Members","Members","fa-user","USR0001","2021-02-16","2021-02-16 15:09:53"),
("MN025","Member Report","Report","fa-copy","USR0001","2021-02-16","2021-02-16 15:14:25"),
("MN026","Family Report","Family Report","fa-copy","USR0001","2021-03-01","2021-03-01 11:36:38"),
("MN027","Member Logs","logs","fa-history","USR0001","2021-03-03","2021-03-03 10:32:53"),
("MN028","Backup","Backup And Restore","fa-database","USR0001","2021-03-10","2021-03-10 09:39:18");



DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `head_name` varchar(100) NOT NULL,
  `footer` varchar(10000) NOT NULL,
  `body` varchar(600) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `icon_white` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `logo_white` varchar(100) NOT NULL,
  `back_img_1` varchar(100) NOT NULL,
  `back_img_2` varchar(100) NOT NULL,
  `back_img_3` varchar(100) NOT NULL,
  `back_img_4` varchar(100) NOT NULL,
  `sms` varchar(20) NOT NULL DEFAULT 'OFF',
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `settings` VALUES (1,"Al-Huda Islamic center","Al-Huda Islamic center","Copyright Â© 2021 <b>Al-Huda Islamsk Senter </b>. Developed by  <a href=\"https://jtech.so\">Jamhuriya Technology Solutions</a> All rights reserved.","Jamhuriya Technology Solutions - JTech is a professional technology solution service provider and ICT training center founded in 2020 by Jamhuriya University of Science and Technology in Mogadishu, Somalia. JTech has been established to fill the gap (of quality and creativity) in the field of ICT solutions.","fav.png","fav_white.png","logo.png","logo_white.png","1.png","2.png","3.png","4.png","ON","2020-09-13 10:29:35");



DROP TABLE IF EXISTS `sub_menu`;

CREATE TABLE `sub_menu` (
  `submenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auto` int(20) NOT NULL,
  PRIMARY KEY (`submenu_id`),
  KEY `menu_id` (`menu_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

INSERT INTO `sub_menu` VALUES (6,"Country","country","MN002","USR0001","2020-08-19","2020-08-19 16:24:40",1),
(7,"Region","region","MN002","USR0001","2020-08-19","2020-08-19 16:24:56",2),
(8,"District","district","MN002","USR0001","2020-08-19","2020-08-19 16:25:36",3),
(10,"Employee","employee","MN003","USR0001","2020-08-19","2020-08-19 16:29:59",5),
(11,"Menu","menus","MN004","USR0001","2020-08-19","2020-08-19 16:30:55",11),
(13,"Menu permissions","permissions","MN005","USR0001","2020-08-19","2020-08-19 16:31:29",14),
(14,"Settings","settings","MN005","USR0001","2020-08-19","2020-08-19 16:31:45",16),
(27,"User","users","MN006","USR0001","2020-08-29","2020-08-29 10:39:04",12),
(45,"Defaut Dashboard","default_dashboard","MN001","USR0001","2020-10-10","2020-10-10 07:01:55",0),
(56,"Submenu Arrangement","submenu_arragnment","MN005","USR0001","2020-10-17","2020-10-17 16:41:38",15),
(57,"Branches","branches","MN016","USR0001","2020-11-17","2020-11-17 09:37:23",4),
(58,"Customer","customer","MN007","USR0001","2020-11-17","2020-11-17 12:25:20",4),
(59,"Aircrafts","aircrafts","MN008","USR0001","2020-11-17","2020-11-17 13:25:07",7),
(60,"New Flight Schedule","new_flight_schedule","MN009","USR0001","2020-11-17","2020-11-17 13:54:02",8),
(61,"Flight Schedules","flight_schedules","MN009","USR0001","2020-11-17","2020-11-17 13:54:30",9),
(62,"Schedule Preview","schedule_preview","MN009","USR0001","2020-11-17","2020-11-17 13:54:54",10),
(63,"Tickets ","tickets","MN010","USR0001","2020-11-21","2020-11-21 11:01:07",12),
(64,"Bank Accounts","accounts","MN011","USR0001","2020-11-21","2020-11-21 13:51:11",5),
(65,"Receipts","receipts","MN011","USR0001","2020-11-21","2020-11-21 13:51:29",6),
(66,"Search Receipt","receipt_view","MN011","USR0001","2020-11-21","2020-11-21 13:52:09",7),
(67,"Search Ticket","ticket_view","MN010","USR0001","2020-12-06","2020-12-06 10:36:56",13),
(68,"Account Receivable ","ac_receivable","MN011","USR0001","2020-12-06","2020-12-06 13:09:49",8),
(69,"Customer Report","customer_report","MN012","USR0001","2020-12-06","2020-12-06 13:16:20",10),
(70,"Statement Report","statement","MN012","USR0001","2020-12-06","2020-12-06 13:16:37",11),
(71,"Aircrafts Report","aircrafts_report","MN013","USR0001","2020-12-06","2020-12-06 13:17:20",26),
(74,"Receipt Report","receipt_report","MN015","USR0001","2020-12-06","2020-12-06 13:18:49",12),
(76,"Income Statement","income_statement","MN017","USR0001","2020-12-17","2020-12-17 09:58:54",32),
(77,"Balance Sheet","balance_sheet","MN017","USR0001","2020-12-17","2020-12-17 09:59:07",33),
(79,"Expense","expense","MN018","USR0001","2020-12-17","2020-12-17 10:08:19",9),
(90,"Signals","Signals","MN022","USR0001","2021-01-09","2021-01-09 16:03:57",2),
(92,"Family","family","MN023","USR0001","2021-02-16","2021-02-16 15:07:39",4),
(93,"Members","members","MN024","USR0001","2021-02-16","2021-02-16 15:10:17",2),
(94,"Members Report","member_report","MN025","USR0001","2021-02-16","2021-02-16 15:15:46",6),
(95,"Member info","member_info","MN024","USR0001","2021-02-23","2021-02-23 10:36:59",3),
(96,"Family Report","Family_report","MN026","USR0001","2021-03-01","2021-03-01 11:38:07",9),
(97,"Update Logs","update_logs","MN027","USR0001","2021-03-03","2021-03-03 10:36:23",7),
(98,"Delete Logs","delete_logs","MN027","USR0001","2021-03-03","2021-03-03 10:36:52",8),
(99,"Admin Dashboard","dashboard","MN001","USR0001","2021-03-04","2021-03-04 11:32:23",1),
(100,"user authority","user_auth","MN006","USR0001","2021-03-06","2021-03-06 15:19:22",13),
(101,"Backups","backup","MN028","USR0001","2021-03-10","2021-03-10 09:39:40",10);



DROP TABLE IF EXISTS `user_authorize`;

CREATE TABLE `user_authorize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `submenu_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `submenu_id` (`submenu_id`),
  KEY `user_id` (`user_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=995 DEFAULT CHARSET=utf8;

INSERT INTO `user_authorize` VALUES (950,"USR0002","MN001",45,"USR0001","2021-03-06","2021-03-06 16:58:00"),
(951,"USR0002","MN024",93,"USR0001","2021-03-06","2021-03-06 16:58:00"),
(952,"USR0002","MN024",95,"USR0001","2021-03-06","2021-03-06 16:58:00"),
(974,"USR0003","MN001",45,"USR0001","2021-03-07","2021-03-07 15:34:03"),
(975,"USR0003","MN023",92,"USR0001","2021-03-07","2021-03-07 15:34:03"),
(976,"USR0003","MN024",93,"USR0001","2021-03-07","2021-03-07 15:34:03"),
(977,"USR0003","MN024",95,"USR0001","2021-03-07","2021-03-07 15:34:03"),
(978,"USR0001","MN028",101,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(979,"USR0001","MN001",45,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(980,"USR0001","MN001",99,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(981,"USR0001","MN023",92,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(982,"USR0001","MN026",96,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(983,"USR0001","MN003",10,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(984,"USR0001","MN027",97,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(985,"USR0001","MN027",98,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(986,"USR0001","MN024",93,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(987,"USR0001","MN024",95,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(988,"USR0001","MN025",94,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(989,"USR0001","MN004",11,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(990,"USR0001","MN005",13,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(991,"USR0001","MN005",14,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(992,"USR0001","MN005",56,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(993,"USR0001","MN006",27,"USR0001","2021-03-10","2021-03-10 09:39:57"),
(994,"USR0001","MN006",100,"USR0001","2021-03-10","2021-03-10 09:39:57");



DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `log` varchar(20) NOT NULL DEFAULT 'Offline',
  `status` varchar(50) NOT NULL,
  `password_status` varchar(20) DEFAULT 'No',
  `employee_id` varchar(20) DEFAULT NULL,
  `created_date` date NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `employee_id` (`employee_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` VALUES ("USR0001","admin","*23AE809DDACAF96AF0FD78ED04B6A265E05AA257","Admin","Online","Active","Yes","EM2101","2020-08-18","2020-08-18 13:29:47"),
("USR0002","user","*23AE809DDACAF96AF0FD78ED04B6A265E05AA257","User","Online","Active","Yes","EM2102","2021-03-03","2021-03-03 11:26:47"),
("USR0003","samad","*23AE809DDACAF96AF0FD78ED04B6A265E05AA257","User","Online","Active","No","EM2104","2021-03-07","2021-03-07 14:52:33");



DROP TABLE IF EXISTS `users_link`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_link` AS select `ua`.`id` AS `id`,`ua`.`user_name` AS `user_name`,`ua`.`submenu_id` AS `submenu_id`,`s`.`link` AS `link` from (`user_authorize` `ua` join `sub_menu` `s` on((`s`.`submenu_id` = `ua`.`submenu_id`)));

INSERT INTO `users_link` VALUES (950,"USR0002",45,"default_dashboard"),
(951,"USR0002",93,"members"),
(952,"USR0002",95,"member_info"),
(974,"USR0003",45,"default_dashboard"),
(975,"USR0003",92,"family"),
(976,"USR0003",93,"members"),
(977,"USR0003",95,"member_info"),
(978,"USR0001",101,"backup"),
(979,"USR0001",45,"default_dashboard"),
(980,"USR0001",99,"dashboard"),
(981,"USR0001",92,"family"),
(982,"USR0001",96,"Family_report"),
(983,"USR0001",10,"employee"),
(984,"USR0001",97,"update_logs"),
(985,"USR0001",98,"delete_logs"),
(986,"USR0001",93,"members"),
(987,"USR0001",95,"member_info"),
(988,"USR0001",94,"member_report"),
(989,"USR0001",11,"menus"),
(990,"USR0001",13,"permissions"),
(991,"USR0001",14,"settings"),
(992,"USR0001",56,"submenu_arragnment"),
(993,"USR0001",27,"users"),
(994,"USR0001",100,"user_auth");



SET foreign_key_checks = 1;
