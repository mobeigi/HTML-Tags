<?php

include_once('postgres.php');

$pg = new postgres();

$pg->_pg_connect();

$pg->_pg_query('DROP TABLE IF EXISTS trips');
$pg->_pg_query('DROP TABLE IF EXISTS image_groups');
$pg->_pg_query('DROP TABLE IF EXISTS images');

$query = '
CREATE TABLE trips (
	trip_id varchar(10) serial primary key,
);'
$pg->_pg_query($query);
$query = '
CREATE TABLE image_groups (
	group_id varchar(10) serial primary key, 
	trip_id varchar(10) references trips(trip_id) not null on delete cascade,	
);';
$pg->_pg_query($query);
$query = '
CREATE TABLE images (
	image_id varchar(10) serial primary key,
	group_id varchar(10) references image_groups(group_id) on delete cascade,
);';
$pg->_pg_query($query);
$query = '
ALTER TABLE image_groups (
	cover_image varchar(10) references images(image_id)
);';
$pg->_pg_query($query);
$query = '
CREATE TABLE comments (
	comment_id serial primary key,
	image_id varchar(10) references images(image_id) on delete cascade,	
);';
?>
