<?php
session_start();
if (isset($_SESSION['username']) || isset($_SESSION['id_company'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/reg.css">

  <?php

  include 'php/head.php'

  ?>

</head>

<body>

  <?php

  include 'php/header.php'

  ?>

  <section class="container">
    <header>Student Registration Form</header>
    <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data" class="form">
      <div class="column">

        <div class="input-box">
          <label>Enter User Name</label>
          <input type="text" id="uname" name="uname" placeholder="Enter User name" required />
        </div>

      </div>

      <div class="column">
        <div class="input-box">
          <label>Enter Password</label>
          <input type="password" id="password" name="password" placeholder="Enter Password" required />
        </div>

        <div class="input-box">
          <label>Confirm Password</label>
          <input type="password" id="cpassword" name="cpassword" placeholder="Confirm password" required />
        </div>
      </div>

      <div class="column">
        <div class="input-box">
          <label>First Name</label>
          <input type="text" id="fname" name="fname" placeholder="Enter First name" required />
        </div>

        <div class="input-box">
          <label>Last Name</label>
          <input type="text" id="lname" name="lname" placeholder="Enter Last name" required />
        </div>
      </div>

      <div class="input-box">
        <label for="email">Enter your email:</label>
        <input type="email" placeholder="Enter Your Email" id="email" name="email" />
      </div>

      <div class="input-box">
        <label>Mobile Number</label>
        <input type="number" id="contactno" name="contactno" placeholder="Enter phone number" required />

        <div class="input-box">
          <label>Birth Date</label>
          <input type="date" id="dob" name="dob" placeholder="Enter birth date" required />
        </div>
      </div>

      <div class="input-box">
        <label>Optional Mobile No.</label>
        <input type="number" id="ono" name="ono" placeholder="Enter Optional Mobile number" required />
      </div>

      <div class="input-box">
        <label>Whatsapp Number</label>
        <input type="number" id="wno" name="wno" placeholder="Enter Whatsapp number" required />
      </div>
      <br>
      <div class="input-box">
        <label>Aadhaar Number</label>
        <input type="number" id="aadhar" name="aadhar" placeholder="Enter Aadhaar number" maxlength="12" required />
      </div>

      <div class="input-box">
        <label>PAN Number</label>
        <input type="text" id="pan" name="pan" maxlength="10" placeholder="Enter PAN no."/>
      </div>

      <label>Dept Details </label>

      <div class="column">
        <div class="select-box">
          <select id="year" name="year" required>
            <option hidden>Year</option>

            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
        </div>

        <div class="select-box">
          <select id="Dept" name="Dept" required>
            <option hidden>Department</option>
            <option>CSE</option>
            <option>ECE</option>
            <option>EEE</option>
            <option>IT</option>
            <option>MECH</option>
            <option>CIVIL</option>
          </select>
        </div>

        <div class="select-box">
          <select id="section" name="section" required>
            <option hidden>Section </option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
          </select>
        </div>
      </div>

      <div class="column">
        <div class="select-box">
          <select id="gender" name="gender" required>
            <option hidden>Gender</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
        <div class="select-box">
          <select id="study" name="study" required>
            <option hidden>CHOICE OF STUDY</option>
            <option>On-Campus</option>
            <option>Higher studies</option>
            <option>Off-Campus</option>
          </select>
        </div>
      </div>
      
      <br><br>
      <div>
        If going for higher studies:
        <input type="text" id="hs" name="hs" placeholder="ENTER COUNTRY">
      </div>
      <div class="input-box address">
        <label>Address</label>
        <input type="text" id="address" name="address" placeholder="Enter your address" required />
        <div class="column">
          <input type="text" id="city" name="city" placeholder="Enter your city" required />
        </div>

        <div class="column">
          <input type="text" id="state" name="state" placeholder="Enter your State" required />
          <input type="number" id="pincode" name="pincode" placeholder="Enter postal code" required />
        </div>
        <br>
        <label>Skills</label>

        <div class="column">
          <input type="text" rows="4" id="skills" name="skills" placeholder="Enter your Skills" required />
        </div>
        <br>

        <label>Marks</label>
        <div class="column">
          <input type="floatval" id="tenth" name="tenth" placeholder="Enter 10th Percentage" required />
          <input type="floatval" id="twelfth" name="twelfth" placeholder="Enter 12th Percentage" required />
        </div>

        <div class="column">
          <input type="floatval" id="cgpa" name="cgpa" placeholder="Enter Your CGPA" required />
        </div>
        <br>

        <label>Arrears</label>
        <div class="column">
          <input type="text" name="hoa" id="hoa" placeholder="History of Arrears" required />
          <input type="text" name="ca" id="ca" placeholder="Current Arrears" required />
        </div>
      </div>

      <br>
      <div class="form-group">
        <label style="color: black">File Format PDF Only!</label>
        <input type="file" id="resume" name="resume" class="btn btn-flat btn-danger" required>
      </div>

      <button>Submit</button>
      <?php
      //If User already registered with this email then show error message.
      if (isset($_SESSION['registerError'])) {
      ?>
        <div class="form-group">
          <label style="color: red;">Email Already Exists! Choose A Different Email!</label>
        </div>
      <?php
        unset($_SESSION['registerError']);
      }
      ?>

      <?php if (isset($_SESSION['uploadError'])) { ?>
        <div class="form-group">
          <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
        </div>
      <?php unset($_SESSION['uploadError']);
      } ?>
    </form>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>

  <script type="text/javascript">
    function validatePhone(event) {
      var key = window.event ? event.keyCode : event.which;

      if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
        return true;
      } else if (key < 48 || key > 57) {
        return false;
      }
    }
  </script>

  <script type="text/javascript">
    $('#dob').on('change', function() {
      var today = new Date();
      var birthDate = new Date($(this).val());
      var age = today.getFullYear() - birthDate.getFullYear();
      var m = today.getMonth() - birthDate.getMonth();
    });
  </script>
  <script>
    $("#registerCandidates").on("submit", function(e) {
      e.preventDefault();
      if ($('#password').val() != $('#cpassword').val()) {
        $('#passwordError').show();
      } else {
        $(this).unbind('submit').submit();
      }
    });
  </script>
</body>

</html>