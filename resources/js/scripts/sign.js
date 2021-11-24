document.forms.form.onsubmit = function(e){
    e.preventDefault();
    document.getElementById('password').value = encryptPassword(document.getElementById('password').value);
    var xhr = new XMLHttpRequest();
    var formData = new FormData(document.forms.form);
    xhr.open('POST','../core//includes/sign.php');
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            console.log('So good!');
        }
        else{
            console.log('Произошла ошибка');
        }
    }
    xhr.send(formData);
};