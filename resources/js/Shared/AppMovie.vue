<template>
    <div class="row align- align-items-center movie">
        <div class="col-sm-2">
            <img v-if="movie.image" height="120" :src="publicUrl + '/' + movie.image" />
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-12 movie__title">{{ movie.title }} - {{ movie.year }}</div>
            </div>
            <div class="row" v-if="movie.user">
                <div class="col-12 movie__owner">by {{ movie.user.name }}</div>
            </div>
        </div>
        <div class="col-sm-6 movie__links">
            <inertia-link :href="route('movies.show', movie.id)"> View </inertia-link>
            <span v-if="loggeInUser && loggeInUser.id == movie.user_id && source != 'home'">
                | <inertia-link :href="route('movies.edit', movie.id)"> Edit </inertia-link> | <inertia-link method="post" :href="route('movies.destroy', movie.id)"> Delete </inertia-link>
            </span>
        </div>
    </div>
</template>
<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
export default {
    components: { InertiaLink },
    props: {
        movie: Object,
        source: String,
    },
    data() {
        return {
            loggeInUser: this.$page.props.user,
            publicUrl: this.$page.props.publicUrl,
        };
    },
};
</script>
<style lang="scss" scoped>
.movie {
    padding: 10px 0px;
    img {
        padding-right: 10px;
        border: solid 1px $appGrey;
        padding: 0px;
    }
}
.movie__links {
    text-align: right;
}
.movie__title {
    font-weight: 700;
}
.movie__owner {
    font-style: italic;
    font-size: 14px;
}
@media (max-width: 575.98px) {
    .movie,
    .movie__links {
        text-align: center;
    }
}
</style>
