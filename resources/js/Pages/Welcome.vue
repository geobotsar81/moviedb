<template>
    <Head title="Welcome" />
    <the-main id="main">
        <div class="container">
            <div class="row">
                <div class="col-12"><h1>Welcome to MovieDB</h1></div>
            </div>
        </div>
    </the-main>
</template>

<style scoped></style>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout";
import TheMain from "@/Shared/TheMain";

export default defineComponent({
    components: {
        Head,
        Link,
        AppLayout,
        TheMain,
    },
    layout: AppLayout,
    props: {},
});
</script>
