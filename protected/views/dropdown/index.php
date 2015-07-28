
<?php
/* @var $this DropdownController */

$this->breadcrumbs=array(
	'Dropdown',
);
$this->pageTitle = Yii::app()->name;
echo CHtml::beginForm();
    echo CHtml::label('Category ', false);
    echo CHtml::dropDownList('category_id', '',
        array(
            0 => 'select category',
            1 => 'Temple',
            2 => 'Natural',
            3 => 'Culture',
            
        ),
        array(
            'ajax' => array(
                'type' => 'GET',
                'url' => $this->createUrl('dropdown/dynamic'),
                'update' => '#tt',
				//'id' => 'c_id',
            )
        )
    );
    //echo CHtml::textField('Text','test',array('id'=>'tt','width'=>1000));
    //echo CHtml::dropDownList('place_id', '', array('' => 'select place'));
echo CHtml::endForm();
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
<div id="test">
	
	
</div>
	<script>
		/* function autoList(c_id){
			
		} */
		$(document).ready(function(){
		$.ajax({
		url: '/wil_webapp/dropdown/dynamic',
		method: "GET",
		dataType: "json",
		data:{
			"category_id": 0
		}
		}).done(function(data){
			$("#test").html(''); 
			$.each(data, function(data, value) {
				
			$('#test').append(value.name);
			$('#test').append('<br>');
			
			
		});
			
			//$('#test').append(data.name);
		//data->name
		//alert(data);
	});
		
});
		/* $("#category_id").click(function() {
		autoList($("#keyword").val());
	}); */
	</script>
