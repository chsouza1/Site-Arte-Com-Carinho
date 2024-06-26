document.querySelector('.btn-mobile').addEventListener('click', function() {
    var mobileMenu = document.getElementById('mobile_menu');
    mobileMenu.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
});