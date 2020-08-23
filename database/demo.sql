-- xóa cơ sở dữ liệu 
DROP DATABASE demophp;
-- tạo cơ sở dữ liệu 
CREATE DATABASE demophp CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE demophp;


-- tạo bảng danh mục với product 

CREATE TABLE user(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(100) UNIQUE,
	email varchar(255) UNIQUE,
	username varchar(255) UNIQUE,
	password varchar(255) not null,
	birthday int,
	address varchar(100)
);
