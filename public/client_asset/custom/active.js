var Sidebar_itemBtn__Q78b7 = document.querySelectorAll('.Sidebar_itemBtn__Q78b7')

Sidebar_itemBtn__Q78b7.forEach(element => {
    
    if(window.location.href == element.getAttribute('href') + '/') {
        element.classList.add('active')
    }

    if(window.location.href == element.getAttribute('href')) {
        console.log(window.location.href);   
        element.classList.add('active')
    }
});