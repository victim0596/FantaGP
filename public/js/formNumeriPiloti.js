

function changeNumeri() {
    for (var i = 3; i < 7; i++) {
        var inputPiloti = document.querySelectorAll(`form div.form-group.position-relative:nth-child(${i}) input[list='list_driver']`);
        inputPiloti.forEach(element => {  
            element.addEventListener('input', () => {
                var parentNode = element.parentNode;
                var imgNumeroPiloti = parentNode.childNodes[5];
                if(element.value) imgNumeroPiloti.setAttribute("src", `./img/numeriPiloti/${element.value}.png`);
                else imgNumeroPiloti.setAttribute("src", "");
            })
        })
    }
}

changeNumeri();