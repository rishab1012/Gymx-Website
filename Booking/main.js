let image = document.getElementById("pphoto")
input=document.querySelector("input");

input.addEventListener("change",() =>{
    image.src=URL.createObjectURL(input.files[0]);
});