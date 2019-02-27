function callMeJo(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","/server");
    let f1 = new FormData();
    f1.append('cmd',"test");
    xhr.onreadystatechange = function(ev){
        if (this.readyState == 4)  
            if (this.status == 200)
                console.log('command one : '+this.responseText);
    };
    xhr.send(f1);
}
function callMeJquery(){        
    $.post('/server',{'cmd':'test'},function(data){
        console.log('command two : '+data);
    });
}
console.log('taaaaac');
//callMeJo();
callMeJquery();