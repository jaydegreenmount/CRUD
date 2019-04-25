<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id']; // PHP > 7.0

$booking = find_booking_by_id($id);

?>

<?php $page_title = 'Show Booking'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/booking/index.php'); ?>">&laquo; Back to List</a>

  <div class="booking show">

    <h1>Page: <?php echo h($booking['booking_name']); ?></h1>

    <div class="attributes">
      <?php $booking = find_booking_by_id($id); ?>
      <dl>
        <dt>Customer</dt>
        <dd><?php echo h($booking['customerID']); ?></dd>
      </dl>
      <dl>
        <dt>Booking Name</dt>
        <dd><?php echo h($booking['booking_name']); ?></dd>
      </dl>
      <dl>
        <dt>Time</dt>
        <dd><?php echo h($booking['booking_time']); ?></dd>
      </dl>       
	  <dt>Guests</dt>
        <dd><?php echo h($booking['guests']); ?></dd>
      </dl>
      <dl>
        <dt>Special Requests</dt>
        <dd><?php echo h($booking['special_requests']); ?></dd>
      </dl>
    </div>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
