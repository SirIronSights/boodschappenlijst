<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';

$notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->get();
// $notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->statement->fetchAll(); <--- this looks better. 


require "views/notes.view.php";
