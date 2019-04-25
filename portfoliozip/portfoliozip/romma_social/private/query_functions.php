<?php

  // Subjects     // customer

  function find_all_customers() {
    global $db;

    $sql = "SELECT * FROM customer ";              // works ok
    $sql .= "ORDER BY customerID ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    //confirm_result_set($result);
    return $result;
  }

  function find_customer_by_id($customerID) {
    global $db;

    $sql = "SELECT * FROM customer ";                         /// works ok
    $sql .= "WHERE customerID='" . $customerID . "'";
    $result = mysqli_query($db, $sql);
    //confirm_result_set($result);
    $customer = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $customer; // returns an assoc. array
  }

  function insert_customer($customer) {
    global $db;

    $sql = "INSERT INTO customer ";
    $sql .= "(customer_first_name, customer_surname, customer_number, customer_email) ";
    $sql .= "VALUES (";
    $sql .= "'" . $customer['customer_first_name'] . "',";
    $sql .= "'" . $customer['customer_surname'] . "',";
    $sql .= "'" . $customer['customer_number'] . "',";
    $sql .= "'" . $customer['customer_email'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_customer($customer) {
    global $db;

    $sql = "UPDATE customer SET ";
    $sql .= "customer_first_name='" . $customer['customer_first_name'] . "', ";
    $sql .= "customer_surname='" . $customer['customer_surname'] . "', ";
    $sql .= "customer_number='" . $customer['customer_number'] . "', ";
    $sql .= "customer_email='" . $customer['customer_email'] . "' ";
    $sql .= "WHERE customerID='" . $customer['customerID'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_customer($customerID) {
    global $db;

    $sql = "DELETE FROM customer ";
    $sql .= "WHERE customerID='" . $customerID . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed                        /// woohoo delete works!!
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  ////////////////////////////////////////////////////////////////////////// Pages   ////// booking

  function find_all_bookings() {
    global $db;

    $sql = "SELECT * FROM booking ";
    $sql .= "ORDER BY customerID ASC";
    $result = mysqli_query($db, $sql);
    //confirm_result_set($result);
    return $result;
  }

  function find_booking_by_id($id) {
    global $db;

    $sql = "SELECT * FROM booking ";
    $sql .= "WHERE bookingID='" . $id . "'";
    $result = mysqli_query($db, $sql);
    //confirm_result_set($result);
    $booking = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $booking; // returns an assoc. array
  }

  function insert_booking($booking) {
    global $db;

    $sql = "INSERT INTO booking ";
    $sql .= "(customerID, booking_name, booking_time, guests, special_requests) ";
    $sql .= "VALUES (";
    $sql .= "'" . $booking['customerID'] . "',";
    $sql .= "'" . $booking['booking_name'] . "',";
    $sql .= "'" . $booking['booking_time'] . "',";
    $sql .= "'" . $booking['guests'] . "',";
    $sql .= "'" . $booking['special_requests'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_booking($booking) {
    global $db;

    $sql = "UPDATE booking SET ";
    $sql .= "customerID='" . $booking['customerID'] . "', ";
    $sql .= "booking_name='" . $booking['booking_name'] . "', ";
    $sql .= "booking_time='" . $booking['booking_time'] . "', ";
    $sql .= "guests='" . $booking['guests'] . "', ";
    $sql .= "special_requests='" . $booking['special_requests'] . "' ";
    $sql .= "WHERE bookingID='" . $booking['bookingID'] . "' ";
    $sql .= "LIMIT 1";
    echo $sql;
    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_booking($id) {
    global $db;

    $sql = "DELETE FROM booking ";
    $sql .= "WHERE bookingID='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

?>

