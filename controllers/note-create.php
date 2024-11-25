<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Among Them";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'You sick bastard! You are trying to rip off Tony by not adding a note, having an empty note, or having a note larger than 1000 charachters, eh?!';
    }

    if (empty($errors)){
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);

        header("Location: /notes"); //useful for when i immediately want to return, but it needs to display the error message
    }
}

require 'views/note-create.view.php';