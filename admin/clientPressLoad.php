<?php


//Build out Admin UI
add_action('admin_menu', 'ClientPress_menu');

 // add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null

    //Set Menu Settings
    function ClientPress_menu(){
            add_menu_page(
                'ClientPress Admin',
                'ClientPress',
                'manage_options',
                'WPCP-admin',
                'ClientPress_init',
                'dashicons-admin-users' );
    }

    //Create Display Inside admin section
    function ClientPress_init(){

      //set navigation
      echo "<h2 class='nav-tab-wrapper'><a class='nav-tab nav-tab-active' id='api-tab' href='#top#api'>API Settings</a><a class='nav-tab nav-tab-disabled' id='other-tab' href='#top#other'>Other</a></h2>";

      //Page Description
      echo "<p style='font-size:120%; width:60%;'>
      This is where you will need to set your API Key and Secrect so that when you implement the short code into your website it can make the proper API calls in order to display your active Taplist.
      </p>";

      //Content divs
      echo"<div id='api'>
              <label><b>API Key:</b></label><br/>
                  <input type='text' name='apiKey' /><br/>
              <label><b>API Secret:</b></label><br/>
                  <input type='text' name='apiSecret' /><br/><br/>
                  <button class='button button-primary'>Submit</button>
          </div>";
      echo"<div id='other'></div>";

        }
