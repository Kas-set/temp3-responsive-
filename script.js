console.log("hello")
const menuHam = document.getElementById("menuHam");
const list = document.getElementById("nav-list");

menuHam.addEventListener('click',()=>{
    console.log("clik");
    list.classList.toggle('mobile-list');
})
