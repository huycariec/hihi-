var showButton = document.getElementById("showButton");
var categoryList = document.getElementById("categoryList");

// Hiển thị hoặc ẩn menu con khi click vào nút
showButton.addEventListener("click", function (event) {
    if (categoryList.style.display === "none" || categoryList.style.display === "") {
        categoryList.style.display = "block";
    } else {
        categoryList.style.display = "none";
    }
    event.stopPropagation();
});

// Ẩn menu con khi click ra ngoài
window.addEventListener("click", function () {
    categoryList.style.display = "none";
});

// function increaseValue(button) {
//     let parent = button.parentElement;
//     let quantity_old = parent.children[1];
//     let quantity_new = parseInt(quantity_old.innerHTML) + 1;
//     quantity_old.innerText = quantity_new;
// }
//
// function reduceValue(button) {
//     let parent = button.parentElement;
//     let quantity_old = parent.children[1];
//     let quantity_new = parseInt(quantity_old.innerHTML) - 1;
//     if (quantity_new <= 0){
//         quantity_new = 1;
//     }
//     quantity_old.innerText = quantity_new;
//
// }

// function increaseValue(button) {
//     var displayElement = button.parentElement.querySelector('#display');
//     var quantity = parseInt(displayElement.value);
//
//     quantity += 1;
//     displayElement.value = quantity;
// }
//
// function reduceValue(button) {
//     var displayElement = button.parentElement.querySelector('#display');
//     var quantity = parseInt(displayElement.value);
//
//     if (quantity > 1) {
//         quantity -= 1;
//         displayElement.value = quantity;
//     }
// }


$(document).ready(function () {
    $('.row-product').slick(
        {
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false
        }
    );

});

$(document).ready(function () {
    $('.banner').slick(
        {
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false
        }
    );

});

$('.img-deltail-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.img-deltail-nav'
});
$('.img-deltail-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.img-deltail-for',
    // dots: true,
    // centerMode: true,
    focusOnSelect: true,
    arrows: false
});
