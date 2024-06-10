<?php
$array1 = [[]];
for ($i = 0; $i < 10; $i++) {

    for ($j = 0; $j < 10; $j++) {
        $array1[$i][$j] = $i * $j + 5;
    }
}

$html = file_get_contents('page.html');

$doc = new DOMDocument();

$doc->loadHTML($html);

$world = $doc->documentElement;

$world->append("This is array1 content : ", $doc->createElement("table"));
//get the element you want to append to
$pageBody = $doc->getElementById('body');
//create the fragment
$fragment = $doc->createDocumentFragment();
//add content to fragment
$fragment->appendXML('<div>ARRAY EXTRACTION</div>');
//actually append the element
$pageBody->appendChild($fragment);

//TEST APPEND ARRAY CONTENT

$countTD = 0;
for ($i = 0; $i < count($array1); $i++) {
    $tableRow = $doc->createElement("tr"); //create a table  row
    $tableGET = $doc->getElementsByTagName('table');
    $table = $tableGET->item(0);
    $table->appendChild($tableRow);
    for ($j = 0; $j < count($array1[$i]); $j++) {
        
        $tableData = $doc->createElement('td');

        $fragment = $doc->createDocumentFragment();
        $fragment->appendXML($array1[$i][$j]);

        $tableGET = $doc->getElementsByTagName('tr');
        $table_row = $tableGET->item($i);
        $table_row->appendChild($tableData);

        $tableGET = $doc->getElementsByTagName('td');
        $tdItem = $tableGET->item($countTD);
        $tdItem->appendChild($fragment);
        $countTD++;
    }
}

echo $doc->saveHTML();
