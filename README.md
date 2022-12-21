<a name="readme-top"></a>

<br />
<div align="center">

  <h3 align="center">Yoripe Test Backend</h3>

</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
         <li><a href="#documentation-for-api-endpoints">Documentation for API Endpoints</a></li>
      </ul>
    </li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

This about test for backend developer using Laravel v9 from task link for details  [Test Guidence](docs/LaravelDeveloperTest(Updated).pdf)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

This section should list any major frameworks/libraries used to bootstrap your project. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.

* [![Php][PHP 8.0+][https://php.net]
* [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Prerequisites

You will need the following software installed in your machine.
* PHP
  ```sh
  PHP 8.0 or Higher
  ```
### Installation Server

1. Generate protobuf server
   ```sh
          protoc --proto_path=protobuf \
        --php_out=protobuf/build \
        --grpc_out=protobuf/build \
        --plugin=protoc-gen-grpc=/usr/bin/protoc-gen-php-grpc \
        protobuf/src/protoService.proto
   ```
2. If you have database you can migrate
   ```sh
   php artisan migrate
   ```
   or migrate:fresh if you want from empty data
   ```sh
   php artisan migrate:fresh
   ```
3. If you want to use fake data for testing, continue this step 7
   ```sh
   php artisan db:seed -- UserSeeder  //for load data user admin@admin.com pass password
   ```

4. Symlink your server and client 
   ```sh
   ln -s {directory}/grpc-server/protobuf {directory}/grpc-client/
   ```
5. Execute roadrunner
    ```sh
    ./rr serve
    ```


### Installation Client

_Below is an example of how you can instruct your audience on installing and setting up your app. This template doesn't rely on any external dependencies or services._

1. Clone the repo
   ```sh
   git clone https://gitlab.com/hendradarisman1/arrow-test.git
   ```
3. Install with Composer
   ```sh
   composer install
   ```
4. Create file .env or copy other env prod, stagging, dev
   ```sh
   cp .env_example .env 
   ```
   Use editor your favorite. If you edit using nano, please follow like this :

   ```sh
   nano .env //change any fields like database, key and others
   ```
5. Running your Project
   ```sh
   php artisan serve
    ```
   Open browser/postman and write this address
   
   ```sh
   http://127.0.0.1:8000/
   ```
   
<p align="right">(<a href="#readme-top">back to top</a>)</p>


<a name="documentation-for-api-endpoints"></a>
## Documentation for API Endpoints

All URIs are relative to *http://127.0.0.1:8000*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*yoripeApi* | [**Local**](docs) | **POST** /v1/api/user | Call all function user [local]
*yoripeApi* | [**Dev/Sandbox**](docs) | **POST** /sandbox/yoripeApi/{id}/file/{fileName} | This example standard for sandbox/dev
*yoripeApi* | [**Beta**](docs) | **PUT** /beta/yoripeApi/{id | This example standard for beta
*yoripeApi* | [**Prod**](docs) | **DELETE** /yoripeApi/{id} | This example standard for Production


Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*userApi* | [ **POST** | /v1/api/user | param = id
*loginApi* |  [ **POST** | /v1/api/login | param = email password 
*registerApi* | [ **POST** | /v1/api/register | param = email password name



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Hendra Darisman - [@Whatsapp](https://wa.me/6289656307984) - hendradarisman34@gmail.com

<p align="right">(<a href="#readme-top">back to top</a>)</p>



