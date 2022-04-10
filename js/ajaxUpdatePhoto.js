$('.form-group .photoUpload').on('change',function(){

    var formData=new FormData();
    formData.append('file',$(this).prop("files")[0]);
    formData.append('id',$(this).data('photo'));
    let photoId=$(this).data('photo');
    $.ajax({
        url:"ajaxPhotoUpload.php",
        data:formData,
        type:"post",
        cache: false,
        contentType: false,
        processData: false, 
        dataType:'json',
        success:function(data)
        {
            if(data['hasError'])
            {
                for (let index = 0; index < data['errors'].length; index++) {

                    $('.photo-error[data-photo="'+photoId+'"').html(data['errors'][index]);               
                 }
            }
            else{
                $('.photo-succ[data-photo="'+photoId+'"').html(data['errors'][0]);               

            }
          
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
   });

   
});