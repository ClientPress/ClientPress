<?php
//Build out Admin UI
add_action('admin_menu', 'ClientPress_menu');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function ClientPress_enqueue()
{
    // JS
    wp_register_script('ClientPress_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_enqueue_script('ClientPress_bootstrap');

    wp_register_script('ClientPress_jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
    wp_enqueue_script('ClientPress_jquery');

    // CSS
    wp_register_style('ClientPress_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('ClientPress_bootstrap');
}

function ClientPress_Intergrations(){
  include( plugin_dir_path( __FILE__ ) . 'includes/harvest.php');
  include( plugin_dir_path( __FILE__ ) . 'includes/helpscout.php');
}

ClientPress_Intergrations();
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
      ClientPress_enqueue();
      ?>
      <script type="text/javascript" src="admin/js/app.js"></script>
      <link rel="stylesheet" href="admin/css/main.css">
      <div class="container">
  		<h2>Dynamic Tabs</h2>
  		<ul class="nav nav-tabs">
  			<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  			<li><a data-toggle="tab" href="#myclients">My Clients</a></li>
  			<li><a data-toggle="tab" href="#addclient">Add Client</a></li>
  			<li><a data-toggle="tab" href="#adminreports">Reports</a></li>
  		</ul>

  		<div class="tab-content">
  			<!-- Admin landing page -->
  			<div id="home" class="tab-pane fade in active">
  				<h3>ADMIN</h3>
  				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  				<br>
  				<hr>
  				<div class="container">
  					<h3>Help Scout</h3>
  					<p>Enter Username and Password to launch your Help Scout dashboard</p>
  					<form id="helpscoutLauncher" name="helpscoutLauncher">
  						<div class="form-group">
  							<label for="helpscoutLaunchUsr">Username:</label>
        				<input type="text" class="form-control" id="helpscoutLaunchUsr" name="helpscoutLaunchUsr" placeholder="Enter Username">
  						</div>
  						<div class="form-group">
  							<label for="helpscoutLaunchPwd">Password:</label>
  							<input type="password" class="form-control" id="helpscoutLaunchPwd" name="helpscoutLaunchPwd" placeholder="Enter password">
  						</div>
  						<button type="submit" class="btn btn-success" id="helpscoutLaunchBtn" name="helpscoutLaunchBtn">Launch</button>
  						<br>
  						<hr>
  					</form>
  				</div>
  				<div class="container">
  					<h3>Harvest</h3>
  					<p>Enter Username and Password to launch your Harvest dashboard</p>
  					<form id="harvestLauncher" name="harvestLauncher">
  						<div class="form-group">
  							<label for="harvestLaunchUsr">Username:</label>
        				<input type="text" class="form-control" id="harvestLaunchUsr" name="harvestLaunchUsr" placeholder="Enter Username">
  						</div>
  						<div class="form-group">
  							<label for="harvestLaunchPwd">Password:</label>
  							<input type="password" class="form-control" id="harvestLaunchPwd" name="harvestLaunchPwd" placeholder="Enter password">
  						</div>
  						<button type="submit" class="btn btn-success" id="harvestLaunchBtn" name="harvestLaunchBtn">Launch</button>
  						<br>
  						<hr>
  					</form>
  				</div>
  				<div class="container">
  					<h3>PayPal</h3>
  					<p>Enter Username and Password to launch your PayPal dashboard</p>
  					<form id="paypalLauncher" name="paypalLauncher">
  						<div class="form-group">
  							<label for="paypalLaunchUsr">Username:</label>
        				<input type="text" class="form-control" id="paypalLaunchUsr" name="paypalLaunchUsr" placeholder="Enter Username">
  						</div>
  						<div class="form-group">
  							<label for="paypalLaunchPwd">Password:</label>
  							<input type="password" class="form-control" id="paypalLaunchPwd" name="paypalLaunchPwd" placeholder="Enter password">
  						</div>
  						<button type="submit" class="btn btn-success" id="paypalLaunchBtn" name="paypalLaunchBtn">Launch</button>
  						<br>
  						<hr>
  					</form>
  				</div>
  				<div class="container">
  					<h3>Stripe</h3>
  					<p>Enter Username and Password to launch your Stripe dashboard</p>
  					<form id="stripeLauncher" name="stripeLauncher">
  						<div class="form-group">
  							<label for="stripeLaunchUsr">Username:</label>
        				<input type="text" class="form-control" id="stripeLaunchUsr" name="stripeLaunchUsr" placeholder="Enter Username">
  						</div>
  						<div class="form-group">
  							<label for="stripeLaunchPwd">Password:</label>
  							<input type="password" class="form-control" id="stripeLaunchPwd" name="stripeLaunchPwd" placeholder="Enter password">
  						</div>
  						<button type="submit" class="btn btn-success" id="stripeLaunchBtn" name="stripeLaunchBtn">Launch</button>
  						<br>
  						<hr>
  					</form>
  				</div>
  			</div>
  			<!-- Admin myclients page-->
  			<div id="myclients" class="tab-pane fade">
  				<h3>My Clients</h3>
  				<p>Review your client list</p>
  				<div class="container">
  					<table class="table table-hover">
  						<thead>
  							<tr>
  								<th>Name</th>
  								<th>Email</th>
  								<th>Phone</th>
  								<th>Status</th>
  							</tr>
  						</thead>
  						<tbody id="clientTable" name="clientTable">
  							<tr><a href="#">
  								<td id="clientTableName" name="clientTableName">John Doe</a></td>
  								<td id="clientTableEmail" name="clientTableEmail">john.doe@bigjims.com</td>
  								<td id="clientTablePhone" name="clientTablePhone">(480)555-5555</td>
  								<td id="clientTableStatus" name="clientTableStatus">Live</td>
  							</tr></a>
  							<!-- Display purposes -->
  							<tr>
  								<td>Mary Display</td>
  								<td>moe@plebs.com</td>
  								<td>(480)555-5555</td>
  								<td>Suspend</td>
  							</tr>
  							<tr>
  								<td>July</td>
  								<td>july@example.com</td>
  								<td>(480)555-5555</td>
  								<td>Pending</td>
  							</tr>
  						</tbody>
  					</table>
  				</div>

  			</div>
  			<!-- Admin add client page-->
  			<div id="addclient" class="tab-pane fade">
  				<h3>Menu 2</h3>
  				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
  			</div>
  			<!-- Admin reports page-->
  			<div id="adminreports" class="tab-pane fade">
  				<h3>Menu 3</h3>
  				<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
  			</div>
    	</div>
  		</div>

      <?php

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
          ClientPress_enqueue();
          ?>
          <script type="text/javascript" src="admin/js/app.js"></script>
          <link rel="stylesheet" href="admin/css/main.css">
          <div class="container-fluid">

          <h1>ClientPress</h1>
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-8">
    						<h3><?php echo "Hello $clientFName $clientLName";?></h3>
    					</div>
              <div class="col-sm-4">
                <h3>Need Help Now?</h3>
                <h4>(480) 555-5555</h4>
              </div>
            </div>
          </div>
          <br>
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-4">
                <h3>Account Details</h3>
    						<p>Your account information</p>
    						<div class="list-group">
    							<a href="#" class="list-group-item list-group-item-default" id="detailName" name="detailName">Name</a>
    							<a href="#" class="list-group-item list-group-item-default" id="detailEmail" name="detailEmail">Email Address</a>
    							<a href="#" class="list-group-item list-group-item-default" id="detailPhone" name="detailPhone">Phone</a>
    							<a href="#" class="list-group-item list-group-item-default" id="detailAccount" name="detailAccount">Account Number</a>
    							<a href="#" class="list-group-item list-group-item-default" id="detailTier" name="detailTier">Tier Plan - 10 Hours</a>
    						</div>
                <button type="submit" class="btn btn-primary" id="detailEdit" name="detailEdit">Edit</button>  <button type="submit" class="btn btn-default" id="detailSave" name="detailSave">Save</button>
              </div>
              <div class="col-sm-4">
    						<h3>Retainer Hours</h3>
    						<p>Total time available this month based on your Tier Plan</p>
    						<dl>
    							<dt>Total Hours Used This Month:</dt>
    							<dd><div class="well well-lg" id="retainerTotal" name="retainerTotal">
                    <?php
                    $getHours = new harvest();
                    $totalHours = $getHours->ShowTimeEntries(clientID, yyyymmdd, yyyymmdd);
                    echo $totalHours;
                      ?>
                      </div></dd>
                  <dt>Remaining Time</dt>
    							<dd><div class="well well-lg" id="retainerRemain" name="retainerRemain"><?php echo 10 - $totalHours;?></div></dd>
    						</dl>
    						<button type="submit" class="btn btn-primary" id="retainerBreak" name="retainerBreak">View Breakdown</button>
    					</div>
              <div class="col-sm-4">
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
          <br />
          <?php
          $getActiveTickets = new helpScout();
          $getActiveTickets->GetTicketsByClient(mailboxID, CustomerID);
          ?>
        </div>
        <?php
            }
            add_action('admin_menu', 'ClientPressClient_menu');
