import Alpine from 'alpinejs';
import cart from './alpine/cart';
import toast from './alpine/toast';

Alpine.data('cart', cart);
Alpine.data('toast', toast);

window.Alpine = Alpine;
Alpine.start();