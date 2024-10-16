<template>
  <div class="auth-loader">
    Getting you logged In...
  </div>
</template>

<script>
export default {
  name: "loadingComponent",
  mounted() {
    console.log(callbackData)
  }
};
</script>

<style scoped>
  .auth-loader {
    height: 100vh;
    text-align: center;
    display: flex;
    font-size: 100px;
    align-items: center;
    justify-content: center;
  }
</style>
