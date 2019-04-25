<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_booking($id);
  redirect_to(url_for('/staff/booking/index.php'));

} else {
  $booking = find_booking_by_id($id);
}

?>

<?php $page_title = 'Delete Booking'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/booking/index.php'); ?>">&laquo; Back to List</a>

  <div class="booking delete">
    <h1>Delete Booking</h1>
    <p>Are you sure you want to delete this booking?</p>
    <p class="item"><?php echo h($booking['booking_name']); ?></p>

    <form action="<?php echo url_for('/staff/booking/delete.php?id=' . h(u($booking['bookingID']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Booking" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
