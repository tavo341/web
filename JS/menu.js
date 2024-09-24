document.getElementById("menuButton").addEventListener("click", function() {
    Menu(this);
});

function Menu(e) {
    let list = document.querySelector('ul');

    if (e.name === 'menu') {
        e.name = "close";
        list.classList.add('top-[80px]', 'opacity-100');
    } else {
        e.name = "menu";
        list.classList.remove('top-[80px]', 'opacity-100');
    }
}

function toggleMenu() {
    const menuList = document.getElementById('menu-list');
    menuList.classList.toggle('show');
}
