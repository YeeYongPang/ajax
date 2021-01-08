<h2>JSON Example</h2>

<script>

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        var myObj = JSON.parse(this.responseText);
        var myData = '';
        for(var i = 0; i < 5; i++){
            myData += '<tr>';
            myData += '<td>'+(i+1)+'</td>';
            myData += '<td>'+myObj[i].isbn+'</td>';
            myData += '<td>'+myObj[i].author+'</td>';
            myData += '<td>'+myObj[i].title+'</td>';
            myData += '<td>'+myObj[i].price+'</td>';
            myData += '</tr>';
        }
        var tableHeader = '<tr><th>No.</th><th>ISBN</th><th>Author</th><th>Title</th><th>Price</th></tr>';
        document.getElementById('info').innerHTML = tableHeader + myData;
    }
};
xmlhttp.open('GET', 'https://raw.githubusercontent.com/YeeYongPang/ajax/master/catalogs.json', true);
xmlhttp.send();

</script>
<table border='1' id='info'>