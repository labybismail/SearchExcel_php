<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Input and Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body >
    <div class="container my-4" style="background-image: url('../../icons/cross-inverse.svg');">
        <div class="row">
            <div class="col-12">
                <div class="col-6 mx-auto">
                    <form>
                        <fieldset>
                            <legend class="mb-3">WHAT ARE YOU LOOKING FOR?</legend>
                            <div class="mb-3">
                                <input class="form-control" id="searchInput" type="text"
                                    placeholder="Type to search..." />
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
            <div class="col-12">
                <div>
                    <table class="table table-striped">
                        <thead>
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
                        <tbody id="tableBody">
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/extention/choices.js"></script>
    <script src="js/main.js"></script>
</body>

</html>