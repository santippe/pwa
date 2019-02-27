function authMe(){
    let fm1  = new FormData();
    fm1.append("cmd","userauth");
    fm1.append("user",document.querySelector("input[name=user]").value);
    fm1.append("pwd",document.querySelector("input[name=pwd]").value);
    fm1.append("HTTP_X_REQUESTED_WITH",'XMLHttpRequest');
    let xhr =  new XMLHttpRequest();
    xhr.open("POST","/server");
    xhr.onreadystatechange=function(ev){        
        if (xhr.readyState == 4)
            if (xhr.status == 200){
                console.log(xhr.responseText);
                location.assign('/');
            } else {
                console.log(xhr.status);
            }
    };
    xhr.send(fm1);
}