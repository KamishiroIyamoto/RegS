document.forms.form.onsubmit = function(e){
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php');
    var formData = new FormData(document.forms.form);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            console.log('So good!');
        }
    }
    xhr.send(formData);
};