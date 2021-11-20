
CREATE DATABASE IF NOT EXISTS accounts;

create table tbluser
(userid int primary key auto_increment,
firstname varchar(10),
lastname varchar(10),
email varchar(50),
phone varchar(15),
password varchar(20),
type varchar(5),
compname varchar(70)
);

INSERT INTO `tbluser`(`userid`, `firstname`, `lastname`, `email`, `phone`, `password`, `type`, `compname`) VALUES (1,'Chon','Lintakoon','admin','201-454-5454','admin','admin','FDU');


