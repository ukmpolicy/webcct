$('.owl-carousel').owlCarousel({
    nav: false,
    loop: true,
    autoplay: true,
    // center: true,
    responsive:{
        0:{
            items: 1
        },
        600:{
            items: 2
        },
        1000:{
            items: 4
        }
    }
})

let price = 0;

function choiceCompetition(el, checkbox) {
    let cb = document.querySelector(checkbox);
    if (cb.checked) {
        el.classList.remove('active')
        price -= parseInt(el.dataset.price);
        cb.checked = false;
        updateTotal();
    }else {
        el.classList.add('active')
        price += parseInt(el.dataset.price);
        cb.checked = true;
        updateTotal();
    }
}

function updateTotal() {
    document.querySelector('#total').innerHTML = formatNumber(price);
}

function formatNumber(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$('.toggle').click(() => {
    $('#navbar').toggleClass('show')
    $('#header').toggleClass('show-navbar')
})
$('#navbar .link').click(() => {
    $('#navbar').toggleClass('show')
    $('#header').toggleClass('show-navbar')
})