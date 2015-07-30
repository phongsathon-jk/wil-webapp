$(document).ready(function () {
    $('#search_keyword').autocomplete({             // auto-complete places' name as typing
        source: function(request, response) {
            $.ajax({
                url: 'api/listname',                // call api
                type: 'GET',
                data: {
                    type: $('select#type').val(),   // send a selected type
                    term: request.term              // send search term parameter
                },
                dataType: 'json',
                success: function (data) {
                    response(data);                 // get data when retrieved
                }
            });
        },
        select: function(event, ui) {               // select the auto-complete results
            searchPlace(ui.item.label);             // make it display the selected result
        }
    });

    $('select#type').on('change', function() {      // watch <select>'s value
        searchType($(this).val());                  // search the selected type's places
    });

    $('button#new_comment').click(function() {              // add comment button
        var place_id = $('input#place_id').val();           // get place id
        var new_comment = $('textarea#new_comment').val();  // get text
        addComment(place_id, new_comment);                  // add a new comment
    });

    function searchPlace(key) {                     // search for places from term/keyword
        $.ajax({
            url: '/wil_webapp/api/search',          // call api
            type: 'GET',
            data: { keyword: key },                 // send search term parameter
            dataType: 'json'
        }).done(function(data) {                    // action after retrieved data
            $('#main_content').empty();             // clear the result section
            $.each(data, function(key, value) {     // loop through the result and display each place
                $('#main_content').append('<div class="row" id="single_place"><div class="col-md-4"><a href="site/view?id='+value.id+'"><img class="img-responsive img-thumbnail" src="'+value.pic+'" alt="'+value.name+'"></a></div><div class="col-md-8"><a href="site/view?id='+value.id+'"><label>'+value.name+'</label></a><p>'+value.detail+'</p></div></div>');
            });
        });
    }

    function searchType(key) {                      // search for places with type
        $.ajax({
            url: '/wil_webapp/api/type',            // call api
            type: 'GET',
            data: { type: key },                    // send type parameter
            dataType: 'json'
        }).done(function(data) {                    // action after retrieved data
            $('#main_content').empty();             // clear the result section
            $.each(data, function(key, value) {     // loop through the result and display each place
                $('#main_content').append('<div class="row" id="single_place"><div class="col-md-4"><a href="site/view?id='+value.id+'"><img class="img-responsive img-thumbnail" src="'+value.pic+'" alt="'+value.name+'"></a></div><div class="col-md-8"><a href="site/view?id='+value.id+'"><label>'+value.name+'</label></a><p>'+value.detail+'</p></div></div>');
            });
        });
    }

    function addComment(place_id, comment) {                    // add place's comments
        $.ajax({
            url: '/wil_webapp/api/comment',                     // post to api
            type: 'POST',
            data: { place_id: place_id, comment: comment },     // send parameters: place id, comment
            dataType: 'json'
        }).done(function(data) {                                // action after post a comment
            $('#comment_list').append('<li class="list-group-item">'+data.comment_text+'</li>');    // add new comment to the list
            $('textarea#new_comment').val("");                  // clear comment box
        });
    }
});