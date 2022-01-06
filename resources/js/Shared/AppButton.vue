<template>
    <a v-if="type === 'external'" :href="link" :class="cls" target="_blank"><slot /></a>

    <button v-else-if="type === 'submit'" :class="cls">
        <slot />
    </button>

    <inertia-link v-else :href="link" :class="cls">
        <slot />
    </inertia-link>
</template>
<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";

export default {
    components: {
        InertiaLink,
    },
    props: {
        cls: {
            type: String,
            required: false,
        },
        link: {
            type: String,
            required: false,
        },
        type: {
            type: String,
            required: false,
        },
    },
};
</script>
<style lang="scss" scoped>
.buttonBlack {
    display: inline-block;
    font-weight: 700;
    font-style: normal;
    font-size: 14px;
    color: $appBlack;
    border-radius: 4px;
    padding: 15px 40px;
    transition: all 0.4s ease-out;
    background-color: #ffffff;
    text-decoration: none;
    border: solid 1px $appBlack;

    &:hover,
    &:focus {
        color: #ffffff;
        background-color: $appBlack;
        text-decoration: none;
        outline: none;
        box-shadow: none;
    }

    i {
        font-size: 12px;
        padding: 0px 5px;
    }
}

@media (max-width: 991.98px) {
}
</style>
