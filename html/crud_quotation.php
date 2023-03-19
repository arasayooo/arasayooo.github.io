<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Quotation</title>
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php

                    if(isset($_SESSION['status'])) {
                        ?>
                            <h4 class="alert alert-success"><?php echo $_SESSION['status']; ?></h4>
                        <?php
                        unset($_SESSION['status']);
                    }

                ?>

                <div class="card-mt-4">
                    <div class="card-header">
                        <h2>Create Quotation
                            <a href="javascript:void(0)" class="add-item float-end btn btn-primary">Add Item</a>
                        </h2>
                    </div>
                        <div class="card-body">

                            <form action="create_process.php" method="post">
                                
                                <div class="main-form mt-3 border-bottom">
                                    <div class="row">

                                        <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <label for="">Quotation No</label>
                                                <input type="text" name="q_no" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label for="">Item Name</label>
                                                <input type="text" name="name[]" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <div class="form-group mb-2">
                                                <label for="">Quantity</label>
                                                <input type="text" name="qty[]" id="qty" class="form-control"required>
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <div class="form-group mb-2">
                                                <label for="">Price (RM)</label>
                                                <input type="text" name="unitprice[]"  id="unitprice" class="form-control"required>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group mb-2">
                                                <label for="">Amount (RM)</label><br/>
                                                <!-- <input type="text" name="unitprice[]"  id="amount" class="form-control"readonly> -->
                                                <span id="amount" class="form-control"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="paste-new-forms"></div>

                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                            </form>

                        </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> -->
    
    

    
    <!-- <script type="text/javascript" src="jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#qty, #unitprice").keyup(function() {
                // alert("hi");
                var amount = 0;
                var x = number($("#unitprice").val());
                var y = number($("#qty").val());
                var amount = x * y;

                $("#amount").val(amount);
            });
        });
    </script> -->

<!-- sum of price -->
    <!-- <script type="text/javascript">
        $(function() {
            $('.enter').mask("#,###.##",{reverse:true});
            var amount = function() {
                var sum = 0;
                $('.enter').each(function() {
                    var num = $(this).val().replace(',','');

                    if (num !=0 ) {
                        sum += parseFloat(num);
                    }

                });

                $('#amount').val(sum.toFixed(2));
            }

            $('.enter').keyup(function() {
                amount();
            });
        });

    </script> -->


    <script>
        $(document).ready(function() {
            

            $(document).on('click', '.remove-btn' ,function() {
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.add-item', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                    <div class="row">\
                                    <div class="col-md-4">\
                                            <div class="form-group mb-2">\
                                                <label for="">Item Name</label>\
                                                <input type="text" name="name[]" class="form-control" required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-1">\
                                            <div class="form-group mb-2">\
                                                <label for="">Quantity</label>\
                                                <input type="text" name="qty[]" id="qty" class="form-control"required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-1">\
                                            <div class="form-group mb-2">\
                                                <label for="">Price (RM)</label>\
                                                <input type="text" name="unitprice[]"  id="unitprice" class="form-control"required>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-2">\
                                            <div class="form-group mb-2">\
                                                <label for="">Amount (RM)</label><br/>\
                                                <span id="amount" class="form-control"></span>\
                                            </div>\
                                        </div>\
                                        <div class="col-md-4">\
                                            <div class="form-group mb-2">\
                                                <br>\
                                                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>');
            });

        });

    </script>

<script>
        var multiply = function() {
            var val1 = parseFloat($('#qty').val())
            var val2 = parseFloat($('#unitprice').val())

            val3 = val1*val2
            $("#amount").html(val3)
        }

        $("#qty").keyup(function() { multiply(); });
        $("#unitprice").keyup(function() { multiply(); });

    </script>
    
</body>
</html>