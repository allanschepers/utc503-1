<?php
require_once("include/datas.inc.php");
const DATA_LOCATION='datas/';
echo "----------------------Gestion des Licences logicielles--------------------------\n";
echo "----------------------AS--------------------------\n";




$employees=loadAndDump(DATA_LOCATION."employees.json");
$services=loadAndDump(DATA_LOCATION."services.json");
$softs=loadAndDump(DATA_LOCATION."softs.json");
$licenses=loadAndDump(DATA_LOCATION."licenses.json");


arrayDump(getEmployeesByService($employees,'compta'),'Liste des employÃ©s de la compta');


//Test Where
arrayDump(where($employees,"service","dsi"),'Liste DSI');

//Test Select
arrayDump(select($licenses,["name","count"]),'Nombre de licences');

//Test 
arrayDump(SelectWhere($licenses, ['name'], ['count',0]),'Softs avec 0 licences');