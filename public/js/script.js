
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});

$('#searchForm').on('submit',function(e){
    e.preventDefault();

    var key = $('#search').val();
    var maxResults = $('#maxResults').val();
    if(key==''){
        $('.searchResults').empty();
        // $('.showResults').hide();
    } else {
        $.ajax({
            url: '/search',
            type: 'post',
            data: {key:key,maxResults:maxResults}
        }).done(function (response) {
            if(response != ''){
                var videos = JSON.parse(response);

                $('.searchResults').empty();
                videos = videos['items'];

                for(var x = 0; x<videos.length; x++){
                    $('.searchResults').append('<iframe allowfullscreen width="450" height="315"\n' +
                        'src="https://www.youtube.com/embed/'+videos[x]['id']['videoId']+'">\n' +
                        '</iframe>');
                }
            }
        });
    }
});
