<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/customer/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_customer($id);
  redirect_to(url_for('/staff/customer/index.php'));

} else {
  $customer = find_customer_by_id($id);
}

?>

<?php $page_title = 'Delete Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer delete">
    <h1>Delete Customer</h1>
    <p>Are you sure you want to delete this customer?</p>
    <p class="item"><?php echo h($customer['customer_first_name']); ?></p>

    <form action="<?php echo url_for('/staff/customer/delete.php?id=' . h(u($customer['customerID']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Customer" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
