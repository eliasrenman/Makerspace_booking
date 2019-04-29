setSelected();
function select(button) {
    console.log(button);

    if (!$(button).hasClass("selected")) {
        $(button).addClass("selected");
        setSelected();
    } else {
        deselect(button);
    }

}

function deselect(button) {
    $(button).removeClass("selected");
    setSelected();
}

function setSelected() {
    let selected = [];
    $(".equipment .button.selected span").each(function (index, element) {
        selected[index] = (element.getAttribute('value'));
    });

    $("#equipment").val(JSON.stringify(selected));
    console.log($("#equipment").val());
}

function submitForm() {

    $("#form").submit();

}