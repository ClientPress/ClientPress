<?php
class helpScout{

  private $credentials = "Token:Password";

    function helpScoutCurl($url){
      $headers = array(
          "Content-type: application/xml",
          "Accept: application/xml",
          "Authorization: Basic " . base64_encode($this->credentials)
      );
      // DO CURL Stuff here
       $ch = curl_init($url); // URL of the call
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_TIMEOUT, 60);
       curl_setopt($ch, CURLOPT_VERBOSE, 1);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       // execute the api call
       $this->result = curl_exec($ch);//Run curl
       return;
    }

    function GetCustomers(){
      $url = "https://api.helpscout.net/v1/customers.json";
      $this->helpScoutCurl($url);
      $json = $this->result;
      $clients = json_decode($json, TRUE);
      foreach ($clients[items] as $client) {
        $clientName = $client[firstName];
        if (strlen($clientName) > 1) {
          echo "$client[id] : $client[firstName] $client[lastName]<br />";
        }
          // {
          // "items": [{
          // "id": 29418,
          // "firstName": "Vernon",
          // "lastName": "Bear",
          // "photoUrl": "http://twitter.com/img/some-avatar.jpg",
          // "photoType": "twitter",
          // "gender": "Male",
          // "age": "30-35",
          // "organization": "Acme, Inc",
          // "jobTitle": "CEO and Co-Founder",
          // "location": "Greater Dallas/FT Worth Area",
          // "createdAt": "2012-07-23T12:34:12Z",
          // "modifiedAt": "2012-07-24T20:18:33Z"
          //   }}
      }
    }

    function GetMailboxes(){
      $url = "https://api.helpscout.net/v1/mailboxes.json";
      $this->helpScoutCurl($url);
      $json = $this->result;
      $mailboxes = json_decode($json, TRUE);
      foreach ($mailboxes[items] as $mailbox) {
        echo "$mailbox[id] : $mailbox[name]";
          // "items": [{
          // "id": 1234,
          // "name": "My Mailbox",
          // "slug": "47204a026903ce6d",
          // "email": "help@mymailbox.com",
          // "createdAt": "2012-07-23T12:34:12Z",
          // "modifiedAt": "2012-07-24T20:18:33Z"
          // },
      }
    }

    function GetTicketsByClient($mailboxID, $customerID){
      $url = "https://api.helpscout.net/v1/mailboxes/$mailboxID/customers/$customerID/conversations.json";
      $this->helpScoutCurl($url);
      $json = $this->result;
      $messages = json_decode($json, TRUE);
      ?>
      <div class="row">
        <div class="col-sm-6">
          <h2>Open Tickets</h2>
          <table class="table table-condensed" id="ticketsOpen" name="ticketsOpen">
            <thead>
              <tr>
                <th>Ticket Number</th>
                <th>Created Date</th>
                <th>Subject</th>
              </tr>
            </thead>
            <tbody id="tickOpenItem" name="tickOpenItem">
              <?php
          foreach ($messages['items'] as $message) {
            $ticketStatus = $message['status'];
              if ($ticketStatus == 'active') {
              ?>
              <tr>
                <td><?php echo $message['number']; ?></td>
                <td><?php echo $message['createdAt']; ?></td>
                <td><?php echo $message['subject']; ?></td>
              </tr>
                  <?php
                }
            }
              ?>
              </tbody>
            </table>
          </div>
          <div class="container-fluid">
          <div class="col-sm-6">
            <h2>Resolved Tickets</h2>
            <table class="table table-condensed" id="ticketsResolved" name="ticketsResolved">
              <thead>
                <tr>
                  <th>Ticket Number</th>
                  <th>Created Date</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody  id="tickResItem" name="tickResItem">
                <?php
            foreach ($messages['items'] as $message) {
              $ticketStatus = $message['status'];
                if ($ticketStatus == 'closed') {
                ?>
                <tr>
                  <td><?php echo $message['number']; ?></td>
                  <td><?php echo $message['createdAt']; ?></td>
                  <td><?php echo $message['subject']; ?></td>
                </tr>
                    <?php
                  }
              }
                ?>
              </tbody>
              <!-- End Placeholder -->
            </table>
          </div>
        </div>
      </div>
            <?php
      // GetTicketsByClient(86221, 96739579)
    }
  }
