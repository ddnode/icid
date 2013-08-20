<div id="page">
  <div class="inner clearfix">
    <div id="header">
      <div class="inner clearfix">
        <a class="home" href="<?php print $front_page; ?>" >ICID</a>
        <?php print render($page['header']); ?>
      </div>
    </div>
    <?php if ($messages): ?>
      <div id="messages">
        <div class="inner clearfix">
          <?php print $messages; ?>
        </div>
      </div>
    <?php endif; ?>
    <div id="main">
      <div class="inner clearfix">

        <?php if($page['sidebar_first']): ?>
          <div id="sidebar-first">
            <div class="inner clearfix">
              <?php print render($page['sidebar_first']); ?>
            </div>
          </div>
        <?php endif; ?>

        <div id="content">
          <div class="inner clearfix">
            <?php print render($page['help']); ?>
            <?php global $user; if ($user->uid == 0): ?>
              <div class="tabs">
                <ul class="tabs primary">
                  <li><?php print l('登录<br />Log in', 'user', array('html' => TRUE)); ?></li>
                  <li><?php print l('创建新帐号<br />Create new account', 'user/register', array('html' => TRUE)); ?></li>
                  <li><?php print l('重设密码<br />Request new password', 'user/password', array('html' => TRUE)); ?></li>
                </ul>
              </div>
            <?php else: ?>
              <?php if ($tabs): ?>
                <div class="tabs">
                  <?php print render($tabs); ?>
                </div>
              <?php endif; ?>
            <?php endif; ?>
            <?php print render($page['content']); ?>
          </div>
        </div>

        <?php if($page['sidebar_second']): ?>
          <div id="sidebar-second">
            <div class="inner clearfix">
              <?php print render($page['sidebar_second']); ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div id="footer">
      <div class="inner clearfix">
        <?php print render($page['footer']); ?>
        <div class="copyright">&copy; 2013 International Conference on Interaction Design</div>
      </div>
    </div>
  </div>
</div>
