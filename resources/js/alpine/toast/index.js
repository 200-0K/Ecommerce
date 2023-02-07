import Toastify from 'toastify-js';

export default function() {
  return {
    success(text) {
      Toastify({
        text,
        duration: 2500,
        gravity: 'top',
        position: 'left',
        style: {
          background: 'linear-gradient(to right, #00b09b, #96c93d)'
        }
      }).showToast();
    },
    error(text) {
      Toastify({
        text,
        duration: 2500,
        gravity: 'top',
        position: 'left',
        style: {
          background: 'linear-gradient(to right bottom, #f72e2e, #fa2340, #fa1b52, #f91862, #f61c72)'
        }
      }).showToast();
    }
  }
}