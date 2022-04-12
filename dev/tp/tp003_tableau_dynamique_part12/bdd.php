<?php

if (!isset($_POST['action'])) {
    die();

}
else {
    $action = htmlspecialchars($_POST['action']);
    $action = strtolower($action);
}
switch ($action) {
    case 'getproperties':
        getProperties();
        break;

    case 'addproperty':
        if (formatDataAll()) {
            addProperty();
        }
        else {
            endConnect(false, 'Le format des données n\'est pas correct');
        }
        break;
        
    case 'updateproperty':
        if (formatData()) {
            updateProperty();
        }
        else {
            endConnect(false, 'Le format des données n\'est pas correct');
        }
        break;

    default:
        endConnect(false, 'No action set.', false);
        die();
}

function initDb($serverName, $dbName, $charset, $userName, $password) {
    $connect = 'mysql:';
    $connect .= 'host=' . $serverName . ';';
    $connect .= 'dbname=' . $dbName . ';';
    $connect .= 'charset=' . $charset . ';';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $db = new PDO($connect, $userName, $password, $options);

    return $db;
}

function getProperties() {
   $db = initDb('localhost', 'biens-immo', 'utf8', 'root', '');
   $sql = 'SELECT id, address, city, name, price FROM products ORDER BY id DESC LIMIT 20';
   $request = $db->prepare($sql);
   $request->execute();
   $response = $request->fetchAll();
   $db = null;
   endConnect(false, 'No action set.', $response);
}

function addProperty() {
    $db = initDb('localhost', 'biens-immo', 'utf8', 'root', '');
    $sql = 'INSERT INTO products (address, city, name, price)
            VALUES (:address, :city, :name, :price)';
    $setting = [
        ':address' => $_POST['address'],
        ':city' => $_POST['city'],
        ':name' => $_POST['name'],
        ':price' => $_POST['price'],
    ];
    $request = $db->prepare($sql);
    if ($request->execute($setting)) {
        $db = null;
        endConnect(true, 'Le bien immobilier a été ajouté');
    }
    else {    
        $db = null;    
        endConnect(false,  'Le bien immobilier n\'a pas été ajouté');
    }
}

function updateProperty() {
    $db = initDb('localhost', 'biens-immo', 'utf8', 'root', '');
    $sql = 'UPDATE products SET ' . $_POST['column'] . '=:' . $_POST['column'] . ' WHERE id=:id';
    $setting = [
        ':' . $_POST['column'] => $_POST['value'],
        ':id' => $_POST['id'],
    ];

    $request = $db->prepare($sql);
    if ($request->execute($setting)) {
        $db = null;
        endConnect(true, 'Le bien immobilier a été mis à jour');
    }
    else {    
        $db = null;    
        endConnect(false,  'Le bien immobilier n\'a pas pu être mis à jour');
    }
}

function formatData() {
    if (isset($_POST['id']) && !empty($_POST['id']) &&
        isset($_POST['column']) && !empty($_POST['column']) &&
        isset($_POST['value']) && !empty($_POST['value'])) {

        $_POST['id'] = htmlspecialchars($_POST['id']);
        $_POST['column'] = htmlspecialchars($_POST['column']);
        $_POST['value'] = htmlspecialchars($_POST['value']);
        
        return true;
    }
    return false;
}

function formatDataAll() {
    if (isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['price']) && !empty($_POST['price']) &&
        isset($_POST['city']) && !empty($_POST['city']) &&
        isset($_POST['address']) && !empty($_POST['address'])) {

        $_POST['address'] = htmlspecialchars($_POST['address']);
        $_POST['city'] = htmlspecialchars($_POST['city']);
        $_POST['name'] = htmlspecialchars($_POST['name']);
        $_POST['price'] = htmlspecialchars($_POST['price']);
        
        return true;
    }
    return false;
}

function endConnect( $success=true, $message=false, $result=false) {
    echo json_encode(array('success' => $success, 'dial' => $message, 'result' => $result));
    die();
}