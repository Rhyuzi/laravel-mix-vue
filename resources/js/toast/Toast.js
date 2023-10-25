export default {
    success(message, options = {}) {
      Vue.toasted.show(message, {
        type: 'success',
        ...options,
      });
    },
    error(message, options = {}) {
      Vue.toasted.show(message, {
        type: 'error',
        ...options,
      });
    },
  };
