<?php require_once('../../../private/initialize.php'); ?>

<?php

  $customer_set = find_all_customers();

?>

<?php $page_title = 'Customers'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="customer listing">
    <h1>Customers</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/customer/new.php'); ?>">Create New Customer</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>CustomerID</th>
        <th>First Name</th>
        <th>Surname</th>
  	    <th>Number</th>
  	    <th>Email</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($customer = mysqli_fetch_assoc($customer_set)) { ?>
        <tr>
          <td><?php echo h($customer['customerID']); ?></td>
          <td><?php echo h($customer['customer_first_name']); ?></td>
          <td><?php echo h($customer['customer_surname']); ?></td>
          <td><?php echo h($customer['customer_number']); ?></td>
    	  <td><?php echo h($customer['customer_email']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer/show.php?id=' . h(u($customer['customerID']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer/edit.php?id=' . h(u($customer['customerID']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer/delete.php?id=' . h(u($customer['customerID']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($customer_set);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
