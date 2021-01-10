<p align="center"><img src="https://lindacarlstad.se/img/logo.png"></p>

# Linda Carlstad

## Description
This app is used to handle the content on [Linda Carsltad](https://lindacarlstad.se) ([Github](https://github.com/Linda-Carlstad/lindacarlstad.se)). It is a fully custom CMS system using techniques like CRUD and MVC to handle objects and events. The main use of the web appcliation is to handle the yearly initatiation, by creating and handling the information published to [Linda Carsltad](https://lindacarlstad.se).

## Installation

#### - Unix
Follow the official Laravel documentation for a detailed walkthrough using any Unix system, like macOS or any distribution on Linux.

[Laravel documentation](https://laravel.com/docs/5.8/installation)

#### - Windows
Follow this excellent guide to run a Laravel project on your Windows based computer.

[Codementor guide](https://www.codementor.io/magarrent/how-to-install-laravel-5-xampp-windows-du107u9ji)


When steps above are done, do these steps to get going.

Install all composer dependencies: 
```
composer install
```

Copy and generate application key: 
```
cp .env.example .env
php artisan key:generate
```

Install all NPM dependencies: 
```
npm install
```

Create and seed database:
```
php artisan migrate:refresh --seed
```

Run the local development server: 
```
php artisan serve
```

## Usage
The website uses the information filled in using the custom-build CMS system, [Admin Linda Carlstad](https://github.com/Linda-Carlstad/admin.lindacarlstad.se). 

(add pictures of app)

## Contributing

Can also be found here - [Contributing to Linda Carlstad](https://github.com/Linda-Carlstad/admin-lindacarlstad.se/blob/master/CONTRIBUTING.md)

#### - Issues
- Screenshot the problem
- Open a new issue
- Give it a meaningful title
- Describe the issue clearly
- Upload the screenshot
- Add useful labels
- Submit issue

#### - Coding
- See the [issue list](https://github.com/Linda-Carlstad/lindacarlstad.se/issues)
- Assign yourself to an issue
- Open a new branch
- Create your _beautiful_ code
- Create a pull request

## Software
Recommended apps to get going fast:
- Atom/Sublime/PHPStorm
- MAMP
- Sequal Pro
- Google Chrome/Mozilla FireFox
- Sketch (design tool)

## Credits
Special thanks to [Felix Wetell](https://github.com/felixwetell), and Linda Carlstad It-committee 2018/2019 for creating this custom CMS.
