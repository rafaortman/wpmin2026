const menu_bt       = document.getElementById('menuBt');
const menu          = document.querySelector('.menu');
const submenu_items = document.querySelectorAll('.menu-item-has-children > a');

menu_bt.addEventListener('click', () => {
	menu_bt.classList.toggle('ativo');
	menu.classList.toggle('ativo');
});

submenu_items.forEach(submenu_item => {
    submenu_item.addEventListener('click', e => {
        e.preventDefault();
		e.stopPropagation();
        const siblings = submenu_item.parentElement.parentElement.children;
		// Fecha todos os irmãos ativos
        for (const sibling of siblings) {
			if (sibling !== submenu_item.parentElement && sibling.classList.contains('menu-item-has-children')) {
				sibling.querySelector('a').classList.remove('ativo');
				sibling.querySelector('.sub-menu').classList.remove('ativo');
			}
		}
		// Alterna o item clicado
        submenu_item.classList.toggle('ativo');
        submenu_item.nextElementSibling.classList.toggle('ativo');
    });
});
		
// Fecha submenu se clicar fora
document.addEventListener('click', () => {
    document.querySelectorAll(
        '.menu-item-has-children > a.ativo, .menu-item-has-children .sub-menu.ativo'
    ).forEach(el => el.classList.remove('ativo'));
});

// Accordion simples
document.querySelectorAll('.subitem').forEach(item => {
    item.addEventListener('click', () => {
        item.classList.toggle('ativo');
    });
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
