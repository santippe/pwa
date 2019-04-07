async function createElementList(jsonElement,todo){
    let xhr = new XMLHttpRequest();
    xhr.open('POST','/templates/listElement.php');
    xhr.onreadystatechange = (e) => {
        if (xhr.status == 200 && xhr.readyState == 4){
            //father.innerHTML += xhr.responseText;            
            return xhr.responseText;
        }
    };
    let f1 = new FormData();
    for(let key in jsonElement){
        f1.append(key,jsonElement[key]);
    };    
    xhr.send(f1);    
}
export { createElementList };