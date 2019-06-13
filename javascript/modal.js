

function showModal(i) {

    var str="myModal";
    var str=str.concat(i);
    console.log(str);
    var modal = document.getElementById(str );




    var span = document.getElementsByClassName("close")[0];



    modal.style.display = "block";
    if(span!=null)
        span.onclick = function() {
            modal.style.display = "none";
        }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
