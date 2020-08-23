-- xóa cơ sở dữ liệu 
DROP DATABASE demophp;
-- tạo cơ sở dữ liệu 
CREATE DATABASE demophp CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE demophp;


-- tạo bảng danh mục với product 

CREATE TABLE tbl_user(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(50) not null,
	email varchar(50) UNIQUE,
	username varchar(50) UNIQUE,
	password varchar(255) not null,
	birthday varchar(10),
	address varchar(100),
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE now()
