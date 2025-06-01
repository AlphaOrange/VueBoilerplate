<!-- This creates a centered page on bigger screens -->

<template>
  <TheNavigation></TheNavigation>
  <div id="content">
    <slot></slot>
  </div>
</template>

<script>
import TheNavigation from "@/components/TheNavigation.vue";
export default {
  name: "ThePageLayout",
  components: {
    TheNavigation,
  },
};
</script>

<style scoped>
#content {
  width: 100%;
  min-height: calc(100dvh - var(--height-top-nav));
  max-width: 1280px;
  margin: var(--height-top-nav) auto 0;
  padding: 1em;
  background: var(--col-page-bg);
}
</style>
