DROP TABLE admin_login;

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `reminder_date` varchar(20) NOT NULL,
  `reminder_status` varchar(20) NOT NULL,
  `notification_status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO admin_login VALUES("1","admin","YWRtaW5AMTIzIyo=","JD Medical Store","Admin","info@gmail.com","9100000001","H.No. 005,  Indore","Indore","Madhya Pradesh","India","452001","5ea3f714db67cprofile-32.jpeg","25-04-2020","Active","Admin","::1","","","Active");



DROP TABLE customer_invoice;

CREATE TABLE `customer_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_mobile` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `medicine_id` varchar(255) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `medicine_quantity` varchar(255) NOT NULL,
  `medicine_mrp` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO customer_invoice VALUES("1","","","","","19","sdfasdf","1","45","45","45","5","40","Active","2020-04-24 12:58:11");



DROP TABLE medicine;

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(255) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `notification_quantity` int(11) NOT NULL,
  `medicine_type` varchar(20) NOT NULL,
  `other_type_description` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `pharmacy` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `notification_status` varchar(10) NOT NULL DEFAULT 'Active',
  `notification_view_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO medicine VALUES("9","Paracetamol","245","1","10","Other","Power","20.25","15","January","2020","Acbc","2020-04-19 15:39:48","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("10","sdf","45","44","45","Tab","","45","45","January","2020","dsf","2020-04-19 16:00:36","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("11","Abnc","4","2","4","Tab","","7","4","January","2020","","2020-04-19 16:02:27","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("12","asdf","4","4","4","Other","sdf","4","4","January","2020","","2020-04-19 16:06:10","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("13","dsf","4","3","4","Tab","","4","4","January","2020","","2020-04-19 16:13:05","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("14","Paracetamol","24524","50","10","Tab","","20.45","15.45","January","2020","Anora","2020-04-19 16:18:21","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("15","abc","45","43","4","Tab","","4","4","January","2020","Abc","2020-04-19 16:20:07","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("17","sdff","45","45","4","Tab","","45","45","January","2020","dsf","2020-04-19 16:28:12","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("18","sadf","4","3","4","Tab","","4","4","January","2020","","2020-04-19 16:29:16","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("19","sdfasdf","45","44","44","Other","fds","45","45","January","2020","","2020-04-19 16:30:11","Active","Active","23-04-2020");
INSERT INTO medicine VALUES("21","sadf","45","45","45","Syp","","45","45","January","2020","Anora","2020-04-20 10:33:08","Inactive","Active","23-04-2020");
INSERT INTO medicine VALUES("22","dsf","45","45","4","Tab","","45","4","January","2020","","2020-04-20 10:34:49","Inactive","Active","23-04-2020");
INSERT INTO medicine VALUES("23","dsf","45","4","4","Syp","","4","45","March","2020","Unichem","2020-04-20 10:36:04","Inactive","Active","23-04-2020");
INSERT INTO medicine VALUES("24","Larigo","4545","20","5","Tab","","10","8","January","2020","","2020-04-21 19:32:30","Inactive","Active","23-04-2020");
INSERT INTO medicine VALUES("25","Powder","45421","10","5","Other","Powder","60","55.4","January","2021","Nothing","2020-04-24 12:40:35","Inactive","Active","23-04-2020");



