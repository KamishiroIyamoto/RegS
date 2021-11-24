$(document).ready( function() { 
    $('#form').load('../core/includes/admin.php'); 
}); 
document.forms.form.onsubmit = function(e){
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    var formData = new FormData(document.forms.form);
    xhr.open('POST','../core//includes/updateDB.php');
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