/*divSuggBeg = `
<table>
    <tbody>
`;
divSuggEnd = `
    </tbody>
</table>
`;
divSuggBeg = `
<p>
`;
divSuggEnd = `
</p>
`;*/


function DSeacrhAjaxCall() {
       
    var xhttp = new XMLHttpRequest();
    var divSuggBeg ='';
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        response = this.responseText;
        console.log(response);
        var sugg = JSON.parse(response);

        for(var i = 0; i<sugg.length; i++){
            divSuggBeg+="<option value="+sugg[i]+">"+sugg[i]+"</option>";
        }
        //divSuggBeg += divSuggEnd;
        
        document.getElementById('locationList').innerHTML = '';
        document.getElementById('locationList').innerHTML = divSuggBeg;
      }
    };
    xhttp.open("GET", "DynamicSearch/DynamicSearch.php", true);
    xhttp.send();
}