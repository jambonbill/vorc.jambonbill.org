<?php

//echo "<pre>";print_r($r);echo "</pre>";


$markdown=$VORC->toMarkdown($r['contents']);
$Parsedown = new Parsedown();
$HTML=$Parsedown->text($markdown);

$htm='';
$htm.='<div class="col-sm-12">'.$HTML.'</div>';

$htm.='<i class="text-muted">Last updated: '.$r['w_updated'].' by '.$r['w_updater'].'</i>';

$htm.='<li><i class="text-muted">Tags: '.$r['flag_platform'].' - '.$r['flag_category'].'</i>';



$box=new LTE\Box;
$box->id("boxContent");
$box->title($r['w_name']);
$box->small("#".$r['w_id']." [".$r['w_slug']."]");
$box->body($htm);

$btns='<div class=row>';
$btns.='<div class=col-sm-4>';
$btns.='<a href=#btn class="btn btn-primary" id=btnEdit><i class="fa fa-edit"></i> Edit</a>';
$btns.='</div>';
$btns.='</div>';

$box->footer($btns);

$box->loading(1);
echo $box;
