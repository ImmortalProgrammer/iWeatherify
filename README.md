# Directory

### Fonts Directory

* Holds all the different fonts that the website uses

### Img Directory

* Holds all the static images related to the project

### Public Directory

* This holds index.html, which is self-evident in its function (main html root)

### Src Directory

* The src directory holds the bulk of the code for the project


* The components folder in the src directory holds the various folders pertaining to webpages and inside those subfolders holds the vue files (html, css, javascript) for that particular page. 


* App.vue is the root of the program, think of it as a main method, but for vue


* data.js holds all the javascript functionality and one needs to integrate with the components in .vue with the proper identifiers 


* main.js gets the app running


* router.js represents every page on the site and how to reach that site, follow the general format of what's in the file and you should be all good!

### Rest of the files

* Don't touch babel.config.js unless necessary


* globals.css is a css file that applies to the entire website


* package.json allows for collaboration as a build tool, lists dependency versions (don't touch unless necessary)


* package-lock.json package-lock.json is "written to when a numerical value in a property such as the "version" property, or a dependency property is changed in package.json."


* README.md is the documentation for this github


* styleguide.css holds the various fonts of the website

* vue.config.js is a config file that allows the website to run property

# Instructions

* Ensure that your repository is on node version 12.22.12 and npm version 6.14.6 before building your project:

### To install npm version 6.14.6 for your repository:
* npm i npm@6.14.6

### To install node version 12.22.12 for your repository:
* npm install node@12.22.12

## Localhost

```
cd package_code
npm install
npm start
```

Open [http://localhost:8080](http://localhost:8080).

## Build for deploying

Note: 
* After building, you can the upload `dist` folder to cheshire using scp.

* If you're trying this on cheshire, make sure you move the files out of the dist folder one directory up, so ../ otherwise it will not work!

```
cd dist
npm install
npm run build
```
