
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                    </li>
                                @endforeach
                                {{--                        @foreach(الخاصة بالباكج)                  --}}
                                {{--                    <ul>--}}
                                {{--                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
                                {{--                            <li>--}}
                                {{--                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
                                {{--                                    {{ $properties['native'] }}--}}
                                {{--                                </a>--}}
                                {{--                            </li>--}}
                                {{--                        @endforeach--}}
                                {{--                    </ul>--}}

                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="flex-center position-ref full-height">
                    <div class="content">
                        <div class="title m-b-md">
                            Add your offer
                        </div>
                        @if(Session::has('success'))
                        <div class="alert alert-primary" role="alert">
                            تم اضافة العرض بنجاح
                        </div>
                        @endif
                        <form method="POST" action="{{route('offers.store')}}">
        {{--                    @csrf == <input name="_token" value="{{csrf_token()}}"--}}
                            @csrf

                            <div class="mb-3">
                                <label for="inputName" class="form-label">Offer Name</label>
                                <input type="text" name="name"  class="form-control" id="inputName" aria-describedby="nameHelp">
                                @error('name')
                                <div id="nameHelp" class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputPrice" class="form-label">Offer Price</label>
                                <input type="text" name="price"  class="form-control" id="inputPrice" aria-describedby="priceHelp">
                                 @error('price')
                                <div id="priceHelp" class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputDetails" class="form-label">Offer Details</label>
                                <input type="text" name="details"  class="form-control" id="inputDetails" aria-describedby="detailsHelp">
                                 @error('details')
                                <div id="detailsHelp" class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save Offer</button>
                        </form>
                    </div>
                </div>
    </body>
</html>
