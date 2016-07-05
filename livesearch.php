<?php

$xmlDoc=new DOMDocument();
$xmlDoc->load("http://localhost/AgroClinic/xmlgenarate.php");

$x=$xmlDoc->getElementsByTagName('information');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
    $hint="";
    for($i=0; $i<($x->length); $i++) {
        $y=$x->item($i)->getElementsByTagName('tags');
        $z=$x->item($i)->getElementsByTagName('info_id');
        if (($y->item(0)->nodeType==1)) {
            //find a link matching the search text
            if ((stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))) {

                if ($hint=="") {

                    $hint="<a href="."searchdetails.php?id=".$z->item(0)->childNodes->item(0)->nodeValue." target='_blank' style='color:#428bca;text-decoration:none;'>" .
                        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";

                } else {

                      $hint=$hint. "<br /><a href="."searchdetails.php?id=".$z->item(0)->childNodes->item(0)->nodeValue." target='_blank' style='color:#428bca;text-decoration:none;'>" .
                        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";

                }
            }
        }
    }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
    $response="no suggestion";
} else {
    $response=$hint;
}

//output the response
echo $response;
?> 