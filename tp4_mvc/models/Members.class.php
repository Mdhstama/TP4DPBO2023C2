<?php

class Members extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM tb_member";

        return $this->execute($query);
    }

    function getMemberByID($id)
    {
        $query = "SELECT * FROM tb_member WHERE id=$id";

        return $this->execute($query);
    }

    function deleteMember($id)
    {
        $query = "DELETE FROM tb_member WHERE id=$id";

        return $this->execute($query);
    }

    function addMember($data)
    {
        $nama = $data['name'];
        $email = $data['email'];
        $telp = $data['phone'];
        $joining = $data['join_date'];
        $id_job = $data['job'];

        $query = "INSERT INTO tb_member VALUES (NULL,'$nama','$email','$telp', '$joining', '$id_job')";

        return $this->execute($query);
    }

    function updateMember($id, $data)
    {
        $nama = $data['name'];
        $email = $data['email'];
        $telp = $data['phone'];
        $joining = $data['join_date'];
        $id_job = $data['job'];

        $query = "UPDATE tb_member SET nama='$nama', email = '$email', telp = '$telp', joining = '$joining', id_job = '$id_job' WHERE id=$id";

        return $this->execute($query);
    }
}


?>