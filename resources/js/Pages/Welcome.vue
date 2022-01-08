<template>
    <Head title="Welcome" />
    <the-main id="main">
        <div class="container">
            <div class="row">
                <div class="col-12"><h1>Welcome to TheMovieDB</h1></div>
            </div>
            <div class="row mt-4" v-if="$page.props.user">
                <div class="col-12">
                    Welcome <strong>{{ $page.props.user.name }}</strong
                    >! <inertia-link :href="route('dashboard')">Visit your Dashboard</inertia-link> to manage your movies
                </div>
            </div>
            <div class="row mt-4" v-else>
                <div class="col-12"><inertia-link :href="route('login')">Login</inertia-link> or <inertia-link :href="route('register')">Register</inertia-link> to start adding your movies</div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-8">
                    <label for="searchMovies">Search movies</label>
                    <input
                        id="searchMovies"
                        @change="searchMovies"
                        type="text"
                        v-model="searchFilter"
                        class="form-control searchMovies"
                        placeholder="Search Movie DB(Type your query and press enter)"
                    />
                </div>
                <div class="col-sm-4">
                    <label for="sortMovies">Sort movies by</label>
                    <select id="sortMovies" @change="searchMovies" v-model="sortFilter" class="form-select" aria-label="Sort movies by">
                        <option value="1" selected>Movie year</option>
                        <option value="2">Date added</option>
                        <option value="3">Title</option>
                    </select>
                </div>
            </div>
            <div class="row" v-if="searching">
                <div class="col-12"><img src="img/LoaderIcon.gif" /></div>
            </div>
            <div class="mt-4" v-if="movies && !searching">
                <div v-for="(movie, index) in movies" :key="index">
                    <app-movie :movie="movie" :count="index" source="home"></app-movie>
                </div>
                <app-pagination :currentPage="currentPage" :links="links" v-model="currentPage" />
            </div>
        </div>
    </the-main>
</template>

<style scoped></style>

<script>
import { defineComponent } from "vue";
import { Head, InertiaLink } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout";
import TheMain from "@/Shared/TheMain";
import AppMovie from "@/Shared/AppMovie";
import AppPagination from "@/Shared/AppPagination";

export default defineComponent({
    components: {
        Head,
        InertiaLink,
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
            searchFilter: null,
            sortFilter: 1,
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
                    search: this.searchFilter,
                    sort: this.sortFilter,
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
<style lang="scss" scoped>
.searchMovies {
    width: 100%;
}
label {
    font-size: 14px;
}
</style>
