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
  $name = $renderable['first_name']['#value'] . ' ' . $renderable['last_name']['#value'];
  $registration_type = $renderable['registration_type']['#value']['0'] ? '学生' : '成人';
  $group_price = isset($renderable['groups']['group_people_num']) ? '是' : '否';
  $total = $renderable['total_fees']['#markup'];
  $fees_status = '否/NO';
  if (isset($renderable['fees_status'])) {
    $fees_status = isset($renderable['fees_status']['#value'][0]) ? '是/YES' : '否/NO';
  }
?>
<h3>非常感谢您参加 2013 年交互设计国际会议，您的注册已完成，以下是详细信息：<br />
Congratulations for completing your registration, detail information listed as below:</h3>
<table>
  <tr>
    <td class="th-highlight">注册明细<br />Registration List</td>
    <td class="th-highlight">邮箱<br />Email</td>
    <td class="th-highlight">注册项目<br />Registration Type</td>
    <td class="th-highlight">注册费用<br />Registration fee</td>
    <td class="th-highlight">参会资格<br />Qualification</td>
  </tr>
  <tr>
    <td><?php print $name; ?></td>
    <td><?php print $mail; ?></td>
    <td><?php print $registration_type; ?></td>
    <td>RMB <?php print $total; ?>元</td>
    <td><?php print $fees_status; ?></td>
  </tr>
</table>
<?php print $renderable['apply_info']['#markup']; ?>
<p>
<h3>汇款账号</h3>
<p>
所有参会费用须以汇款支付。<br />
账户名称： 清华大学<br />
银行账号： 7783 5003 3647<br />
开户行名称：中国银行，总行<br />
开户行地址：北京市西城区复兴门内大街1号<br />
备注栏务必注明：ICID2013注册费用＋会员姓名和编号, 信息艺术设计系，王跃美 收<br />
地址：北京市清华大学美术学院信息艺术设计系B435室<br />
电话：86-01-62798934<br />
传真：86-01-62798933
</p>
<h3>Remittance Account</h3>
<p>
All registration fees must be making a remittance.<br />
Beneficiary’s Name: TSINGHUA UNIVERSITY <br />
Account Number: 7783 5003 3647 <br />
Beneficiary’s Bank Name: THE BANK OF CHINA, Head Office<br />
Beneficiary’s Bank Address: NO. 1, Fuxingmen Nei Avenue, Beijing, PRC, 100818
SWIFT Code: BKCHCNBJ<br />
Remittance Information: ICID2013;Information Art & Design Department; Wang Yue Mei<br />
Tel: 86-01-62798934<br />
Fax: 86-01-62798933
</p>

<a href="javascript:window.print();" class="print">Print</a>
<a href="/" class="home-link">Home</a>
