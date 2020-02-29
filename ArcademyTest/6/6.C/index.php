<?php include("Include/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome To My Dashboard</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://kit.fontawesome.com/dd436724ff.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand col-1" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav col-10">                                    
                    <input class="form-control mr-sm-12" type="search" placeholder="Search..." aria-label="Search">
                </ul><br>
                <form class="form-inline col-12">                    
                    <button class="btn btn-outline-success my-2 my-sm-0" style="background-color: coral; border: coral; color: white;" type="button" data-toggle="modal" data-target="#modalAdd">Add</button>
                </form>
            </div>
        </nav>
        <div class="container" style="margin-top: 80px;">            
            <table class="table">
                <thead class="thed-table">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cashier</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM transaksi";
                        $query = mysqli_query($db, $sql);
                        while($data = mysqli_fetch_array($query)){
                            echo "<tr>";
                
                            echo "<td>".$data['id']."</td>";
                            echo "<td>".$data['cashier']."</td>";
                            echo "<td>".$data['product']."</td>";
                            echo "<td>".$data['category']."</td>";
                            echo "<td>".$data['price']."</td>";
                
                            echo "<td>";
                            echo "<a href='form-edit.php?id=".$data['id']."'><i class='far fa-edit' style='color: seagreen;'></i></a>&nbsp&nbsp";
                            echo "<a href='hapus.php?id=".$data['id']."'><i class='fas fa-trash-alt' style='color: #e60000;'></i></a>";
                            echo "</td>";
                
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>        
        </div>
        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content"> 
                    <div class="modal-header">
                        <h5 class="modal-title">Add</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: coral;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                    <form action="include/addTrans.php" method="POST">
                        <div class="modal-body">            
                            <div class="form-group">
                                <select class="form-control" name="category">
                                <?php
                                $sql = "SELECT * FROM category";
                                $query = mysqli_query($db, $sql);
                                    while($data = mysqli_fetch_array($query)){                                                                                                
                                            echo '<option>'.$data['name'].'</option>';                                        
                                        }
                                    ?>            
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="cashier">
                                <?php
                                $sql = "SELECT * FROM cashier";
                                $query = mysqli_query($db, $sql);
                                    while($data = mysqli_fetch_array($query)){                                                                                                
                                            echo '<option>'.$data['name'].'</option>';                                        
                                        }
                                    ?>            
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="product" placeholder="Nama Product">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="price" placeholder="Price">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-success my-2 my-sm-0" style="background-color: coral; border: coral; color: white;" type="submit" name="submit">Add</button>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content"> 
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: coral;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>                   
                    <div class="modal-body">                        
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-success my-2 my-sm-0" style="background-color: coral; border: coral; color: white;" type="submit">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">                     
                    <div class="modal-body">   
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: coral;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <label class="label-delete-user" for="Delete" style="margin-left: 40%;"><b>Data User <span style="color: orange;">#1</span></b></label><br>                     
                        <i class="far fa-check-circle fa-7x" style="margin-left: 38%; color: rgb(16, 173, 16); margin: 20px 50px 10px 38%;"></i>
                        <label class="label-delete-user" for="Delete" style="margin-left: 36%;"><b>Berhasil Dihapus</b></label>
                    </div>                    
                </div>
            </div>
        </div>
    </body>
</html>