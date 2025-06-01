<template>
  <Form @submit="handleRegister" :validation-schema="schema" class="register-form pure-form pure-form-stacked">
    <div>
      <Field name="username" placeholder="Username" />
      <ErrorMessage name="username" class="error" />
    </div>

    <div>
      <Field type="password" name="password" placeholder="Password" />
      <ErrorMessage name="password" class="error" />
    </div>

    <button type="submit" class="pure-button pure-button-primary" :disabled="loading">
      Register
    </button>

    <p v-if="error" class="error">{{ error }}</p>
  </Form>
</template>

<script>
import { Form, Field, ErrorMessage } from "vee-validate";
import * as Yup from "yup";
import api from "@/api";
import { useAuthStore } from "@/store/auth";

export default {
  name: "RegisterForm",
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  data() {
    return {
      schema: Yup.object().shape({
        username: Yup.string()
          .min(3, "Username must be at least 3 characters")
          .max(20, "Username must be at most 20 characters")
          .required("Username is required"),
        password: Yup.string()
          .min(8, "Password must be at least 8 characters")
          .required("Password is required"),
      }),
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    error() {
      return this.auth.error;
    },
    loading() {
      return this.auth.loading;
    },
  },
  methods: {
    async handleRegister(values) {
      this.auth.error = null;

      try {
        await api.post("/register.php", {
          username: values.username,
          password: values.password,
        });

        // Auto-login after successful registration
        await this.auth.login(values.username, values.password);
        if (this.auth.isAuthenticated) {
          this.$router.push("/");
        }
      } catch (err) {
        this.auth.error = err.response?.data?.error || "Registration failed";
      }
    },
  },
};
</script>

<style scoped>
.register-form {
  max-width: 300px;
  margin: auto;
  text-align: center;
}
.register-form input {
  width: 100%;
}
.error {
  color: red;
  margin-top: 0.5em;
}
</style>