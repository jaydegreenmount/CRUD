<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/booking/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $booking = [];
  $booking['bookingID'] = $id;
  $booking['customerID'] = $_POST['customerID'];
  $booking['booking_name'] = $_POST['booking_name'];
  $booking['booking_time'] = $_POST['booking_time'];
  $booking['guests'] = $_POST['guests'];
  $booking['special_requests'] = $_POST['special_requests'];

  $result = update_booking($booking);
  redirect_to(url_for('/staff/booking/show.php?id=' . $id));

} else {

  $booking = find_booking_by_id($id);

  $booking_set = find_all_bookings();
  $booking_count = mysqli_num_rows($booking_set);
  mysqli_free_result($booking_set);

}

?>

<?php $page_title = 'Edit Booking'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/booking/index.php'); ?>">&laquo; Back to List</a>

  <div class="booking edit">
    <h1>Edit Booking</h1>

    <form action="<?php echo url_for('/staff/booking/edit.php?id=' . h(u($id))); ?>" method="post">
           <dl>
        <dt>BookingID</dt>
        <dd><input type="text" name="bookingID" value="<?php echo h($booking['bookingID']); ?>" /></dd>
      </dl>
	 <dl>
        <dt>Customer</dt>
          <dd><input type="text" name="customerID" value="<?php echo h($booking['customerID']); ?>" /></dd>
      <dl>
        <dt>Booking Name</dt>
        <dd><input type="text" name="booking_name" value="<?php echo h($booking['booking_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Time</dt>
        <dd><input type="text" name="booking_time" value="<?php echo h($booking['booking_time']); ?>" /></dd>
      </dl>      <dl>
        <dt>Number of Guests</dt>
        <dd><input type="text" name="guests" value="<?php echo h($booking['guests']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Special Requests</dt>
        <dd>
          <input type="text" name="special_requests" value="<?php echo h($booking['special_requests']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Booking" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
