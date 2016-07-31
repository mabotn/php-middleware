# PHP Middleware
A PHP Middleware for mobile apps developers

This middleware will automatically generate SQL queries and run them depending to the sent request method and data

|Request Method |URL           |Description                                             |
|---------------|--------------|--------------------------------------------------------|
|GET            |/{table}      |Retrieve data from Table                                |
|GET            |/{table}/{id} |Retrieve data with specified id from Table              |
|POST           |/{table}      |Insert new row into specified table                     |
|PUT            |/{table}/{id} |Update existing row of specifid id into specified table |
|DELETE         |/{table}/{id} |Delete row of specified id from specified table         |

All responses are in JSON

# Setup

## database.php (in core directory)

Update lines 3, 4, 5 and 6 to your database connection details (Username, Password, Server and Database)

## index.php (line 40, $Models array)

Put list of existing table in your database

# Questions

Feel free to reach me at anytime (mabo.tn@outlook.com)