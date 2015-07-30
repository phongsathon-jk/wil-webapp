$(document).ready(function () {
    $('#search_keyword').autocomplete({
        source: '/wil_webapp/api/listname',
        select: function(event, ui) {
            searchPlace(ui.item.label);
        }
    });

    $('select#type').on('change', function() {
        searchType($(this).val());
<<<<<<< HEAD
		//sendData($(this).val());
=======
>>>>>>> 3037c8776878ac1bc407b16325671ff4b64822b1
    });

    $('button#new_comment').click(function() {
        var place_id = $('input#place_id').val();
        var new_comment = $('textarea#new_comment').val();
        addComment(place_id, new_comment);
    });

    function searchPlace(key) {
        $.ajax({
            url: '/wil_webapp/api/search',
            type: 'GET',
            data: { keyword: key },
            dataType: 'json'
        }).done(function(data) {
            $('#main_content').empty();
            $.each(data, function(key, value) {
                $('#main_content').append('<div class="row" id="single_place"><div class="col-md-4"><a href="site/view?id='+value.id+'"><img class="img-responsive img-thumbnail" src="'+value.pic+'" alt="'+value.name+'"></a></div><div class="col-md-8"><a href="site/view?id='+value.id+'"><label>'+value.name+'</label></a><p>'+value.detail+'</p></div></div>');
            });
        });
    }

    function searchType(key) {
        $.ajax({
            url: '/wil_webapp/api/type',
            type: 'GET',
            data: { type: key },
            dataType: 'json'
        }).done(function(data) {
            $('#main_content').empty();
            $.each(data, function(key, value) {
<<<<<<< HEAD
				
=======
>>>>>>> 3037c8776878ac1bc407b16325671ff4b64822b1
                $('#main_content').append('<div class="row" id="single_place"><div class="col-md-4"><a href="site/view?id='+value.id+'"><img class="img-responsive img-thumbnail" src="'+value.pic+'" alt="'+value.name+'"></a></div><div class="col-md-8"><a href="site/view?id='+value.id+'"><label>'+value.name+'</label></a><p>'+value.detail+'</p></div></div>');
            });
        });
    }
<<<<<<< HEAD
	function sendData(type){
		//var type_p=$('select#type').val();  /wil_webapp/protected/controllers /wil_webapp/js/test.php
		$.post("/wil_webapp/protected/controllers/ApiController.php",{
			p_type: type
		}).done(function(data) {
			alert(type);
			//alert(data);
			});
	}
=======

>>>>>>> 3037c8776878ac1bc407b16325671ff4b64822b1
    function addComment(place_id, comment) {
        $.ajax({
            url: '/wil_webapp/api/comment',
            type: 'POST',
            data: { place_id: place_id, comment: comment },
            dataType: 'json'
        }).done(function(data) {
            $('#comment_list').append('<li class="list-group-item">'+data.comment_text+'</li>');
            $('textarea#new_comment').val("");
        });
    }
});