const button = document.getElementById("button")
const textarea = document.getElementsByClassName("text")

button.onclick = function(){
    for (var i=0; i<2; i++) {
            button.style = ""
            var formData = new FormData();
            formData.set("upload", "TRUE");
            formData.set("text", textarea[i].value);
            formData.set("rate", i);

            var request = new XMLHttpRequest();
            request.open('POST', 'php/post.php', true);
            request.send(formData);
            request.onreadystatechange = function()
            {
                if (request.readyState === 4) {
                    if(request.responseText == "ok") {
                        button.style = "animation-duration:2s;animation-name:correct;animation-iteration-count:1;animation-direction:alternate";
                        textarea[i].value = "";
                    }
                    else {
                        button.style = "animation-duration:2s;animation-name:incorrect;animation-iteration-count:1;animation-direction:alternate";
                    }
                }
            }
    }
}