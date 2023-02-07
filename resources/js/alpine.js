import Alpine from 'alpinejs';
import cart from './alpine/cart';

Alpine.data('cart', cart);

window.Alpine = Alpine;
Alpine.start();