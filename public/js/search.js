$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
//full text search
function filter() {
  // Declare variables
  var input, filter, i, txtValue;
  //what is written in the search bar
  input = document.getElementById("myInput");
  //toUpper case so the search isnt case sensitive
  filter = input.value.toUpperCase();
  row = document.getElementById("phone-grid");
  card = row.getElementsByClassName("card");
  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < card.length; i++) {
    model = card[i].getElementsByClassName("card-title-model");
    brand = card[i].getElementsByClassName("card-title");
    //text to be matched
    txtValue = brand[0].innerHTML + " " + model[0].innerHTML;
    //if the text matches, display content
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      card[i].parentElement.style.display = "";
    } else {
      card[i].parentElement.style.display = "none";
    }
  }
}

function addEventListeners() {

  let applyBtn = document.getElementById("applyFilters");
  applyBtn.addEventListener('click', sendApplyFiltersRequest);
}

function encodeForAjax(data) {
  if (data == null) return null;
  return Object.keys(data).map(function (k) {
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
  let request = new XMLHttpRequest();

  request.open(method, url, true);
  request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.addEventListener('load', handler);
  request.send(encodeForAjax(data));
}

function sendApplyFiltersRequest(event) {
  event.preventDefault();
  brandCheckboxes = document.getElementsByClassName('brandCheckbox');
  brandIds = [];
  for (var i = 0; i < brandCheckboxes.length; i++) {
    if (brandCheckboxes[i].checked) {
      brandIds.push(Number(brandCheckboxes[i].value));
    }
  }

  fingerCheckboxes = document.getElementsByClassName('fingerprintCheckbox');
  fingerIds = [];
  for (var i = 0; i < fingerCheckboxes.length; i++) {
    if (fingerCheckboxes[i].checked) {
      fingerIds.push(Number(fingerCheckboxes[i].value));
    }
  }

  waterCheckboxes = document.getElementsByClassName('wrCheckbox');
  waterIds = [];
  for (var i = 0; i < waterCheckboxes.length; i++) {
    if (waterCheckboxes[i].checked) {
      waterIds.push(Number(waterCheckboxes[i].value));
    }
  }
  sendAjaxRequest('post', 'search/filter', {
    brands: brandIds,
    fingers: fingerIds,
    waters: waterIds
  }, searchFilterHanlder);
}

function searchFilterHanlder() {
  if (this.status != 200) {
    // window.location = '/search';
    alert("Failed to filter results :'(");
  }
  console.log(this.responseText);
}

addEventListeners();