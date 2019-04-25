<?php require_once('../../../private/initialize.php'); ?>

<?php

  $booking_set = find_all_bookings();

?>

<?php $page_title = 'Bookings'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="booking listing">
    <h1>Bookingss</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/staff/booking/new.php'); ?>">Create New Booking</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>BookingID</th>
        <th>CustomerID</th>
        <th>Booking Name</th>
        <th>Time</th>
        <th>Guests</th>
  	    <th>Special Requests</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($booking = mysqli_fetch_assoc($booking_set)) { ?>
        <?php $customer = find_customer_by_id($booking['customerID']); ?>
        <tr>
          <td><?php echo h($booking['bookingID']); ?></td>
          <td><?php echo h($booking['customerID']); ?></td>
          <td><?php echo h($booking['booking_name']); ?></td>
          <td><?php echo h($booking['booking_time']); ?></td>
          <td><?php echo h($booking['guests']); ?></td>
    	  <td><?php echo h($booking['special_requests']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/booking/show.php?id=' . h(u($booking['bookingID']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/booking/edit.php?id=' . h(u($booking['bookingID']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/booking/delete.php?id=' . h(u($booking['bookingID']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php mysqli_free_result($booking_set); ?>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
