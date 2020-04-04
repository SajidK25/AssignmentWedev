# AssignmentWedev
<b>Description :</b> API backend for Todo app.

<b>Platform:</b> PHP 7.2, MySQL 8.0 , Docker

<b>API Endpoint:</b>

        1. GET http://localhost/AssignmentWedev/src/api/Task/read.php
        
        2. POST http://localhost/AssignmentWedev/src/api/Task/create.php
        
                Data:
                    {
                      "Task_name":"Task"
                    }
                    
        3. PUT http://localhost/AssignmentWedev/src/api/Task/update.php
        
                Data:
                    {
                      "id":1,
                      "Task_name":"Task to update",
                      "Status":"active"
                    }
                    
        4. DELETE http://localhost/AssignmentWedev/src/api/Task/delete.php
        
                Data:
                    {
                      "id":10
                    }
                    
        5. GET http://localhost/AssignmentWedev/src/api/Task/searchByStatus.php?status=active
        
<b>Run in Docker :</b>

<p> Just run following command in terminal from project root directory and use above endpoints accodingly. You must have installed Docekr and Docker-compose in your system </p>
        
        docker-compose up -d
