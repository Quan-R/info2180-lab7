window.onload = function()
{
    var countrybtn = document.querySelector("#lookup");
    var citiesbtn = document.querySelector("#cities");
    
    countrybtn.addEventListener("click", function()
    {
        var srchText = document.querySelector("#country").value;
        getInfo(srchText);
        
    }
    , false);
    citiesbtn.addEventListener("click", function()
    {
        var srchText = document.querySelector("#country").value;
        getInfo(srchText);
        
    }
    , false);
    
    
    function getInfo(s) {
        var request = new XMLHttpRequest();
        
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
                document.getElementById("result").innerHTML = this.responseText;
        }
            var querystring = "world.php?country=" + s;
            var querystring2 = " world.php?country=&context=cities" + s;
            request.open("GET", querystring , true);
            request.open("GET", querystring2 , true);
            request.send();
        
    };

};