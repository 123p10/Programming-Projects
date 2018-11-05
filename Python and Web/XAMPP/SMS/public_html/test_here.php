<?php
 $app_id = "HyE3Xy7QTC57QjAoH4Yo";
 $app_code = "WQ__fBR_tfbJFtbahqCRAQ";

 $query = "https://geocoder.api.here.com/6.2/geocode.json?app_id=". $app_id . "&app_code=" . $app_code . "&searchtext=365+orano+ave";
#echo $query;
 $json = file_get_contents($query);
 $data = json_decode($json);
 #print_r($data);




 $response = $data->Response->View[0]->Result[0]->Location->DisplayPosition;
 echo "<b>Original Location</b> <br> Longitude " . $response->Longitude . "<br> Latitude " . $response->Latitude;
 function getHeader(){
   $app_id = "HyE3Xy7QTC57QjAoH4Yo";
   $app_code = "WQ__fBR_tfbJFtbahqCRAQ";

   $queryOrig = "https://geocoder.api.here.com/6.2/geocode.json?app_id=". $app_id . "&app_code=" . $app_code . "&searchtext=365+orano+ave+Mississauga";
   $json = file_get_contents($queryOrig);
   $data = json_decode($json);
   $originLatitude = $data->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude;
   $originLongitude = $data->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude;
   $origin = $data->Response->View[0]->Result[0]->Location->Address->Label;

   $queryDest = "https://geocoder.api.here.com/6.2/geocode.json?app_id=". $app_id . "&app_code=" . $app_code . "&searchtext=24+sussex+dr+Ottawa";
   $json = file_get_contents($queryDest);
   $data = json_decode($json);
   $destination = $data->Response->View[0]->Result[0]->Location->Address->Label;
   $destLatitude = $data->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude;
   $destLongitude = $data->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude;

   echo "<br>" . $origin . " to " . $destination;
 }
 function getDirections(){
   $app_id = "HyE3Xy7QTC57QjAoH4Yo";
   $app_code = "WQ__fBR_tfbJFtbahqCRAQ";

   $queryOrig = "https://geocoder.api.here.com/6.2/geocode.json?app_id=". $app_id . "&app_code=" . $app_code . "&searchtext=365+orano+ave+Mississauga";
   $json = file_get_contents($queryOrig);
   $data = json_decode($json);
   $originLatitude = $data->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude;
   $originLongitude = $data->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude;
   $origin = $data->Response->View[0]->Result[0]->Location->Address->Label;

   $queryDest = "https://geocoder.api.here.com/6.2/geocode.json?app_id=". $app_id . "&app_code=" . $app_code . "&searchtext=24+sussex+dr+Ottawa";
   $json = file_get_contents($queryDest);
   $data = json_decode($json);
   $destination = $data->Response->View[0]->Result[0]->Location->Address->Label;
   $destLatitude = $data->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude;
   $destLongitude = $data->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude;

   $query ="https://route.api.here.com/routing/7.2/calculateroute.json?app_id=HyE3Xy7QTC57QjAoH4Yo&app_code=WQ__fBR_tfbJFtbahqCRAQ&waypoint0=geo!{$originLatitude},{$originLongitude}&waypoint1=geo!{$destLatitude},{$destLongitude}&deperature=now&repesentation=turnByTurn&mode=fastest%3Bcar%3Btraffic%3Aenabled";
   $json = file_get_contents($query);
   $data = json_decode($json);

   print_r($data->response->route[0]->leg[0]->maneuver[0]->instruction);
   foreach($data->response->route[0]->leg[0]->maneuver as $i){
     echo $i->instruction . "<br>";
   }
 }

 getDirections();

?>
