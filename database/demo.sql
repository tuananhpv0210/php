/*
Author: tuananhpv0210
Updated_at: 00:42 24/08/2020
*/

-- Drop database
DROP DATABASE IF EXISTS demophp;
CREATE DATABASE demophp CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE demophp;

-- Create users
DROP TABLE IF EXISTS users;
CREATE TABLE users(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(50) not null,
	email varchar(30) UNIQUE,
	username varchar(30) UNIQUE,
	password varchar(200) not null,
	birthday date,
	address varchar(30),
	created_at TIMESTAMP NOT NULL DEFAULT NOW(),
  	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE now()
 );
	