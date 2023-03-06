
$.ajax({
    url: 'http://127.0.0.1:8000/api/route',
    method: 'GET',
    contentType: 'application/json',
    success: function (response) {
        console.log(response.data);
        response.data.forEach(element => {
            const elementsLI = document.createElement("div")
            elementsLI.classList = "list-group-item bg-info"
            elementsLI.innerHTML = `${element.name} <i class="fa-solid fa-arrow-right"></i>`

            const newElement = document.createElement("li")
            newElement.classList = "route-tab"
            newElement.addEventListener("click", () => { show(element.route_id) });
            newElement.appendChild(elementsLI);

            $('#list-route').append(newElement);
        });

        showStations(response.data[0]);
    },
    error: function (response) {

    }
});

function show(value) {
    $('#route-name').empty();
    $('#station-node').empty();
    $('#station-name').empty();
    $('#route-time').empty();
    $('#route-length').empty();
    $.ajax({
        url: 'http://127.0.0.1:8000/api/route/' + value + '',
        method: 'GET',
        contentType: 'application/json',
        success: (response) => {
            showStations(response.data)
        },
        error: function (response) {
        }
    });
}

/**
 * hien station list cua route
 * @param {*} route 
 */
function showStations(route) {
   
    $('#route-name').append(route.name);
    route.stations.forEach((element, i) => {
        const badge = [];

        // element.badge.forEach(e => {
        //     badge.push(`<span class='badge text-bg-light'>${e}</span>" />`);
        // });

        const checked = i == 0 ? "checked" : ""
        $('#station-node').append(`<input type="radio" class="col station-dot" name="route-1" ${checked}  data-bs-toggle="tooltip" data-bs-custom-class="route-tooltip" data-bs-html="true"
        data-bs-title="Tuyến <span class='badge text-bg-light'>1</span>"x/>`);
        $('#station-name').append('<div class="col station-name"> <label for="sta-'+ element.station_id +'">' + element.name + '</label></div>');
    })
    $('#route-time').append('<i class="fa-solid fa-clock"></i> ' + route.opt_time);
    $('#route-length').append('<i class="fa-solid fa-arrows-left-right-to-line"></i> ' + route.length);

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
}


