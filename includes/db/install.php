<?php

include_once('postgres.php')
/**
$host
$username
$password
$database
$port
**/

$pg = new postgres();

$pg->_pg_connect($host, $username, $password, $database, $port);

$pg->_pg_query('DROP TABLE IF EXISTS trips');
$pg->_pg_query('DROP TABLE IF EXISTS image_groups');
$pg->_pg_query('DROP TABLE IF EXISTS images');

$query = '
CREATE TABLE trips (
	trip_id varchar(10) SERIAL PRIMARY KEY,
)'
$pg->_pg_query($query)
$query = '
CREATE TABLE image_groups (
	group_id varchar(10) SERIAL PRIMARY KEY, 
	trip_id varchar(10) REFERENCES trips(trip_id) NOT NULL ON DELETE CASCADE,	
)';
$pg->_pg_query($query)
$query = '
CREATE TABLE images (
	image_id varchar(10) SERIAL PRIMARY KEY,
	group_id varchar(10) REFERENCES image_groups(group_id) ON DELETE CASCADE,
)';
$pg->_pg_query($query)
$query = '
ALTER TABLE image_groups (
	ADD cover_image varchar(10) REFERENCES images(image_id)
)';
$pg->_pg_query($query)
$query = '
CREATE TABLE comments (
	comment_id SERIAL PRIMARY KEY,
	image_id varchar(10) REFERENCES images(image_id) ON DELETE CASCADE,	
)';
?>
