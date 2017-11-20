<?php
require_once('src/Teamdatalog.php');
$tdl = new Teamdatalog("api.access","","http://localhost:9001");

$calendars = $tdl->list_calendars();
//print_r($calendars);
if(sizeof($calendars) == 11) echo "list_calendars OK\n"; else echo "list_calendars NOK\n";

$events_type = $tdl->list_event_types();
//print_r($events_type);
if(sizeof($events_type) == 8) echo "list_event_types OK\n"; else echo "list_event_types NOK\n";


$date = new DateTime();
if(!empty($tdl->get_events_from($date,"arti_performative,arti_visive,letteratura_e_cinema,atelier,socio_ricreativo,musica,5279248d160000160096c184","592bf008630000630070891a"))) echo "get_events_from OK\n"; else echo "get_events_from NOK\n";

?>