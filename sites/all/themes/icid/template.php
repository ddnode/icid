<?php
/**
 * Implements hook_preprocess_page().
 */
function icid_preprocess_page(&$variables) {
  if (current_path() == 'node/20' && user_is_anonymous()) {
    drupal_goto('user/login', array('query'=>drupal_get_destination()));
  }
}
