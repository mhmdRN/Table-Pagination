<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table | Pagination</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"       integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="text-center mt-2">
            <h2>Table & Pagination</h2>
        </div>

        <div class="row my-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"><a class="text-decoration-none" href="/">id</a></th>
                    <th scope="col"><a class="text-decoration-none" href="/">company</a></th>
                    <th scope="col"><a class="text-decoration-none" href="/">location</a></th>
                    <th scope="col"><a class="text-decoration-none" href="/">title</a></th>
                    </tr>
                </thead>
                <tbody id="column_values">
    
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul id="paginate" class="pagination justify-content-center">

            </ul>
        </nav>
    </div>
    <script>
        $(document).ready(function(){
           
            $.get("load.php?index="+<?php 
                if(isset($_GET['index']))
                    echo $_GET['index'];
                else echo 0; 
                ?>
                ,function(data,status){
                    $('#column_values').html(data);

                    $.get("page.php",function(data,status){
                        $('#paginate').html(data);
                    });
            });
            
            $("th").click(function(event){
                event.preventDefault();
                $.get(
                    "load.php?index=<?php 
                        if(isset($_GET['index']))
                        echo $_GET['index'];
                        else echo 0; 
                        ?>"+"&sort="+$(this).text(),

                    function(data,status){
                        $('#column_values').html(data);
                    });
            });
           
        });
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>