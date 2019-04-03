<div id="searchdir">
    <input type="text" id="searchtxt">
    <div id="searchhelp">
        <a href="/">Test 1</a>
        <a>Test 2</a>
        <a>Test 3</a>
    </div>
</div>
<div id="news"></div>
<div id="bottommenu"></div>
<div class="boticons" style="right:10pt"></div>
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
<script>
    let deferredPrompt;
    window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent Chrome 67 and earlier from automatically showing the prompt
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        alert('fire!');
    });
</script>
