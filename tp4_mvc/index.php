<?php

// Model
include_once("models/Template.class.php");
include_once("models/DB.class.php");

// Controller
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (!empty($_GET['add'])) {
    // Add
    $members->add();
} else if (!empty($_GET['id_hapus'])) {
    // Delete
    $id = $_GET['id_hapus'];
    $members->delete($id);
    header("location:index.php");
} else if (!empty($_GET['id_edit'])) {
    // Edit
    $id = $_GET['id_edit'];
    $members->edit($id);
} else {
    // Database
    $members->index();
}
?>