// Keep posts active after hover
function toggleActive(x) {
    // var popularSection = document.querySelector('.popular-post');
    var activeClass = document.querySelectorAll('.cursor-hover');
    for (i = 0; i < activeClass.length; i++) {
        activeClass[i].classList.remove('cursor-hover');
    }
    x.classList.add('cursor-hover');
}

window.addEventListener("load", function(){
    var myCollapsible = document.getElementById('searchdiv')
    var searchInput = this.document.getElementById('s')
    myCollapsible.addEventListener('shown.bs.collapse', function () {
        searchInput.focus();
    })
    myCollapsible.addEventListener('hidden.bs.collapse', function () {
        searchInput.blur();
    })
});
