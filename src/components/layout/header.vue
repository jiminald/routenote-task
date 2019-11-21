<template>
    <header class="fixed top-0 left-0 right-0 h-16 lg:h-20 bg-indigo text-white z-50">
        <nav class="flex w-full h-full items-center px-6 lg:px-8">
            <div class="self-start h-full inline-flex items-center justify-start">
                <!-- <svg version="1.1" viewBox="0 0 25 18" class="text-white mr-4 lg:mr-6 select-none cursor-pointer svg-icon" data-name="arrow-left" style="width: 24px; height: 24px;">
                    <g _fill="none" fill-rule="evenodd" fill-opacity="0" stroke-linecap="round" _stroke="#FFF" stroke-width="2">
                        <path pid="0" d="M8.764 1.253L1.075 9.035l7.689 7.185M2.44 9.093h21.257"></path>
                    </g>
                </svg> -->

                <a href="/" class="router-link-active">
                    <div class="logo" style="transform: scale(0.957707) translateX(-3.54286px);"><span class="p">P</span> <span class="u">U</span> <span class="s">S</span> <span class="h">H</span></div>
                </a>
            </div>
        </nav>
    </header>
</template>


<script>
export default {
    name: 'layout-header',
};
</script>

<style scoped>
.logo {
  font-weight: 800;
  text-decoration: none;
  color: #ffffff;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  position: relative;
  display: inline-block;
  font-size: 2.9375rem;
  width: 119px;
  height: 31px;
}
.logo .p {
  position: absolute;
  top: 15px;
  left: 4px;
}
.logo .u {
  position: absolute;
  top: 16px;
  left: 31px;
}
.logo .s {
  position: absolute;
  top: 15px;
  left: 64px;
}
.logo .h {
  position: absolute;
  top: 16px;
  left: 91px;
}
.logo span {
  transition: all .3s ease;
  display: inline-block;
  transform: rotate(15deg);
  line-height: 0;
}
.logo:hover span {
  transform: rotate(25deg);
}
.logo.for-mobile {
  color: #000000;
}
</style>
