import { defineStore } from "pinia";
import api from "@/api";

export const useAuthStore = defineStore("auth", {

  state: () => ({
    user: null,
    loading: false,
    error: null
  }),

  getters: {
    isAuthenticated: (state) => !!state.user
  },

  actions: {

    async login(username, password) {
      this.loading = true;
      this.error = null;
      try {
        const response = await api.post("/login.php", { username, password });
        this.user = response.data.user;
      } catch (error) {
        this.error = error.response?.data?.error || "Login Failed";
      } finally {
        this.loading = false;
      }
    },

    async logout() {
      this.loading = true;
      this.error = null;
      try {
        const response = await api.post("/logout.php");
        this.user = null;
      } catch (error) {
        console.log(error.response?.data?.error || "Login Failed");
        this.error = "Logout Failed";
      } finally {
        this.loading = false;
      }
    },

    async fetchSession() {
      this.loading = true;
      this.error = null;
      try {
        const response = await api.post("/session.php");
        this.user = response.data.user;
      } catch {
        this.user = null;
      } finally {
        this.loading = false;
      }
    },

  },
});
