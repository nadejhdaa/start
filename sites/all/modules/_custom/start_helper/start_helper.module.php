<?php
/*
Make Sure you include:
ctools_include('modal');
ctools_modal_add_js();
On the pages you put your link.
*/
/**
 * Implements hook_menu().
 */
function start_helper_menu() {
  $items['start_helper/%ctools_js/add'] = array(
    'page callback' => 'start_helper_node_add_modal_callback',
    'page arguments' => array(1),
    'access arguments' => array('access content'),
  );
  
  return $items;
}
/**
 * start_helper node add modal callback
 */
function start_helper_node_add_modal_callback($js = FALSE) {
  global $user;
  // If people aren't using javascript, then I just boot em. sorry. its 2011.
  if (!$js) return "Javascript required";
  
  // Include your ctools crap here
  ctools_include('node.pages', 'node', '');
  ctools_include('modal');
  ctools_include('ajax');
  // Create a blank node object here. You can also set values for your custom fields here as well.

  $node = (object) array(
    'uid' => $user->uid, 
    'name' => (isset($user->name) ? $user->name : ''), 
    'type' => 'mytype', 
    'language' => LANGUAGE_NONE,
    );
  $form_state = array(
    'title' => t('Add my conten type'),
    'ajax' => TRUE,
  );
  $form_state['build_info']['args'] = array($node);
  // change this to your type node form
  $output = ctools_modal_form_wrapper('invoice_node_form', $form_state);
  // This means the form has been exectued
  if (!empty($form_state['executed'])) {
    $output = array();
    // Close the modal
    $output[] = ctools_modal_command_dismiss();
    // I use this method a lot on pages that have views, so what I do is get the latest view content
    // with the latest node and replace the current view. magic!
    /*
    $html = views_embed_view('my_view', 'my_display';
    $output[] = ajax_command_html('.view-display-id-my_display', $html);
    */
  }
  
  print ajax_render($output);  
  exit;
}