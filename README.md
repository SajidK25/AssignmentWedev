# AssignmentWedev
<b>Description :</b> API backend for Todo app.

<b>Platform:</b> PHP 7.2, MySQL 8.0 , Composer, Docker

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
        
        6. GET http://localhost/AssignmentWedev/src/api/Task/clear.php
        
<b>Run in Docker :</b>

<p> Just run following command into a terminal from project root directory and use above endpoints accodingly. You must have installed Docker and Docker-compose in your system </p>
        
        docker-compose up -d
