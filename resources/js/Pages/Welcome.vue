<template>
    <Head title="Welcome" />
    <the-main id="main">
        <div class="container">
            <div class="row">
                <div class="col-12"><h1>Welcome to TheMovieDB</h1></div>
            </div>

            <div class="row" v-if="searching">
                <div class="col-12"><img src="img/LoaderIcon.gif" /></div>
            </div>

            <div class="mt-4" v-if="movies && !searching">
                <div v-for="(movie, index) in movies" :key="index">
                    <app-movie :movie="movie" source="home"></app-movie>
                </div>

                <app-pagination :currentPage="currentPage" :links="links" v-model="currentPage" />
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
import AppMovie from "@/Shared/AppMovie";
import AppPagination from "@/Shared/AppPagination";

export default defineComponent({
    components: {
        Head,
        Link,
        AppLayout,
        TheMain,
        AppMovie,
        AppPagination,
    },
    layout: AppLayout,
    mounted() {
        this.getMovies();
    },
    data() {
        return {
            movies: null,
            links: null,
            currentPage: 1,
            search: null,
            searching: false,
        };
    },
    methods: {
        searchMovies() {
            this.currentPage = 1;
            this.getMovies();
        },
        getMovies() {
            this.searching = true;
            axios({
                method: "post",
                url: route("movies.paginated"),
                data: {
                    page: this.currentPage,
                    search: this.search,
                },
            })
                .then((response) => {
                    this.movies = response.data.data;
                    this.links = response.data.links;
                    this.searching = false;
                })
                .catch((error) => {
                    this.searching = false;
                });
        },
    },
    watch: {
        currentPage(newData, oldData) {
            this.getMovies();
        },
    },
});
</script>
