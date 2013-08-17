<?php

/**
 * @file
 * Customize the display of a webform submission.
 *
 * Available variables:
 * - $node: The node object for this webform.
 * - $submission: The Webform submission array.
 * - $email: If sending this submission in an e-mail, the e-mail configuration
 *   options.
 * - $format: The format of the submission being printed, either "html" or
 *   "text".
 * - $renderable: The renderable submission array, used to print out individual
 *   parts of the submission, just like a $form array.
 */
?>
<?php
  $user = user_load($renderable['#submission']->uid);
  $mail = $user->mail;

  $main_conference_num = $renderable['conference_registration_fee']['main_conference_num']['#value'];
  $workshop_count = $renderable['workshop_fees']['workshop_count']['#value'];
  $ticket_count = $renderable['additional_banquet_ticket']['ticket_count']['#value'];
  $apply_for_group_price = $renderable['groups']['apply_for_group_price']['#value'];
  $registration_type = $renderable['registration_type']['#value'][0];
  $number_of_people_in_the_group = $renderable['groups']['number_of_people_in_the_group']['#value'];

  $time = time();
  $cf_fee = $time < strtotime("2013-10-10") ? 1800 : 2000;
  $cf_fee = $registration_type == 1 ? 300 : $cf_fee;
  $ws_fee = 800;
  $bt_fee = 80;
  $cf_fees = $cf_fee * $main_conference_num;
  $ws_fees = $ws_fee * $workshop_count;
  $bt_fees = $bt_fee * $ticket_count;
  if ($apply_for_group_price && $registration_type == 0) {
    $cf_fee = $time < strtotime("2013-9-30") ? 1800 : 2000;
    $num = $number_of_people_in_the_group >= 5 ? $number_of_people_in_the_group - 1 : $number_of_people_in_the_group;
    $cf_fees = $cf_fees * $num;
  }
  $total = $cf_fees + $ws_fees + $bt_fees;
?>
<table>
  <tr>
    <td>注册明细<br />Registration List</td>
    <td>邮箱<br />Email</td>
    <td>注册项目<br />Registration Type</td>
    <td>状态<br />Actions</td>
  </tr>
  <tr>
    <td><?php print $renderable['first_name']['#value'] . ' ' . $renderable['last_name']['#value']; ?></td>
    <td><?php print $mail; ?></td>
    <td></td>
    <td></td>
  </tr>
</table>

<table>
  <tr>
    <td>付费项目<br />Fees</td>
    <td>数量<br />Quantity</td>
    <td>费用<br />Unit Price</td>
    <td>总结<br />Amount</td>
  </tr>
  <tr>
    <td>ICID大会<br />Main Conference</td>
    <td><?php print $main_conference_num; ?></td>
    <td>RMB <?php print $cf_fee; ?></td>
    <td>RMB <?php print $cf_fees; ?></td>
  </tr>
  <tr>
    <td>主题研讨会 1<br />Workshop 1</td>
    <td><?php print $workshop_count; ?></td>
    <td>RMB <?php print $ws_fee; ?></td>
    <td>RMB <?php print $ws_fees; ?></td>
  </tr>
  <tr>
    <td>附加晚餐入场券<br />Additional Banquet Ticket</td>
    <td><?php print $ticket_count; ?></td>
    <td>RMB <?php print $bt_fee; ?></td>
    <td>RMB <?php print $bt_fees; ?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>总费用/Total</td>
    <td>RMB <?php print $total; ?></td>
  </tr>
</table>
