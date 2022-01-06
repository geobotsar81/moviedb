<template>
    <div>
        <the-menu @close-mobile-menu="closeMenu" :menuClass="showMobileMenu ? 'is-active' : ''"></the-menu>
        <the-header @toggle-mobile-menu="burgerIsClicked" :headerIsActive="showMobileMenu"></the-header>
        <slot />
        <the-footer></the-footer>
    </div>
</template>

<script>
import TheHeader from "@/Shared/TheHeader";
import TheFooter from "@/Shared/TheFooter";
import TheMenu from "@/Shared/TheMenu";

export default {
    components: {
        TheHeader,
        TheFooter,
        TheMenu,
    },
    mounted() {
        this.loading = false;
    },
    data() {
        return {
            loading: true,
            showMobileMenu: false,
        };
    },
    methods: {
        burgerIsClicked(menuIsOpen) {
            this.showMobileMenu = menuIsOpen;
        },
        closeMenu() {
            this.showMobileMenu = false;
        },
    },
};
</script>
