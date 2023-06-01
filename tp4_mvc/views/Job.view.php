<?php

class JobView
{
    public function render($data)
    {
        $dataHeader = null;
        $dataJob = null;
        $buttonLink = null;

        // Button Link
        $buttonLink .= '<a type="button" class="btn btn-primary nav-link active" href="job.php?add=1">Add New Job</a>';

        // Header tabel
        $dataHeader .= "
                    <tr>
                        <th>ID</th>
                        <th>NAME JOB</th>
                        <th>ACTIONS</th>
                    </tr>";

        // Tabel data job
        foreach ($data['job'] as $val) {
            list($id, $name) = $val;
            $dataJob .= "
                <tbody>
                    <tr>
                        <td>" . $id . "</td>
                        <td>" . $name . "</td>
                        <td>
                            <a href='job.php?id_edit=" . $id . "' class='btn btn-warning''>Edit</a>
                            <a href='job.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                        </td>
                    </tr>
                </tbody>";
        }

        // Load Template
        $job = new Template("templates/skin_table.html");

        // Replace HTML
        $job->replace("DATA_BUTTON", $buttonLink);
        $job->replace("DATA_HEADER", $dataHeader);
        $job->replace("DATA_TABEL", $dataJob);
        $job->write();
    }

    function formAddJob()
    {
        $form_title = null;
        $form = null;
        $cancel = null;

        // Title Form
        $form_title .= "Form Add Job";

        // Form
        $form .=
            '       
        <div class="form-group mb-3">
            <label for="name" class="fw-bold">Name Job:</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter job name">
        </div>
        ';

        // Button cancel
        $cancel .= '<a class="btn btn-warning" href="job.php">Cancel</a>';

        // Load Template
        $job = new Template("templates/skin_form.html");

        // Replace HTML
        $job->replace("DATA_TITLE_LABEL_FORM", $form_title);
        $job->replace("DATA_FORM", $form);
        $job->replace("BUTTON_CANCEL", $cancel);
        $job->write();
    }

    // Update data
    function formUpdateJob($data)
    {
        $form_title = null;
        $form = null;
        $cancel = null;

        // Title Form
        $form_title .= "Form Update Job";

        // Form
        $form .=
            '       
        <div class="form-group mb-3">
            <label for="name" class="fw-bold">Name Job:</label>
            <input type="text" name="name" class="form-control" id="name" value="' . $data['nama_job'] . '">
        </div>
        ';

        // Button cancel
        $cancel .= '<a class="btn btn-warning" href="job.php">Cancel</a>';

        // Load Template
        $job = new Template("templates/skin_form.html");

        // Replace HTML
        $job->replace("DATA_TITLE_LABEL_FORM", $form_title);
        $job->replace("DATA_FORM", $form);
        $job->replace("BUTTON_CANCEL", $cancel);
        $job->write();
    }


}
?>