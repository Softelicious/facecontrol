(function () {
        var video = document.getElementById('vid');
        var vendorURL = window.URL || window.webkitURL;
        var checkButton = document.getElementById('button-check');
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        var image = document.getElementById('img-check');
        var input = document.querySelector('#path');

        navigator.getMedia =   (   navigator.getUserMedia
            || navigator.webkitGetUserMedia
            || navigator.mozGetUserMedia
            || navigator.msGetUserMedia);
        navigator.getMedia({
            video: true,
            audio: false
        }, function(stream) {
            video.srcObject=stream;
            video.play();
        }, function (error) {
            alert(error);
        });

        checkButton.addEventListener('click', function () {
            context.drawImage(video, 0, 0);
            image.setAttribute('src', canvas.toDataURL('image/png'));
            input.setAttribute('value', canvas.toDataURL('image/png'));
        });
    }
)();
