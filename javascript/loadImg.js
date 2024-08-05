
//onchange="imgchng()"

function imgchng() {
    const reader = new FileReader()
  
    let files = document.getElementById('imgFile').files
    reader.onload = async (event) => {
        document.getElementById('coverImg').setAttribute('src', event.target.result)
    }
    console.log(reader.readAsDataURL(files[0]))
}