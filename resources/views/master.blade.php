<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/solid.css" integrity="sha384-rdyFrfAIC05c5ph7BKz3l5NG5yEottvO/DQ0dCrwD8gzeQDjYBHNr1ucUpQuljos" crossorigin="anonymous">
        <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css"
              href='{!! asset("css/style.css") !!}' title="Default Styles " media="screen">
        <script type="text/javascript" src="{{URL::asset('js/IM.js')}}"></script>
        <title>Facecontrol!</title>
    </head>
    <body>
        {{--////////--}}
        @yield("content")
        {{--////////--}}
        <script>
/*              var nuotrauka = new IM();
                nuotrauka.image('{{'images/domis.jpg'}}');
                nuotrauka.setDebug(true);
                nuotrauka.setAsynchronous(true);
                nuotrauka.setTolerance(5);
                nuotrauka.compare(document.body,
                    [
                        new IM().image('{{'images/domis.jpg'}}', 100, 100),
                        new IM().image('{{'images/domis.jpg'}}', 100, 100),
                        new IM().image('{{'images/domis1.jpg'}}', 100, 100)
                    ],
                    function success(aCanvas, nElapsedTime, nPercentageMatch) {
                        console.log('success');
                    },
                    function fail(oCanvas, nElapsedTime, nPercentageMatch) {
                        console.log('failute');
                    });*/
                IM.setDebug(true);
                new IM.image('{{'images/domis1.jpg'}}', 100, 100);
                IM.compare(document.body,
                    [
                        document.querySelector('#myImg1'),
                        document.querySelector('#myImg2')
                    ],
                    function success(aCanvas, nElapsedTime, nPercentageMatch) {
                        console.log('succss')
                    },
                    function fail(oCanvas, nElapsedTime, nPercentageMatch) {
                        console.log('fail')
                    });
                IM.showDiffInCanvas(document.body);
                IM.setTolerance(90);
                /*Copyright (c) 2011 Tomáas Corral Casas

                Permission is hereby granted, free of charge, to any person obtaining a copy of this software
                and associated documentation files (the "Software"), to deal in the Software without
                restriction, including without limitation the rights to use, copy, modify, merge, publish,
                    distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the
                Software is furnished to do              so, subject to the following conditions:

                    The above copyright notice and this permission notice shall be included in all copies or
                substantial portions of the Software.

                    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING
                BUT NOT LIMITED	TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
                NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE	LIABLE FOR ANY CLAIM,
                    DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF	CONTRACT, TORT OR OTHERWISE, ARISING FROM,
                    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.*/
        </script>
        <script src="{{ URL::asset('js/main.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>