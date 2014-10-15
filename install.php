<?php

include_once('postgres.php');

$pg = new postgres();
if(!function_exists('pg_connect')) {
	return false;
}
$host = '23.102.176.176';
$username = 'azureuser';
$database = 'test';
$password = 'RLSfTv3Ewx';
$port = '5432';
$pg->_pg_connect($host, $username, $password, $database, $port);

if(!function_exists('pg_query')) {
	return false;
}
$pg->_pg_query('DROP TABLE IF EXISTS users CASCADE');
$pg->_pg_query('DROP TABLE IF EXISTS images CASCADE');
$pg->_pg_query('DROP TABLE IF EXISTS image_groups CASCADE');
$pg->_pg_query('DROP TABLE IF EXISTS trips CASCADE');

$query = '
CREATE TABLE trips (
	trip_id varchar(10) PRIMARY KEY,
	name varchar(64) NOT NULL,
	description varchar(256),
)';
$pg->_pg_query($query);
$query = '
CREATE TABLE image_groups (
	group_id varchar(10) PRIMARY KEY, 
	trip_id varchar(10) REFERENCES trips(trip_id) NOT NULL,	
	name varchar(64) NOT NULL,
	longitude float(10) NOT NULL,
	latitude float(10) NOT NULL
)';
$pg->_pg_query($query);
$query = '
CREATE TABLE images (
	image_id varchar(10) PRIMARY KEY,
	group_id varchar(10) REFERENCES image_groups(group_id),
	description varchar(256)
)';
$pg->_pg_query($query);
$query = 'ALTER TABLE trips ADD COLUMN cover_image varchar(10) REFERENCES images(image_id)';
$pg->_pg_query($query);
$query = 'ALTER TABLE image_groups ADD COLUMN cover_image varchar(10) REFERENCES images(image_id)';
$pg->_pg_query($query);
$query = '
CREATE TABLE comments (
	comment_id varchar(10) PRIMARY KEY,
	image_id varchar(10) REFERENCES images(image_id)
)';
$pg->_pg_query($query);
$query = '
CREATE TABLE users (
	user_id varchar(10) PRIMARY KEY,
	user_email varchar(64),
	user_name varchar(64),
	user_password varchar(64),
	profile_picture varchar(10) REFERENCES images (image_id)
)';
$pg->_pg_query($query);
$query('ALTER TABLE trips ADD COLUMN owner_id varchar(10) REFERENCES users(user_id)');
$pg->_pg_query($query);
?>
