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
        let displayCard = document.createElement("div");
        displayCard.className = "displayCard";

        let displayHalf = document.createElement("div");
        displayHalf.className = "displayHalf";

        let displayImage = document.createElement("img");
        displayImage.className = "displayImage";
        displayImage.src = 'localhost/dashboard/pap/imagens/displayImagens/' + livro.nome;

        displayHalf.appendChild(displayImage);

        let displayHalf2 = document.createElement("div");
        displayHalf2.className = "displayHalf2";

        let displayTitle = document.createElement("a");
        displayTitle.className = "displayTitle";
        displayTitle.innerText = livro.nome;

        let textSeparator = document.createElement("div");
        textSeparator.className = "textSeparator";

        let displayParagraph = document.createElement("p");
        displayParagraph.className = "displayParagraph";
        displayTitle.innerText = livro.nome;

        displayHalf2.appendChild(displayTitle);
        displayHalf2.appendChild(textSeparator);
        displayHalf2.appendChild(displayParagraph);

        displayCard.appendChild(displayHalf);
        displayCard.appendChild(displayHalf2);

        if(newLine) {
          let displayRow = document.createElement("div");
          displayRow.className = "displayRow";

          displayRow.appendChild();
        }
      }
    })
    .catch((error) => {
      console.log(error);
    });
}

