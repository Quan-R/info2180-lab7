window.onload = function()
{
    var submitbutton = document.querySelector("#lookup");
    
    
    submitbutton.addEventListener("click", function()
    {
        var srchText = document.querySelector("#country").value;
        getInfo(srchText);
        
    }
    , false);
    
    
    function getInfo(s, all) {
        var request = new XMLHttpRequest();
        
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
                document.getElementById("result").innerHTML = this.responseText;
        }
            var querystring = "world.php?country=" + s + "&all=" + all;
            request.open("GET", querystring , true);
            request.send();
        
    };

};