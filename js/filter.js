
    //  Project made by Alkado Heneliko
    //  GitHub @alkado1
    //  Twitter @alkadoHs

    //  Contact: alkadosichone@gmail.com
    


function filterTable() {
    var input,filter,table,tr,td,i,textValue;

    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();

    table = document.getElementById('myTable');
    tr = document.getElementsByTagName('tr');

    for(i=0; i<tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[1];
        if (td) {
            textValue = td.textContent;
            if(textValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            }else {
                tr[i].style.display = "none";
            }
        }
    }
}