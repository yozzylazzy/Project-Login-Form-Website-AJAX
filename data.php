<?php
require_once('connection.php');
require_once('account.php');

function getAllAccount()
{
    $sql = "SELECT * FROM user_account";
    try {
        $conn = createConnection();
        $result = $conn->query($sql, PDO::FETCH_ASSOC);
        $i = 0;
        $accounts = [];
        while ($account = $result->fetch()) {
            $username = $account['username'];
            $password = $account['password'];
            $fullname = $account['fullname'];
            $email = $account['email'];
            $address = $account['address'];
            $phone = $account['phone'];
            $accounts[$i] = $account = new Account($username, $password, $fullname, $email, $address, $phone);
            $i++;
        }
        return $accounts;
    } catch (PDOException $e) {
        die('Error reading data: ' . $e->getMessage());
    }
}

function addNewAccount($payload)
{
    try {
        $conn = createConnection();
        $sql = 'INSERT INTO user_account (username, password, fullname, email, address, phone) VALUES (?, ?, ?, ?,?,?)'; //prepare statement -> mendefinisikan dlu query sbelom di masukkan nilainya/eksekusi
        $statement = $conn->prepare($sql);
        $statement->execute([
            $payload['username'], $payload['password'], $payload['firstname']. ' '. $payload['lastname'], $payload['email'], $payload['address'], $payload['phone']
        ]);
    } catch (PDOException $e) {
        die('Error creating data: ' . $e->getMessage());
    }
}

function getSingleAccountInfo($username)
{
    try {
        $conn = createConnection();
        $sql = "SELECT * FROM user_account WHERE username = $username";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);
        $account = $result->fetch();
        // Store each data in variables
        $username = $account['username'];
        $password = $account['password'];
        $fullname = $account['fullname'];
        $email = $account['email'];
        $address = $account['address'];
        $phone = $account['phone'];
        $account = new Account($username, $password, $fullname, $email, $address, $phone);
        return;
    } catch (PDOException $e) {
        die('Error reading data: ' . $e->getMessage());
    }
}

function cekLogin($username, $password)
{

    try {
        $conn = createConnection();
        $output = false;
        $sql = "SELECT COUNT(*) FROM user_account WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        $hasil = $result->fetch();
        //print_r($hasil[0]);
        /*if ($hasil[0] != 0) {
            $output = true;
        } else {
            $output = false;
        }*/
        //print_r($output);
        return $hasil[0];
    } catch (PDOException $e) {
        die('Error reading data: ' . $e->getMessage());
    }
}


/*function updateProduct($payload)
{
    try {
        $conn = createConnection();
        $sql = 'UPDATE products SET name=?, price=?, image_url=?, options=? WHERE id=?';
        $statement = $conn->prepare($sql);
       
        $statement->execute([
            $payload['name'], $payload['price'], $payload['imageUrl'], json_encode($options),
            $payload['id']
        ]);
    } catch (PDOException $e) {
        die('Error updating data: ' . $e->getMessage());
    }
}

function deleteProduct($id)
{
    try {
        $conn = createConnection();
        $sql = "DELETE FROM products WHERE id = $id";
        $conn->query($sql);
    } catch (PDOException $e) {
        die('Error deleting data: ' . $e->getMessage());
    }
}*/
