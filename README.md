## Mmereki-Traders
Mmereki Traders is a web system that aims to help home owners find tradespeople like plumbers, electricians and painters in their area. The system allows tradespeople to create an account and add details about their trades, including line of work, areas covered, years of experience and qualifications amongst others, on their public profile. A homeowner then searches the database for a particular tradesperson when in need. It works like an online yellow pages of a telephone directory. 

## Project Status
<p align="center">
<img src="https://img.shields.io/badge/development-Slow Development-orange" alt="development status"/>
</p>

## Technology Used
This system was made using the Laravel framework, a php framework for web system development and these technologies.


|Technology       |Description   |
|:---------------:|:------------:|
| <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="120"></a> | Laravel Framework v8.x |
| <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a> | PhP v7.3.0 |
| <a href="https://nodejs.org" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/nodejs/nodejs-original-wordmark.svg" alt="nodejs" width="80"/> </a>| Nodejs v14.16|
| <a href="https://tailwindcss.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="tailwind" width="40" height="40"/> </a> | Tailwind CSS v2.2.16 |
| <a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> | MySQL Database |
| <a href="https://vuejs.org/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original-wordmark.svg" alt="vuejs" width="40" height="40"/> </a> | Vuejs v3.2.19 |

## Requirements
If you intend to make additions to this project you need to meet the following (Minimum requirements):
- Php V7.3.0 
- Composer V2.0.11
- Node V14.16.0

## Architecture & Directories
This project's architecture follows the Laravel framework architecture and directory structure that can be [found here](https://laravel.com/docs/8.x/structure)

## Local Configuration
- Download and unzip the project
- If you have Visual Studio Code IDE you can use its built-in command processor by clicking `Terminal`->`New Terminal` on top ribbon menu
- Otherwise fire up your console app *(e.g command prompt on windows)* and navigate to the project folder 
- Install the necessary packages by running `npm i` command
- Compile the javascript & css by running `npm run dev`
- Serve the application by using the artisan command `php artisan serve`
- Navigate to http://localhost:8000 to view it
- In order to create accounts and log in you will need a database. I uses xampp for that and configured it in the .env file in the project dir

## Testing
In order to test the app you can use Laravel built in testing:
- Create your test file from the commandline e.g. `php artisan make:test MyTest` 
- To run the tests you can use the `php artisan test` command
- An `ExampleTest.php` file exists in the `\tests\` directory of the app to help you get started

Visit the [Laravel documentation on testing](https://laravel.com/docs/8.x/testing) to learn more

## Possible Improvements
- Aesthetics
- Search optimization *(of the internal app search engine)*
- Admin Metrics like data visualization, customer journey mapping

## Support & Contribution
Contributions are welcome. Please contact me to give me a heads-up and to agree on code standard and conventions. I am very particular on readable and consice code practices.

## Evolution
At the moment, this system is a basic search engine page, results page where the paginated list of tradespeople are shown, a details page for further information on the tradesperson along with authentication pages and some pages for the logged in tradespeople. A minimum working prototype.

This app is intended to be a fully fledged community of tradespoeple and homeowners and will include:

- Job Board (where users post a specific job to be done)
- Quoting system
- Instant messaging
- Payment processing
- Invoice issuing and reconciliation
- Blog 


## License
This project is under the [GNU Affero General Public License v3.0](https://choosealicense.com/licenses/agpl-3.0/)
