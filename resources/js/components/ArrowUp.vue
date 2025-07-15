<template>
    <div class="arrow-up" @click="scrollToTop">
 <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="w-6 h-6"
    >
        <path
        fill-rule="evenodd"
        d="M12 3a1 1 0 01.707.293l7 7a1 1 0 01-1.414 1.414L13 6.414V20a1 1 0 11-2 0V6.414l-5.293 5.293a1 1 0 01-1.414-1.414l7-7A1 1 0 0112 3z"
        clip-rule="evenodd"
        />
    </svg>
    </div>
</template>

<script>
export default {
  name: 'ArrowUp',
  methods: {
    scrollToTop() {
      this.$lenis.scrollTo(0, {
        offset: 0,
        immediate: false,
        duration: 1.2, 
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
      });
    }
  }
}
</script>



<style scoped>
.arrow-up{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #000000;
    color: #ffffff;
    border-radius: 50%;
    padding: 10px;
    cursor: pointer;
    z-index: 1000;
}

</style>
