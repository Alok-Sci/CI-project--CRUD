let countryDropdown = document.getElementById("countryDropdown");
let stateDropdown = document.getElementById("stateDropdown");

if (location.pathname !== "/user/add") {
  console.log("hello");
  window.addEventListener("DOMContentLoaded", handleEvent);
}
// console.log(location.pathname);

countryDropdown.addEventListener("change", () =>
  loadState(countryDropdown.value)
);
stateDropdown.addEventListener("change", () => loadCity(stateDropdown.value));

function handleEvent() {
  console.log("handleevent called");
  let countryDropdown = document.getElementById("countryDropdown");
  let stateDropdown = document.getElementById("stateDropdown");
  let cityDropdown = document.getElementById("cityDropdown");

  // if city dropdown is not empty then remove disabled attribute
  if (countryDropdown.value !== "") {
    loadState(countryDropdown.value);

    // if state dropdown is not empty then remove disabled attribute
    if (stateDropdown.value !== "") {
      loadCity(stateDropdown.value);
    }
  }

}

console.log("dom loaded");

function loadState(country_id) {
  //   let country_id = document.getElementById("countryDropdown").value;

  console.log("changes country", country_id);

  if (country_id !== "") {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/user/country/" + country_id, true);
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        let stateDropdown = document.getElementById("stateDropdown");
        stateDropdown.removeAttribute("disabled");

        document.getElementById(
          "stateDropdown"
        ).innerHTML = `<option selected disabled>-- Select state --</option>`;
        document.getElementById("stateDropdown").innerHTML += this.responseText;
      }

      loadCity(stateDropdown.value);
    };

    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send();
  } else {
    stateDropdown.setAttribute("disabled", "disabled");
    cityDropdown.setAttribute("disabled", "disabled");
  }
}

function loadCity(state_id) {
  //   let state_id = document.getElementById("stateDropdown").value;
  let country_id = document.getElementById("countryDropdown").value;

  if (state_id !== "") {
    console.log("changes state", state_id);

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/user/country/" + country_id + "/state/" + state_id, true);
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        let cityDropdown = document.getElementById("cityDropdown");
        console.log('remove disabled form city');
        cityDropdown.removeAttribute("disabled");

        document.getElementById(
          "cityDropdown"
        ).innerHTML = `<option selected disabled>-- Select Highest Qualification --</option>`;
        document.getElementById("cityDropdown").innerHTML += this.responseText;
      }
    };
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send();
  } else {
    cityDropdown.setAttribute("disabled", "disabled");
  }
}
