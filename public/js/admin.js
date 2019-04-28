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