@extends('layout.master')
@section('title', 'Front Product Index')
<!-- BEGIN #app -->
@section('content')
    <div id="app" class="app">
        <!-- BEGIN #content -->
        <div id="content container" class="app-content">
            <!-- BEGIN row -->

            <div class="row">
                <div class="col-md-1">
                    <button class="btn fetchtable">
                        <div class="card pt-4">
                            <div class="card-body">
                                <p>select All</p>
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </div>
                    </button>
                    @foreach ($categories as $categories)
                        <button class="btn producOfCategory" onClick="producOfCategory(event)"
                            value="{{ $categories->id }}">
                            <div class="card pt-4">
                                <img src="{{ $categories->icon }}"
                                    style="width: 5rem;height: 5rem;background-size: cover;background-position: center;border-radius: 50%; margin-left:.3rem">
                                {{--  <div style="background-image:url({{ $categories->icon }});"></div>  --}}
                                {{ $categories->name }}
                                <div class="card-arrow">
                                    <div class="card-arrow-top-left"></div>
                                    <div class="card-arrow-top-right"></div>
                                    <div class="card-arrow-bottom-left"></div>
                                    <div class="card-arrow-bottom-right"></div>
                                </div>
                            </div>
                        </button>
                    @endforeach
                </div>
                <div class="col-md-9 ">
                    <div class="row product">
                    </div>
                </div>
            </div>
            <!-- END row -->
            <div class="modal fade modal-pos" id="showDetail" tabindex="-1" role="dialog"
                aria-labelledby="showDetailLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content border-0">
                        <div class="card">
                            <div class="card-body p-0">
                                <a href="#" data-bs-dismiss="modal"
                                    class="btn-close position-absolute top-0 end-0 m-4"></a>
                                <div class="modal-pos-product">
                                    <div class="modal-pos-product-img">
                                        <img class="img-fluid h-100" id="imgProduct" src="">
                                    </div>
                                    <div class="modal-pos-product-info">
                                        <div class="h4 mb-3" id="productNameHeader"></div>
                                        <div class="text-white text-opacity-50 mb-2" id="productNameHeader"></div>
                                        <div class="h4 mb-3" id="productPrice"></div>
                                        <div class="d-flex mb-3">
                                            <button onClick="decrease()" class="btn btn-outline-theme"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="text"
                                                class="form-control d-inline w-50px fw-bold mx-2 bg-white bg-opacity-25 border-0 text-center"
                                                name="qty" value="1" id="quantity">
                                            <button onClick="increase()" class="btn btn-outline-theme"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                        <hr class="mx-n4" />
                                        <div id="option-list" class="option-list ">
                                        </div>
                                        <hr class="mx-n4" />
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="#" class="btn btn-default h4 mb-0 d-block rounded-0 py-3"
                                                    data-bs-dismiss="modal">Cancel</a>
                                            </div>
                                            <div class="col-8">
                                                <a href="#"
                                                    class="btn btn-success d-flex justify-content-center align-items-center rounded-0 py-3 h4 m-0">Add
                                                    to cart <i class="bi bi-plus fa-2x ms-2 my-n3"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{--  <div class="modal-footer">
                                    <button style="width:40%;" type="button" class="btn btn-outline-danger"
                                        data-bs-dismiss="modal">Close</button>
                                    <button style="width:40%;" class="btn btn-outline-success">اضف الي العربه</button>
                                </div>  --}}
                            </div>
                            <div class="card-arrow">
                                <div class="card-arrow-top-left"></div>
                                <div class="card-arrow-top-right"></div>
                                <div class="card-arrow-bottom-left"></div>
                                <div class="card-arrow-bottom-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END #content -->

        <!-- BEGIN btn-scroll-top -->
        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!-- END btn-scroll-top -->
    </div>
    <!-- END #app -->
    <script>
        function increase() {
            var quantity = parseInt(document.getElementById('quantity').value, 10);
            quantity = isNaN(quantity) ? 0 : quantity
            quantity += 1
            document.getElementById('quantity').value = quantity;
        }

        function decrease() {
            var quantity = parseInt(document.getElementById('quantity').value, 10);
            quantity = isNaN(quantity) ? 0 : quantity
            quantity -= 1
            if (quantity >= 1) {
                document.getElementById('quantity').value = quantity;
            } else {
                alert("Quantity Can't Decrease")
            }
        }

        function producOfCategory(event) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "/fetchProduct",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('.product').html("");
                    {{--  var filterProduct  --}}
                    {{--  filterProduct =[]  --}}
                    console.log(event.path)
                    console.log(event.path[3].value)
                    {{--  filterProduct = response.product.filter(item => event.path[2].value = item.category_id)  --}}
                    {{--  console.log(filterProduct)  --}}
                    $.each(response.product, function(key, item) {
                        console.log(item)
                        if (event.path[2].value == item.category_id) {
                            $('.product').append(
                                '<div class="col-md-3">\
                                                                                                                            <button class="btn btnProductDetails"  value="' +
                                item
                                .id +
                                '">\
                                                                                                                                <div class="card pt-4">\
                                                                                                                                    <div class="card-body">\
                                                                                                                                        <img src="' +
                                item
                                .picture +
                                '" class="img-fluid">\
                                                                                                                                    </div>\
                                                                                                                                    <div class="card-body">\
                                                                                                                                        <span>' +
                                item
                                .name +
                                '</span>\
                                                                                                                                    </div>\
                                                                                                                                    <div class="card-arrow">\
                                                                                                                                        <div class="card-arrow-top-left"></div>\
                                                                                                                                        <div class="card-arrow-top-right"></div>\
                                                                                                                                        <div class="card-arrow-bottom-left"></div>\
                                                                                                                                        <div class="card-arrow-bottom-right"></div>\
                                                                                                                                    </div>\
                                                                                                                                </div>\
                                                                                                                            </button>\
                                                                                                                        </div>'
                            );
                        }
                    });
                }
            });
        }
        $(document).on('click', '.btnProductDetails', function(e) {
            e.preventDefault();
            var product_id = $(this).val();
            console.log($(this).val())
            // alert(stud_id);
            $.ajax({
                type: "GET",
                url: "/showDetails/" + product_id,
                success: function(response) {
                    if (response.status == 404) {
                        console.log(response);
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    } else {
                        console.log(response);
                        $('#option-list').text("")
                        $('#imgProduct').attr("src", response.products.picture);
                        $('#showDetailLabel').text(response.products.name);
                        $('#productNameHeader').text(response.products.name);
                        $('#productPrice').text(response.products.price);
                        $.each(response.Option, function(key, item) {
                            $.each(item.option, function(key, itemoption) {
                                console.log(item)
                                console.log(itemoption)
                                if (product_id == itemoption.product_id) {
                                    $('#option-list').append(
                                        '<div class="option">\
                                                                                    <input type="radio" class="option-input" id="' +
                                        itemoption
                                        .name + '" name="option"  value="' +
                                        itemoption.id + '">\
                                                                                    <label  class="option-label" for="' +
                                        itemoption
                                        .name + '" onClick="labelCheck(event)">\
                                                                                        <span class="option-text">' +
                                        itemoption
                                        .name + '</span>\
                                                                                        <span class="option-text">' +
                                        itemoption
                                        .price + '</span>\
                                                                                    </label>\
                                                                </div>');
                                }
                            });
                        });

                        $('#showDetail').modal('show');
                    }
                }
            });
            $('.btn-close').find('input').val('');

        });

        function labelCheck(event) {
            console.log(event.srcElement.parentElement)
            {{--  event.srcElement.parentElement.classList.add("btn-success")  --}}

        }
        $(document).ready(function() {
            fetchtable();
            //fetchtable
            $(document).on('click', '.fetchtable', function(e) {
                fetchtable();
            })

            function fetchtable() {
                $.ajax({
                    type: "GET",
                    url: "/fetchProduct",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $('.product').html("");
                        $.each(response.product, function(key, item) {
                            console.log(item)
                            $('.product').append(
                                '<div class="col-md-3">\
                                                                                                                    <button class="btn btnProductDetails" value="' +
                                item
                                .id +
                                '">\
                                                                                                                        <div class="card pt-4">\
                                                                                                                            <div class="card-body">\
                                                                                                                                    <img src="' +
                                item
                                .picture +
                                '" class="img-fluid">\
                                                                                                                            </div>\
                                                                                                                            <div class="card-body">\
                                                                                                                                <span>' +
                                item
                                .name + '</span>\
                                                                                                                            </div>\
                                                                                                                            <div class="card-arrow">\
                                                                                                                                <div class="card-arrow-top-left"></div>\
                                                                                                                                <div class="card-arrow-top-right"></div>\
                                                                                                                                <div class="card-arrow-bottom-left"></div>\
                                                                                                                                <div class="card-arrow-bottom-right"></div>\
                                                                                                                            </div>\
                                                                                                                    </div>\
                                                                                                                    </button>\
                                                                                                                </div>');
                        });
                    }
                });
            }

            //producOfCategory
        })
    </script>
@endsection
