<?php include './includes/header.php'?>
<link rel="stylesheet" href="./css/contact.css">
<link rel="stylesheet" href="./css/style.css">


<body class="bg-light">
    <div class="wrapper">
        <?php include './includes/nav.php'?>
        
        <div class="k"></div>

       <div class="section contact">
            <div class="contact-box col-lg-6 col-md-11 col-sm-12">
                <div class="l p-2">
                    <p class="contact-title">Contact Us</p>
                    <marquee behavior="" direction=""><p>Send message to us </p></marquee>
                </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="email" name="" placeholder="Enter your email" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="email" placeholder="Enter your Name" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <textarea name="" placeholder="Enter your message" id="" class="form-control" id=""></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Submit Message" class="btn">
                    </div>
                </form>
            </div>
       </div>
       
        <?php include './includes/footer.php'?>
    </div>

    <?php include './includes/script.php'?>
</body>

</html>