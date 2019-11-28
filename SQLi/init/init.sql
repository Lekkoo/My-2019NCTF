use mysql;
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'toor';
CREATE DATABASE ctf;
use ctf;
CREATE TABLE users(
	username varchar(1000) not null,
	passwd varchar(1000) not null
);
insert into users value ('admin','you_will_never_know7788990');