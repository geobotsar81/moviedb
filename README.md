# TheMoviedDB

## Project Summary

A simple movie database using Laravel 8, Vue 3 and InertiaJs. Authentication scaffolding using Jetstream along with CRUD functionality for users to manage their movies.

Demo at <a href="https://themoviedb.george-botsaris.com" target="_blank">https://themoviedb.george-botsaris.com</a>.

## Project files

-   Global Styles: resources/css/app.scss.
-   Vue components: resources/js/Pages && resources/js/Shared && resources/js/Layouts.
-   Movie Routes: routes/web.php.
-   Movie Model: app/Models/Movie.php.
-   Movie Controller: app/Http/Controllers/MovieController.php.
-   Movie Repository: app/Repositories/MovieRepository.php.
-   Movie Requests: app/Http/Requests.
-   Movie Policy: app/Policies/MoviePolicy.php.
-   Movie Factory: database/Factories/MovieFactory.php.
-   Movie Seeder: database/Seeders/MovieSeeder.php.

## Development Steps

Find below a list of the steps followed while developing this project

Session 1 (~ 2 hours)

-   Created new Laravel project.
-   Installed Jetstream(with VueJs and InertiaJs) for the authentication scaffolding.
-   Installed Bootstrap and created global styles in resources/css.
-   Modified webpack.mix.
-   Styled Jetstream components with Bootstrap, removed tailwind classes.

Session 2 (~ 8 hours)

-   Created Model for movies.
-   Created migration for movies.
-   Created resource Controller for movies.
-   Created routes for movies.
-   Setup Dashboard component.
-   Created Create Movie component in Pages, for adding a new movie. Added store functionality.
-   Created StoreMovieRequest class.
-   Created MovieRepository class to handle any database requests related to Movies.
-   Created Index Movie component in Pages, for displaying a user's movies.
-   Created AppMovie component in Shared, for displaying a single movie.
-   Added axios call to Welcome component to load all movies.
-   Created Show Movie component in Pages, for displaying a movie.
-   Created Edit Movie component in Pages, for editing a movie. Added update functionality.
-   Added delete movie functionality.
-   Added search and sort capabilities in Welcome component.
-   Created Policy for movies and registered in AuthServiceProvider. Connected with Edit, Update and Delete movie.
-   Generated favicons

Session 3 (~ 2 hours)

-   Created Movie Factory.
-   Created Movie Seeder, seeded 10 users with 10 movies each.
-   Created subdomain, connected with github, setup project and database.
-   Update enchancements list.

## Enchancements

-   Add Caching with Redis.
-   Move business logic from Controller to a Service class.
-   Add tests.
-   Setup Docker container.
-   Add CI/CD.
-   Setup Sentry for error logging and performance monitoring.
-   Hash ids in urls.
-   Setup user friendly urls for movies(containing the title).
-   Handle meta tags and og tags.
-   Check email deliverability and style email templates.
-   Setup translations for text strings in components.
-   Style all Jetstream components.
-   Create a search engine with ElasticSearch.
-   Add Voyager CMS for admin purposes.
