
<?php include ("./includes/head.php"); ?>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<style>
    .red {
        background-color: purple;
        color: white;
    }
    .red:hover {
        background-color: purple;
        color: white;
    }
    .card-table {
        padding: 30px;
        box-shadow: 0px 0px 20px rgba(163, 162, 162, 0.1);
        overflow: auto;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    table  {
        white-space: nowrap;
        font-size: 14px;
        vertical-align: middle;
        color:  rgba(153, 149, 149, 0.2);
    }
    thead {
        font-size: 16px;
    }
    table tr {
        border: 1px solid rgba(153, 149, 149, 0.2);
    }
    td a {
        text-decoration: none;
        font-size: 14px;
    }
  
</style>
<link rel="stylesheet" href="../css/home-dashboard.css">
<title>Document</title>

<body class="bg-light">
    <div class="wrapper">
        <?php include './includes/header.php'?>

        <div class="container-fluid">
            <div class="row">
                <?php include './includes/side-bar.php'?>
                <div class="col-md-8 content" style="">
                    <div class="bread-crub">
                        <p style="color: purple; font-size: 13px">Aecoht >> Manage Student</p>
                        
                    </div>

                    <?php include'./component/student.php' ?>
                </div>
            </div>
        </div>
    </div>


      <script>
        $(document).ready(function() {
            $('#example').DataTable(); // Initialize DataTable
        });

        $('#example').DataTable({
    "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ]
});

    </script>
    
    <?php include './includes/footer.php'?>
</body>

</html>