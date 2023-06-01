<?php

// Model
include_once("models/Template.class.php");
include_once("models/DB.class.php");

// Controller
include_once("controllers/Job.controller.php");

$job = new JobController();

if (!empty($_GET['add'])) {
    // Add
    $job->add();
} else if (!empty($_GET['id_hapus'])) {
    // Delete
    $id = $_GET['id_hapus'];
    $job->delete($id);
    header("location:job.php");
} else if (!empty($_GET['id_edit'])) {
    // Edit
    $id = $_GET['id_edit'];
    $job->edit($id);
} else {
    // Database
    $job->index();
}

?>