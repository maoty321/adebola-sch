<div class="card box-shadow: 0px 0px 30px rgba(0, 0, 0, .2) mb-3">
    <div class="card-header  d-flex justify-content-between px-2 py-3" style="">
        <p style="font-size: 15px; font-weight: 500;">Manage Student</p>
        <button type="button" class="btn red" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="ri-add-line"></i> Student
        </button>
    </div>
    <div class="card-body table-responsive">
        <table class="table table align-middle" id="example">
            <thead>
                <tr>
                    <td class="text-muted">Name</td>
                    <td class="text-muted">Email</td>
                    <td class="text-muted">Matric Number</td>
                    <td class="text-muted">Application Complete</td>
                    <td class="text-muted">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                $get_all_student = getAllStudent();
                if(empty( $get_all_student )){ 
                    echo "empty";
                } else {
                    foreach($get_all_student as $student){ 
                        //var_dump($student);
            ?>
                <tr>
                    <td class="py-4 text-muted">
                        <?php echo $student['first_name'] .' '. $student['surname'].' '. $student['middlename'] ?></td>
                    <td class="py-4 text-muted"><?php echo $student['email']?></td>
                    <td class="py-4 text-muted"><?php echo $student['application_number']?></td>
                    <td class="py-4 text-muted">
                        <?php
                            $student_bio_data = getStudent_biodata($student['student_id']);

                            if (empty($student_bio_data)) { 
                            ?>
                        <p class=""><span class="badge bg-danger">Not Start yet</span></p>
                        <?php
                            } else {
                                $status = $student_bio_data[0]['status'];

                                echo '<p>';
                                echo ($status === 'final_submit')
                                    ? '<span class="badge bg-success">Complete Application</span>'
                                    : '<span class="badge bg-secondary">Not Complete</span>';
                                echo '</p>';
                            }
                            ?>

                    </td>
                    <td class="d-flex py-4">
                        <a href="#dd?student_id=<?php echo $student['student_id']?>" class=" text-success mx-2"><i
                                class="ri-eye-line"></i></a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editboxmodal<?= $student['student_id']?>"
                            data-student-id="<?php echo $student['student_id']?>" class="editstudent mx-2"><i
                                class="ri-edit-line"></i></a>
                        <a href="admin-script?delte_student=<?php echo $student['student_id']?>"
                            class="text-danger mx-2" class="mx-2"
                            onclick="return confirm('Are you sure you want to delete this?');"><i
                                class="ri-delete-bin-line"></i></a>
                    </td>
                </tr>


                <div class="modal fade" id="editboxmodal<?= $student['student_id']?>" tabindex="-1"
                    aria-labelledby="editboxmodal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p>Edit Student</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>


                            <div class="modal-body">
                                <form action="" method="post" autocomplete="off">
                                    <div class="mb-3">
                                        <input type="hidden" name="student_id" value="<?= $student['student_id']?>">
                                        <label for="">Surname</label>
                                        <input type="text" name="surname" value="<?= $student['surname']?>"
                                            class="form-control" placeholder="" id="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">First Name</label>
                                        <input type="text" name="firstname" class="form-control"
                                            value="<?= $student['first_name']?>" placeholder="" id="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Middle Name</label>
                                        <input type="text" name="middlename" class="form-control"
                                            value="<?= $student['middlename']?>" placeholder="" id="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Matric Number</label>
                                        <input type="text" name="matric_number"
                                            value="<?= $student['application_number']?>" class="form-control"
                                            placeholder="" id="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="" id=""
                                            value="<?= $student['email']?>" required disabled>
                                        <label for="" class="small text-danger">If there is mistake with student email,
                                            kindly delete the student data and re input</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Course</label>
                                        <select name="department" id="" class="form-select"
                                            value="<?= $student['surname']?>" required>
                                            <option value="">--select--</option>
                                            <?php 
                                    $departments = getAllDepartments();
                                    foreach( $departments as $department ){ 
                                ?>
                                            <option value="<?= $department['department_id']?>">
                                                <?= $department['department_name']?>
                                            </option>
                                            <?php
                                    }
                                ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="">Level</label>
                                        <select name="level" id="" class="form-select" required>
                                            <option value="">--select</option>
                                            <option value="ND-1">National Diplomia(ND-1)</option>
                                            <option value="ND-2">National Diplomia(ND-2)</option>
                                            <option value="HND-1">Higher National Diplomia(HND-1)</option>
                                            <option value="HND-2">Higher National Diplomia(HND-2)</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="">Level Type</label>
                                        <select name="level_type" id="" class="form-select" required>
                                            <option value="">--select</option>
                                            <option value="ND">National Diplomia(ND)</option>
                                            <option value="HND">Higher National Diplomia(HND)</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="edit_student_admin" class="btn  red">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                } 
            }
            ?>

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <p>Add Student</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="">Surname</label>
                            <input type="text" name="surname" class="form-control" placeholder="" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="firstname" class="form-control" placeholder="" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Middle Name</label>
                            <input type="text" name="middlename" class="form-control" placeholder="" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Matric Number</label>
                            <input type="text" name="matric_number" class="form-control" placeholder="" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <select name="department" id="" class="form-select" required>
                                <option value="">--select--</option>
                                <?php 
                                    $departments = getAllDepartments();
                                    foreach( $departments as $department ){ 
                                ?>
                                <option value="<?= $department['department_id']?>"><?= $department['department_name']?>
                                </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="">Level</label>
                            <select name="level" id="" class="form-select" required>
                                <option value="">--select</option>
                                <option value="ND-1">National Diplomia(ND-1)</option>
                                <option value="ND-2">National Diplomia(ND-2)</option>
                                <option value="HND-1">Higher National Diplomia(HND-1)</option>
                                <option value="HND-2">Higher National Diplomia(HND-2)</option>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="">Level Type</label>
                            <select name="level_type" id="" class="form-select" required>
                                <option value="">--select</option>
                                <option value="ND">National Diplomia(ND)</option>
                                <option value="HND">Higher National Diplomia(HND)</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="register_student_admin" class="btn red">Add
                        Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
document.addEventListener("DOMContentLoaded", function() {

    const editButtons = document.querySelectorAll(".editstudent");
    const form = document.getElementById('editstudent_form');
    const studentInput = document.getElementById('student_id');
    const responseBox = document.getElementById('response');

    // When clicking edit button → fill hidden input → auto-submit the form
    editButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            const student_id = btn.getAttribute("data-student-id");
            studentInput.value = student_id;
            console.log("Selected Student ID:", student_id);

            form.dispatchEvent(new Event("submit")); // <-- AUTO SUBMIT
        });
    });

    // AJAX form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // still use preventDefault because it's AJAX

        const formData = new FormData(form);

        console.log(formData)
        // fetch("/", {
        //     method: "POST",
        //     body: formData
        // })
        // .then(res => res.text())
        // .then(data => {
        //     responseBox.innerHTML = data;
        //     console.log("AJAX response:", data);
        // })
        // .catch(err => console.error("AJAX error:", err));
    });

});
</script>


</script>