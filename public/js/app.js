var updateButton = $('#update-button');

updateButton.click(function(){
    updateButton.attr('disabled', true);
    updateButton.text('Updating...');

    var onError = function(response){
        alert('Received an unexpected response: ' + response);
    }

    $.get('/update', function(data){
        if(data == 'success'){
            location.reload();   
        }
        else{
            onError(data);
        }
    }).fail(function(xhr, status, error){
        onError(error);
    });
});

$('.repo-link').click(function(){
    var id = $(this).data('repo-id');
    console.log(id);
    $('.repo-details').hide();
    $('.repo-details[data-repo-id=' + id + ']').show();

    return false;
})
//# sourceMappingURL=app.js.map
