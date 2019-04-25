<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id']; // PHP > 7.0

$customer = find_customer_by_id($id);

?>

<?php $page_title = 'Show Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>

  <div class="customer show">

    <h1>Customer: <?php echo h($customer['customerID']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Customer First Name</dt>
        <dd><?php echo h($customer['customer_first_name']); ?></dd>
      </dl>
      <dl>
        <dt>Surname</dt>
        <dd><?php echo h($customer['customer_surname']); ?></dd>
      </dl>      <dl>
        <dt>Number</dt>
        <dd><?php echo h($customer['customer_number']); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($customer['customer_email']); ?></dd>
      </dl>

    </div>

  </div>

</div>
