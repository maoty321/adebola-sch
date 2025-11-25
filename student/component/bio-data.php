<?php
if($student_biodata["status"] == 'final_submit'){ 
    header('location: dashboard');
    exit();
}
?>
<style>
.nn {
    padding-top: 0px;
    height: auto;
}

.box-nav {
    border-radius: 10px;
    display: flex;
    /* align-items: center; */
    padding: 10px 20px;
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
    justify-content: center;
    flex-direction: column;
    gap: 2rem;
}

.box-nav li {
    list-style-type: none;

}

.box-nav a {
    text-decoration: none;
    color: purple;
    display: block;
}

.all-box {
    box-shadow: 0px 0px 30px rgba(0, 0, 0, .1);
    padding: 20px;
    border-radius: 10px;
}

input[type='submit']:hover {
    border: none;
    outline: none;
    background-color: purple;
}

input[type='submit'] {
    border: none;
    outline: none;
    background-color: purple;
}

.box-nav .active {
    background-color: purple;
    color: white;
    padding: 10px;
    border-radius: 10px;
}

.box-nav span {
    border-radius: 100%;
}

.box-contentss {
    color: #515152ff;
    font-size: 13px;
}

.box-contentss input,
select,
textarea {
    color: #656568ff;
    font-size: 15px;
    padding: 10px;
    border: 1px solid #e3e3e7ff;
}

.box-contentss .form-control:focus {
    color: #515152ff;
    font-size: 15px;
    padding: 10px;
    outline: none;
    border: none;
    border: 1px solid #e3e3e7ff;
}

.box-contentss textarea {
    color: #515152ff;
    font-size: 15px;
    padding: 10px;
    outline: none;
    border: none;
    border: 1px solid #e3e3e7ff;
}

.btn {
    background-color: purple;
    color: white;
    font-weight: 500;
}

.btn:hover {
    background-color: purple;
    color: white;
    font-weight: 500;
}

.box-contentss textarea:focus {
    color: #515152ff;
    font-size: 15px;
    padding: 10px;
    outline: none;
    border: none;
    border: 1px solid #e3e3e7ff;
}

.box-contentss select {
    color: #515152ff;
    font-size: 15px;
    padding: 10px;
    outline: none;
    border: none;
    border: 1px solid #e3e3e7ff;
}
</style>
<?php $current_page = basename($_SERVER['REQUEST_URI']);?>
<div class="all-box container-fluid bg-white p-4">
    <div class="nn row g-3" style="padding-top: 0px">
        <div class="box-nav bg-light col-md-3 h-25">
            <li class=""><a href="bio-data" class="<?= ($current_page == 'bio-data') ? 'active' : '' ?>"><span>1.
                    </span>Personal Details</a></li>
            <li class=""><a href="bio-data?olevel"
                    class="<?= ($current_page == 'bio-data?olevel') ? 'active' : '' ?>"><span>2. </span>Olevel</a></li>
            <li class=""><a href="bio-data?jamb_hnd"
                    class="<?= ($current_page == 'bio-data?jamb_hnd') ? 'active' : '' ?>"><span>3. </span>Jamb / HND
                    Details</a></li>
            <li class=""><a href="bio-data?review_bio"
                    class="<?= ($current_page == 'bio-data?review_bio') ? 'active' : '' ?>"><span>4. </span>Bio Data
                    Review</a></li>
        </div>

        <?php
            if(isset($_GET["olevel"])) { 
        ?>
        <div class="box-contentss col-md-9 mt-2 m-auto p-3">
            <h5>Olevel</h5>
            <hr>
            <?php 
                $examination_olevel = examination_olevel();
                if(empty($examination_olevel)) { 
            ?>
            <form action="" method="post">
                <div class="nn row g-3">
                    <div class="col-lg-4 col-sm-12">
                        <label for="">O`Level Reg Number</label>
                        <input type="text" name="olevel_reg" id="" class="form-control">
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="">O`Level Type</label>
                        <select name="olevel_type" id="" class="form-select">
                            <option value="">--select--</option>
                            <option value="WAEC">WAEC</option>
                            <option value="NECO">NECO</option>
                            <option value="WAEC GCE">WAEC GCE</option>
                            <option value="NECO GCE">NECO GCE</option>
                            <option value="NABTEB">NABTEB</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="">O`Level Year</label>
                        <input type="text" name="olevel_year" id="" placeholder="1990" class="form-control">
                    </div>
                </div> <br>
                <div class="mb-3 float-end">
                    <input type="submit" value="Add Examination" name="add_olevel_details" class="btn"
                        style="color: white">
                </div>
            </form>
            <?php
                } else { 
                    if(count($examination_olevel) <= 1) {
            ?>
            <div class="mb-3 float-end w-100"><br>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#olevel">
                    Add second Seat
                </button>
            </div>
            <?php
                }
            ?>

            <?php
                    foreach($examination_olevel as $olevel_detail) { 
            ?>
            <div class="olevel-box mt-4">
                <div class="btn-olevel-add w-100 d-flex justify-content-end my-4" style="">
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#exampleModal<?= $olevel_detail['olevel_id'] ?>">Add
                        Result</button>
                </div>

                <div class="modal fade" id="exampleModal<?= $olevel_detail['olevel_id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Olevel</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" name="olevel"
                                            value="<?php echo $olevel_detail['olevel_id']?>" id="">
                                        <label for="">Subject</label>
                                        <select name="subject" class="form-select" id="" required>
                                            <option value="">--select--</option>
                                            <?php 
                                                foreach($combined_subjects as $subject) {
                                            ?>
                                            <option value="<?= $subject?>"><?=$subject?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">

                                        <label for="">Grade</label>
                                        <select name="grade" class="form-select" id="" required>
                                            <option value="">--select--</option>
                                            <option value="A1">A1</option>
                                            <option value="B2">B2</option>
                                            <option value="B3">B3</option>
                                            <option value="C4">C4</option>
                                            <option value="C5">C5</option>
                                            <option value="C6">C6</option>
                                            <option value="E8">E8</option>
                                            <option value="F9">F9</option>
                                        </select>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" style='background: #181717ff'
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add_result_olevel" class="btn">Save changes</button> </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nn row g-3">
                    <div class="col-lg-4 col-sm-12">
                        <label for="">O`Level Reg Number</label>
                        <input type="text" name="olevel_reg" value="<?php echo $olevel_detail['olevel_reg']?>" id=""
                            class="form-control" disabled>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="">O`Level Type</label>
                        <input type="text" name="" value="<?= $olevel_detail['olevel_type']?>" id=""
                            class="form-control" disabled>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <label for="">O`Level Year</label>
                        <input type="text" name="olevel_year" id="" value="<?= $olevel_detail['olevel_year']?>"
                            class="form-control" disabled>
                    </div>
                </div>
                <?php 
                $fetch_results  = fetch_result($olevel_detail['olevel_id']);
                if(empty($fetch_results)) { 
                    echo "Add Olevel";
                } else {
            ?>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                     foreach($fetch_results as $result) {
            ?>
                    <tbody>
                        <tr>
                            <td><?= $result['subject']?></td>
                            <td><?= $result['grade']?></td>
                            <td>
                                <i class="ri-edit-line px-3" style="cursor:pointer; color:blue;" title="Edit"></i>
                                <i class="ri-delete-bin-line" style="cursor:pointer; color:red;" title="Delete"></i>
                            </td>

                        </tr>
                    </tbody>

                    <?php
                } ?>
                </table><?php }
            ?>
            </div>
            <?php
                }}
            ?>
        </div>
        <?php
        } else if(isset($_GET["jamb_hnd"])) {
        ?>
        <div class="box-contentss col-md-9 m-auto p-3">
            <h5>jamb or Hnd Details</h5>
            <hr>

            <?php if($student_details["level_type"] === "Nd") { ?>
            <marquee behavior="" direction="">
                <p class="text-danger" style="font-size: 20px;"><strong>NOTE: </strong>
                    If you dont have jamb details press save and continue for Nd/HND student
                </p>
            </marquee>

            <form action="" method="post">
                <div class="mb-3">
                    <label>Jamb Registration Number</label>
                    <input type="text" name="jamb_reg" value="<?= $student_jamb['jamb_reg']?>" class="form-control">
                </div>

                <div class="nn row g-3">
                    <div class="col-md-6">
                        <div class="nn row g-3">
                            <div class="col-md-7">
                                <label for="">Subject 1</label>
                                <select name="subject_1" id="" class="form-select">
                                    <option value="">--select--</option>
                                    <?php 
                                        foreach($combined_subjects as $subject) {
                                    ?>
                                    <option value="<?= $subject?>"><?=$subject?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Score 1</label>
                                <input type="number" class="form-control" name="score_1" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="nn row g-3">
                            <div class="col-md-7">
                                <label for="">Subject 2</label>
                                <select name="subject_2" id="" class="form-select">
                                    <option value="">--select--</option>
                                    <?php 
                                        foreach($combined_subjects as $subject) {
                                    ?>
                                    <option value="<?= $subject?>"><?=$subject?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Score 2</label>
                                <input type="number" class="form-control" name="score_2" id="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nn row g-3 mt-3">
                    <div class="col-md-6">
                        <div class="nn row g-3 ">
                            <div class="col-md-7">
                                <label for="">Subject 3</label>
                                <select name="subject_3" id="" class="form-select">
                                    <option value="">--select--</option>
                                    <?php 
                                        foreach($combined_subjects as $subject) {
                                    ?>
                                    <option value="<?= $subject?>"><?=$subject?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Score 3</label>
                                <input type="number" class="form-control" name="score_3" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="nn row g-3">
                            <div class="col-md-7">
                                <label for="">Subject 4</label>
                                <select name="subject_4" id="" class="form-select">
                                    <option value="">--select--</option>
                                    <?php 
                                        foreach($combined_subjects as $subject) {
                                    ?>
                                    <option value="<?= $subject?>"><?=$subject?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Score 4</label>
                                <input type="number" class="form-control" name="score_4" id="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 float-end mt-3">
                    <input type="submit" name="upload_jamb_details" value="Save and Continue" style="color: white">
                </div>
            </form>
            <?php } ?>
        </div>

        <?php
        } else if(isset($_GET['review_bio'])) {
        ?>

        <div class="box-contentss col-md-9 m-auto p-3">
            <h5>Application Review</h5>
            <hr>

            <marquee behavior="" direction="">
                <p class="text-danger" style="font-size: 20px;"><strong>NOTE:</strong>
                    Review your Application Details Carefully Before Final Submission
                </p>
            </marquee>

            <!-- PERSONAL INFORMATION -->
            <h6 class="mt-4"><strong>Personal Information</strong></h6>
            <table class="table table-bordered">
                <tr>
                    <td>First Name</td>
                    <td><?= $student_details['first_name'] ?></td>
                </tr>
                <tr>
                    <td>Middle Name</td>
                    <td><?= $student_details['middlename'] ?></td>
                </tr>
                <tr>
                    <td>Surname</td>
                    <td><?= $student_details['surname'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $student_details['email'] ?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?= $student_biodata['phone_number'] ?></td>
                </tr>
                <tr>
                    <td>NIN</td>
                    <td><?= $student_biodata['nin'] ?></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td><?= $student_biodata['date_of_birth'] ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?= $student_biodata['gender'] ?></td>
                </tr>
                <tr>
                    <td>State of Origin</td>
                    <td><?= $student_biodata['stateoforigin'] ?></td>
                </tr>
                <tr>
                    <td>LGA</td>
                    <td><?= $student_biodata['lcda'] ?></td>
                </tr>
                <tr>
                    <td>Home Address</td>
                    <td><?= $student_biodata['home_address'] ?></td>
                </tr>
            </table>

            <!-- OLEVEL INFORMATION -->
            <h6 class="mt-4"><strong>O’Level Details</strong></h6>

            <?php 
            $examination_olevel = examination_olevel();
            foreach($examination_olevel as $olevel){ ?>
            <h6>Exam Seat <?= $olevel['olevel_id'] ?></h6>
            <table class="table table-bordered">
                <tr>
                    <td>Reg Number</td>
                    <td><?= $olevel['olevel_reg'] ?></td>
                </tr>
                <tr>
                    <td>Exam Type</td>
                    <td><?= $olevel['olevel_type'] ?></td>
                </tr>
                <tr>
                    <td>Year</td>
                    <td><?= $olevel['olevel_year'] ?></td>
                </tr>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                $olevel_results = fetch_result($olevel['olevel_id']);
                foreach($olevel_results as $res){ 
            ?>
                    <tr>
                        <td><?= $res['subject'] ?></td>
                        <td><?= $res['grade'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>

            <!-- JAMB / HND INFO -->
            <h6 class="mt-4"><strong>JAMB / HND Details</strong></h6>
            <table class="table table-bordered">
                <tr>
                    <td>Jamb Registration No.</td>
                    <td><?= $student_jamb['jamb_reg'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td><?= $student_jamb['subject_1']?></td>
                    <td><?= $student_jamb['score_1'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td><?= $student_jamb['subject_2']?></td>
                    <td><?= $student_jamb['score_2'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td><?= $student_jamb['subject_3']?></td>
                    <td><?= $student_jamb['score_3'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td><?= $student_jamb['subject_4']?></td>
                    <td><?= $student_jamb['score_4'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td><b>Total Score</b></td>
                    <td><?= $student_jamb['score_1'] + $student_jamb['score_2'] + $student_jamb['score_3']+$student_jamb['score_4'] ?? 'N/A' ?>
                    </td>
                </tr>
            </table>

            <!-- NEXT OF KIN -->
            <h6 class="mt-4"><strong>Next of Kin Information</strong></h6>
            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td><?= $student_biodata['nextof_name'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $student_biodata['nextof_email'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td>Relationship</td>
                    <td><?= $student_biodata['nextof_relationship'] ?? 'N/A' ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?= $student_biodata['nextof_phonenuber'] ?? 'N/A' ?></td>
                </tr>
            </table>

          
            <!-- SUBMIT BUTTON -->
            <div class="mt-4">
                <form method="post">
                      <p style="font-size: 15px;" class="text-primary"><input type="checkbox" name="" id="" required> <strong>I Agree that all information provide is correct</strong></p>
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn" name="final_submit">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
            } else {
        ?>
        <div class="box-contentss col-md-9  m-auto p-3">
            <h5>Personal Info</h5>
            <hr>
            <form action="" method="post">
                <div class="nn row gy-3">
                    <div class="col-md-6 col-sm-12">
                        <label for="">First Name</label>
                        <input type="text" name="fname" value="<?php echo $student_details['first_name']?>"
                            class="form-control" id="" disabled>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="">Middle Name</label>
                        <input type="text" name="mname" value="<?php echo $student_details['middlename']?>"
                            class="form-control" id="" disabled>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for=""> Surname</label>
                        <input type="text" name="sname" value="<?php echo $student_details['surname']?>"
                            class="form-control" id="" disabled>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for=""> Phone Number</label>
                        <input type="text" name="pnumber" value="<?= $student_biodata['phone_number'] ?? '' ?>"
                            class="form-control" id="" required>
                    </div>
                </div>
                <div class="md-3 mt-3">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $student_details['email']?>" class="form-control"
                        id="" disabled>
                </div>



                <div class="row gy-3 mt-2 nn">
                    <div class="col-md-6 col-sm-12">
                        <label for="">National Identity Number(NIN)</label>
                        <input type="text" name="nin" value="<?= $student_biodata['nin'] ?? '' ?>" class="form-control"
                            required>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="">Date of Birth</label>
                        <input type="date" name="dob" value="<?= $student_biodata['dob'] ?? '' ?>" class="form-control"
                            id="" required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="">Gender</label>
                    <select name="gender" class="form-select" id="" required>
                        <option value="<?= $student_biodata['gender'] ?? '' ?>">
                            <?= $student_biodata['gender'] ?? '-- select --' ?>
                        </option>
                        <option value="male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="row gy-3 mt-2 nn">
                    <div class="col-md-6 col-sm-12">
                        <label for="">State of Origin</label>
                        <select name="state" id="" class="form-select" required>
                            <option value="">--select--</option>
                            <?php 
                                foreach($nigerian_states as $state) {
                            ?>
                            <option value="<?php echo $state?>"><?php echo $state?></option>
                            <?php
                                }
                            ?>

                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="">Local Goverment Area</label>
                        <input type="text" name="lcda" value="<?= $student_biodata['lcda'] ?? '' ?>"
                            class="form-control" id="" required>
                    </div>
                </div>

                <div class="md-3 mt-3">
                    <label for="">Address</label>
                    <textarea name="address" class="form-control" id=""
                        required><?= trim($student_biodata['home_address'] ?? '') ?> </textarea>
                </div> <br>

                <p style="font-size: 17px; color: purple; text-align: center;">Next Of Kin Details</p>
                <hr>
                <div class="nn row g-3">
                    <div class="col-md-6 col-sm-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="nextof_name" id="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="nextof_email" id="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="">Relationship</label>
                        <input type="text" class="form-control" placeholder="e.g Father, Mother, Brother etc"
                            name="nextof_relationship" id="">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" name="nextof_phonenuber" id="">
                    </div>
                </div>
                <div class="md-3 mt-3 float-end">
                    <input type="submit" name="student_personal_info" value="Save & Continue" class="btn"
                        style="color: white; font-size: 17px">
                </div>
            </form>
        </div>
        <?php
            }
        ?>
    </div>
</div>






<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="olevel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Olevel Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">O`Level Reg Number</label>
                        <input type="text" name="olevel_reg" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">O`Level Type</label>
                        <select name="olevel_type" id="" class="form-select">
                            <option value="">--select--</option>
                            <option value="WAEC">WAEC</option>
                            <option value="NECO">NECO</option>
                            <option value="WAEC GCE">WAEC GCE</option>
                            <option value="NECO GCE">NECO GCE</option>
                            <option value="NABTEB">NABTEB</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">O`Level Year</label>
                        <input type="text" name="olevel_year" id="" placeholder="1990" class="form-control">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="add_olevel_details">Save changes</button></form>
            </div>
        </div>
    </div>
</div>