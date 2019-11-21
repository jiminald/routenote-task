<template>
    <aside class="fixed z-40 left-0 top-0 bottom-0 mt-16 lg:mt-20 bg-indigo-10 shadow-table lg:border-r border-indigo-25 !w-menu !p-8" visible="visible" update="function(t){for(var n in t)e[n]=t[n]}">
        <div class="py-4 first:pt-0 border-b border-indigo-75" value="true" showsidebar="true">
            <h6 class="mb-2 leading-none nofix">
                Overview
            </h6>
            <div class="">
                <a href="/" class="group relative flex w-full items-center text-indigo-75 text-base font-bold leading-none no-underline cursor-pointer transition py-3 hover:text-indigo text-left" value="true" showsidebar="true">

                    <svg version="1.1" viewBox="0 0 25 21" class="svg-icon" data-name="dashboard" style="width: 24px; height: 24px;">
                        <path pid="0" _fill="none" _stroke="#293583" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M12.6 6.7v8.7M1 12h3.3M21 12h3.3M3.4 4.8L6 7.4M12.6.4v3.3M20.9 3.8l-2.7 2.6M15.4 18h7.4c1-1.8 1.6-3.8 1.6-6 0-6.6-5.4-12-12-12S.4 5.4.4 12c0 2.2.6 4.2 1.6 6h7.8"></path>
                        <path pid="1" d="M6.8 17.7c0-3.1 2.6-5.7 5.7-5.7s5.7 2.6 5.7 5.7" _fill="none" _stroke="#293583" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></path>
                        <circle pid="2" cx="12.6" cy="18.4" r="2.6" _fill="none" _stroke="#293583" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></circle>
                    </svg>

                    <span class="ml-4">
                        Search
                    </span>
                </a>
            </div>
        </div>

        <div class="static md:absolute bottom-0 left-0 right-0 text-2xs mt-6 mb-6 lg:mb-8">
            <div class="flex w-full items-center justify-center text-center mb-2">
                <a href="/terms-and-conditions" class="text-indigo-75 px-3">Terms &amp; Conditions</a>
                <a href="/privacy-policy"class="text-indigo-75 px-3">Privacy Policy</a>
            </div>
            <div class="flex w-full items-center justify-center text-center text-indigo-50"><span>© Push 2019</span></div>
        </div>
    </aside>
</template>


<script>
export default {
    name: 'layout-sidebar',
};
</script>

<style scoped>
</style>
