<!-- This uses the whole screen for content -->

<template>
  <TheNavigation></TheNavigation>
  <div id="content">
    <slot></slot>
  </div>
</template>

<script>
import TheNavigation from "@/components/TheNavigation.vue";
export default {
  name: "TheFullLayout",
  components: {
    TheNavigation,
  },
};
</script>

<style scoped>
#content {
  margin: var(--height-top-nav) 0 0;
  padding: 1em;
  background: var(--col-page-bg);
}
</style>
