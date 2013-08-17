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
  $fees_status = $renderable['fees_status']['#value'][0] ? '已付款' : '未付款';
?>
<h3>非常感谢您参加 2013 年交互设计国际会议，您的注册已完成，以下是详细信息：</h3>
<table>
  <tr>
    <td>注册邮箱</td>
    <td><?php print $mail; ?></td>
  </tr>
  <tr>
    <td>姓名</td>
    <td><?php print $name; ?></td>
  </tr>
  <tr>
    <td>注册项目</td>
    <td><?php print $registration_type; ?></td>
  </tr>
  <tr>
    <td>团队价格</td>
    <td><?php print $group_price; ?></td>
  </tr>
  <tr>
    <td>注册费用</td>
    <td>RMB <?php print $total; ?>元</td>
  </tr>
  <tr>
    <td>付款状态</td>
    <td><?php print $fees_status; ?></td>
  </tr>
</table>
<p>
汇款账号<br />
所有参会费用须以汇款支付。<br />
户名： 清华大学<br />
账号： 0200004509089131550<br />
开户行：工商银行北京分行海淀西区支行<br />
备注栏务必注明：2013交互设计国际会议注册费用＋会员姓名和编号<br />
组委会联系人：关琰<br />
地址：北京市清华大学美术学院信息艺术设计系B435室<br />
电话：86-01-62798934<br />
传真：86-01-62798933
</p>

<a href="javascript:window.print(); return false;" class="print">Print</a>
<a href="javascript:var win = window.open('', '_self'); win.close(); return false;" class="close">Close</a>
