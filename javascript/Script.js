function deleteText() {
  document.getElementById("searchInput").value = "";
}

let address = 'http://localhost/dashboard/PAP/php/dataLayer.php';

function search() {
  let query = document.getElementById("searchInput").value;
  let url = `${address}?query=${encodeURIComponent(query)}`;

  fetch(url, {
    method: 'GET',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    }
  }).then((response) => {
    if (response.ok) {
      console.log(response.json());
    } else {
      throw new Error(`Request failed with status ${response.status}`);
    }
  })
  .then((responseJson) => {
    console.log(responseJson);
  })
  .catch((error) => {
    console.log(error);
  });
}
