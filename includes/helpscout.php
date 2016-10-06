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
      foreach ($messages[items] as $message) {
        echo "Message id: $message[id] <br />Ticket Number: $message[number]<br />Subject: $message[subject]<br />Created on: $message[createdAt]<br />Status: $message[status]<br />Message Preview: $message[preview]<br /><br /><hr />";
      }
      // GetTicketsByClient(86221, 96739579)
    }
    function GetTicketsByClientActive($mailboxID, $customerID){
      $url = "https://api.helpscout.net/v1/mailboxes/$mailboxID/customers/$customerID/conversations.json";
      $this->helpScoutCurl($url);
      $json = $this->result;
      $messages = json_decode($json, TRUE);
      foreach ($messages[items] as $message) {
        if ($message[status] == 'active') {
          ?>
          <td id="tickOpenItem1" name="tickOpenItem1"><?php echo $message[id];?></td>
          <td id="tickOpenItem2" name="tickOpenItem2"><?php echo $message[createdAt];?></td>
          <td id="tickOpenItem3" name="tickOpenItem3"><?php echo $message[preview];?></td>
          <td id="tickOpenItem4" name="tickOpenItem4"><?php echo $message[status];?></td>
          <?php
        }
      }
      // GetTicketsByClient(86221, 96739579)
    }
  }
  // $mailboxes = new helpScout();
  // $mailboxes->GetCustomers();
