function showCategory(category) {
    const products = document.querySelectorAll('.produto');
    products.forEach(product => {
        product.style.display = 'none'
    });

    const selectedProducts = document.querySelectorAll('.produto.${category}');
    selectedProducts.forEach(product => {
        product.style.display = 'block';
    });
}

const swiper = new Swiper('.swiper', {
    spaceBetween: 10,
    slidesPerView: 3,
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
    },    
});