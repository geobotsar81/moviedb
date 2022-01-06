<template>
    <header class="header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-10 col-lg-4">
                    <Link :href="route('home')" class="logo"> TheMovieDB </Link>
                </div>
                <div class="col-2 col-lg-8 text-end mt-2 mt-md-0">
                    <div>
                        <Link v-if="$page.props.user" :href="route('dashboard')"> Dashboard </Link>

                        <template v-else>
                            <Link :href="route('login')" class="pe-2"> Log in </Link>

                            <Link :href="route('register')"> Register </Link>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },
    data() {
        return {};
    },
    props: {},
};
</script>

<style lang="scss" scoped>
.header {
    padding: 25px 45px;
    position: fixed;
    width: 100%;
    left: 0;
    top: 0;
    transition: $appTransition;
    z-index: $zindexHeader;
    border-bottom: 1px solid $appLightGrey2;
    background-color: #fff;

    a {
        color: $appRed;
    }

    .logo {
        font-size: 16px;
        font-weight: 700;
    }
}
</style>
