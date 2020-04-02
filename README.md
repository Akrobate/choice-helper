# Project rewriting in gitlab repository

# Choice Helper

Choice Helper helps you to choose the best option in a dataset.

Tool written in PHP. Api based application.

Front is an AngularJs application


## Quick start

### Configuration
Start by setting your database credentials. Copy the file config/db.sample.php to config/db.php and set the constants with your values

### Building the application

This script will create all databases and instantiate example datasets

```bash
cd server
sh build.sh
```

### Testing the application server

This script will create all databases and instantiate example datasets

```bash
cd server
sh runtests.sh
```

### Running the application

Open your favorite browser and go to the choice-helper AngularJs apllication

http://url-to-your-project/public/app
