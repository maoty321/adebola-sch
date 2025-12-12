<style>
.breadcrumb {
    font-size: 14px;
}

.card-header {
    background-color: purple;
    border: none;
}

.card-header p {
    font-size: 20px;
    font-weight: bold;
    color: white;
    padding: 5px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

.card .card-body {
    border: 1px solid white;
    padding: 30px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);

}

.mm {
    text-align: center;
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
}

.card {

    border: none;
}
.btns {
    background-color: purple;
    color: white;
}
.btns:hover {
    background-color: #500457ff;
    color: white;
}
.mm a {
    display: block;
    padding: 50px;
    text-decoration: none;
    font-size: 20px;
}
.box-password {
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}
.class-title {
    padding: 10px;
    font-size: 18px;
}
.box-password input[type='password'] {
    padding: 1rem;
}
.box-password .form-control:focus {
    border: none;
    outline: none;
}
 </style>
<div class="col-md-12" style="margin-top: 20px">
    <p class="breadcrumb"><span class="" style="color: purple">STUDENT DASHBOARD
            <span class="text-muted">/</span> Setting </span> <span class="text-muted">/</span>
        <span class="text-muted"> Change Password</span>
    </p>
</div>

<div class="box-password col-md-8 m-auto col-sm-12 mt-5 p-4">
    <p class="class-title text-center">Change Password</p>
    <form action="" method="post">
        <div class="mb-3">
            <input type="password" name="c_password" placeholder="Current password" class="form-control" id="">
        </div>
        <div class="mb-3">
             <input type="password" name="n_password" placeholder="New password" class="form-control" id="">
        </div>
        <div class="mb-3">
            <input type="password" name="m_password" placeholder="Confirm password" class="form-control" id="">
        </div>
        <div class="mb-3">
            <input type="submit" name="change_password" value="Change Password" class="btn btns" id="">
        </div>
    </form>
</div>