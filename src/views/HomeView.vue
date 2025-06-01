<template>
  <ThePageLayout>
    <template #default>
      <div>
        <h1>Welcome, {{ username }}</h1>
      </div>
    </template>
  </ThePageLayout>
</template>

<script>
import ThePageLayout from "@/layouts/ThePageLayout.vue";
import { useAuthStore } from "@/store/auth";

export default {
  name: "HomeView",
  components: {
    ThePageLayout,
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    username() {
      return this.auth.user?.username || 'Guest';
    },
  },
};
</script>

<style scoped></style>
