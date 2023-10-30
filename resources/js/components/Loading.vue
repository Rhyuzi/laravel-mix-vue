<template>
    <div class="loading-overlay">
      <div class="loader"></div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        isLoading: false,
      };
    },
    methods: {
      showLoader() {
        this.isLoading = true;

        // Simulate a loading delay
        setTimeout(() => {
          this.isLoading = false;
        }, 3000); // Change the delay (in milliseconds) as needed
      },
    },
  };
  </script>

  <style scoped>
  .loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 1071;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .loader {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  </style>
