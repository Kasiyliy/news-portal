@extends('modules.front.layouts.app-main')
@section('styles')
    <style>

        .prominent__inner a {
            font-size: 14px;
            line-height: 24px;
            color: #00656D;
        }

    </style>
@endsection

@section('content')
    <section class="prominent">
        <div class="container">
            <div class="prominent__inner">
                <h1>100 үздік есім</h1>
                <div class="mt-3 mb-3">
                    <a href="{{route('welcome')}}">← Қайта оралу </a>
                </div>
                <div class="Collage effect-parent" hidden>
                    @foreach($users_photos as $u_photo)
                        <img src="{{$u_photo->avatar_path}}" alt="">
                    @endforeach
                </div>
                <div class="prominent__content row">
                    <div class="col-12 col-md-3 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <label class="form-control-plaintext">Аудан</label>
                                <select class="form-control search" name="area">
                                    <option value="">таңдау</option>
                                    @foreach($areas as $area)
                                        <option
                                            value="{{$area->id}}" {{$selectedArea == $area->id ? 'selected' : ''}}>{{$area->name}}</option>
                                    @endforeach
                                </select>
                                <label class="form-control-plaintext">Бағыты</label>
                                @foreach($directions as $direction)
                                    <div class="form-check">
                                        <input class="form-check-input search" name="directions[]"
                                               type="checkbox" value="{{$direction->id}}"
                                               id="defaultCheck{{$direction->id}}"
                                            {{$selectedDirections ? in_array($direction->id, $selectedDirections) ? 'checked' : '' : ''}}>
                                        <label class="form-check-label" for="defaultCheck{{$direction->id}}">
                                            {{$direction->name}}
                                        </label>
                                    </div>
                                @endforeach
                                <label class="form-control-plaintext">Жынысы</label>
                                <select class="form-control search" name="sex">
                                    <option value="" {{!$selectedSex ? 'selected' : ''}}>таңдау</option>
                                    <option value="2" {{$selectedSex == 2 ? 'selected' : ''}}>Ер</option>
                                    <option value="1" {{$selectedSex == 1 ? 'selected' : ''}}>Әйел</option>
                                </select>
                                <label class="form-control-plaintext">Жасы</label>
                                <div class="input-group">
                                    <input type="number" aria-label="" value="{{$minAge}}"
                                           class="form-control search" name="minAge" placeholder="14">
                                    <input type="number" aria-label="" value="{{$maxAge}}"
                                           class="form-control search" name="maxAge" placeholder="29">
                                </div>
                                <div class="prominent__filter-buttons d-flex justify-content-between mt-4"
                                     aria-label="First group">
                                    <button type="button" class="btn" onclick="reload()">Тастау</button>
                                    <button type="button" class="btn" onclick="search();">Көрсету</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 mt-5 prominent__content__media">
                        @if($users->items())
                            <ul class="list-unstyled">
                                <div class="infinite-scroll">
                                    @foreach($users as $user)
                                        <li class="media prominent__media my-4">
                                            <img src="{{asset($user->avatar_path)}}" class="mr-3"
                                                 alt="...">
                                            <div class="media-body">
                                                <a class="prominent__name"
                                                   href="{{route('prominent.detail', $user->id)}}">
                                                    <h5 class="mt-0 mb-1">{{$user->fullName()}}</h5>
                                                </a>
                                                <h6>Жамбыл облысы, {{$user->area->name}}</h6>
                                                @foreach($user->directions as $direction)
                                                    <p>{{$direction->direction->name}}</p>
                                                @endforeach
                                            </div>
                                            <div class="popover prominent__popover mr-3">
                                                <a data-container="body"
                                                   data-toggle="popover" data-placement="left"
                                                   data-content="
                                            <a class='popover__nav-item' href='{{route('prominent.detail', $user->id)}}'>Өмірбаяны</a></br>
                                            <a class='popover__nav-item' href='{{route('prominent.detail', $user->id)}}'>Атқарған еңбектері</a></br>
                                            <a class='popover__nav-item' href='{{route('prominent.detail', $user->id)}}'>Қосымша ақпараттар</a>">
                                                    <i class="fa fa-ellipsis-h "></i>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                    {{$users->links()}}
                                </div>
                            </ul>
                        @else
                            <div class="text-center">
                                <h7 class="text-center">Бұл сұраныс бойынша үздік есімдер табылған жоқ!</h7>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('modules/front/assets/js/jquery.jscroll.min.js')}}"></script>
    <script>
        $(window).on('load', function () {
            var changed = '{{ $changed }}';
            if (changed === '1') {
                $(window).scrollTop(800);
            }
        });
        $(function () {
            $('[data-toggle="popover"]').popover({html: true})
        });

        $('ul.pagination').hide();
        $(function () {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                padding: 0,
                margin: 0,
                loadingHtml: '<img class="center-block d-block" style="margin-left: auto; margin-right: auto;" ' +
                    'src="{{asset('modules/front/assets/img/loading.gif')}}" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function () {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
    <script type="text/javascript">
        function search() {
            let query = '{{route('prominent')}}';
            var inputs = document.querySelectorAll('.search');
            var count = 0;
            var char = '&';
            var array = [];
            inputs.forEach(e => {
                if (e.value !== '' && e.name !== 'directions[]') {
                    char = '&';
                    if (count == 0) char = '?';
                    query += char + e.name + '=' + e.value;
                    count++;
                }
                if (e.name === 'directions[]') {
                    if (e.checked) {
                        array.push(e.value);
                    }
                }
            });
            if (array.length > 0) {
                char = '&';
                if (count == 0) char = '?';
                query += char + 'directions=' + array;
            }
            window.location.href = query;
        }

        function reload() {
            window.location.href = '{{route('prominent')}}';
        }

        (function ($) {
            $.fn.collagePlus = function (options) {

                return this.each(function () {

                    /*
                     *
                     * set up vars
                     *
                     */

                    // track row width by adding images, padding and css borders etc
                    var row = 0,
                        // collect elements to be re-sized in current row
                        elements = [],
                        // track the number of rows generated
                        rownum = 1,
                        // needed for creating some additional defaults that are actually obtained
                        // from the dom, which maybe doesn't make them defaults ?!
                        $this = $(this);

                    // width of the area the collage will be in
                    $.fn.collagePlus.defaults.albumWidth = $this.width();
                    // padding between the images. Using padding left as we assume padding is even all the way round
                    $.fn.collagePlus.defaults.padding = parseFloat($this.css('padding-left'));
                    // object that contains the images to collage
                    $.fn.collagePlus.defaults.images = $this.children();

                    var settings = $.extend({}, $.fn.collagePlus.defaults, options);

                    settings.images.each(
                        function (index) {

                            /*
                             *
                             * Cache selector
                             * Even if first child is not an image the whole sizing is based on images
                             * so where we take measurements, we take them on the images
                             *
                             */
                            var $this = $(this),
                                $img = ($this.is("img")) ? $this : $(this).find("img");

                            /*
                             *
                             * get the current image size. Get image size in this order
                             *
                             * 1. from <img> tag
                             * 2. from data set from initial calculation
                             * 3. after loading the image and checking it's actual size
                             *
                             */
                            var w = (typeof $img.data("width") != 'undefined') ? $img.data("width") : $img.width(),
                                h = (typeof $img.data("height") != 'undefined') ? $img.data("height") : $img.height();

                            /*
                             *
                             * Get any current additional properties that may affect the width or height
                             * like css borders for example
                             *
                             */
                            var imgParams = getImgProperty($img);

                            /*
                             *
                             * store the original size for resize events
                             *
                             */
                            $img.data("width", w);
                            $img.data("height", h);

                            /*
                             *
                             * calculate the w/h based on target height
                             * this is our ideal size, but later we'll resize to make it fit
                             *
                             */
                            var nw = Math.ceil(w / h * settings.targetHeight),
                                nh = Math.ceil(settings.targetHeight);

                            /*
                             *
                             * Keep track of which images are in our row so far
                             *
                             */
                            elements.push([this, nw, nh, imgParams['w'], imgParams['h']]);

                            /*
                             *
                             * calculate the width of the element including extra properties
                             * like css borders
                             *
                             */
                            row += nw + imgParams['w'] + settings.padding;

                            /*
                             *
                             * if the current row width is wider than the parent container
                             * it's time to make a row out of our images
                             *
                             */
                            if (row > settings.albumWidth && elements.length != 0) {

                                // call the method that calculates the final image sizes
                                // remove one set of padding as it's not needed for the last image in the row
                                resizeRow(elements, (row - settings.padding), settings, rownum);

                                // reset our row
                                delete row;
                                delete elements;
                                row = 0;
                                elements = [];
                                rownum += 1;
                            }

                            /*
                             *
                             * if the images left are not enough to make a row
                             * then we'll force them to make one anyway
                             *
                             */
                            if (settings.images.length - 1 == index && elements.length != 0) {
                                resizeRow(elements, row, settings, rownum);

                                // reset our row
                                delete row;
                                delete elements;
                                row = 0;
                                elements = [];
                                rownum += 1;
                            }
                        }
                    );

                });

                function resizeRow(obj, row, settings, rownum) {

                    /*
                     *
                     * How much bigger is this row than the available space?
                     * At this point we have adjusted the images height to fit our target height
                     * so the image size will already be different from the original.
                     * The resizing we're doing here is to adjust it to the album width.
                     *
                     * We also need to change the album width (basically available space) by
                     * the amount of padding and css borders for the images otherwise
                     * this will skew the result.
                     *
                     * This is because padding and borders remain at a fixed size and we only
                     * need to scale the images.
                     *
                     */
                    var imageExtras = (settings.padding * (obj.length - 1)) + (obj.length * obj[0][3]),
                        albumWidthAdjusted = settings.albumWidth - imageExtras,
                        overPercent = albumWidthAdjusted / (row - imageExtras),
                        // start tracking our width with know values that will make up the total width
                        // like borders and padding
                        trackWidth = imageExtras,
                        // guess whether this is the last row in a set by checking if the width is less
                        // than the parent width.
                        lastRow = (row < settings.albumWidth ? true : false);

                    /*
                     * Resize the images by the above % so that they'll fit in the album space
                     */
                    for (var i = 0; i < obj.length; i++) {

                        var $obj = $(obj[i][0]),
                            fw = Math.floor(obj[i][1] * overPercent),
                            fh = Math.floor(obj[i][2] * overPercent),
                            // if the element is the last in the row,
                            // don't apply right hand padding (this is our flag for later)
                            isNotLast = !!((i < obj.length - 1));

                        /*
                         * Checking if the user wants to not stretch the images of the last row to fit the
                         * parent element size
                         */
                        if (settings.allowPartialLastRow === true && lastRow === true) {
                            fw = obj[i][1];
                            fh = obj[i][2];
                        }

                        /*
                         *
                         * Because we use % to calculate the widths, it's possible that they are
                         * a few pixels out in which case we need to track this and adjust the
                         * last image accordingly
                         *
                         */
                        trackWidth += fw;

                        /*
                         *
                         * here we check if the combined images are exactly the width
                         * of the parent. If not then we add a few pixels on to make
                         * up the difference.
                         *
                         * This will alter the aspect ratio of the image slightly, but
                         * by a noticable amount.
                         *
                         * If the user doesn't want full width last row, we check for that here
                         *
                         */
                        if (!isNotLast && trackWidth < settings.albumWidth) {
                            if (settings.allowPartialLastRow === true && lastRow === true) {
                                fw = fw;
                            } else {
                                fw = fw + (settings.albumWidth - trackWidth);
                            }
                        }

                        fw--;

                        /*
                         *
                         * We'll be doing a few things to the image so here we cache the image selector
                         *
                         *
                         */
                        var $img = ($obj.is("img")) ? $obj : $obj.find("img");

                        /*
                         *
                         * Set the width of the image and parent element
                         * if the resized element is not an image, we apply it to the child image also
                         *
                         * We need to check if it's an image as the css borders are only measured on
                         * images. If the parent is a div, we need make the contained image smaller
                         * to accommodate the css image borders.
                         *
                         */
                        $img.width(fw);
                        if (!$obj.is("img")) {
                            $obj.width(fw + obj[i][3]);
                        }

                        /*
                         *
                         * Set the height of the image
                         * if the resized element is not an image, we apply it to the child image also
                         *
                         */
                        $img.height(fh);
                        if (!$obj.is("img")) {
                            $obj.height(fh + obj[i][4]);
                        }

                        /*
                         *
                         * Apply the css extras like padding
                         *
                         */
                        applyModifications($obj, isNotLast, settings);

                        /*
                         *
                         * Assign the effect to show the image
                         * Default effect is using jquery and not CSS3 to support more browsers
                         * Wait until the image is loaded to do this
                         *
                         */

                        $img
                            .one('load', function (target) {
                                return function () {
                                    if (settings.effect == 'default') {
                                        target.animate({
                                            opacity: '1'
                                        }, {
                                            duration: settings.fadeSpeed
                                        });
                                    } else {
                                        if (settings.direction == 'vertical') {
                                            var sequence = (rownum <= 10 ? rownum : 10);
                                        } else {
                                            var sequence = (i <= 9 ? i + 1 : 10);
                                        }
                                        /* Remove old classes with the "effect-" name */
                                        target.removeClass(function (index, css) {
                                            return (css.match(/\beffect-\S+/g) || []).join(' ');
                                        });
                                        target.addClass(settings.effect);
                                        target.addClass("effect-duration-" + sequence);
                                    }
                                }
                            }($obj))
                            /*
                             * fix for cached or loaded images
                             * For example if images are loaded in a "window.load" call we need to trigger
                             * the load call again
                             */
                            .each(function () {
                                if (this.complete) $(this).trigger('load');
                            });

                    }

                }

                /*
                 *
                 * This private function applies the required css to space the image gallery
                 * It applies it to the parent element so if an image is wrapped in a <div> then
                 * the css is applied to the <div>
                 *
                 */
                function applyModifications($obj, isNotLast, settings) {
                    var css = {
                        // Applying padding to element for the grid gap effect
                        'margin-bottom': settings.padding + "px",
                        'margin-right': (isNotLast) ? settings.padding + "px" : "0px",
                        // Set it to an inline-block by default so that it doesn't break the row
                        'display': settings.display,
                        // Set vertical alignment otherwise you get 4px extra padding
                        'vertical-align': "bottom",
                        // Hide the overflow to hide the caption
                        'overflow': "hidden"
                    };

                    return $obj.css(css);
                }

                /*
                 *
                 * This private function calculates any extras like padding, border associated
                 * with the image that will impact on the width calculations
                 *
                 */
                function getImgProperty(img) {
                    $img = $(img);
                    var params = new Array();
                    params["w"] = (parseFloat($img.css("border-left-width")) + parseFloat($img.css("border-right-width")));
                    params["h"] = (parseFloat($img.css("border-top-width")) + parseFloat($img.css("border-bottom-width")));
                    return params;
                }

            };

            $.fn.collagePlus.defaults = {
                // the ideal height you want your images to be
                'targetHeight': 400,
                // how quickly you want images to fade in once ready can be in ms, "slow" or "fast"
                'fadeSpeed': "fast",
                // how the resized block should be displayed. inline-block by default so that it doesn't break the row
                'display': "inline-block",
                // which effect you want to use for revealing the images (note CSS3 browsers only),
                'effect': 'default',
                // effect delays can either be applied per row to give the impression of descending appearance
                // or horizontally, so more like a flock of birds changing direction
                'direction': 'vertical',
                // Sometimes there is just one image on the last row and it gets blown up to a huge size to fit the
                // parent div width. To stop this behaviour, set this to true
                'allowPartialLastRow': false
            };

        })(jQuery);

        $(window).on('load', function () {
            $('.Collage').attr("hidden", false);

            $('.Collage').collagePlus({
                'targetHeight': 93,
            });
        });
    </script>
@endsection

