<?php

include_once('postgres.php');

$host = '23.102.176.176';
$username = 'azureuser';
$password = 'RLSfTv3Ewx';
$database = 'test';
$port = 5432;
$pg = new postgres();
echo 'attempting to connect to db';
$pg->_pg_connect($host, $username, $password, $database, $port);
echo 'dropping all tables';
$pg->_pg_query('DROP TABLE IF EXISTS trips');
$pg->_pg_query('DROP TABLE IF EXISTS image_groups');
$pg->_pg_query('DROP TABLE IF EXISTS images');
echo 'c1';
$query = '
CREATE TABLE trips (
	trip_id varchar(10) SERIAL PRIMARY KEY,
	name varchar(64) NOT NULL,
	description varchar(256), 
)';
$pg->_pg_query($query);
echo 'c2';
$query = '
CREATE TABLE image_groups (
	group_id varchar(10) SERIAL PRIMARY KEY, 
	trip_id varchar(10) REFERENCES trips(trip_id) NOT NULL ON DELETE CASCADE,	
	name varchar(64) NOT NULL,
	longitude float(10) NOT NULL,
	latitude float(10) NOT NULL
)';
$pg->_pg_query($query);
echo 'c3';
$query = '
CREATE TABLE images (
	image_id varchar(10) SERIAL PRIMARY KEY,
	group_id varchar(10) REFERENCES image_groups(group_id) ON DELETE CASCADE,
	description varchar(256),
)';
$pg->_pg_query($query);
echo 'c4';
$query = '
ALTER TABLE trips (
	ADD cover_image varchar(10) REFERENCES images(image_id)
)';
$pg->_pg_query($query);
echo 'c5';
$query = '
ALTER TABLE image_groups (
	ADD cover_image varchar(10) REFERENCES images(image_id)
)';
$pg->_pg_query($query);
echo 'c6';
$query = '
CREATE TABLE comments (
	comment_id SERIAL PRIMARY KEY,
	image_id varchar(10) REFERENCES images(image_id) ON DELETE CASCADE,	
)';
$pg->_pg_query($query);
echo 'c7';
?>
