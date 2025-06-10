let menu_btn = document.getElementById('menu-btn');

menu_btn.addEventListener('click', ()=>{
    let sidebar = document.getElementById('sidebar');

    if (sidebar.classList.contains('sidebar')) {
        sidebar.classList.add('sidebar-active');
    }
})

let close_btn = document.getElementById('close-btn');

close_btn.addEventListener('click', ()=>{
    let sidebar = document.getElementById('sidebar');

    if (sidebar.classList.contains('sidebar-active')) {
        sidebar.classList.remove('sidebar-active');
    }
})