<?php
require_once('data.php');

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (isset($_POST['_method'])) {
        if ($_POST['_method'] == 'PUT') {
            // updateProduct($_POST);
        }
        if ($_POST['_method'] == 'DELETE') {
            // deleteProduct($_POST['id']);
        }
        if ($_POST['_method'] == 'ADD') {
            addNewAccount($_POST);
            echo 1;
        }
    } else {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (cekLogin($username, $password) == 1) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }
}
