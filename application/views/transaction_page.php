    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <a href="<?= base_url('User_profile/product_data'); ?>" target="_blank" style="color: white;">Second taks</a>
    </button><a class="btn btn-sm btn-danger" href="<?= base_url('login/logout'); ?>">Logout</a> <br><br>

    <div class="card col-7 shadow rounded m-auto mt-3">
      <div class="card-body d-flex justify-content-between align-items-center">
        <button type="button" class="btn btn-warning">
          Available Fund <span class="badge bg-secondary"><?php $available=($credit_amount[0]['credit']-$debit_amount[0]['debit']); ?> <?= $available; ?>  Rs</span>
        </button>
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Transfer Money
        </button> 
      </div>
    </div>
       
    <?php
      $color="danger";
      $color1="success";
    if(count($transaction)>0){
      foreach($transaction as $history){ 
        if($history->from_user_id==$this->session->user_id){ 
          $value_before="From ".$toname[$history->from_user_id]. "(".$tophone[$history->from_user_id].")";
          $color="danger";
      } else { 
        $value_before="To ".$toname[$history->to_user_id]. "(".$tophone[$history->to_user_id].")";
          $color="success";
      }   ?>


          <div class="card col-7 shadow rounded m-auto mt-3">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6 class=" mb-2 text-muted"><?= $value_before; ?></h6>
                <p class="card-text"><?= $history->created_at; ?></p>
              </div>
              <h4 class="card-title text-<?=$color?>"><b><?=$color=='success'?'+':'-'?> <?= $history->amount; ?> Rs</b></h4>
            </div>
          </div>
    <?php  } } ?>
