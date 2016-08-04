# Popular PHP Repositories on GitHub

I implemented this using a vanilla Laravel app along with the knplabs/github-api library to simplify interacting with the Github API.  On a larger app you would obviously want to create controllers, but for the sake of simplicity I just coded the required logic directly in app/Http/routes.php.  Follow these instructions to run the app:

1. Create a new MySQL database for this project and a user that has full access to it.
1. Copy `.env.example` to `.env`.
1. Edit `.env` to include your MySQL details (likely just `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`).
1. Run `composer install`.
1. Run `php artisan key:generate`.
1. Run `php artisan migrate`.  This creates the necessary table in the database.
1. Run `php artisan serve`.
1. Browse to [http://localhost:8000].
1. Click the button to populate the list.
1. Click any item in the list to view it's details.