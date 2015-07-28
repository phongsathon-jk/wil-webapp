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
});