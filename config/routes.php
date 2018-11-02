<?php
return array(
'admin' => 'admin/index',
'create' => 'site/create',
'editOne/([0-9]+)' => 'admin/editOne/$1',
'index/page-([0-9]+)' => 'site/index/$1',
'index' => 'site/index',
'sortName/([0-9]+)/page-([0-9]+)' => 'site/sortName/$1/$2',
//'sortName/([0-9]+)' => 'site/sortName/$1',
'sortEmail/([0-9]+)/page-([0-9]+)' => 'site/sortEmail/$1/$2',
//'sortEmail/([0-9]+)' => 'site/sortEmail/$1',
'sortStatus/([0-9]+)/page-([0-9]+)' => 'site/sortStatus/$1/$2',
//'sortStatus/([0-9]+)' => 'site/sortStatus/$1',
'' => 'site/log',
	);
?>