<p align="center">
<a href="https://getbootstrap.com" target="_blank"><img src="https://miro.medium.com/v2/resize:fit:400/1*onZhQJU7A3ab6V1sHfMRkQ.jpeg" height="150"></a>
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="150"></a>
<a href="https://laravel.com" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Sass_Logo_Color.svg/1200px-Sass_Logo_Color.svg.png" height="150"></a>

</p>

# Template for a Laravel 9.2 + SCSS + Boostrap 5.x
Template to generate a new standard and simple project using Laravel 9.2, Bootstrap 5.x and SCSS (SASS with SCSS Syntax).

## Steps to build another template just like this one:
- Edit `package.json`:
    - Update `laravel-vite-plugin` to version `^0.6.0`
    - Update `vite` to version `^3.0.0`
- Remove POSTCSS from our application `npm remove postcss`
- Execute `npm i`
- Install SASS `npm i --save-dev sass`
- Update both css file and folder to scss:
    - Rename `resources/css` into `resources/scss`
    - Rename `app.css` into `app.scss`
- Edit `vite.config.js` file:

            export default defineConfig({
                plugins: [
                    laravel({
                        input: [
                        'resources/scss/app.scss',
                        'resources/js/app.js',
                    ],
                    refresh: true
                }),
                ],

                resolve: {
                    alias: {
                        '~resources' : '/resources/',
                    }
                }
            });
- Add `import '~resources/scss/app.scss'` to `resources/app/js`
- Add `@vite('resources/js/app.js')` to the pages that want to implement it (layouts included, eventually)
- Add to `resources/app/js` this block of code to allow the correct renderization of our images

        import.meta.glob([
            '../img/**'
        ])
- Add `package-lock.json` to `.gitignore` file
- Install and configure Bootstrap:
    - Install both bootstrap and popperjs packages `npm i --save bootstrap @popperjs/core`
    - Add `const path = require('path')` at the beginning of our `vite.config.js` file
    - Add `'~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')` to our aliases by the end of our `vite.config.js` file
    - Add bootstrap js via import `import * as bootstrap from 'bootstrap';` to our `resources/app.js`
    - Add boostrap scss via @import `@import "~bootstrap/scss/bootstrap";` to our `resources/app.scss`


## Steps to use this project correctly:
- Open this repository and click on  `Use this template ---> Create a new repository`
- Clone the repository wherever you want to develop, e.g. `VS Code`, `VSCodium`, ecc.
- **Open** the cloned folder with a `terminal`
- Copy and paste the `.env.example` file and rename it into `.env` **without removing the `env.example` file**
- Run `composer install` to install all our composer packages
- Run `php artisan key:generate` to generate our custom application key
- Run `npm i` to install all our npm packages
- Run on two separeted terminals:
    - run `npm run dev` to build iteratively our front-end packages and code
    - run `php artisan serve` to build iteratively our back-end packages and code
- Start changing the world with your oustanding code!


## Steps to use unspash API key correctly
- Open https://unsplash.com/developers and register as new developer
- Once you register, you can scroll down, until you find the section called `Keys`

- Go Into the config folder
    - Copy and paste the `unsplashKey.example.php` file and rename it into `unsplashKey.php` **without removing the `unsplashKey.example.php` file**
    - Copy the Access Key and paste in the config called `unsplashKey.php`
        - (To solve the problem of too many elements, i had to reduce to a one second interval for each call, versus how many mockup beaches are desired)

- Once you are done with the api key, you can change the numbers of the elements in config `beachesData.php` ('elements')


- If you encounter en error and is looking like this
    `  cURL error 60: SSL certificate problem: unable to get local issuer certificate (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://api.unsplash.com/photos/random?client_id=wv51l-j4ExuKFvOVDJXCfnSR7zQajReJIDYnD5xWQiI&query=beach `. 
    
- **(Its expected, you can solve it by following this other steps):**

    - Download the `cacert.pem` file from the cURL website: https://curl.se/ca/cacert.pem
    - In MAMP FOLDER, you will need to put hte file in the right as where `php.ini` belong
        - Go to the conf and bin folder, select the right version folder of php you are using and put it in (REMEMBER FOR BOTH FOLDERS where php.ini is)
    - Next open only the `php.ini` from the bin folder
    - Search `;curl.cainfo`, unsign it by removing the ';', and ater you have to indicate the path for the certificate you put in the bin folder
        - **It should look like this`"path/to/cacert.pem"`**

- After all of this you can now seed properly the migration Database and enjoy the random images from unsplash
