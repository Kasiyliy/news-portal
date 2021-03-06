
@extends('modules.front.layouts.app-main')

@section('styles')
<link rel="stylesheet" href="{{asset('modules/front/assets/css/swiper.min.css')}}">
    <style>

        .btn-primary {
            color: #050606;
            border-color: #F8A555;
            background: #F8A555;
            border-radius: 5px;
        }
        .btn-primary:hover{
            border-color: #F8A555;
            background: #F8A555;
        }

        form .files{
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -250px;
            width: 500px;
            height: 200px;
            border: 4px dashed #fff;
        }
        form .files p{
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 170px;
            color: #ffffff;
            font-family: Arial;
        }
        form .files input{
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            outline: none;
            opacity: 0;
        }
        form .files button{
            margin: 0;
            color: #fff;
            background: #16a085;
            border: none;
            width: 508px;
            height: 35px;
            margin-top: -20px;
            margin-left: -4px;
            border-radius: 4px;
            border-bottom: 4px solid #117A60;
            transition: all .2s ease;
            outline: none;
        }
        form .files button:hover{
            background: #149174;
            color: #0C5645;
        }
        form .files button:active{
            border:0;
        }
        .custom-file-input:lang(en)~.custom-file-label::after {
            content:'Жүктеу'
        }
        .custom-file-input{
            cursor: pointer;
        }
        span{
            color: red;
        }

    </style>
@endsection
@section('content')
<section class="news__detail">
    <div class="container">
        <div class="news__detail__inner">
            <h1>Іс-шара</h1>
            <div class="mt-3 mb-3">
                <a href="{{route('welcome')}}">← Қайта оралу </a>
            </div>
        </div>
    </div>
</section>
<section class="about">
    <div class="container">

        <form action="{{route('user.send.event')}}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            {{csrf_field()}}
            <div class="form-group">
                <label for="inputAddress">Іс-шараның аты <span>*</span></label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Іс-шараның аты" value="{{old('title')}}" name="title" required >
            </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Уақыты <span>*</span></label>
                                <input class="form-control" type="date" id="start-date-input" value="{{old('date')}}" name = "date" required>
                            </div>

                        </div>
            <div class="form-group">
                <label for="inputAddress2">Ұйымдастырушы <span>*</span></label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Ұйымдастырушы" value="{{old('representative')}}" name = "representative" required>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Ұйымдастыратын жері</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Ұйымдастыратын жері" value="{{old('place')}}" name = "place" >
            </div>
            <div class="form-group">
                <label for="inputAddress2">Т.А.Ә <span>*</span></label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Т.А.Ә" value="{{old('fio')}}" name = "fio" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Телефон <span>*</span></label>
                    <input class="form-control" type="tel" id="phone" name = "phone"  value="{{old('phone')}}" required placeholder="+7(777) 777-7777" >
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">E-mail <span>*</span></label>
                    <input type="email" class="form-control" placeholder="E-mail" id="inputEmail3" value="{{old('email')}}" name = "email" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Сайт</label>
                    <input type="text" class="form-control" id="inputHtml" placeholder="www.jastar.kz" value="{{old('website')}}" name = "website" >

                </div>
                <div class="form-group col-md-12">
                    <label for="exampleFormControlTextarea1">Қосымша ақпарат <span>*</span></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" cols="200" placeholder="Қосымша ақпарат" rows="8" value="{{old('description')}}" name = "description" required></textarea>
                </div>

                <div class="form-group col-md-12">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Суреттерді таңдаңыз</span>
                        </div>
                        <div class="custom-file">
                            <input id="file-input" type="file" class="custom-file-input" value="{{old('images[]')}}" name = "images[]" accept="image/*" multiple >
                            <label class="custom-file-label" for="inputGroupFile04">Таңдау</label>
                        </div>
                    </div>
                    <div id="preview" class="mt-4"></div></div>

            </div>
            <button type="submit" class="btn btn-primary mb-5 pr-5 pl-5">Жіберу</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


</section>
@endsection

@section('scripts')

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        function previewImages() {

            var preview = document.querySelector('#preview');

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {

                // Make sure `file.name` matches our extensions criteria
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                } // else...

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.title  = file.name;
                    image.src    = this.result;
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);

            }

        }

        document.querySelector('#file-input').addEventListener("change", previewImages);
    </script>

    <script>

        $(function(){

            $("#phone").mask("+7(999) 999-9999");
            $("#phone").pattern("^(\\([0-9]{3}\\)|[0-9]{3}-)[0-9]{3}-[0-9]{4}$\n");
        });
    </script>

@endsection
