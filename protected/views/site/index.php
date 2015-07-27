<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php echo TbHtml::beginFormTb(); ?>
	<fieldset>
		<legend>Try Yiistrap</legend>
		<?php echo TbHtml::label('Name', 'text'); ?>
		<?php echo TbHtml::textField('text', '', array('placeholder' => 'type something')); ?>
		<?php echo TbHtml::checkBox('checkMe', false, array('label' => 'Check Me')); ?><br>
		<?php echo TbHtml::submitButton('Submit'); ?>
	</fieldset>
<?php echo TbHtml::endForm(); ?>
