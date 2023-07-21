let address = 'http://localhost/dashboard/PAP/php/dataLayer.php';


//tipos
//AllIdDesc
//AllIdAsc
function standartQueries(type) {
  let url = `${address}?query=${encodeURIComponent(query)}`;

  fetch(url, {
    method: 'POST',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
    body: {
        GET: type
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