<?php 
    $tittle = 'success';
    require_once 'includes/header.php';
    require_once'db/conn.php';
        
    if(isset($_POST['submit'])){
        //extract value from the $_POST arrray
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $speciality = $_POST['speciality'];
        //Call function to insert and track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $phone, $speciality);

        if($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>
    
    <!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php //echo $_GET['speciality']; ?>
            </h6>
            <p class="card-text">
               Date Of Birth : <?php //echo $_GET['dob']; ?>
            </p>
            <p class="card-text">
               Email : <?php //echo $_GET['email']; ?>
            </p>
            <p class="card-text">
               Phone : <?php //echo $_GET['phone']; ?>
            </p>
        
        </div>
    </div> -->
    
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $_POST['speciality']; ?>
            </h6>
            <p class="card-text">
               Date Of Birth : <?php echo $_POST['dob']; ?>
            </p>
            <p class="card-text">
               Email : <?php echo $_POST['email']; ?>
            </p>
            <p class="card-text">
               Phone : <?php echo $_POST['phone']; ?>
            </p>
        
        </div>
    </div>

<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>