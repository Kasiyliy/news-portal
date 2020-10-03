<script src="{{asset('modules/front/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('modules/front/assets/js/popper.min.js')}}"></script>
<script src="{{asset('modules/front/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modules/front/assets/v_impaired/js/js.cookie.min.js')}}"></script>
<script src="{{asset('modules/front/assets/v_impaired/js/bvi-init.min.js')}}"></script>
<script src="{{asset('modules/front/assets/v_impaired/js/bvi.min.js')}}"></script>


<script type="text/javascript" src="{{asset('modules/front/assets/js/main.js')}}"></script>
<script src="{{asset('modules/admin/assets/js/toastr.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"
        integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw=="
        crossorigin="anonymous"></script>
<script>
    toastr.options.closeButton = true;
    @if(session()->has('success'))
    toastr.success("{!! session()->get('success') !!}");
    @endif

    @if(session()->has('info'))
    toastr.info("{!! session()->get('info') !!}");
    @endif

    @if(session()->has('error'))
    toastr.info("{!! session()->get('error') !!}");
    @endif

    @if(session()->has('warning'))
    toastr.info("{!!session()->get('warning') !!}");
    @endif
    tinymce.init({
        selector: 'textarea.description',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

    $(document).ready(function ($) {
        $.bvi({
            'bvi_target': '.bvi-open', // Класс ссылки включения плагина
            "bvi_theme": "white", // Цвет сайта
            "bvi_font": "arial", // Шрифт
            "bvi_font_size": 16, // Размер шрифта
            "bvi_letter_spacing": "normal", // Межбуквенный интервал
            "bvi_line_height": "normal", // Междустрочный интервал
            "bvi_images": true, // Изображения
            "bvi_reload": false, // Перезагрузка страницы при выключении плагина
            "bvi_fixed": false, // Фиксирование панели для слабовидящих вверху страницы
            "bvi_tts": true, // Синтез речи
            "bvi_flash_iframe": true, // Встроенные элементы (видео, карты и тд.)
            "bvi_hide": false // Скрывает панель для слабовидящих и показывает иконку панели.
        });
    });
</script>
