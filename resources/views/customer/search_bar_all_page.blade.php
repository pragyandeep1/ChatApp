<script>
  $(document).ready(function() {

    
    // Function to handle location selection
    const setLocation = (city) => {
      const status = document.querySelector('#dropdown-button');
      const cityname = document.querySelector('#city');
      const best_deal_city = document.querySelector('#best_deal_city');

      // Update the UI with the selected city
      status.textContent = city;
      cityname.textContent = city;
      best_deal_city.value = city;

      // Store the selected city in a cookie that expires in 1 day (adjust as needed)
      const expirationDate = new Date();
      expirationDate.setDate(expirationDate.getDate() + 1);
      document.cookie = `selectedCity=${city}; expires=${expirationDate.toUTCString()}; path=/`;

      // Load autocomplete data for the selected city
      loadAutocompleteData(city);
    };

    // Function to get user's location using geolocation
    const getUserLocation = () => {
      const success = (position) => {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?Latitude=${latitude}&Longitude=${longitude}`;
        fetch(geoApiUrl)
          .then(res => res.json())
          .then(data => {
            var city = data.city;
            setLocation(city); // Auto-select the user's location
          });
      };

      const error = (position) => {
        // Handle geolocation error if needed
      };

      navigator.geolocation.getCurrentPosition(success, error);
    };

    // Call the function to get the user's location and set it on page load
    getUserLocation();



    $(".city-dropdown-item").on("click", function (event) {
        event.preventDefault();
        var selectedCity = $(this).data("city");
        $('#best_deal_city').val(selectedCity);
        setLocation(selectedCity); // Update the UI with the selected city
        loadAutocompleteData(selectedCity); // Load autocomplete data for the selected city
    });
  });

  // Function to retrieve a cookie value by its name
  function getCookie(name) {
    var value = '; ' + document.cookie;
    var parts = value.split('; ' + name + '=');
    if (parts.length === 2) return parts.pop().split(';').shift();
  }

 

  // The rest of your JavaScript code remains unchanged
  // ...
  function loadAutocompleteData(cityId) {
        console.log(cityId);
    var availableTags = [];
    $.ajax({
      method: 'GET',
      url: "{{ url('service_list_ajax') }}",
      data: { cityId: cityId },
      success: function(response) {
        console.log(response);
        var uniqueTags = getUniqueTags(response);
      startAutocomplete(uniqueTags);
        // startAutocomplete(response);
      },
    });
  }

 

  function getUniqueTags(tags) {
  var uniqueTags = [];
  var seen = {};

  tags.forEach(function(tag) {
    var lowercaseTags = tag.seo_tags ? tag.seo_tags.toLowerCase() : '';
    if (!seen[lowercaseTags]) {
      seen[lowercaseTags] = true;
      uniqueTags.push(tag);
    }
  });

  return uniqueTags;
}
function startAutocomplete(availableTags) {
  $("#search_name").on('input', function() {
    $("#input_type").val("company_name");
    var keyword = $(this).val().toLowerCase();
    var filteredTags = availableTags.filter(function(tag) {
      var lowercaseTags = tag.seo_tags ? tag.seo_tags.toLowerCase() : '';
      var lowercaseValue = tag.value ? tag.value.toLowerCase() : '';
      return (
        lowercaseTags.indexOf(keyword) !== -1 ||
        lowercaseValue.indexOf(keyword) !== -1 ||
        lowercaseTags.includes(keyword)
      );
    });
    renderSuggestions(filteredTags);
  });

  function renderSuggestions(tags) {
    var suggestions = '';
    tags.forEach(function(item, index) {
      var displayValues = item.seo_tags ? item.seo_tags.split(',') : [item.value];
      displayValues.forEach(function(tag) {
        var displayValue = tag.trim();
        suggestions += `<div class="suggestion" data-index="${index}">${displayValue}</div>`;
      });
    });
    $("#autocomplete-suggestions").html(suggestions);
  }

  var selectedSuggestionIndex = -1;

  $("#autocomplete-suggestions").on('click', '.suggestion', function() {
    var selectedValue = $(this).text();
    $("#input_type").val("seo_tags");
    $("#search_name").val(selectedValue);
    $("#autocomplete-suggestions").empty();
  });

  $("#search_name").on('keydown', function(event) {
    var suggestions = $(".suggestion");
    if (event.keyCode === 40) {
      // Arrow down key
      event.preventDefault();
      selectedSuggestionIndex = Math.min(selectedSuggestionIndex + 1, suggestions.length - 1);
    } else if (event.keyCode === 38) {
      // Arrow up key
      event.preventDefault();
      selectedSuggestionIndex = Math.max(selectedSuggestionIndex - 1, -1);
    } else if (event.keyCode === 13 && selectedSuggestionIndex !== -1) {
      // Enter key
      event.preventDefault();
      var selectedValue = suggestions.eq(selectedSuggestionIndex).text();
      $("#search_name").val(selectedValue);
      $("#autocomplete-suggestions").empty();
      selectedSuggestionIndex = -1;
      return;
    } else {
      selectedSuggestionIndex = -1;
      return;
    }

    suggestions.removeClass('selected');
    if (selectedSuggestionIndex !== -1) {
      suggestions.eq(selectedSuggestionIndex).addClass('selected');
    }
  });

  $(document).on('click', function(event) {
    if (!$(event.target).closest('#autocomplete-suggestions').length) {
      $("#autocomplete-suggestions").empty();
    }
  });
}

</script>