<?php
//
// Generate Database Installation Script...
//
include('_session.php');

$pg->_pg_query('DROP TABLE IF EXISTS images CASCADE');
$pg->_pg_query('DROP TABLE IF EXISTS image_groups CASCADE');
$pg->_pg_query('DROP TABLE IF EXISTS trips CASCADE');
$pg->_pg_query('DROP TABLE IF EXISTS comments CASCADE');
$pg->_pg_query('DROP TABLE IF EXISTS users CASCADE');
// $pg_connect_id = pg_connect($connection_string);
// $query = "INSERT INTO trips (trip_id, name, description, owner_id, cover_image) VAlUES ($1, $2, $3, $4, $5)"
// pg_query_params($pg_connect_id, $query, $var1 ... $varn);
$query = '
CREATE TABLE trips (
	trip_id serial PRIMARY KEY,
	name varchar(64) NOT NULL,
	description varchar(256),
	privacy varchar(64)
)';
$pg->_pg_query($query);
// INSERT INTO image_groups(group_id, trip_id, name, longitude, latitude, cover_image) VALUES ($?)
$query = '
CREATE TABLE image_groups (
	group_id serial PRIMARY KEY,
	trip_id integer REFERENCES trips(trip_id) NOT NULL,
	name varchar(64) NOT NULL,
	longitude float(10),
	latitude float(10),
	location varchar(256)
)';
$pg->_pg_query($query);
// INSERT INTO images(image_id, group_id, description) VALUES ($?)
$query = '
CREATE TABLE images (
	image_id serial PRIMARY KEY,
	group_id integer REFERENCES image_groups(group_id),
	description varchar(256),
	path varchar(256)
)';
$pg->_pg_query($query);
$query = 'ALTER TABLE trips ADD COLUMN cover_image integer REFERENCES images(image_id)';
$pg->_pg_query($query);
$query = 'ALTER TABLE image_groups ADD COLUMN cover_image integer REFERENCES images(image_id)';
$pg->_pg_query($query);
// INSERT INTO comments (comment_id, image_id) VALUES ($?)
$query = '
CREATE TABLE comments (
	comment_id serial PRIMARY KEY,
	image_id integer REFERENCES images(image_id)
)';
$pg->_pg_query($query);
// INSERT INTO users (user_id, user_email, user_name, user_password, profile_picture) VALUES ($?)
$query = '
CREATE TABLE users (
	user_id serial PRIMARY KEY,
	user_email varchar(64),
	user_name varchar(64),
	user_password varchar(64),
	profile_picture integer REFERENCES images (image_id)
)';
$pg->_pg_query($query);
$query = 'ALTER TABLE trips ADD COLUMN owner_id integer REFERENCES users(user_id)';
$pg->_pg_query($query);
?>
