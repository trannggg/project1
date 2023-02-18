const comment = document.querySelector(".comment1")
const detail1 = document.querySelector(".detail1")

if(comment) {
    comment.addEventListener("click", function () {
        document.querySelector(".product-content-right-bottom-content-detail").style.display = "none"
        document.querySelector(".product-content-right-bottom-content-comment").style.display = "block"
    })
}

if(detail1) {
    detail1.addEventListener("click", function () {
        document.querySelector(".product-content-right-bottom-content-comment").style.display = "none"
        document.querySelector(".product-content-right-bottom-content-detail").style.display = "block"
    })
}

const button1 = document.querySelector(".product-content-right-bottom-top")
if(button1){
    button1.addEventListener("click",function (){
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")

    })
}