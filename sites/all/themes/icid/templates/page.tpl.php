<div id="page">
  <div class="inner clearfix">
    <div id="header">
      <div class="inner clearfix">
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
