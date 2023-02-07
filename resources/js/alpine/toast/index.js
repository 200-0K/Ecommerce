import Toastify from 'toastify-js';

export default function() {
  return {
    show(text) {
      Toastify({
        text,
        duration: 2500,
        gravity: 'top',
        position: 'left',
        style: {
          background: 'linear-gradient(to right, #00b09b, #96c93d)'
        }
      }).showToast();
    }
  }
}