<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Surplus CRUD</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Links -->
    <link href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('css/jquery.dataTables.min.css') }} rel="stylesheet">
    <link href={{ asset('css/dataTables.bootstrap4.min.css') }} rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Surplus Test</a>
        </nav>

        <div class="content container my-5">
            <button id="add" class="btn btn-success btn-block my-3">Add New</button>
            <table class="table display responsive" id="FoodTable">
                <thead class="thead-dark text-center">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Restaurant</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
            </table>
        </div>
    </div>
    <script src={{asset('js/jquery-3.4.1.min.js')}} ></script>
    <script src={{asset('js/bootstrap.min.js')}} ></script>
    <script src={{asset('js/jquery.dataTables.min.js')}} ></script>
    <script src={{asset('js/dataTables.bootstrap4.min.js')}} ></script>
    <script src={{asset('js/ajax.js')}}></script>
    <script>
        $(function(){
            var FoodTable = $('#FoodTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('food.index') }}"
                },
                responsive: true,
                pageLength: 25,
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'restaurant', name: 'restaurant'},
                    {data: 'price', name: 'price'},
                    {data: 'discount', name: 'discount'},
                    {data: 'option', name: 'option', orderable: false}
                ]
            })

            $('#add').click(function(){
                $('#create-modal').modal('show');
            })

            $('#create').click(function(){
                ajaxPost("{{ route('food.store') }}", $('#form_food_create').serialize()).done(function(response){
                    console.log(response);
                    FoodTable.ajax.reload();
                    $('#create-modal').modal('hide');
                })
            });

            $(document).on('click', '.edit', function(e){
                e.preventDefault();
                var url = '{{ route('food.edit', ':id') }}';
                url = url.replace(':id', $(this).attr('id'));
                $('#id').val($(this).attr('id'));
                ajaxGet(url).done(function(response){
                    $('#name').val(response.data.name);
                    $('#restaurant').val(response.data.restaurant);
                    $('#price').val(response.data.price);
                    $('#discount').val(response.data.discount);
                    $('#is_active').val(response.data.is_active);
                    $('#edit-modal').modal('show');
                });
            });

            $('#update').click(function(e){
                e.preventDefault();
                var url = '{{ route('food.update', ':id') }}';
                url = url.replace(':id', $('#id').val());
                ajaxPost(url, $('#form_food_update').serialize(), 'PATCH').done(function(response){
                    FoodTable.ajax.reload();
                    $('#edit-modal').modal('hide');
                });
            });

            $(document).on('click', '.delete', function(e){
                $('#id').val($(this).attr('id'));
                $('#delete-modal').modal('show');
            });

            $('#delete').click(function(e){
                e.preventDefault();
                var url = '{{ route('food.destroy', ':id') }}';
                url = url.replace(':id', $('#id').val());
                ajaxPost(url, $('#form_food_delete').serialize(), 'DELETE').done(function(){
                    FoodTable.ajax.reload();
                    $('#delete-modal').modal('hide');
                });
            });

        })
    </script>

    @include('components.create-modal')
    @include('components.update-modal')
    @include('components.delete-modal')

</body>

</html>