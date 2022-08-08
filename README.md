# Laravel admin

## Laravel framework 8.83.0 + Jetstream + Livewire

(Possibility of changing the localization to the Spanish language)

---

Manage

- Users
- Roles
- Permissions
- Modules
- Companies

Assign:

- Permissions to roles
- Roles to users
- Companies to users
- Modules to companies

## Starting

1. ``npm install`` (if necessary).
2. Create the database in your environment.
3. Configure the database parameters in <mark>.env</mark> file
4. ``php artisan migrate --seed`` (migrates databases and creates admin user)
5. ``php artisan migrate:refresh --seed`` (refresh migrations if necessary)
6. ``npm run dev`` (development) or ``npm run prod`` (production)
7. ``php artisan serve`` (start server)

Admin email/login: admin@example.com | Password: 12345678

## Change locale to Spanish

In <mark>config/app.php</mark> file, set the parameter <mark>locale</mark> to <mark>es_ES</mark>.

'locale' => 'es_ES'

## Previews

|||
|-|-|
|![](https://www.oxterisk.com/wp-content/uploads/2022/08/users.jpeg)|![](https://www.oxterisk.com/wp-content/uploads/2022/08/user-form.jpeg)|
