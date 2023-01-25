<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>"  rel="stylesheet" />
<div class="container">
  <div id="menu_bar" class="d-flex justify-content-between col-7 m-auto mt-3">
    <br>
  </div>
  <div>
    <div class="table-responsive">
      <button class="btn btn-danger text-right" data-bs-toggle="modal" data-bs-target="#SupportModal">
      +Add New+
      </button>
      <table class="table table-bordered" style="font-size: 12px;">
        <thead>
          <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product ID</th>
            <th>Create Time</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="product_list">
          
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="SupportModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form name="form" method="post" id="product" enctype="multipart/form-data"> 
        <div class="modal-body">
          <div class="body table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th colspan="4" style="text-align: center;background-color: #0d62af;color: white;font-size: 16px;">Product Form</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Product image</th>
                  <td><input type="file" name="product_img[]" id="product_img" class="form-control" multiple style="border:none;" /></td>
                </tr>
                <tr>
                  <th>Product name</th>
                  <td><input type="text" name="product_name" class="form-control" style="border: none;"></td>
                </tr>
                <tr>
                  <th>Product ID</th>
                  <td>
                    <select class="form-control" name="product_ID">
                      <option value="1">Lapetop</option>
                      <option value="2">Mobile</option>
                      <option value="3">TV</option>
                      <option value="4">IPAD</option>
                      <option value="5">Computer</option>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="customer_support" class="btn btn-primary">Add Product</button>
        </div>
      </form>
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
        url: "<?php echo base_url(); ?>User_profile/product_list",
        type: "POST",
        success : function(data){
          $('#product_list').html(data);
        }
      })
    }
    loadTable();

    $('#customer_support').click(function(e) {
      e.preventDefault();
      var form_data = new FormData($("#product")[0]);
      $.ajax({
         url: '<?= base_url() ?>User_profile/product_data',
         type: 'POST',
         contentType: 'multipart/form-data',
         data: form_data,
         processData: false,
         contentType: false,
         success: function(data) {
          console.log(data);
          //console.log(data.filename);
          if(data==2){
            alert('pls select file!..');
            $('#SupportModal').modal('hide');
          }else if(data==1){
            alert('upload failed!..');
            $('#SupportModal').modal('hide');
          }else if(data=='success'){
            alert('upload successfully');
            loadTable()
            $('#SupportModal').modal('hide');
          }
         },
         error: function(data) {
            console.log(data);
            alert('upload failed');
            loadTable();
            $('#SupportModal').modal('hide');
            
         }
      });
    });
  });
</script>