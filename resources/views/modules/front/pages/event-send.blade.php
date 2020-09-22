
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
        <form action="{{route('user.send.event')}}" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="inputAddress">Іс-шараның аты*</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="" name = "title">
            </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Басталу уақытысы*</label>
                                <input class="form-control" type="date" value="" id="start-date-input">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Аяқталу уақытысы*</label>
                                <input class="form-control" type="date" value="" id="end-date-input">
                            </div>
                        </div>
            <div class="form-group">
                <label for="inputAddress2">Ұйымдастырушы*</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Ұйымдастыратын жері</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Т.А.Ә*</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Телефон</label>
                    <input class="form-control" type="tel" value="+7(7__) ___ ____" id="example-tel-input">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">E-mail</label>
                    <input type="email" class="form-control" id="inputEmail3" >
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Сайт</label>
                    <input type="text" class="form-control" id="inputHtml" placeholder="http://www.">

                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Қосымша ақпарат</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" cols="200" rows="8" ></textarea>
                </div>

                <div class="form-group col-md-6">
                    <input id="file-input" type="file" name ="image_path[]" multiple>
                    <div id="preview"></div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Жіберу</button>
        </form>

    </div>


</section>
@endsection

@section('scripts')
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

@endsection
