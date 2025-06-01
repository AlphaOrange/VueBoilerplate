<template>
  <TheCenterLayout>
    <TabbedPanel :tabs="tabs" />
  </TheCenterLayout>
</template>

<script>
import TheCenterLayout from "@/layouts/TheCenterLayout.vue";
import TabbedPanel from "@/components/TabbedPanel.vue";
import { markRaw } from 'vue';
import LoginForm from "@/components/LoginForm.vue";
import RegisterForm from "@/components/RegisterForm.vue";

export default {
  name: "AuthView",
  components: {
    TheCenterLayout,
    TabbedPanel,
  },
  data() {
    return {
      tabs: [
        { label: "Login", component: markRaw(LoginForm) },
        { label: "Register", component: markRaw(RegisterForm) },
      ],
    };
  },
};
</script>

<style scoped>
</style>
