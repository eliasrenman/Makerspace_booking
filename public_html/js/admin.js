if (!$(".radio").hasClass("selected")) {
    $("#remember").prop('checked', false);
}
if (allFieldsFilled()) {
    $(".submit-button").addClass("enabled");
}

function select(button) {
    console.log(button);

    if (!$(button).hasClass("selected")) {
        $(".button").removeClass("selected");
        $(button).addClass("selected");
        $("#remember").prop('checked', true);
    } else {
        deselect(button);
    }
}

function deselect(button) {
    $("#remember").prop('checked', false);
    $(button).removeClass("selected");

}

function changeSubmitButton() {
    if (allFieldsFilled()) {
        $(".submit-button").addClass("enabled");
    } else {
        if ($(".submit-button").hasClass("enabled")) {

            $(".submit-button").removeClass("enabled");
        }
    }
}

function submitForm() {
    if ($(".submit-button").hasClass('enabled')) {
        $("#login-form").submit();
    }
}


function allFieldsFilled() {

    var fieldCount = 0;

    fields.forEach(function (element) {
        if ($(element).val() !== "") {
            fieldCount++;
        }
    });
    return fieldCount === fields.length;
}

function deleteAdmin(id) {
    var bool = confirm('Är du säker på att du vill ta bort denna användare');
    if (bool) {
        document.location.replace('/admin/user/' + id + '/delete');
    }
}

function expandContent(id) {
    var div = $(id);
    if (div.css("max-height") === "2000px") {
        div.css("max-height", "");
    } else {
        div.css('max-height', "2000px");
    }
}