$(document).ready(function () {
  // alert('Loaded');

  // send ajax request for country data
  $.ajax({
    url: "/user/country",
    method: "GET",
    dataType: "json",
    success: function (data) {
      $("#countryDropdown > ul").empty();
      $.each(data, function (index, country) {
        // console.log(country.name);
        let li = $(
          `<li class="px-3 py-2" data-country="${country.id}">${country.name}</li>`
        );

        // li.off("click");
        li.click(function () {
          handleItemClick(this);
        });
        $("#countryDropdown > ul").append(li);
      });
    },
  });

  // hide/show dropdown list on click
  $("#countryDropdown").click(function () {
    console.log("toggle countryDropdown");
    $("#countryDropdown > ul").toggleClass("d-none");
  });
  // hide/show dropdown list on click
  $("#stateDropdown").click(function () {
    console.log("toggle state Dropdown");
    $("#stateDropdown > ul").toggleClass("d-none");
  });
  // hide/show dropdown list on click
  $("#cityDropdown").click(function () {
    console.log("toggle city Dropdown");
    $("#cityDropdown > ul").toggleClass("d-none");
  });

  // onchange of country dropdown attribute value
  $("#countryDropdown button").change(function () {
    console.log("toggle handle button change");
    handleItemClick(this);
    loadStates();
  });
  // onchange of state dropdown attribute value
  $("#stateDropdown button").change(function () {
    handleItemClick(this);
    console.log("toggle handle button chnage state");
    // loadCities();
  });

  // get country id from the data-country attribute of country dropdown
  //
  function handleItemClick(item) {
    console.log(item, "item is clicked");
    //   set country id to the heading
    if ($(item).data("country")) {
      $("#countryDropdown > button").attr(
        "data-selected-country",
        $(item).data("country")
      );
      $("#countryDropdown > button").text($(item).text());
      //   store the value in the input field
      $("input[name=country]").val($(item).data('country'));

      loadStates();
    } else if ($(item).data("state") && $("#cityDropdown ul li") !== "") {
      $("#stateDropdown > button").attr(
        "data-selected-state",
        $(item).data("state")
      );
      $("#stateDropdown > button").text($(item).text());
      //   store the value in the input field
      $("input[name=state]").val($(item).data('state'));

      loadCities();
    } else if ($(item).data("city")) {
      $("#cityDropdown > button").attr(
        "data-selected-city",
        $(item).data("city")
      );
      $("#cityDropdown > button").text($(item).text());
      //   store the value in the input field
      $("input[name=city]").val($(item).data('city'));
    }
  }

  //   load states data
  function loadStates() {
    let countryId = $("#countryDropdown button").attr("data-selected-country");
    console.log(countryId);

    $.ajax({
      url: `/user/country/${countryId}`,
      method: "GET",
      dataType: "json",
      success: function (data) {
        $("#stateDropdown > ul").empty();
        $.each(data, function (index, state) {
          let li = $(
            `<li class="px-3 py-2" data-state="${state.id}">${state.name}</li>`
          );

          //   li.off("click");
          li.click(function () {
            handleItemClick(this);
          });
          $("#stateDropdown > ul").append(li);
        });
      },
    });
  }

  // load cities
  function loadCities() {
    let selectedCountryId = $("#countryDropdown button").data(
      "selected-country"
    );
    let selectedStateId = $("#stateDropdown button").data("selected-state");

    // load state dropdowns
    $("#cityDropdown").click(function () {
      console.log("city dropdown clicked");
    });

    $.ajax({
      url: `/user/country/${selectedCountryId}/state/${selectedStateId}`,
      method: "GET",
      dataType: "json",
      success: function (data) {
        $("#cityDropdown > ul").empty();
        $.each(data, function (index, city) {
          let li = $(
            `<li class="px-3 py-2" data-city="${city.id}">${city.name}</li>`
          );
          // remove previous click event
          //   li.off("click");
          li.click(function () {
            handleItemClick(this);
          });
          $("#cityDropdown > ul").append(li);
        });
      },
    });
  }
});
