<?php

require_once('../../../private/initialize.php');

$customer_set = find_all_customers();
$customer_count = mysqli_num_rows($customer_set) + 1;
mysqli_free_result($customer_set);

$customer = [];
$customer["customerID"] = $customer_count;

?>

<?php $page_title = 'Create Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer new">
    <h1>Create Customer</h1>

    <form action="<?php echo url_for('/staff/customer/create.php'); ?>" method="post">
      <dl>
        <dt>Customer First Name</dt>
        <dd><input type="text" name="customer_first_name" value="" /></dd>
      </dl>
      <dl>      <dl>
        <dt>Customer Surname</dt>
        <dd><input type="text" name="customer_surname" value="" /></dd>
      </dl>
      <dl>      <dl>
        <dt>Customer Number</dt>
        <dd><input type="text" name="customer_number" value="" /></dd>
      </dl>
      <dl>      <dl>
        <dt>Customer Email</dt>
       <dd><input type="text" name="customer_email" value="" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Create Customer" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
