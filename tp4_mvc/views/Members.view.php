<?php

class MembersView
{
  public function render($data)
  {
    $dataMembers = null;
    $dataHeader = null;
    $buttonLink = null;

    //Button Link
    $buttonLink .= '<a type="button" class="btn btn-primary nav-link active" href="index.php?add=1">Add New Member</a>';

    // Header tabel
    $dataHeader .= "<tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>JOINING DATE</th>
                        <th>JOB</th>
                        <th>ACTIONS</th>
                    </tr>";

    // Tabel data members
    foreach ($data['members'] as $val) {
      list($id, $name, $email, $phone, $join, $nama_job) = $val;
      $dataMembers .= "
              <tbody>
                      <tr>
                      <td>" . $id . "</td>
                      <td>" . $name . "</td>
                      <td>" . $email . "</td>
                      <td>" . $phone . "</td>
                      <td>" . $join . "</td>
                      <td>" . $nama_job . "</td>
                      <td>
                      <a href='index.php?id_edit=" . $id . "' class='btn btn-warning''>Edit</a>
                      <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                      </td>
                      </tr>
              </tbody>";
    }

    // Load Template
    $member = new Template("templates/skin_table.html");

    // Replace HTML
    $member->replace("DATA_BUTTON", $buttonLink);
    $member->replace("DATA_HEADER", $dataHeader);
    $member->replace("DATA_TABEL", $dataMembers);
    $member->write();
  }

  function formAddMember($dataJob)
  {
    $form_title = null;
    $form = null;
    $cancel = null;
    $dropdownJob = null;

    // Title Form
    $form_title .= "Form Add Member";

    // Form
    $form .=
      '       
    <div class="form-group mb-3">
        <label for="name" class="fw-bold">Name:</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter the members name">
    </div>
    <div class="form-group mb-3">
        <label for="email" class="fw-bold">Email:</label>
        <input type="email" name="email" class="form-control" id="email"
            placeholder="Enter the members email">
    </div>
    <div class="form-group mb-3">
        <label for="phone" class="fw-bold">Phone:</label>
        <input type="text" name="phone" class="form-control" id="phone"
            placeholder="Enter the members telephone">
    </div>
    <div class="form-group mb-3">
        <label for="join_date" class="fw-bold">Joining Date:</label>
        <input type="date" name="join_date" class="form-control" id="join_date"
            placeholder="Enter the members joining date">
    </div>
    <div class="form-group mb-3">
        <label for="job" class="fw-bold">Job:</label>
        <select name="job" class="form-control" id="job">
        DROPDOWN_OPTIONS_JOB
        <select>
    </div>
    ';

    // Dropdown job
    foreach ($dataJob['job'] as $val) {
      list($id, $nama) = $val;

      $dropdownJob .= "<option value=\"$id\">$nama</option>";
    }

    // Button cancel
    $cancel .= '<a class="btn btn-warning" href="index.php">Cancel</a>';

    // Load Template
    $member = new Template("templates/skin_form.html");

    // Replace HTML
    $member->replace("DATA_TITLE_LABEL_FORM", $form_title);
    $member->replace("DATA_FORM", $form);
    $member->replace("DROPDOWN_OPTIONS_JOB", $dropdownJob);
    $member->replace("BUTTON_CANCEL", $cancel);
    $member->write();
  }

  function formEditMember($data, $dataJob)
  {
    $form_title = null;
    $form = null;
    $cancel = null;
    $dropdownJob = '';

    // Title Form
    $form_title .= "Form Edit Member";

    // Form
    $form .=
      '       
    <div class="form-group mb-3">
        <label for="name" class="fw-bold">Name:</label>
        <input type="text" name="name" class="form-control" id="name" value="' . $data['nama'] . '">
    </div>
    <div class="form-group mb-3">
        <label for="email" class="fw-bold">Email:</label>
        <input type="email" name="email" class="form-control" id="email" value="' . $data['email'] . '">
    </div>
    <div class="form-group mb-3">
        <label for="phone" class="fw-bold">Phone:</label>
        <input type="text" name="phone" class="form-control" id="phone" value="' . $data['telp'] . '">
    </div>
    <div class="form-group mb-3">
        <label for="join_date" class="fw-bold">Joining Date:</label>
        <input type="date" name="join_date" class="form-control" id="join_date" value="' . $data['joining'] . '">
    </div>
    <div class="form-group mb-3">
        <label for="job" class="fw-bold">Job:</label>
        <select name="job" class="form-control" id="job">
        DROPDOWN_OPTIONS_JOB
        <select>
    </div>
    ';

    // Dropdown job
    foreach ($dataJob['job'] as $val) {
      list($id, $nama) = $val;

      if ($id == $data['id_job']) {
        $dropdownJob .= "<option value=\"$id\" selected>$nama</option>";
      } else {
        $dropdownJob .= "<option value=\"$id\">$nama</option>";
      }
    }

    // Button cancel
    $cancel .= '<a class="btn btn-warning" href="index.php">Cancel</a>';

    // Load Template
    $member = new Template("templates/skin_form.html");

    // Replace HTML
    $member->replace("DATA_TITLE_LABEL_FORM", $form_title);
    $member->replace("DATA_FORM", $form);
    $member->replace("DROPDOWN_OPTIONS_JOB", $dropdownJob);
    $member->replace("BUTTON_CANCEL", $cancel);
    $member->write();
  }
}
?>