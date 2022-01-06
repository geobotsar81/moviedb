<template>
    <div class="mainMenu" :class="menuClass">
        <div class="mainMenu__overlay"></div>

        <div class="mainMenu__content"></div>
        <ul class="mainMenu__primary">
            <li><inertia-link @click="closeMenu" :href="route('home')">Home</inertia-link></li>
            <li><inertia-link @click="closeMenu" :href="route('home')">Post a Free Job</inertia-link></li>
        </ul>
    </div>
</template>
<script>
import AppButton from "@/Shared/AppButton";
import { InertiaLink } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AppButton,
        InertiaLink,
    },
    data() {
        return {};
    },
    props: {
        menuClass: String,
    },
    emits: ["closeMenu"],
    methods: {
        closeMenu() {
            this.$emit("closeMenu");
        },
    },
};
</script>
<style lang="scss" scoped>
.mainMenu {
    position: fixed;
    z-index: $zindexMobileMenu;
    text-align: left;
    padding: 140px 30px;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    opacity: 1;

    .mainMenu__overlay {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background-color: $appBlack;
        opacity: 1;
        transform: scaleY(0);
        transform-origin: 0 0;
        transition-delay: 0.4s;
        transition: all 0.6s ease-out;
    }
    .mainMenu__content {
        transform: scale(1.15) translateY(-30px);
        opacity: 0;
        transition: transform 0.5s $cubic, opacity 0.6s $cubic;
        position: relative;
    }

    :deep(.button) {
        display: inline-block !important;
        padding: 5px;
    }

    ul.mainMenu__primary {
        margin-bottom: 0px;
        width: 100%;
        padding: 0px;

        li {
            list-style: none;
            display: block;
            padding: 10px 0px;
            transform: scale(1.15) translateY(-30px);
            opacity: 0;
            text-align: center;
            transition: transform 0.5s $cubic, opacity 0.6s $cubic;

            @for $i from 1 through $menuItems {
                &:nth-child(#{$i}) {
                    transition-delay: #{0.06 - ($i * 0.07)}s;
                }
            }

            &:last-child {
                border-bottom: 0px;
            }

            a {
                color: #fff;
                font-size: 24px;
                line-height: 46px;
                font-weight: 400;
                text-decoration: none;
                transition: $appTransition;
                display: block;
                width: 100%;

                &:hover,
                &:focus,
                &.active {
                    color: $appBlack2;
                }
            }

            .dropdown-toggle {
                position: relative;
                &:after {
                    content: "\f078";
                    font-family: "Font Awesome 5 Pro";
                    border: 0px;
                    position: absolute;
                    right: 0px;
                    top: 5px;
                    font-size: 14px;
                }

                &:hover,
                &:focus,
                &.active {
                    color: $appLightBlue;
                }
            }

            .dropdown-toggle[aria-expanded="true"] {
                &:after {
                    content: "\f077";
                }
            }
            .mainMenu__submenu {
                padding: 0px;
                li {
                    list-style: none;
                    display: block;
                    border-bottom: 0px;
                    padding: 10px 0px;

                    a {
                        font-size: 16px;
                        line-height: 18px;
                    }
                }
            }
        }
    }
}

.mainMenu.is-active {
    opacity: 1;
    pointer-events: all;
    .mainMenu__overlay {
        opacity: 1;
        pointer-events: all;
        transform: scaleY(1);
        transition-delay: 1s;
        transition: all 0.6s;
    }
    .mainMenu__content {
        transform: scale(1) translateY(0px);
        opacity: 1;
        transition-delay: #{0.07}s;
    }
    ul.mainMenu__primary {
        li {
            transform: scale(1) translateY(0px);
            opacity: 1;
            @for $i from 1 through $menuItems {
                &:nth-child(#{$i}) {
                    transition-delay: #{0.07 * $i + 0.2}s;
                }
            }
        }
    }
}

@media (max-width: 575.98px) {
    .mainMenu {
        padding: 100px 30px;
    }
}
</style>
