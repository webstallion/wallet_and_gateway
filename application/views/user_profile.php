<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>"  rel="stylesheet" />
<div class="container">
  <div id="trans_list" class="">
    
    <!-- append transaction page-->
  </div>
  <div id="">
    
  </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Transfer Money</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Mobile</span>
            <input type="text" class="form-control" id="user_mobile_no" placeholder="enter user mobile no..." aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Amount</span>
            <input type="text" class="form-control" id="amount" placeholder="enter amount to send.." aria-label="Username" aria-describedby="basic-addon1">
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <div class="spinner-border" role="status"  id="loading" style="display:none">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
        <div class="alert alert-success" role="alert" id="s_msg" style="display:none">
        </div>
        <div class="alert alert-danger" role="alert" id="e_msg" style="display:none">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="save-button" class="btn btn-primary">Transfer Money</button>
      </div>
      <div id="error_msg"></div>
      <div id="success_msg"></div>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    function loadTable(){
      $.ajax({
        url: "<?php echo base_url(); ?>User_profile/transaction_page",
        type: "POST",
        success : function(data){
          $('#trans_list').html(data);
        }
      })
    }
    loadTable();

    $("#save-button").click(function(e){
        e.preventDefault();
        var mobile=$('#user_mobile_no').val();
        var amount=$('#amount').val();
        if(mobile=='' || amount==''){
          $('#error_msg').html('All fields are required.').slideDown();
        }else{
          $.ajax({
            url: "<?php echo base_url(); ?>User_profile/user_profile",
            type: "POST",
            data: {mobile: mobile, amount: amount},
            success: function(data){
              console.log(data);
              if(data=='false'){
                $('#staticBackdrop').modal('toggle');
                loadTable();
                alert('You can not transfer money to the same mobile no account!.');
              }else if(data==3){
                loadTable();
                $('#staticBackdrop').modal('toggle');
                alert('You do not have that much money!.');
              }else if(data==4){
                loadTable();
                $('#staticBackdrop').modal('toggle');
                alert('You can not transfer money 0 or les than 0!.');
              }else if(data==1){
                loadTable();
                $('#staticBackdrop').modal('toggle');
                alert('Money Transfered Successfully..');
              }else if(data==2){
                $('#staticBackdrop').modal('toggle');
                loadTable();
                alert('Invalid mobile!.');
              }else{
                $('#staticBackdrop').modal('toggle');
                loadTable();
                alert('not transfered..');
              } 
            },error: function(data){
              $('#staticBackdrop').modal('toggle');
              loadTable();
              alert('not send');
            }
          });
        }
      });
  });
</script>