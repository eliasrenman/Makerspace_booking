$(function () {
    createModals();

    setInterval(function () {
        $(".jsmodal-backdrop").each(function () {
            if ($(this).css("filter") === "opacity(0)") {
                $(this).hide();
            }
        });

    }, 200);
});

function openModal(modal) {
    closeModal(".jsmodal");

    $(modal).parent(".jsmodal-backdrop").show();
    $(modal).parent(".jsmodal-backdrop").css("filter", "opacity(1)");
}

function openParentModal(child) {
    closeModal(".jsmodal");

    $(modal).parent(".jsmodal-backdrop").show();
    $(modal).parent(".jsmodal-backdrop").css("filter", "opacity(1)");
}

function closeModal(modal) {
    $(modal).parents(".jsmodal-backdrop").css("filter", "opacity(0)");
}

function closeParentModal(child) {
    $(child).parents(".jsmodal-backdrop").css("filter", "opacity(0)");
}

function createModals() {
    $(".jsmodal").wrap("<div onclick='backdropClick(this)' class='jsmodal-backdrop'></div>");
    $(".jsmodal-backdrop").css("filter", "opacity(0)");
}
var mouseX;
var mouseY;

$(document).on("mousemove", function(event) {
    mouseX = event.pageX;
    mouseY = event.pageY;
});

function backdropClick(backdrop) {
    var modal = $(backdrop).children(".jsmodal");
    if (mouseX >= modal.position().left && mouseX <= modal.position().left + modal.width()) {
        if (mouseY >= modal.position().top + $(window).scrollTop() && mouseY <= modal.position().top + $(window).scrollTop() + modal.height()) {
            return;
        }
    }
    closeModal(modal);
}
