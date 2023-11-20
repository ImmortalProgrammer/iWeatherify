# Directory

### backend Directory
* It is very important that you have the database set up correctly (as mentioned in Instructions)

* When you have the 'dist' folder created after using vue to compile the project, it's important to have the backend folder with all the .php files in the same directory.

### img Directory

* Holds all the static images related to the project

### public Directory

* This holds index.html, which is self-evident in its function (main html root)

### src Directory

* The src directory holds the bulk of the code for the project

* The NavBar Folder holds navbar.vue, which is the main navigation for logged in users

* The components folder in the src directory holds the various folders pertaining to webpages and inside those subfolders holds the vue files (html, css, javascript) for that particular page.

* App.vue is the root of the program, think of it as a main method, but for vue


* data.js holds javascript functionality that connects components together


* main.js gets the app running


* router.js represents every page on the site and how to reach that site, follow the general format of what's in the file and you should be all good!

### uploads Directory
* The uploads folder is a must have for the outfits recommendations system to work appropriately, ensure it is in the root folder where you upload the dist after compiling the project

* Ensure it's initally empty
  
### Rest of the files

* Don't touch babel.config.js unless necessary ||| Backwards Version Compatability

* globals.css is a css file that applies to the entire website

* package.json allows for collaboration as a build tool, lists dependency versions (don't touch unless necessary)

* package-lock.json package-lock.json is "written to when a numerical value in a property such as the "version" property, or a dependency property is changed in package.json."

* README.md is the documentation for this github

* .gitignore prevents the files you want from displaying from your local machine to this remote repository

* styleguide.css holds the various fonts of the website

* vue.config.js is a config file that allows the website to run property

* the .env file should be updated with the appropriate info. Example for: VUE_APP_WEB_DOMAIN=https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a

# Instructions

* Ensure that your repository is on node version 12.22.12 and npm version 6.14.6 before building your project:

* For the database, preferably use mySQL. Here's a link to a clone of the empty database with everything you need for the website: https://file.io/XNB4dc6vhqGP

* For the backend/security.php file. In the "$allowed_origins" array data structure, make sure you add the website where you're hosting this project.

* Ensure you have an empty uploads folder in the directory of which you put the deployed website 

* Do the same as above, just for the backend directory. 

* Make sure you fill in the environmental variables in .env. I left some comments as guidance

* You will need an API key from openweathermap.org to get the weather data. You will need the PRO edition API key.



### To install npm version 6.14.6 for your repository:
* npm i npm@6.14.6

### To install node version 12.22.12 for your repository:
* npm install node@12.22.12

### To install axios 
* npm install axios@1.3.4

## Localhost

```
npm install
npm start
```

Open [http://localhost:8080](http://localhost:8080).


## Build for deploying

Note: 
* After building, you can the upload `dist` folder to the appropriate location

* Make sure you have the backend folder with all the php files in the directory where you put the dist folder

* Also, make sure you have an empty uploads folder with the appropriate permissions to allow for the website to put images into these folders

* Ensure you filled out the .env file correctly and put it in the right directory. Additionally, for the API key ensure you use openweathermap.org and get the PRO edition.


```
cd dist
npm install
npm run build
```
