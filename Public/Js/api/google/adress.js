function initializeAutocomplete(id) {
  var element = document.getElementById(id);
  if (element) {
    var autocomplete = new google.maps.places.Autocomplete(element, {
      types: ["geocode"],
    });
    google.maps.event.addListener(
      autocomplete,
      "place_changed",
      onPlaceChanged
    );
  }
}

function onPlaceChanged() {
  var place = this.getPlace();
  // console.log(place);  // Uncomment this line to view the full object returned by Google API.
  for (var i in place.address_components) {
    var component = place.address_components[i];

    for (var j in component.types) {
      // Some types are ["country", "political"]
      var type_element = document.getElementById(component.types[j]);

      if (type_element) {
        type_element.value = component.long_name;
      }
    }
  }
}

function initialize() {
  initializeAutocomplete("user_input_autocomplete_address");
}
initialize();
let coll = document.querySelector(".collapsible");
// var i;

// for (i = 0; i < coll.length; i++) {
coll.addEventListener("click", function () {
  this.classList.toggle("active");
  var content = this.nextElementSibling;
  if (content.style.maxHeight) {
    content.style.maxHeight = null;
  } else {
    content.style.maxHeight = content.scrollHeight + "px";
  }
});
// console.log(getUser());

let email = document.querySelector("#email");
email.value = getUser().email;
