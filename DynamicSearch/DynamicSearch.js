divSuggBeg = `
<table>
    <tbody>
`;
divSuggEnd = `
    </tbody>
</table>
`;


function DSeacrhAjaxCall(query) {
       
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        response = this.responseText;
        console.log(response);
        var sugg = JSON.parse(response);

        sugg.forEach(function(element){
            divSuggBeg+=`<tr><td>`+ element +`</td></tr>`;
        });
        divSuggBeg += divSuggEnd;
        
        document.getElementById('searchSugg').innerHTML = '';
        document.getElementById('searchSugg').innerHTML = divSuggBeg;
      }
    };
    xhttp.open("GET", "DynamicSearch/DynamicSearch.php?query="+query, true);
    xhttp.send();
}

function dSearch(){
    var query = document.getElementById('inpText').value;
    console.log(query);
    DSeacrhAjaxCall(query);
}