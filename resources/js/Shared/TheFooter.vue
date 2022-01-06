<template>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12"><h2>TheMovieDB</h2></div>
            </div>
        </div>
    </footer>
</template>
<script>
import AppButton from "@/Shared/AppButton";

export default {
    emits: ["initialised"],
    components: {
        AppButton,
    },
    data() {
        return {};
    },
};
</script>
<style lang="scss" scoped>
.footer {
    padding: 60px 0px 20px 0px;
    color: #fff;
    background-color: $appBlack;
    min-height: 200px;
    text-align: center;

    h2 {
        color: #fff;
        font-size: 80px;
        font-weight: 700;
    }
}
</style>
