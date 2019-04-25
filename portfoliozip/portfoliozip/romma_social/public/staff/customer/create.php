<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  // Handle form values sent by new.php

  $customer = [];
  $customer['customer_first_name'] = $_POST['customer_first_name'];
  $customer['customer_surname'] = $_POST['customer_surname'];
  $customer['customer_number'] = $_POST['customer_number'];
  $customer['customer_email'] = $_POST['customer_email'];

  $result = insert_customer($customer);
  $new_customer = mysqli_insert_id($db);
  redirect_to(url_for('/staff/customer/show.php?id=' . $new_customer));

} else {
  redirect_to(url_for('/staff/customer/new.php'));
}

?>