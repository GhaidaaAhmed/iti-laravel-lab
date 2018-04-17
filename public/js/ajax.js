$(document).ready(function(){
    $(document).on('click', '.viewPost', function () {
        post_id = $(this).val();
        $.ajax({
            url: 'posts/' + post_id ,
            type: 'get',
            success: function (response) {
            //var data = JSON.parse(response);
            console.log(response);

             $('#post_title').html(response.post.title);
             $('#post_desc').html(response.post.description);
             $('#user_name').html(response.post.user.name);
             $('#user_mail').html(response.post.user.email);
             $('#user_date').html(response.post.user.created_at);
            }
        });

});
})