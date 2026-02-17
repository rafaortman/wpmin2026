const menuBt = document.getElementById('menuBt');
const menu = document.querySelector('.menu');
const searchForm = document.getElementById('searchForm');

if (menuBt && menu) {
    menuBt.addEventListener('click', () => {
        menuBt.classList.toggle('ativo');
        menu.classList.toggle('ativo');
        searchForm?.classList.remove('ativo');
    });
}

document.querySelectorAll('.menu-item-has-children > a').forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
		e.stopPropagation();
        const parent = link.parentElement;
        for (const sibling of parent.parentElement.children) {
            if (sibling !== parent) {
                sibling.querySelector('a')?.classList.remove('ativo');
                sibling.querySelector('.sub-menu')?.classList.remove('ativo');
            }
        }
        link.classList.toggle('ativo');
        link.nextElementSibling?.classList.toggle('ativo');
    });
});
		
document.addEventListener('click', () => {
    document.querySelectorAll(
        '.menu-item-has-children > a.ativo, .menu-item-has-children .sub-menu.ativo'
    ).forEach(el => el.classList.remove('ativo'));
});

new Swiper('#slides', {
	autoplay: {
    	delay: 3000
	},
    loop: true,
    pagination: { el: '.swiper-pagination', clickable: true }
});

new Swiper('#artigos_swiper', {
    loop: true,
    pagination: { el: '.swiper-pagination', clickable: true }
});

document.querySelectorAll('.subitem').forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle('ativo');
    });
});
