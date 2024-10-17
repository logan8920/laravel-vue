<template>
  <div class="auth-loader">
    Getting you logged In...
  </div>
</template>

<script>
export default {
  name: "loadingComponent",
  mounted() {
    try {
      const authLoader = document.querySelector(".auth-loader")
      const payload = JSON.parse(atob(callbackData));
      this.$store.commit('authLogin', payload);
      authLoader.textContent = "Redirecting...";
      this.$router.push({ name: "user.dashboard" });
    } catch (error) {
      console.log(error);
      this.$store.commit('authLogout');
      authLoader.textContent = "Something went wrong login in again!";
      this.$router.push({ name: "frontend.login" });
    }
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
