<?php
//URL's
$URLS=$VORC->wikiUrls($ID);
//print_r($URLS);
$htm='<table class="table table-sm table-hover" style="cursor:pointer">';
$htm.='<thead>';
//$htm.='<th>#</th>';
$htm.='<th>URL</th>';
//$htm.='<th style="text-align:right"></th>';
$htm.='</thead>';
$htm.='<tbody>';
foreach($URLS as $r){
	$htm.='<tr data-id='.$r['wu_id'].' data-url="'.$r['wu_url'].'" title="'.$r['wu_description'].'">';
	//$htm.='<td><i class="text-muted">'.$r['wu_id'];
	$htm.='<td>';
	if($r['wu_description'])$htm.=$r['wu_description'];
	else $htm.=$r['wu_url'];
	//$htm.='<td>'.$r['wu_url'];
	$htm.=' <a href='.$r['wu_url'].'><i class="fa fa-external-link"></i></a>';
	//$htm.='<td><i class="fa fa-times"></i>';//Delete
	//$htm.='<td style="text-align:right">'.$r['wu_updated'];
}
$htm.='</tbody>';
$htm.='</table>';

if(!count($URLS)){
	$htm='<pre>no data</pre>';
}

$box=new LTE\Box;
$box->id("boxUrl");
$box->title("Related Url's");
$box->icon("fa fa-list");
$box->body($htm);
$box->footer('<a href=#btn id=btnAddUrl class="btn btn-secondary"><i class="fa fa-plus-circle"></i> Add url</a>');
$box->loading(1);
$box->collapsable(1);
echo $box;
