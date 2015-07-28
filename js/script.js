$(document).ready(function () {
    $('#search_keyword').autocomplete({
        source: '/wil_webapp/api/listname',
        select: function(event, ui) {
            searchPlace(ui.item.label);
        }
    });

    $('select#type').on('change', function() {
        searchType($(this).val());
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
                $('#main_content').append('<div class="row" id="single_place"><div class="col-md-4"><a href="site/view?id='+value.id+'"><img class="img-responsive img-thumbnail" src="" alt="'+value.name+'"></a></div><div class="col-md-8"><a href="site/view?id='+value.id+'"><label>'+value.name+'</label></a><p>'+value.detail+'</p></div></div>');
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
                $('#main_content').append('<div class="row" id="single_place"><div class="col-md-4"><a href="site/view?id='+value.id+'"><img class="img-responsive img-thumbnail" src="" alt="'+value.name+'"></a></div><div class="col-md-8"><a href="site/view?id='+value.id+'"><label>'+value.name+'</label></a><p>'+value.detail+'</p></div></div>');
            });
        });
    }

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