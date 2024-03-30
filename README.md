# Laravel Project: People, Countries, and Bicycles Management

This Laravel project serves as a comprehensive management system for storing information about people, countries, and bicycles. It includes functionalities to manage these entities efficiently and seamlessly. To facilitate the user experience, a Faker library is integrated, generating realistic fake data for ease of testing and demonstration purposes.

## Features:

- **People Management:** Allows for the creation, update, and deletion of individual profiles, including their personal details.
- **Country Management:** Provides functionalities to manage information related to countries, facilitating data organization and categorization.
- **Bicycle Management:** Enables the storage and management of bicycle-related information, such as model, color, and ownership details.
- **Faker Integration:** Offers the capability to generate fake data seamlessly, aiding in testing and populating the database with representative information.

## Getting Started:

To run the project locally and set up the necessary dependencies, follow these steps:

1. **Clone Repository:**
   ```
   git clone <repository_url>
   ```

2. **Install Composer Dependencies (Vendor):**
   ```
   composer install
   ```

3. **Install NPM Dependencies (Node Modules):**
   ```
   npm install
   ```

4. **Create Database:**
   Create a MySQL database named "bikes".

5. **Migrate Database:**
   ```
   php artisan migrate:fresh --seed
   ```
   This command will create the necessary tables in the database and populate them with fake data using seeders.

6. **Run the Website:**
   ```
   php artisan serve
   ```
   This command starts the Laravel development server, allowing you to access the project through a web browser.

Now, you can navigate to `http://localhost:8000` (or the URL provided by the `php artisan serve` command) to access and interact with the Laravel project. Explore the functionalities for managing people, countries, and bicycles seamlessly.

## CRUD Operations:

### People:

- **Create:** Allows adding a new person profile with personal details.
- **Read:** Displays a list of existing people with their details. Users can view individual profiles.
- **Update:** Allows editing the details of existing people.
- **Delete:** Permanently removes a person profile from the system using soft delete.

### Countries:

- **Create:** Enables adding new country entries with relevant information.
- **Read:** Lists all existing countries along with their details.
- **Update:** Allows modifying the details of existing countries.
- **Delete:** Deletes a country entry from the system permanently using soft delete.

### Bicycles:

- **Create:** Allows the addition of new bicycle records with model, color, and ownership details.
- **Read:** Displays a list of all bicycles stored in the system, including their specifications.
- **Update:** Permits the modification of existing bicycle details.
- **Delete:** Removes a bicycle record from the system permanently using soft delete.

Feel free to explore and utilize the CRUD functionalities provided by the project to manage your data effectively.
