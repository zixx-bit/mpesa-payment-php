 <?php

 require_once $_SERVER['DOCUMENT_ROOT']. '/online store/core/init.php';

 require $_SERVER['DOCUMENT_ROOT']. '/online store/includes/head.php';


 $payment_sql = "SELECT * FROM payments";
 $payment_result = $db->query($payment_sql);
 $errors = array();
 $messages = array();

 $count = mysqli_num_rows($payment_result);
          if ($count<0)
          {
            $errors[].='Oops! payment is unsuccessful! Please try again';

          }

          else if ($count>0) {
            $messages[].= 'Congratulations! Payment made succesfully!';
          }


  // display


  ?>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../js/bootstrap.min.css"> -->
  <script src="../js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="../css/main.css">

<div class="container">
  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="mpesa_response_modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">M-PESA Payment Response</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <!-- <span aria-hidden="false">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
        <?php while($response = mysqli_fetch_assoc($payment_result)): ?>
          <p></p>
        <?php endwhile; ?>

        <?php

        if (!empty($errors)) {
          echo display_errors($errors);
        }

        else if (empty($errors)) {
          echo successMessage($messages);
        }
         ?>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" href="../index.php" class="btn btn-primary">Exit</button>
      </div>
    </div>
  </div>
</div>


</div>


<script >
$(document).ready ( function(){
 alert('ok');
 jQuery('.mpesa_response_modal').html("");
});​
</script>
