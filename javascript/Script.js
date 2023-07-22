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
  }).then((response) => response.json())
  .then((responseJson) => {
    console.log(responseJson);
    let newLine = false;
    for (const livro of responseJson.livros) {
      console.log(livro);
      var displayCard = document.createElement("div");
      displayCard.className = "displayCard";
    }
  })
  .catch((error) => {
      console.log(error);
  });
}

