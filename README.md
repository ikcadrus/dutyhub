![Logo](img/logo/logo.png)


https://github.com/ikcadrus/todo-list/assets/47397677/74a393a5-7de9-4ac6-965b-c7a0b574c2ac


# DutyHub 



DutyHub is a web application that integrates three key functions, providing users with comprehensive tools to manage their daily duties, schedules, and access to current weather forecasts.

## Features 

### Adding Dutiees
- Adding duties with the date of addition and priority (low, medium, and high).

### Sorting Duties
- Sorting duties by:
  - From A to Z,
  - From Z to A,
  - By check,
  - By priority,
  - By default, according to the date of addition.

### Calendar
- Calendar for checking dates.

### Weather Forecast
- Weather forecast for a given location:
  - Future temperatures within 24 hours,
  - Next 4 days.

### Customization
- Changing the language and page color.

### Sign Up
- Registration combined with validation and reCAPTCHA v3.

### Sign In
- Login with "remember me" and "forgot password" features.

## Installation Process

The contents of the application should be in a folder named todo-list

- Install XAMPP tool version 3.3.0.
- Place the application folder in the XAMPP tool directory named htdocs (\xampp\htdocs).
- Launch the XAMPP tool.
- Click the start button for both the Apache and MySQL modules.
- Open your web browser and type localhost/phpmyadmin in the address bar.
- Click the Import button.
- Choose the dutybase.sql file from the database folder located in the application directory.
- Click the Import button at the bottom.
- Enter localhost/todo-list in the address bar.

## Technologies

- HTML5
- CSS3
- JS ES2023
- Bootstrap 5.3
- PHP 8.2.4

## API Reference

### OpenWeatherMap
#### Open weather.js

```

  const apiKey = "";

```

| Parameter | Description               |
| :-------- | :-------------------------|
| `apiKey` | **Required**. Your API key |

To create a key, go to https://openweathermap.org/api/one-call-3 and do the steps in how to start

### reCAPTCHA
#### Create secret.php

``````php
<?php
$key = '';
``````


| Parameter | Description                |
| :-------- | :------------------------- |
| `key`     | **Required**. Your API key |

To create a key, go to https://www.google.com/recaptcha/admin/create, choose reCAPTCHA v3 and add to domain:

```

  localhost

```
