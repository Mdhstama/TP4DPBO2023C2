<?php

include("conf.php");
include("models/Members.class.php");
include("models/Job.class.php");
include("views/Members.view.php");

class MembersController
{
    // Atribut
    private $members;
    private $job;

    // Constructor
    function __construct()
    {
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->job = new Job(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Load view
    public function index()
    {
        $this->members->open();

        $this->members->getMember();

        $data = array(
            'members' => array(),
        );

        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }

        $this->members->close();

        $view = new MembersView();
        $view->render($data);
    }

    // Delete data
    function delete($id)
    {
        $this->members->open();
        $this->members->deleteMember($id);
        $this->members->close();

        header("location:index.php");
    }

    function add()
    {
        if (isset($_POST['submit'])) {
            // Jika menekan tombol submit
            $dataMember = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date'],
                'job' => $_POST['job']
            );

            $this->members->open();
            $this->members->addMember($dataMember);
            $this->members->close();
            header("location:index.php");
        } else {
            // Ambil data job dahulu untuk dropdown options
            $this->job->open();
            $this->job->getJob();
            $dataJob = array(
                'job' => array(),
            );
            while ($row = $this->job->getResult()) {
                array_push($dataJob['job'], $row);
            }
            $this->job->close();

            // Tampilkan form add member
            $view = new MembersView();
            $view->formAddMember($dataJob);
        }
    }

    // Update Data
    function edit($id)
    {
        if (isset($_POST['submit'])) {
            // Jika menekan tombol submit
            $dataMember = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date'],
                'job' => $_POST['job']
            );

            $this->members->open();
            $this->members->updateMember($id, $dataMember);
            $this->members->close();
            header("location:index.php");

        } else {
            $this->members->open();
            $this->members->getMemberByID($id);
            $row = $this->members->getResult();
            $data = array(
                'nama' => $row['nama'],
                'email' => $row['email'],
                'telp' => $row['telp'],
                'joining' => $row['joining'],
                'id_job' => $row['id_job'],
            );
            $this->members->close();

            // Ambil data job dahulu untuk dropdown options
            $this->job->open();
            $this->job->getJob();
            $dataJob = array(
                'job' => array(),
            );
            while ($row = $this->job->getResult()) {
                array_push($dataJob['job'], $row);
            }
            $this->job->close();

            // Tampilkan form edit member
            $members = new MembersView();
            $members->formEditMember($data, $dataJob);
        }
    }
}

?>