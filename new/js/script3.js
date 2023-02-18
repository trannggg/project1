const header=document.querySelector("header")
window.addEventListener("scroll",function (){
    const x = window.pageYOffset
    if(x>0){
        header.classList.add("sticky")
    }else {
        header.classList.remove("sticky")
    }
})

const itemsliderbar = document.querySelectorAll(".category-left-li a")
const itemsliderbarSub = document.querySelectorAll(".category-left-li")
itemsliderbar.forEach(function (menu,index){
    menu.addEventListener("click",function (){
        itemsliderbarSub[index].classList.toggle("block")
    })

})

let s_profileInfo = document.getElementById("s_profileInfo");
let s_profileOrder = document.getElementById("s_profileOrder");

s_profileInfo.addEventListener("click", showProfileInfo);
s_profileOrder.addEventListener("click", showProfileOrder);

function showProfileInfo() {
    document.getElementById("account-info").style.display = "block";
    document.getElementById("order-info").style.display = "none";
}

function showProfileOrder() {
    document.getElementById("account-info").style.display = "none";
    document.getElementById("order-info").style.display = "block";
}