<?php if(isset($_SESSION['error'])) { ?>
                    <p class="error text-danger fs-4"><?php echo $_SESSION['error'];?></p>
                <?php     
                        unset($_SESSION['error']);
                    }  
?>

<?php if(isset($_SESSION['success'])) { ?>
                    <p class="success text-success fs-4"><?php echo $_SESSION['success']; ?></p>
                <?php     
                        unset($_SESSION['success']);
                    }  
?>