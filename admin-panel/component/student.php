<div class="card box-shadow: 0px 0px 30px rgba(0, 0, 0, .2) mb-3">
    <div class="card-header  d-flex justify-content-between px-2 py-3" style="">
        <p style="font-size: 15px; font-weight: 500;">Manage Student</p>
        <button type="button" class="btn red" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="ri-add-line"></i> Student
        </button>
    </div>
    <div class="card-body table-responsive">
        <table class="table table align-middle" id="example">
            <thead >
                <tr>
                    <td class="text-muted">Name</td>
                    <td class="text-muted">Email</td>
                    <td class="text-muted">Matric Number</td>
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
                    <td class="py-4 text-muted"><?php echo $student['first_name'] .' '. $student['surname'].' '. $student['middlename'] ?></td>
                    <td class="py-4 text-muted"><?php echo $student['email']?></td>
                    <td class="py-4 text-muted"><?php echo $student['application_number']?></td>
                    <td class="d-flex py-4">
                        <a href="#dd?student_id=<?php echo $student['student_id']?>" class=" text-success mx-2"><i
                                class="ri-eye-line"></i></a>
                        <a href="#dd?student_id=<?php echo $student['student_id']?>" class="mx-2"><i
                                class="ri-edit-line"></i></a>
                        <a href="#dd?student_id=<?php echo $student['student_id']?>" class="text-danger mx-2"
                            class="mx-2"><i class="ri-delete-bin-line"></i></a>
                    </td>
                </tr>
                <?php
                } 
            }
            ?>

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p>Add Student</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="">Surname</label>
                            <input type="text" name="surname" class="form-control" placeholder="" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="firstname" class="form-control" placeholder="" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Middle Name</label>
                            <input type="text" name="middlename" class="form-control" placeholder="" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Matric Number</label>
                            <input type="text" name="matric_number" class="form-control" placeholder="" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="" id="">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="register_student_admin" class="btn btn-primary text-white">Add
                        Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>