CREATE TABLE passwords_resets(
	id int primary key AUTO_INCREMENT,
	userId int not null,
	code varchar(100) not null
);

ALTER TABLE passwords_resets ADD FOREIGN KEY fk_passwords_resets(userId) REFERENCES users(id);
