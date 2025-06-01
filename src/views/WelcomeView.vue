<!-- This is the View shown to visitors that are not logged in -->

<template>
  <ThePageLayout>
    <template #default>
      <div>
        <h1>Welcome, Guest!</h1>
      </div>
    </template>
  </ThePageLayout>
</template>

<script>
import ThePageLayout from "@/layouts/ThePageLayout.vue";

export default {
  name: "WelcomeView",
  components: {
    ThePageLayout,
  },
};
</script>

<style scoped></style>
