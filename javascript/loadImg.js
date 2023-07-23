
//onchange="imgchng()"

function imgchng() {

    const reader = new FileReader()
  
    let files = document.getElementById('').files
    reader.onload = async (event) => {
        document.getElementById('').setAttribute('src', event.target.result)
    }
    console.log(reader.readAsDataURL(files[0]))
}