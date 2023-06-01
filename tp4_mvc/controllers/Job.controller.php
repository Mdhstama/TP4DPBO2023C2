<?php

include("conf.php");
include("models/Job.class.php");
include("views/Job.view.php");

class JobController
{
    // Atribut
    private $job;

    // Constructor
    function __construct()
    {
        $this->job = new Job(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Load view
    public function index()
    {
        $this->job->open();
        $this->job->getJob();

        $data = array(
            'job' => array()
        );

        while ($row = $this->job->getResult()) {
            array_push($data['job'], $row);
        }

        $this->job->close();

        $job = new JobView();
        $job->render($data);
    }

    // Delete data
    function delete($id)
    {
        $this->job->open();
        $this->job->deleteJob($id);
        $this->job->close();

        header("location:job.php");
    }

    // Add Data
    function add()
    {
        if (isset($_POST['submit'])) {
            // Jika menekan tombol submit
            $dataJob = array(
                'name' => $_POST['name'],
            );

            $this->job->open();
            $this->job->addJob($dataJob);
            $this->job->close();
            header("location:job.php");
        } else {
            // Tampilkan form add job
            $job = new JobView();
            $job->formAddJob();
        }
    }

    // Update Data
    function edit($id)
    {
        if (isset($_POST['submit'])) {
            // Jika menekan tombol submit
            $dataJob = array(
                'name' => $_POST['name'],
            );

            $this->job->open();
            $this->job->updateJob($id, $dataJob);
            $this->job->close();

            header("location:job.php");
        } else {
            $this->job->open();
            $this->job->getJobByID($id);
            $row = $this->job->getResult();
            $data = array(
                'nama_job' => $row['nama_job']
            );
            $this->job->close();

            // Tampilkan form add job
            $job = new JobView();
            $job->formUpdateJob($data);
        }
    }
}

?>