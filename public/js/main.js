var url = 'http://proyecto-laravel.com.devel';
window.addEventListener("load", function () {

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');

    // Boton de like
    function like() {
        $('.btn-like').unbind('click').click(function () {
            console.log('like');
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url+'/img/hearts-red.png');

            var id = $(this).data('id');

            $.ajax({
                url: url+'/like/'+$(this).data('id'),
                type : 'GET',
                success: function(response) {
                    //console.log(response);
                    console.log(response);
                    var numberlikes = response['numberlikes']+' me gusta';
                    $('.number-likes[data-id='+id+']').html(numberlikes);
                }
            });
            dislike();
        })
    }
    like();

    // Boton de dislike
    function dislike() {
        $('.btn-dislike').unbind('click').click(function () {
            console.log('dislike');
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url+'/img/hearts-black.png');

            var id = $(this).data('id');

            $.ajax({
                url: url+'/dislike/'+$(this).data('id'),
                type : 'GET',      
                success: function(response) {
                    //console.log(response);
                    console.log(response);
                    var numberlikes = response['numberlikes']+' me gusta';
                    $('.number-likes[data-id='+id+']').html(numberlikes);
                }
            });
            like();
        })

    }
    dislike();

    // BUSCADOR


    $('#submit-button').click(function(e){
        e.preventDefault()
        $('#search-bar').attr('action', url+'/people/'+$('#search').val());
        $('#search-bar').submit();
    })
})