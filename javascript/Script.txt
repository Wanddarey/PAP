function deleteText() {
  document.getElementById("searchInput").value = "";
}

let host = 'http://localhost/dashboard/';

let address = host + 'PAP/php/dataLayer.php';

function search() {

  let query = document.getElementById("searchInput").value;
  let url = `${address}?query=${encodeURIComponent(query)}`;

  fetch(url, {
    method: 'POST',
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
    },
    body: {

    }
  }).then((response) => response.json())
    .then((responseJson) => {
      console.log(responseJson);
      displayQuery(responseJson.livros);
    })
    .catch((error) => {
      console.log(error);
    });
}

function displayQuery(livros) {

  document.getElementById("cardDisplay").innerHTML = null;

  let newLine = true;
  let lineNumber = 0;
  for (const livro of livros) {
    console.log(livro);
    let displayCard = document.createElement("div");
    displayCard.className = "displayCard";

    let displayHalf = document.createElement("div");
    displayHalf.className = "displayHalf";

    let displayImage = document.createElement("img");
    displayImage.className = "displayImage";
    displayImage.src = 'http://localhost/dashboard/pap/imagens/displayImages/' + livro.Capa;

    displayHalf.appendChild(displayImage);

    let displayHalf2 = document.createElement("div");
    displayHalf2.className = "displayHalf2";

    let displayTitle = document.createElement("a");
    displayTitle.className = "displayTitle";
    displayTitle.innerText = livro.Nome;

    let textSeparator = document.createElement("div");
    textSeparator.className = "textSeparator";

    let displayParagraph = document.createElement("p");
    displayParagraph.className = "displayParagraph";
    displayParagraph.innerText = livro.Descricao;

    displayHalf2.appendChild(displayTitle);
    displayHalf2.appendChild(textSeparator);
    displayHalf2.appendChild(displayParagraph);

    displayCard.appendChild(displayHalf);
    displayCard.appendChild(displayHalf2);

    if (newLine) {
      newLine = false;
      let displayRow = document.createElement("div");
      displayRow.className = "displayRow";
      displayRow.id = lineNumber;
      displayRow.appendChild(displayCard);
      document.getElementById("cardDisplay").append(displayRow);
    } else {
      newLine = true;
      document.getElementById(lineNumber).append(displayCard);
      lineNumber++;
    }
  }
}