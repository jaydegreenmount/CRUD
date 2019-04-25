<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  $booking = [];
  $booking['customerID'] = $_POST['customerID'];
  $booking['booking_name'] = $_POST['booking_name'];
  $booking['booking_time'] = $_POST['booking_time'];
  $booking['guests'] = $_POST['guests'];
  $booking['special_requests'] = $_POST['special_requests'];

  $result = insert_booking($booking);
  $new_booking = mysqli_insert_id($db);
  redirect_to(url_for('/staff/booking/show.php?id=' . $new_booking));

} else {

  $booking = [];
  $booking['customerID'] = '';
  $booking['booking_name'] = '';
  $booking['booking_time'] = '';
  $booking['guests'] = '';
  $booking['special_requests'] = '';

  $booking_set = find_all_bookings();
  $booking_count = mysqli_num_rows($booking_set) + 1;
  mysqli_free_result($booking_set);

}

?>

<?php $page_title = 'Create Booking'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/booking/index.php'); ?>">&laquo; Back to List</a>

  <div class="booking new">
    <h1>Create Booking</h1>

    <form action="<?php echo url_for('/staff/booking/new.php'); ?>" method="post">
      <dl>
       <dd>
		<dt>CustomerID</dt>
          <select name="customerID">
          <?php
            $booking_set = find_all_customers();
            while($booking = mysqli_fetch_assoc($booking_set)) {
              echo "<option value=\"" . h($booking['customerID']) . "\"";
              if($booking["customerID"] == $booking['customerID']) {
                echo " selected";
              }
              echo ">" . h($booking['customerID']) . "</option>";
            }
            mysqli_free_result($booking_set);
          ?>
          </select>
        </dd>
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
       
          <input type="text" name="special_requests" value="<?php echo h($booking['special_requests']); ?>" /></dd>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Customer" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
