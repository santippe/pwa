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
<script>
    let searchBox = document.querySelector('#searchtxt');
    let searchOpen = false;
    searchBox.addEventListener('click',()=>{
        let searchTip = document.querySelector('#searchhelp');
        if (!searchOpen)            
            searchTip.style.display = 'block';
        else 
            searchTip.style.display = 'none';
        searchOpen = !searchOpen; 
    },true);
</script>