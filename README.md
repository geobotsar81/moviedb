# TheMoviedDB

## Development Steps

Find below a list of the steps followed while developing this project

Day 1 (~ 2 hours)

-   Created new Laravel project.
-   Installed Jetstream(with VueJs and InertiaJs) for the authentication scaffolding.
-   Installed Bootstrap and created global styles in resources/css.
-   Modified webpack.mix.
-   Styled Jetstream components with Bootstrap, removed tailwind classes.

Day 2 (~ 7 hours)

-   Created Model for movies.
-   Created migration for movies.
-   Created resource Controller for movies.
-   Created routes for movies.
-   Setup Dashboard component.
-   Created Create Movie component in Pages, for adding a new movie.
-   Created StoreMovieRequest class.
-   Created MovieRepository class to handle any database requests related to Movies.
-   Created Index Movie component in Pages, for displaying a user's movies.
-   Created AppMovie component in Shared, for displaying a single movie.
-   Added axios call to Welcome component to load all movies.
-   Created Show Movie component in Pages, for displaying a movie.
-   Created Edit Movie component in Pages, for editing a movie.
-   Added delete movie functionality.

## Files location

-   Styles: resources/css.
-   Vue components: resources/js/Pages && resources/js/Shared.
-   Movie controller: app/Http/Controllers/MovieController.php
-   Movie Requests classes: app/Http/Requests
-   Movie Repositories classes: app/Repositories

## Enchancements

-   Add tests.
-   Add CI/CD.
-   Add factories and seeders.
-   Add translations for text strings in component
-   Style all Jetstram components.
-   Add Policies for User Movies
-   Add Caching with Redis
