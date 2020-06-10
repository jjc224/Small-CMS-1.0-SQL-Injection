# Small-CMS 1.0 - SQL Injection

<pre>
 ------------------------------------------------------------------------------------------------------------------------------------------------
| Small-CMS 1.0 - SQL Injection                                                                                                      02/10/2012  |
|                                                                                                                                                |
| Author:   Phizo (Joshua Coleman)                                                                                                               |
| Vendor:   http://www.small-cms.com/                                                                                                            |
| Affected: version 1.0                                                                                                                          | 
|                                                                                                                                                | 
| This vulnerability is caused by the misuse of the long-deprecated original PHP MySQL API such that the username and password inputs within the |
| authentication mechanism have not been sufficiently sanitised prior to interpolating these variables into the query string and invoking        |
| mysql_fetch_array(), a function which executes the given query and outputs an array expressing the fetched rows from the specified table.      |
|                                                                                                                                                | 
| This ultimately leads to traditional authentication bypass via MySQL injection and other typical MySQL query based attack vectors.             | 
| Please refer to the provided PHP file for an overview/walk of the function chain to view the issue with appropriate syntax highlighting.       |
 ------------------------------------------------------------------------------------------------------------------------------------------------
</pre>

