<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
echo TbHtml::breadcrumbs(array(
	'Home' => Yii::app()->baseUrl,
	'About',
));
?>
<h1>About</h1>

<p>This is a "static" page. You may change the content of this page
by updating the file <code><?php echo __FILE__; ?></code>.</p>
