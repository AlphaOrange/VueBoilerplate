<template>
  <div class="tabbed-panel">
    <div class="tabbed-panel-menu pure-menu pure-menu-horizontal">
      <ul class="pure-menu-list">
        <li
          v-for="(tab, index) in tabs"
          :key="index"
          class="pure-menu-item"
        >
          <a
            href="#"
            class="pure-menu-link"
            :class="{ active: activeTab === index }"
            @click.prevent="activeTab = index"
          >
            {{ tab.label }}
          </a>
        </li>
      </ul>
    </div>
    <div class="tabbed-panel-content">
      <keep-alive>
        <component :is="tabs[activeTab].component" />
      </keep-alive>
    </div>
  </div>
</template>

<script>
export default {
  name: "TabbedPanel",
  props: {
    tabs: {
      type: Array,
      required: true,
      // Each tab: { label: String, component: Component }
    },
  },
  data() {
    return {
      activeTab: 0,
    };
  },
};
</script>

<style scoped>
</style>
