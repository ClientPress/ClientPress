<?php
class harvest{

  private $credentials = "User:Pass";
  private $baseUrl = "Harvest.";

    function harvestCurl($url){
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

    function GetClients(){
      $url = "https://$this->baseUrl.harvestapp.com/clients";
      $this->harvestCurl($url);
      $clients= new SimpleXMLElement($this->result);
      foreach ($clients->client as $client) {
          // Loop dat XML
          $clientId = $client->id;
          $clientName = $client->name;
          echo "Client ID: $clientId <br />Client Name: $clientName<br  /><br />";
            //      Below is to show you what can be pulled by using the constructor $client->
            //     "client": {
            //     "id": 3398386,
            //     "name": "Your Account",
            //     "active": true,
            //     "currency": "United States Dollar - USD",
            //     "highrise_id": null,
            //     "cache_version": 821859237,
            //     "updated_at": "2015-04-15T16:25:50Z",
            //     "created_at": "2015-04-15T16:25:50Z",
            //     "currency_symbol": "$",
            //     "details": "123 Main St\r\nAnytown, NY 12345",
            //     "default_invoice_timeframe": null,
            //     "last_invoice_kind": null
            // }
      }
    }

    function GetSingleClient($clientID){
      $url = "https://$this->baseUrl.harvestapp.com/clients/$clientID";
      $this->harvestCurl($url);
      $client= new SimpleXMLElement($this->result);
        $clientId = $client->id;
        $clientName = $client->name;
        echo "Client ID: $clientId <br />Client Name: $clientName<br  /><br />";
            //      Below is to show you what can be pulled by using the constructor $client->
            //   "client": {
            //     "id": 3398386,
            //     "name": "Your Account",
            //     "active": true,
            //     "currency": "United States Dollar - USD",
            //     "highrise_id": null,
            //     "cache_version": 821859237,
            //     "updated_at": "2015-04-15T16:25:50Z",
            //     "created_at": "2015-04-15T16:25:50Z",
            //     "currency_symbol": "$",
            //     "details": "123 Main St\r\nAnytown, NY 12345",
            //     "default_invoice_timeframe": null,
            //     "last_invoice_kind": null
            // }
    }

    function ShowProjects(){
      $url = "https://$this->baseUrl.harvestapp.com/projects";
      $this->harvestCurl($url);
      $projects= new SimpleXMLElement($this->result);
      foreach ($projects->project as $project) {
        $projectId = $project->id;
        $projectName = $project->name;
        echo "Project ID: $projectId <br />Project Name: $projectName<br  /><br />";
        //      Below is to show you what can be pulled by using the constructor $project->
        // "project": {
        //     "id": 3554414,
        //     "client_id": 3398386,
        //     "name": "Internal",
        //     "code": "Testing",
        //     "active": true,
        //     "billable": true,
        //     "bill_by": "People",
        //     "hourly_rate": 100,
        //     "budget": 100,
        //     "budget_by": "project",
        //     "notify_when_over_budget": true,
        //     "over_budget_notification_percentage": 80,
        //     "over_budget_notified_at": null,
        //     "show_budget_to_all": true,
        //     "created_at": "2013-04-30T20:28:12Z",
        //     "updated_at": "2015-04-15T16:26:06Z",
        //     "starts_on": "2013-04-30",
        //     "ends_on": "2015-06-01",
        //     "estimate": 100,
        //     "estimate_by": "project",
        //     "hint_earliest_record_at": "2013-04-30",
        //     "hint_latest_record_at": "2014-12-09",
        //     "notes": "Some project notes go here!",
        //     "cost_budget": null,
        //     "cost_budget_include_expenses": false
        // }
      }
    }

    function ShowSingleProject($projectID){
      $url = "https://$this->baseUrl.harvestapp.com/projects/$projectID";
      $this->harvestCurl($url);
      $project= new SimpleXMLElement($this->result);
        $projectId = $project->id;
        $projectName = $project->name;
        echo "Project ID: $projectId <br />Project Name: $projectName<br  /><br />";
        //      Below is to show you what can be pulled by using the constructor $project->
        //     "project": {
        //     "id": 3554414,
        //     "client_id": 3398386,
        //     "name": "Internal",
        //     "code": "Testing",
        //     "active": true,
        //     "billable": true,
        //     "bill_by": "People",
        //     "hourly_rate": 100,
        //     "budget": 100,
        //     "budget_by": "project",
        //     "notify_when_over_budget": true,
        //     "over_budget_notification_percentage": 80,
        //     "over_budget_notified_at": null,
        //     "show_budget_to_all": true,
        //     "created_at": "2013-04-30T20:28:12Z",
        //     "updated_at": "2015-04-15T15:44:17Z",
        //     "starts_on": "2013-04-30",
        //     "ends_on": "2015-06-01",
        //     "estimate": 100,
        //     "estimate_by": "project",
        //     "hint_earliest_record_at": "2013-04-30",
        //     "hint_latest_record_at": "2014-12-09",
        //     "notes": "Some project notes go here!",
        //     "cost_budget": null,
        //     "cost_budget_include_expenses": false
        // } 
    }
    function ShowTimeEntries($projectID, $startDate, $endDate){
      $url = "https://$this->baseUrl.harvestapp.com/projects/$projectID/entries?from=$startDate&to=$endDate";
      $this->harvestCurl($url);
      $timeEntries = new SimpleXMLElement($this->result);
      $totalHours = '0';
      $spent='spent-at';
      foreach ($timeEntries as $entry) {
        $entryID = $entry->id;
        $entryHours = $entry->hours;
        $entryDate = $entry->$spent;
        $entryNote = $entry->notes;
        $floatHours = (float) $entryHours;
        $totalHours += $floatHours;
        echo "$entryHours hours were used on $entryDate The entry id is: $entryID. Here is what was done: $entryNote<br />";
      }
      echo "Totaling: $totalHours hours<br />";
        // "day_entry": {
        //       "id": 367231666,
        //       "notes": "Some notes.",
        //       "spent-at": "2015-07-01",
        //       "hours": 0.16,
        //       "user_id": 508343,
        //       "project_id": 3554414,
        //       "task_id": 2086200,
        //       "created_at": "2015-08-25T14:31:52Z",
        //       "updated_at": "2015-08-25T14:47:02Z",
        //       "adjustment_record": false,
        //       "timer_started_at": "2015-08-25T14:47:02Z",
        //       "is_closed": false,
        //       "is_billed": false,
        //       "hours_with_timer": 0.16
        //}
    }
}

$getClients = new harvest();
$getClients->GetClients();
