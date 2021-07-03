$(document).ready(function(){
    $('form#tagForm').submit(function(e){
        e.preventDefault();
        let name = $('#tagForm input[name=name]').val();
        
        $.ajax({
            url : 'admin/tag-create',
            method: 'POST',
            processData: false,
            contentType: false,
            data : new FormData(this),
            success : function(data){
                alert(data);
            }
        });
    });
});