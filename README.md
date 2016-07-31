# php-middleware
A PHP Middleware for mobile apps developers

This middleware will automatically generate SQL queries and run them depending to the sent request method and data

| Request Method|URL|Description|
|-|-|-
|GET|/{table}|Retrieve data from Table
|GET|/{table}/{id}|Retrieve data with specified id from Table
|POST|/{table}|Insert new row into specified table
|PUT|/{table}/{id}|Update existing row of specifid id into specified table
|DELETE|/{table}/{id}|Delete row of specified id from specified table