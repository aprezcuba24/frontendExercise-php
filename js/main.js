function openSideBar() {
    document.getElementById("side-menu").className = "open";
    document.getElementById("all-container").className = "open";
    document.getElementById("covermask").className = "open";
}
function closeSideBar() {
    document.getElementById("side-menu").className = "";
    document.getElementById("all-container").className = "";
    document.getElementById("covermask").className = "";
}
function menuToggle(id) {
    console.log(id);
}
function createA(url, text) {
    var element = document.createElement('a');
    element.appendChild(document.createTextNode(text));
    element.setAttribute('href', url);

    return element;
}
window.onload = function () {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var data = JSON.parse(xhttp.responseText);
            for (var i = 0; i < data.items.length; i++) {
                var current = data.items[i];
                var li1 = document.createElement("li");
                if (current.items.length) {
                    li1.className = 'has-submenu';
                }
                var labelCaret = document.createElement('label');
                li1.appendChild(labelCaret);
                labelCaret.className = 'caret';
                labelCaret.setAttribute('for', i + 'checkbox');

                li1.appendChild(createA(current.url, current.label));
                var checkCaret = document.createElement('input');
                li1.appendChild(checkCaret);
                checkCaret.className = 'checkCaret';
                checkCaret.setAttribute('type', 'checkbox');


                checkCaret.setAttribute('id', i + 'checkbox');
                if (current.items.length) {
                    var ul1 = document.createElement('ul');
                    li1.appendChild(ul1);
                    ul1.className = 'sub-menu';
                    for (var j = 0; j < current.items.length; j++) {
                        var item = current.items[j];
                        var li2 = document.createElement('li');
                        ul1.appendChild(li2);
                        li2.appendChild(createA(item.url, item.label));
                    }
                }
                var cloneLi1 = li1.cloneNode(true);
                document.getElementById('top-menu').getElementsByClassName('main_menu')[0].appendChild(li1);
                document.getElementById('side-menu').getElementsByClassName('main_menu')[0].appendChild(cloneLi1);
            }
        }
    };
    xhttp.open("GET", "/resources/data/menu.json", true);
    xhttp.send();
};