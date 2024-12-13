<?php
require './dataBase/dbConnect.php';
require './functions/function.php';


// echo $_SERVER['REQUEST_URI'];
// Fetch all user data

if($_SERVER['REQUEST_URI'] === '/p/list/users.php'){
    $users = fetchAllUser();
};

// code for toggle Active to InActive
// echo 'test -1';
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])){
    echo "test 0";
    toggleActiveInActive();
};



// Including view file to display the data
include './view/users.view.php';