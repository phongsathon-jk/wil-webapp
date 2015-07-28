$(document).ready(function () {
    $('#search_keyword').autocomplete({
        source: '/wil_webapp/api/listname',
        select: function(event, ui) {
            console.log(ui.item.label);
            searchProduct(ui.item.label);
        }
    });

    function searchProduct(key) {
        $.ajax({
            url: '/wil_webapp/api/search',
            type: 'GET',
            data: { keyword: key },
            dataType: 'json'
        }).done(function(data) {
            $.each(data, function(key, value) {
                $('#main_content')
                    .empty()
                    .append('<div class="row" id="single_place"><div class="col-md-4"><a href="site/view?id='+value.id+'"><img class="img-responsive img-thumbnail" src="'+value.pic+'" alt="'+value.name+'"></a></div><div class="col-md-8"><a href="site/view?id='+value.id+'"><label>'+value.name+'</label></a><p>'+value.detail+'</p></div></div>');
            });
        });
    }
});