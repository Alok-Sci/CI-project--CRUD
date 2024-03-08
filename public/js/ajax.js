console.log("dom loaded");
function loadState(country) {
  console.log("changes country", country);
  if (country !== "") {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/user/country/" + country, true);
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        let stateDropdown = document.getElementById("stateDropdown");
        stateDropdown.removeAttribute("disabled");

        document.getElementById(
          "stateDropdown"
        ).innerHTML = `<option selected disabled>-- Select state --</option>`;
        document.getElementById("stateDropdown").innerHTML += this.responseText;
        // sessionStorage.setItem('states', state);
        // alert(this.responseText);
      }
    };
    xhr.setRequestHeader ("X-Requested-With", "XMLHttpRequest");
    xhr.send();
  }
}
function loadCity(state_id) {
  console.log("changes state", state_id);

  let country_id = document.getElementById("countryDropdown").value;
  if (state_id !== "") {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/user/country/" + country_id + "/state/" + state_id, true);
    xhr.onreadystatechange = function () {
      if (this.readyState === 4 && this.status === 200) {
        let cityDropdown = document.getElementById("cityDropdown");
        cityDropdown.removeAttribute("disabled");

        document.getElementById(
          "cityDropdown"
        ).innerHTML = `<option selected disabled>-- Select Highest Qualification --</option>`;
        document.getElementById("cityDropdown").innerHTML += this.responseText;
        // alert(this.responseText);
      }
    };
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.send();
  }
}
