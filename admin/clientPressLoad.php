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
      echo "Client Press Admin View";

        }


        //Set Menu Settings
        function ClientPressClient_menu(){
                add_menu_page(
                    'ClientPress Admin Client',
                    'My Dashboard',
                    'manage_options',
                    'WPCPC-admin',
                    'ClientPressClient_init',
                    'dashicons-groups' );
        }
 
        //Create Display Inside admin section
        function ClientPressClient_init(){

          //set navigation
          echo "Clients Page View";

            }
            add_action('admin_menu', 'ClientPressClient_menu');
