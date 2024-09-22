# Car Rental 

Cloud link : https://wbt2223-5-am.appspot.com/

This repository contains a CodeIgniter project for a car rental system. The project allows users to view available cars, rent cars, manage their profile and allows admin to create new cars, and manage user profiles and manage cars.

GitLab link : https://gitlab.ujaen.es/WebTeam5/RentingCars.git

## Installation
1. Clone the repository: https://gitlab.ujaen.es/WebTeam5/RentingCars.git
2. Navigate to the project directory: cd RentingCars
3. Install dependencies using Composer: composer install
4. Configure the server connection and database connectionby editing the .env file.
5. Import the database schema from webapp.sql into your MySQL database.
6. Start the development server: php spark serve
7. Access the application in your browser at http://localhost:8080

## Usage
Homepage: Access the homepage at the root URL / to search for available cars.
#### User Management:

Register: Visit /register to create a new user account.

Login: Access /login to log in to the application.

User Profile: Navigate to /user/profile to view and update the user profile.

Edit User Profile: Use the route /user/edit/{email} to edit the profile for a specific user. (Admin only)

User List: Visit /user to retrieve a list of all users.(Admin only)

Delete User: Send a POST request to /user/delete with the appropriate parameters to delete a user.(Admin only)

#### Car Management:
Car List: Access /car to retrieve a list of all cars. (Admin only)

Car Details: Use the route /car/detail/{car_id} to view the details of a specific car.

Create Car: Visit /car/create to create a new car.(Admin only)

Delete Car: Send a POST request to/car/delete/{car_id} to delete a car.(Admin only)

#### Car Rental:

Check Car Availability: Access /car/rent to check the availability of cars for rent.

Rent Car: Send a POST request to /car/rent/{car_id} to rent a specific car.