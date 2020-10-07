<?php
/**
 * Ouvre un fichier JSON et retourne un tableau
 */
function jsonFileToArray(string $filename){
	$str=file_get_contents($filename);
	return json_decode($str,true);
}
/**
 * Affiche le tableau de données $values
 */
function arrayDump(array $values,?string $title=null):void{
	if($title!=null){
		echo "\n$title\n";
		echo "-----------------------\n";
	}
	foreach($values as $element){
		foreach($element as $name=>$value){
				echo "$name : $value\t";
		}
		echo "\n";
	}
}
/**
 * Ouvre un fichier JSON et retourne un tableau
 * Affiche le tableau de données $values
 */
function loadAndDump(string $filename):array{
	$values=jsonFileToArray($filename);
	arrayDump($values,basename($filename));
	return $values;
}

function getEmployeesByService(array $employees,string $service):array{
	return array_filter($employees,function($emp)use($service) {
		return $emp['service']==$service;}
	);
}


/**
 * Retourne un tableau filtré d'élément satisfaisant une condition $key=$value
 * @param array $array Tableau à filtrer
 * @param string $key Nom du champ sur lequel une condition est posé
 * @param mixed $value Valeur de recherche
 * @return array
 */
function where(array $array, string $key, $value):array{
    $result=[];
    foreach ($array as $element){
        if($element[$key]===$value){
            $result[]=$element;
        }
    }
    return $result;
}

/**
 * Retourne une version du tableau $array dans laquelles seules les champs $selectfields sont conservés
 * @param array $array Tableau initial
 * @param array $selectFields Liste des champs séléctionnés
 * @return array
 */
function select(array $array, array $selectFields):array{
    $result=[];
    foreach ($array as $index=>$element){
    $result[$index]=[];
    foreach ($selectFields as $fieldkey){
        $result[$index][$fieldkey]=$element[$fieldkey];
        }
    }
    return $result;
}

function selectWhere(array $array, array $selectFields):array{
    return select(where($array, $where[0], $where[1]), $selectFields);
}









