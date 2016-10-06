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

      //build lauoyt


        }




//CLIENT DASHBOARD




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

          //Build Page
          $current_user = wp_get_current_user();
          $clientFName = $current_user->user_firstname;
          $clientLName = $current_user->user_lastname;
          ?>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script type="text/javascript" src="admin/js/app.js"></script>
          <link rel="stylesheet" href="admin/css/main.css">
          <div class="container-fluid">
          <h1>ClientPress</h1>
          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-success col-sm-8">
    						<h3><?php echo "Hellop $clientFName $clientLName";?></h3>
    					</div>
              <div class="panel panel-success col-sm-4">
                <h3>Need Help Now?</h3>
                <h4>(480) 555-5555</h4>
              </div>
            </div>
          </div>
          <br>
          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-warning col-sm-4">
                <h3>Account Details</h3>
    						<p>Your account information</p>
    						<div class="list-group">
    							<a href="#" class="list-group-item list-group-item-default" id="detailName" name="detailName">Name</a>
    							<a href="#" class="list-group-item list-group-item-default" id="detailEmail" name="detailEmail">Email Address</a>
    							<a href="#" class="list-group-item list-group-item-default" id="detailPhone" name="detailPhone">Phone</a>
    							<a href="#" class="list-group-item list-group-item-default" id="detailAccount" name="detailAccount">Account Number</a>
    							<a href="#" class="list-group-item list-group-item-default" id="detailTier" name="detailTier">Tier Plan</a>
    						</div>
                <button type="submit" class="btn btn-primary" id="detailEdit" name="detailEdit">Edit</button>  <button type="submit" class="btn btn-default" id="detailSave" name="detailSave">Save</button>
              </div>
              <div class="panel panel-warning col-sm-4">
    						<h3>Retainer Hours</h3>
    						<p>Total time available this month based on your Tier Plan</p>
    						<dl>
    							<dt>Total Time</dt>
    							<dd><div class="well well-lg" id="retainerTotal" name="retainerTotal">Total Time</div></dd>
    							<dt>Remaining Time</dt>
    							<dd><div class="well well-lg" id="retainerRemain" name="retainerRemain">Remaining Time</div></dd>
    						</dl>
    						<button type="submit" class="btn btn-primary" id="retainerBreak" name="retainerBreak">View Breakdown</button>
    					</div>
              <div class="panel panel-warning col-sm-4">
                <h3>Submit Ticket</h3>
    						<p>Need a hand? Send us a support request</p>
                <form>
                    <div class="form-group" id="ticketMaker" name="ticketMaker">
                      <label for="input">Website URL:</label>
                      <input type="input" class="form-control" id="ticketUrl" name="ticketUrl">
                    </div>
                    <div class="form-group">
                      <label for="textarea">How can we help?:</label>
                      <textarea class="form-control" id="ticketText" name="ticketText"></textarea>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox"> Urgent!</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitTicket" name="submitTicket">Submit</button>
                </form>
              </div>
            </div>
          </div>
          <br>
          <div class="container-fluid">
            <div class="row">
              <div class="panel panel-danger col-sm-6">
                <h2>Open Tickets</h2>
                <table class="table table-condensed" id="ticketsOpen" name="ticketsOpen">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody id="tickOpenItem" name="tickOpenItem">
                    <tr>
                      <td id="tickOpenItem1" name="tickOpenItem1">John</td>
                      <td id="tickOpenItem2" name="tickOpenItem2">Doe</td>
                      <td id="tickOpenItem3" name="tickOpenItem3">john@example.com</td>
                    </tr>
    								<!--- Placeholder for demonstration -->
                    <tr>
                      <td>Mary</td>
                      <td>Moe</td>
                      <td>mary@example.com</td>
                    </tr>
                    <tr>
                      <td>July</td>
                      <td>Dooley</td>
                      <td>july@example.com</td>
                    </tr>
                  </tbody>
    							<!-- End Placeholder -->
                </table>
              </div>
              <div class="panel panel-danger col-sm-6">
                <h2>Resolved Tickets</h2>
                <table class="table table-condensed" id="ticketsResolved" name="ticketsResolved">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody  id="tickResItem" name="tickResItem">
                    <tr>
                      <td id="tickResItem1" name="tickResItem1">John</td>
                      <td id="tickResItem2" name="tickResItem2">Doe</td>
                      <td id="tickResItem3" name="tickResItem3">john@example.com</td>
                    </tr>
    								<!--- Placeholder for demonstration -->
                    <tr>
                      <td>Mary</td>
                      <td>Moe</td>
                      <td>mary@example.com</td>
                    </tr>
                    <tr>
                      <td>July</td>
                      <td>Dooley</td>
                      <td>july@example.com</td>
                    </tr>
                  </tbody>
    							<!-- End Placeholder -->
                </table>
              </div>
            </div>
          </div>
          <?php

            }
            add_action('admin_menu', 'ClientPressClient_menu');
