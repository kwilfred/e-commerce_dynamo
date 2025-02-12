let list = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let dots = document.querySelectorAll('.slider .dots li');
let  next = document.getElementById('next');
let prev = document.getElementById('prev');

let active = 0;
let lengthItems = items.length - 1;

next.onclick = function (){
    if(active + 1 > lengthItems){
        active = 0 ;
    }else{
        active = active + 1;
    }
    reloadSlider()
}

prev.onclick = function () {
    if(active - 1 < 0){
        active = lengthItems;
    }else{
        active = active - 1;
    }
    reloadSlider();
}
let refreshSlider  = setInterval(()=> {next.click()},5000)

function reloadSlider() {
    let checkLeft = items[active].offsetLeft;
    list.style.left = -checkLeft + 'px';

    let lastActiveDot = document.querySelector('.slider .dots li.active');
    lastActiveDot.classList.remove('active');
    dots[active].classList.add('active');
}

dots.forEach((li,key) =>{
    li.addEventListener('click', function(){
        active = key;
        reloadSlider()
    })
})

var navLinks = document.getElementById('nav-links');
function showMenu() {
    navLinks.style.right = '0';
}
function hideMenu() {
    navLinks.style.right = '-200px';
}
// let cont = document.getElementById('container');
// cont.style.backgroundColor = 'gray';