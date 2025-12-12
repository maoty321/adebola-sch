<?php 
include './includes/head.php'?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>Undergraduate Application Form (UTME)</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<style>
  :root{
    --accent: purple;
    --border: #e2e2e2;
    --text: #222;
    --gray: #777;
  }

  html,body{
    margin:0;
    padding:0;
    background:#f5f5f7;
    font-family: "Roboto", sans-serif;
    color:var(--text);
  }

  /* ==== A4 PAPER CENTER ==== */
  .page {
    width: 210mm;
    min-height: 297mm;
    margin: 0 auto;
    background: #fff;
    padding: 25px 28px;
    border-radius: 4px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  }

  /* PRINT FIX */
  @media print {
    body {
      background:#fff;
    }
    .page {
      margin:0;
      padding:20px;
      box-shadow:none;
      border:none;
      width: auto;
      min-height:auto;
    }
  }

  .header{
    text-align:center;
    margin-bottom:25px;
  }
  .logo{
    width:90px;
    height:90px;
    object-fit:contain;
    margin-bottom:8px;
  }
  .title{
    font-family: "Poppins", sans-serif;
    font-weight:700;
    color:var(--accent);
    font-size:20px;
    margin-top:5px;
  }

  /* BOX */
  .box{
    border:1px solid var(--border);
    margin-bottom:16px;
    padding:16px;
    border-radius:4px;
    background:#fafafa;
  }
  .section-title{
    font-weight:700;
    font-family:"Poppins",sans-serif;
    color:var(--accent);
    margin-bottom:12px;
    font-size:15px;
  }

  /* PERSONAL GRID */
  .personal-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:10px 18px;
  }
  .field{
    font-size:13px;
    display:flex;
  }
  .label{
    min-width:120px;
    font-weight:600;
    color:#333;
  }
  .value{
    font-weight:500;
  }

  /* FULL WIDTH ROW */
  .full{
    grid-column:1 / -1;
  }

  /* PHOTO */
  .passport{
    text-align:right;
    margin-bottom:20px;
  }
  .passport img{
    width:140px;
    height:170px;
    object-fit:cover;
    border:1px solid var(--border);
    border-radius:3px;
    background:#eee;
  }
  .passport small{
    font-size:11px;
    color:var(--gray);
  }

  /* OLEVEL TABLE */
  table{
    width:100%;
    border-collapse:collapse;
    font-size:13px;
  }
  th,td{
    padding:6px 6px;
    border-bottom:1px dashed #eee;
    text-align:left;
  }
  th{
    font-weight:600;
    color:#333;
  }

  .score{
    font-size:20px;
    font-weight:700;
    color:var(--accent);
  }

  .meta-box{
    padding:12px;
    background:white;
    border:1px solid var(--border);
    border-radius:4px;
    font-size:13px;
  }

  footer{
    margin-top:30px;
    font-size:12px;
    color:#777;
    text-align:center;
  }

  .row {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 20px;
}

/* left info */
.personal-grid {
  flex: 1;
}

/* right image box */
.ll {
  width: 150px;                 /* control image width */
  display: flex;
  justify-content: flex-end;    /* push image to right */
}

/* passport image */
.ll img {
  width: 140px;
  height: 170px;
  object-fit: cover;
  border:1px solid #e2e2e2;
  border-radius:3px;
  background:#eee;
}

  /* MOBILE */
  @media(max-width:680px){
    .page{
      width:100%;
      padding:15px;
    }
    .personal-grid{
      grid-template-columns:1fr;
    }
    .passport{
      text-align:center;
    }
    .passport img{
      margin-bottom:6px;
    }
  }

</style>
</head>

<body>

<div id="filename" style="display:none">Bio-data Details</div>

<div id="receipt" class="page">

  <!-- HEADER -->
  <div class="header">
    <img src="../img/logo/log.jpg" class="logo" />
    <div style="font-weight:700; font-size:18px;">Adebola Excellent College of Health Sciences and Technology</div>
    <div class="title">Admission Bio-data Slip</div>
    <p style="font-size:12px; color:#555; margin:6px 0;">
      Bode- Osi, Iwo, Ola Oluwa Local Government, Osun State, Nigeria
    </p>
  </div>

  <!-- PERSONAL -->
  <div class="box">
    <div class="section-title">PERSONAL INFORMATION</div>

    <!-- <div class="passport">
      <img src="<?= $student_details['passport']?>" />
      <br><small>Passport Photograph</small>
    </div> -->

    <div class="row pt-0" style="display: flex">
    <div class="personal-grid">
        <div class="field"><div class="label">First Name:</div><div class="value"><?= $student_details['first_name'] ?></div></div>
        <div class="field"><div class="label">Middle Name:</div><div class="value"><?= $student_details['middlename'] ?></div></div>
        <div class="field"><div class="label">Surname:</div><div class="value"><?= $student_details['surname'] ?></div></div>
        <div class="field"><div class="label">Email:</div><div class="value"><?= $student_details['email'] ?></div></div>

        <div class="field"><div class="label">Phone:</div><div class="value"><?= $student_biodata['phone_number'] ?></div></div>
        <div class="field"><div class="label">NIN:</div><div class="value"><?= $student_biodata['nin'] ?></div></div>

        <div class="field"><div class="label">DOB:</div><div class="value"><?= $student_biodata['date_of_birth'] ?></div></div>
        <div class="field"><div class="label">Gender:</div><div class="value"><?= $student_biodata['gender'] ?></div></div>

        <div class="field"><div class="label">State:</div><div class="value"><?= $student_biodata['stateoforigin'] ?></div></div>
        <div class="field"><div class="label">LGA:</div><div class="value"><?= $student_biodata['lcda'] ?></div></div>

        <div class="field full"><div class="label">Home Address:</div><div class="value"><?= $student_biodata['home_address'] ?></div></div> 
    </div>

    <div class="ll">
        <img src="<?= $student_details['passport']?>" alt="Passport">
    </div>
</div>

  </div>


  <!-- OLEVEL -->
  <div class="box">
    <div class="section-title">O'LEVEL RECORDS</div>

    <?php 
      $examination_olevel = examination_olevel();
      $a = 1;
      foreach($examination_olevel as $olevel ){ 
    ?>
    <table>
      <thead>
        <tr><th colspan="2">Exam Sitting <?= $a++ ?></th></tr>
      </thead>
      <tbody>
        <tr><td style="width:140px;"><strong>Exam Type:</strong></td><td><?= $olevel['olevel_type'] ?></td></tr>
        <tr><td><strong>Exam Year:</strong></td><td><?= $olevel['olevel_year'] ?></td></tr>
        <tr><td><strong>Reg No:</strong></td><td><?= $olevel['olevel_reg'] ?></td></tr>
        <tr><td><strong>Subjects:</strong></td>
          <td>
            <?php 
              $olevel_results = fetch_result($olevel['olevel_id']);
              foreach($olevel_results as $res){ 
                  echo $res['subject'] . " (" . $res['grade'] . "), ";
              }
            ?>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <?php } ?>
  </div>


  <!-- JAMB -->
  <?php if(!empty($student_jamb['jamb_reg'])): ?>
  <div class="box">
    <div class="section-title">UTME INFORMATION</div>

    <?php 
      $score_1 = (int)($student_jamb['score_1'] ?? 0);
      $score_2 = (int)($student_jamb['score_2'] ?? 0);
      $score_3 = (int)($student_jamb['score_3'] ?? 0);
      $score_4 = (int)($student_jamb['score_4'] ?? 0);
      $total    = $score_1 + $score_2 + $score_3 + $score_4;
    ?>

    <div style="display:flex; justify-content:space-between; font-size:13px;">
      <div>
        <?= $student_jamb['subject_1'] ?>: <?= $score_1 ?>,
        <?= $student_jamb['subject_2'] ?>: <?= $score_2 ?>,
        <?= $student_jamb['subject_3'] ?>: <?= $score_3 ?>,
        <?= $student_jamb['subject_4'] ?>: <?= $score_4 ?>
      </div>

      <div>
        <div style="color:#888;">Total Score</div>
        <div class="score"><?= $total ?></div>
      </div>
    </div>
  </div>
  <?php endif; ?>


  <!-- NEXT OF KIN -->
  <div class="box">
    <div class="section-title">NEXT OF KIN INFORMATION</div>

    <div class="field"><div class="label">Name:</div><div class="value"><?= $student_biodata['nextof_name'] ?></div></div>
    <div class="field"><div class="label">Email:</div><div class="value"><?= $student_biodata['nextof_email'] ?></div></div>
    <div class="field"><div class="label">Relationship:</div><div class="value"><?= $student_biodata['nextof_relationship'] ?></div></div>
    <div class="field"><div class="label">Phone:</div><div class="value"><?= $student_biodata['nextof_phonenuber'] ?></div></div>
  </div>


  <!-- META DATA AT BOTTOM -->
  <div class="meta-box">
    <div class="field"><div class="label">Form Created:</div><div class="value"><?= date("d M, Y") ?></div></div>
    <div class="field"><div class="label">Form Status:</div><div class="value">Submitted</div></div>
  </div>


  <footer>
    Date Generated <?= date("d M, Y") ?>
   
  </footer>

</div>

<script>
  // Auto download PDF
  window.onload = function(){
    const element = document.getElementById('receipt');
    const file = document.getElementById('filename').innerText.trim() + ".pdf";

    html2pdf().from(element).save(file).then(() => {
      window.close();
    });
  }
</script>

</body>
</html>
