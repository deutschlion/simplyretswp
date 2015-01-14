<?php

/*
 * simply-rets-admin.php - Copyright (C) 2014 Reichert Brothers
 * This file provides the logic for the Simply Rets admin panel settings and features pages.
 *
*/


/* Code starts here */

class SrAdminSettings {

  function add_to_admin_menu() {
      add_options_page('Simply Rets Settings'
                       , 'Simply Rets'
                       , 'manage_options'
                       , 'simplyrets-admin.php'
                       , array('SrAdminSettings', 'sr_admin_page')
      );
  }
  
  function register_admin_settings() {
      register_setting('sr_admin_settings', 'sr_api_name');
      register_setting('sr_admin_settings', 'sr_api_key');
  }
  
  function sr_admin_page() {
      global $wpdb;
      ?>
      <div class="wrap">
        <h2>Simply Rets Admin Settings</h2>
        <hr>
        <p>
          Enter your Simply Rets API credentials in the fields below.
          For any issues, please contact support@simplyrets.com.
          <i> Note: properties will not show up until these are correct.</i>
        </p>
        <form method="post" action="options.php">
          <?php settings_fields( 'sr_admin_settings'); ?>
          <?php do_settings_sections( 'sr_admin_settings'); ?>
          <table>
            <tbody>
              <tr>
                <td>
                  <strong>API Username</strong>
                </td>
                <td>
                  <input type="text" name="sr_api_key" value="<?php echo esc_attr( get_option('sr_api_key') ); ?>" />
                  <span>(current: <?php echo esc_attr( get_option('sr_api_name') ); ?>)</span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>API Key</strong>
                </td>
                <td>
                  <input type="text" name="sr_api_name" value="<?php echo esc_attr( get_option('sr_api_name') ); ?>" />
                  <span>(current: <?php echo esc_attr( get_option('sr_api_key') ); ?>)</span>
                </td>
              </tr>
            </tbody>
          </table>
          <?php submit_button(); ?>
        </form>
        <hr>
        <div class="sr-doc-links">
          <p>
            <a href="http://simplyrets.com">Simply Rets Website</a> |
            <a href="http://simplyrets.com">Simply Rets Wordpress Plugin Documentation</a> |
            <a href="http://simplyrets.com">Simply Rets API Documentation</a> |
            <a href="http://simplyrets.com">Simply Rets Support</a>
      </div> <?php
  }
} ?>