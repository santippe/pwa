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
    searchBox.addEventListener('click',()=>{
        let searchTip = document.querySelector('#searchhelp');
        searchTip.style.display = 'block';
    },true);
</script>