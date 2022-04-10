let form=document.getElementById('subscribeForm');
form.addEventListener('submit',function(e){
    e.preventDefault();
    let email=document.getElementById('subscribeForm').email.value;
    $.ajax({
        url:'subscribe.php',
        method:'POST',
        data:{"email":email},
        success:function(data)
        {
            alert(data);
            document.getElementById('subscribeForm').email.value='';
        }
    });
})