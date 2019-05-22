var equipment_selected = 0;

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
        $(".button").removeClass("selected");
        $(button).addClass("selected");
    } else {
        deselect(button);
    }

    checkRequired();
}

function select(button, oldButton) {
    //console.log(button);


    var b = $(button).hasClass("selected");

    //checks if the button is a equipment button
    if ($(button).hasClass("btn-equipment")) {
        //equipment button limit is at 2 and this stops it from
        // selecting more than two buttons.
        if (equipment_selected < 2) {
            if (!b) {
                equipment_selected++;
            } else {
                equipment_selected--;
            }
        } else if (equipment_selected === 2 && b) {
            equipment_selected--;
        } else
            return;
    }

    if (!$(oldButton).hasClass("btn-equipment")) {
        deselect(oldButton);
    }

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
    if (date === true && equipment === true) {
        drawBookings()
    } else {
        clearBookings();
    }

    var radioFiller = $(".radio").hasClass("selected");

    var minTime = parseTime("8:00");
    var maxTime = parseTime("16:00");
    var fromTime = parseTime($("#from input[type='time']").val());
    var toTime = parseTime($("#to input[type='time']").val());

    var validFromTime = (fromTime >= minTime && fromTime <= maxTime);
    var validToTime = (toTime >= minTime && toTime <= maxTime);

    var inverseTime = toTime - fromTime < 0;

    $(".submit-button").removeClass("enabled");
    $(".submit-button").attr("href", null);
    if (inverseTime) {
        $(".error-message").text("Du kan inte boka en negativ mängd tid");
    } else if (!validFromTime) {
        $(".error-message").text("'Från klockan' måste vara mellan 8:00 och 16:00");
    } else if (!validToTime) {
        $(".error-message").text("'Till klockan' måste vara mellan 8:00 och 16:00");
    } else if (!date) {
        $(".error-message").text("Du måste välja en dag att boka på");
    } else if (!equipment) {
        $(".error-message").text("Du måste välja utrustning");
    } else if (!radioFiller) {
        $(".error-message").text("Du måste bekräfta våra villkor");
    } else {
        $(".error-message").text("");
        $(".submit-button").addClass("enabled");
        $(".submit-button").attr("href", "#submit");
    }
}

function parseTime(timestamp) {
    return (timestamp.split(":")[0] * 60) + parseInt(timestamp.split(":")[1]);
}

function deselect(button) {
    //console.log(button);
    $(button).removeClass("selected");
}

function submitData() {
    var json = {};

    //json.author = $(".user-name").text();
    //console.log($(".equipment .button.selected span").text());
    json['_token'] = $('input[name^=_token]')[0].value;
    json.equipment = [];
    $(".equipment .button.selected span").each(function (index, element) {
        json.equipment[index] = (element.getAttribute('value'));
    });
    json.date = $(".date .button.selected span").data().value.toString();
    json.start = $("#from input").val();
    json.end = $("#to input").val();
    json = jsonToRequestString(json);

    post("", json);
}

function jsonToRequestString(json) {
    var out = "";
    Object.keys(json).forEach(function (k) {
        if (k === "equipment") {
            //makes it a array if it is equipment input.
            out += k + '=[' + json[k] + "]&";
        } else {
            out += k + '=' + json[k] + "&";
        }
    });
    return out;
}

function drawBookings() {

    var date = $(".date .button.selected span").data().day.toString();
    var equipment = [];
    $(".equipment .button.selected span").each(function (index, element) {
        equipment[index] = parseInt(element.getAttribute('value'));
    });

    var rest = "/api/lookup/" + JSON.stringify(equipment) + "&" + date;
    rest = rest.replace(" ", "%20");
    httpGetAsync(rest, updateBookings);
}

function clearBookings() {
    $("#alreadyBooked").removeClass("open");
}

function castTime(hour) {
    var minutes = (hour % 60);
    hour -= minutes;
    hour = (hour / 60) + 8;
    if (minutes < 10) minutes = "0" + minutes;
    if (hour < 10) hour = "0" + hour;
    return hour + ":" + minutes;
}

function updateBookings(input) {
    input = JSON.parse(input);
    if (Object.keys(input).length === 0) {
        clearBookings();
        return 0;
    } else {
        $("#alreadyBooked").addClass("open");
    }
    $("#booked-times").html("");
    input.forEach(function (element) {
        //console.log(input)
        var start = castTime(parseInt(element.start));
        var end = castTime(parseInt(element.end));
        var template = $([
            "<div class=\"form-box px-3 py-1 form-margin\">",
            "  <div class=\"m-1 header-line-left-pink\">",
            "      <div class=\"m-2\">",
            "          <h5 class=\"soleto-bold m-0\">" + start + " - " + end + "</h5>\n",
            "          <p class=\"m-0 soleto-regular\" style=\"\">" + element.name + "</p>",
            "      </div>",
            "  </div>",
            "</div>"
        ].join("\n"));
        $("#booked-times").append(template);
    });
}

function expandContent(id) {
    var div = $(id);
    if (div.css("max-height") === "2000px") {
        div.css("max-height", "");
    } else {
        div.css('max-height', "2000px");
    }
}

function post(url, json) {
    var http = new XMLHttpRequest();
    http.open('POST', url, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function () {//Call a function when the state changes.
        if (this.readyState === 4) {
            //console.log(this.responseText);
            if (this.status === 200) {
                window.location.replace(this.responseText);
            } else {
                window.location.replace("/error/" + this.status);
            }
        }
    };
    http.send(json);
}

// Async http GET request function
// Found on stackoverflow, thanks <3
function httpGetAsync(url, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200)
            callback(this.response);
    };
    xmlHttp.open("GET", url, true); // true for asynchronous
    xmlHttp.send(null);
}