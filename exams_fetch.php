<?php
    include "conn.php";
    session_start();
    if(isset($_POST['readEnrolledExams'])) {
        $student_email=$_SESSION['email'];
        $sql = "SELECT * FROM enrolled_exams where email = '$student_email'"; 
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_array($result)) {
                $paper=$row['enrolled_paper'];
                $paper_code=$row['paper_code'];
                $date=$row['paper_date'];
                $start_time=date("H:i",strtotime($row['start_time']));
                $end_time=date("H:i",strtotime($row['end_time']));
                //$date=date('d/m/Y',strtotime($date));
                 ?>
                <div class="card">
                    <div class="card-body m-3">
                        <h4 class="card-title"><?php echo $paper."(".$paper_code.")"; ?></h4>
                        <p class="card-text">Date:<?php echo $date;?><br>Time:<?php echo $start_time;?>-<?php echo $end_time;?></p>
                        <a href="#" class="btn btn-primary">Start Exam</a>
                        <a href="#" class="btn btn-outline-danger">Un-register</a>
                    </div>
                </div>
                 <?php
            }
        } 
    }
    // Results
    if(isset($_POST['readExamsResults'])) {
        $student_email=$_SESSION['email'];
        $sql = "SELECT * FROM enrolled_exams where email = '$student_email'"; 
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_array($result)) {
                $paper=$row['enrolled_paper'];
                $paper_code=$row['paper_code'];
                $date=$row['paper_date'];
                $start_time=date("H:i",strtotime($row['start_time']));
                $end_time=date("H:i",strtotime($row['end_time']));
                $score=$row['score'];
                 ?>
                <div class="card">
                    <div class="card-body m-3">
                        <h4 class="card-title"><?php echo $paper."(".$paper_code.")"; ?></h4>
                        <p class="card-text">Date:<?php echo $date;?><br>Time:<?php echo $start_time;?>-<?php echo $end_time;?></p>
                        <p class="card-text">FM:</p>
                        <p class="card-text">Score:<?php echo $score;?><br></p>
                    </div>
                </div>
                 <?php
            }
        } 
    }
?>