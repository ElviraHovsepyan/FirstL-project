
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});

$('#search').keyup(function () {
    var key =  $('#search').val();
    if(key.length>2){
        key = key.slice(0,2);
        var arr = JSON.parse(localStorage.getItem('searchData'));
        $('.searchHelp').empty();
        for(var i =0; i< arr.length; i++){
           if(arr[i].search(key)==0){
               $('.searchHelp').append('<p class="item" onclick="clickOnP('+i+')">'+arr[i]+'</p>');
               $('.searchHelp').show();
           }
        }
    }
});

function clickOnP(i){
    var arr = JSON.parse(localStorage.getItem('searchData'));
    var key = arr[i];
    searchAjaxRequest(key);
}

$('#searchForm').on('submit',function(e){
    e.preventDefault();
    var key = $('#search').val();
    var arr = JSON.parse(localStorage.getItem('searchData'));
    if(!arr.includes(key)){
        arr.push(key);
    }
    localStorage.setItem('searchData',JSON.stringify(arr));
    searchAjaxRequest(key);
});

function searchAjaxRequest(key) {
    var maxResults = $('#maxResults').val();
    if(key==''){
        $('.searchResults').empty();
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
}

$('body').click(function () {
    $('.searchHelp').hide();
});
