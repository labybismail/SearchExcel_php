<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Input and Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body
    style="width:100%;height:100vh; background-image: url('images/Searchs_005.jpg');background-repeat:no-repeat;background-size:cover;">
    <div class="container-fluid" style="width:100%;height:100%;background-color:rgba(0, 0, 0, 0.68);">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="col-lg-6 col-md-8 col-sm-10 mx-auto">
                    <form>
                        <fieldset>
                            <legend class="mb-3  text-center" style="color:white;">WHAT ARE YOU LOOKING FOR?</legend>
                            <div class="mb-3">
                                <input class="form-control" id="searchInput" autocomplete="off" type="text"
                                    placeholder="Type to search..." />
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
            <div class="col-lg-10 offset-lg-1 scrollable" >
                <style>
                    .scrollable {
                        max-height: 450px;
                        overflow-y: scroll;
                        scrollbar-width: none;
                        /* For Firefox */
                        border-radius:10px ;
                    }

                    .scrollable::-webkit-scrollbar {
                        display: none;
                        /* For Chrome, Safari, and Edge */
                    }
                </style>
                <table class="table table-striped ">
                    <thead style='display:none'>
                        <tr>
                            <th scope="col">Societé</th>
                            <th scope="col">Postulé à</th>
                            <th scope="col">Remarque</th>
                            <th scope="col">Action</th>
                            <!-- <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th> -->
                        </tr>
                    </thead>
                    <tbody id="tableBody" style="max-height:100px;overflow-y:scroll">

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="js/extention/choices.js"></script> -->
    <script src="js/main.js"></script>
</body>

</html>