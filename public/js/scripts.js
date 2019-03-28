function compareCss(element, css, value) {
    var b = false;
    $(element).each(function () {
        if (b) return;
        b = $(this).css(css) === value;
    });
    return b;
}

function select(button) {
    console.log(button);
    if (!$(button).hasClass("selected")) {
        //$(".button").removeClass("selected");
        $(button).addClass("selected");
    }
    else {
        deselect(button);
    }

    checkRequired();
}

function select(button, oldButton) {
    console.log(button);
    var b = $(button).hasClass("selected");
    deselect(oldButton);

    if (b) {
        deselect(button);
    } else {
        $(button).addClass("selected");
    }
    checkRequired();
}

$("input[type='time']").keydown(function () {
    checkRequired();
});

function checkRequired() {
    // Equipment
    var equipment = false;
    $(".buttons>.button").each(function () {
        if ($(this).hasClass("selected")) {
            equipment = true;
        }
    });

    // Time
    var date = false;
    $(".date>.button").each(function () {
        if ($(this).hasClass("selected")) {
            date = true;
        }
    });

    var radioFiller = $(".radio").hasClass("selected");

    var minTime = parseTime("8:00");
    var maxTime = parseTime("16:00");
    var fromTime = parseTime($(".from input[type='time']").val());
    var toTime = parseTime($(".to input[type='time']").val());

    var validFromTime = (fromTime >= minTime && fromTime <= maxTime);
    var validToTime = (toTime >= minTime && toTime <= maxTime);

    var inverseTime = toTime - fromTime < 0;

    $(".submit-button").removeClass("enabled");
    $(".submit-button").attr("href", null);
    if (inverseTime) {
        $(".error-message").text("Du kan inte boka en negativ mängd tid");
    }
    else if (!validFromTime) {
        $(".error-message").text("'Från klockan' måste vara mellan 8:00 och 16:00");
    }
    else if (!validToTime) {
        $(".error-message").text("'Till klockan' måste vara mellan 8:00 och 16:00");
    }
    else if (!date) {
        $(".error-message").text("Du måste välja en dag att boka på");
    }
    else if (!equipment) {
        $(".error-message").text("Du måste välja utrustning");
    }
    else if (!radioFiller) {
        $(".error-message").text("Du måste bekräfta våra villkor");
    }
    else {
        $(".submit-button").addClass("enabled");
        $(".submit-button").attr("href", "#submit");
    }
}

function parseTime(timestamp) {
    return (timestamp.split(":")[0] * 60) + parseInt(timestamp.split(":")[1]);
}

function deselect(button) {
    console.log(button);
    $(button).removeClass("selected");
}

function submitData() {
    var json = {};

    //json.author = $(".user-name").text();
    //console.log($(".equipment .button.selected span").text());
    json['_token'] = $('input[name^=_token]')[0].value;
    //var token = $('input[name^=_token]')[0].value;
    json.equipment = $(".equipment .button.selected span")[0].getAttribute('value');
    json.date = $(".date .button.selected span").data().value.toString();
    json.start = $(".from input").val();
    json.end = $(".to input").val();


    console.log(json);

    json = jsonToRequestString(json);

    console.log(json);
    post("/", json);
}

function jsonToRequestString(json) {
    var out = "";
    Object.keys(json).forEach(function(k){
        out += k + '=' + json[k] + "&";
    });

    return out;
}

function post(url, json) {
    var http = new XMLHttpRequest();
    http.open('POST', url, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function () {//Call a function when the state changes.
        if (this.readyState === 4) {
            if (this.status === 200) {
                window.location.replace(this.responseText);
            } else {
                window.location.replace("/error.php?code=" + this.status);
            }
        }
    };
    http.send(json);
}
