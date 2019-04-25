<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/customer/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $customer = [];
  $customer['customerID'] = $id;
  $customer['customer_first_name'] = $_POST['customer_first_name'] ;
  $customer['customer_surname'] = $_POST['customer_surname'] ;
  $customer['customer_number'] = $_POST['customer_number'];
  $customer['customer_email'] = $_POST['customer_email'];

  $result = update_customer($customer);
  redirect_to(url_for('/staff/customer/show.php?id=' . $id));

} else {

  $customer = find_customer_by_id($id);

  $customer_set = find_all_customers();
  $customer_count = mysqli_num_rows($customer_set);
  mysqli_free_result($customer_set);

}

?>

<?php $page_title = 'Edit Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer edit">
    <h1>Edit Customer</h1>

    <form action="<?php echo url_for('/staff/customer/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Customer First Name</dt>
        <dd><input type="text" name="customer_first_name" value="<?php echo h($customer['customer_first_name']); ?>" /></dd>
      </dl>
      <dl>      <dl>
        <dt>Customer Surname</dt>
        <dd><input type="text" name="customer_surname" value="<?php echo h($customer['customer_surname']); ?>" /></dd>
      </dl>
      <dl>      <dl>
        <dt>Customer Number</dt>
        <dd><input type="text" name="customer_number" value="<?php echo h($customer['customer_number']); ?>" /></dd>
      </dl>
      <dl>      <dl>
        <dt>Customer Email</dt>
        <dd><input type="text" name="customer_email" value="<?php echo h($customer['customer_email']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Edit Subject" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
