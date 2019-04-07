//lets make a list
import { createElementList } from '/js/callTemp.js';
let father = document.querySelector('#news');

function createElementList2(jsonElement){
    let elementEnriched = `<div class="card" oncontextmenu="return false;"><div class="cardbckg" style="background-image: url('/newsimage/')"></div><table><tr><td>${jsonElement.idsend}</td></tr></table></div>`;
    father.innerHTML += elementEnriched;         
}
//call the template
for(let a=0;a<10;a++){
    let elemToSend = { idsend : Math.floor(Math.random()*1000)};
    father.innerHTML += createElementList(elemToSend);
}