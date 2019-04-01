<div id="searchdir">
    <input type="text" id="searchtxt">
    <div id="searchhelp">
        <div>Test 1</div>
        <div>Test 2</div>
        <div>Test 3</div>
    </div>
</div>
<div id="news"></div>
<div id="bottommenu"></div>
<script>
    let searchBox = document.querySelector('#searchtxt');
    searchBox.addEventListener('click', () => {
        let searchTip = document.querySelector('#searchhelp');
        searchTip.style.display = 'block';
    }, true);
    searchBox.addEventListener('blur', () => {
        let searchTip = document.querySelector('#searchhelp');
        searchTip.style.display = 'none';
    }, true);
    //beg for values into searchhelp
    //set events into element obtained
    let selectedValue = document.querySelector('#searchtxt');
    function getSearchTip(){
        let fm1  = new FormData();
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
</script> 