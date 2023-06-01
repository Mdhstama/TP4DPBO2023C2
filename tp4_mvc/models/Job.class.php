<?php

class Job extends DB
{
    function getJob()
    {
        $query = "SELECT * FROM tb_job";
        return $this->execute($query);
    }

    function getJobByID($id)
    {
        $query = "SELECT * FROM tb_job WHERE id_job = $id";
        return $this->execute($query);
    }

    function deleteJob($id)
    {
        $query = "DELETE FROM tb_job WHERE id_job=$id";
        return $this->execute($query);
    }

    function addJob($data)
    {
        $nama_job = $data['name'];

        // print_r($nama_job);
        // exit();

        $query = "INSERT INTO tb_job VALUES (NULL,'$nama_job')";

        return $this->execute($query);
    }

    function updateJob($id, $data)
    {
        $nama_job = $data['name'];

        // print_r($nama_job);
        // exit();

        $query = "UPDATE tb_job SET nama_job = '$nama_job' WHERE id_job = $id";
        return $this->execute($query);
    }
}

?>