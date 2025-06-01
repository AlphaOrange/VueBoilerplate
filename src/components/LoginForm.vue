<template>
  <form @submit.prevent="handleLogin" class="login-form pure-form pure-form-stacked">
    <input v-model="username" placeholder="Username" required />
    <input v-model="password" type="password" placeholder="Password" required />
    <button type="submit" class="pure-button pure-button-primary">Login</button>
    <p v-if="error">{{ error }}</p>
  </form>
</template>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "LoginForm",
  data() {
    return {
      username: "",
      password: "",
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    loading() {
      return this.auth.loading;
    },
    error() {
      return this.auth.error;
    },
  },
  methods: {
    async handleLogin() {
      await this.auth.login(this.username, this.password);
      if (this.auth.isAuthenticated) {
        this.$router.push("/");
      }
    },
  },
};
</script>

<style scoped>
.login-form {
  max-width: 300px;
  margin: auto;
  text-align: center;
}
.login-form input {
  width: 100%;
}
.error {
  color: red;
  margin-top: 0.5em;
}
</style>
