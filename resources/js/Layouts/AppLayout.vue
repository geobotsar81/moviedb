<template>
    <div>
        <the-header></the-header>
        <slot />
        <the-footer></the-footer>
    </div>
</template>

<script>
import TheHeader from "@/Shared/TheHeader";
import TheFooter from "@/Shared/TheFooter";

export default {
    components: {
        TheHeader,
        TheFooter,
    },
    mounted() {
        this.loading = false;
    },
    data() {
        return {};
    },
    methods: {},
};
</script>
