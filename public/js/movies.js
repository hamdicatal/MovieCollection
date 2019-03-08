// preview uploaded movie poster for create page
function previewPoster(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function () {
        var dataURL = reader.result;
        var output = document.getElementById('img-thumbnail');
        output.src = dataURL;
        console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
};

// cast searching for create page
function searchCast() {
    var input, filter, ul, li, i, txt;
    input = document.getElementById('inputCast');
    filter = input.value.toUpperCase();
    ul = document.getElementById("allCasts");
    li = ul.getElementsByTagName('li');

    for (i = 0; i < li.length; i++) {

        txt = li[i].innerText || li[i].innerText;

        if (txt.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "inline";
        } else {
            li[i].style.display = "none";
        }
    }

    if (input.value.length < 1) {
        for (i = 0; i < li.length; i++) {
            li[i].style.display = "none";

        }
    }
}

var allCasts = document.getElementById("addedCast");
let inputSearchCast = document.getElementById("inputCast");

document.getElementById("allCasts").addEventListener("click", function (e) {
    if (e.target && e.target.matches("li.list-group-item")) {
        console.log("clicked", e.target);

        var cast = '<label><input type="hidden" name="casts[]" value="' + e.target.value + '">' + e.target.innerText + ' <i class="fa fa-times mr-2" aria-hidden="true"></i></label>';
        allCasts.innerHTML += cast;

        e.target.parentElement.removeChild(e.target);
    }
});

document.getElementById("addedCast").addEventListener("click", function (e) {
    if (e.target && e.target.matches("i.fa")) {
        const castId = e.target.parentElement.children[0].value;
        const castName = e.target.parentElement.innerText;
        const deletedCast = '<li class="list-group-item" value="'+castId+'">'+castName+'</li>';

        document.getElementById("allCasts").innerHTML += deletedCast;

        e.target.parentElement.parentElement.removeChild(e.target.parentElement);
    }
});

