document.forms.form.onsubmit = function(e){
    e.preventDefault();
    var str = document.getElementById('email').value;
    var res = str.match(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/);
    if(res.length != 0){
        document.getElementById('password').value = encryptPassword(document.getElementById('password').value);
        var xhr = new XMLHttpRequest();
        var formData = new FormData(document.forms.form);
        xhr.open('POST','../core//includes/sign.php');
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
                console.log('So good!');
            }
            else{
                console.log('Error!');
            }
        }
        xhr.send(formData);
    }
    else{
        console.log('Bad email!');
    }
};
