<?php if(count($product)>0){ 
  foreach($product as $pro){
?>

  <tr>
    <td><img height="100" width="100" src="<?= base_url($pro->product_img); ?>" /></td>
    <td><?= $pro->product_name; ?></td>
    <td><?= $pro->product_ID; ?></td>
    <td><?= $pro->create_time; ?></td>
    <td><button class="btn btn-danger delete_product" data-id='<?= $pro->id; ?>'>Delete</button></td>
  </tr>
  
<?php } } else { 
  echo "<h2>No Data Found!..</h2>";
}?>

<script type="text/javascript">
  $('.delete_product').click(function() {
      var data_id=$(this).data("id");
      $.ajax({
         url: '<?= base_url() ?>User_profile/delete_product',
         type: 'POST',
         data: {id:data_id},
         success: function(data) {
          if(data=='1'){
            alert('Delete unsuccessfull!..');
            console.log(data);
            location.reload();

          }else{
            alert('Delete successfully');
            console.log(data);
            location.reload();
          }
         },
         error: function(data) {
            alert('Something Error!..');
            location.reload();
         }
      });
    });
</script>