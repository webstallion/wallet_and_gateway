<table border="1px" cellpadding="5" >
  <tbody>
    <tr>
      <th>empID</th>
      <th>empName</th>
      <th>deptID</th>
      <th>salary</th>
      <th>joinYear</th>
    </tr>
    <?php if(count($employees4)>0){ 
      foreach($employees4 as $employee){
    ?>
      <tr>
        <td><?//= $employee->empID; ?></td>
        <td><?= $employee->@ename; ?></td>
        <td><?//= $employee->deptID; ?></td>
        <td><?//= $employee->salary; ?></td>
        <td><?//= $employee->joinYear; ?></td>
      </tr>
    <?php } } ?>
  </tbody>
</table> 