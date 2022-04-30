## Step by Step


clone project

```bash
git clone https://ramon-oestreich@bitbucket.org/ramon-oestreich/netgocio-test.git
```

Enter the project folder

```bash
cd netgocio-test
```

Install dependencies

```bash
composer i or composer install
```

```bash
npm i or npm install
```

Set variables

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

Sample Setup Variables Database
```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=root
```
Run to populate the database
```bash
php artisan migrate

```
To build the Vue page
```bash
npm run watch
```
Up server 

```bash
php artisan serve
```


go to the root of the page 
```bash
http://127.0.0.1:8000
```
