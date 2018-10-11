var audio = document.querySelector('audio');

function captureMicrophone(callback) {
//    btnReleaseMicrophone.disabled = false;

    if (microphone) {
        callback(microphone);
        return;
    }

    if (typeof navigator.mediaDevices === 'undefined' || !navigator.mediaDevices.getUserMedia) {
        alert('This browser does not supports WebRTC getUserMedia API.');

        if (!!navigator.getUserMedia) {
            alert('This browser seems supporting deprecated getUserMedia API.');
        }
    }

    navigator.mediaDevices.getUserMedia({
        audio: isEdge ? true : {
            echoCancellation: false
        }
    }).then(function (mic) {
        callback(mic);
    }).catch(function (error) {
        alert('Unable to capture your microphone. Please check console logs.');
        console.error(error);
    });
}

function replaceAudio(src) {
    var newAudio = document.createElement('audio');
    newAudio.controls = true;

    if (src) {
        newAudio.src = src;
    }

    var parentNode = audio.parentNode;
    parentNode.innerHTML = '';
    parentNode.appendChild(newAudio);

    audio = newAudio;
}

function stopRecordingCallback() {
    replaceAudio(URL.createObjectURL(recorder.getBlob()));
    var file = new File([recorder.getBlob()], getFileName('ogg'), {
        type: 'audio/ogg'
    });
    document.getElementById('user_audio').setAttribute('src',file);
    //console.log(recorder.getBlob());
//    setTimeout(function () {
//        if (!audio.paused)
//            return;
//
//        setTimeout(function () {
//            if (!audio.paused)
//                return;
//           // audio.play();
//        }, 1000);
//
//       // audio.play();
//    }, 300);

    //audio.play();

    // btnDownloadRecording.disabled = false;

//    if (isSafari) {
//        click(btnReleaseMicrophone);
//    }
}

var isEdge = navigator.userAgent.indexOf('Edge') !== -1 && (!!navigator.msSaveOrOpenBlob || !!navigator.msSaveBlob);
var recorder; // globally accessible
var microphone;

var btnStartRecording = document.getElementById('start-recording');
var btnStopRecording = document.getElementById('stop-recording');
//var btnReleaseMicrophone = document.querySelector('#btn-release-microphone');
var btnDownloadRecording = document.getElementById('save-recording');

btnStartRecording.onclick = function () {
    //this.disabled = true;
//    var id=this.getAttribute('id');
//    if(id==null){
//        return ;
//    }
//    console.log(this.getAttribute('id'));
    this.classList.add('disable');
//    this.removeAttribute('id');
    //this.style.border = '';
    //this.style.fontSize = '';

    if (!microphone) {
        captureMicrophone(function (mic) {
            microphone = mic;
            click(btnStartRecording);
        });
        return;
    }

    replaceAudio();

    audio.muted = true;
    setSrcObject(microphone, audio);
    audio.play();

    var options = {
        type: 'audio',
        numberOfAudioChannels: isEdge ? 1 : 2,
        checkForInactiveTracks: true,
        bufferSize: 16384
    };

    if (navigator.platform && navigator.platform.toString().toLowerCase().indexOf('win') === -1) {
        options.sampleRate = 48000; // or 44100 or remove this line for default
    }

    if (recorder) {
        recorder.destroy();
        recorder = null;
    }

    recorder = RecordRTC(microphone, options);

    recorder.startRecording();

    btnStopRecording.disabled = false;
    btnDownloadRecording.disabled = true;
};

btnStopRecording.onclick = function () {
    var audSec = document.getElementById('audio-sec');
    audSec.setAttribute('style', '');
    //console.log(recorder.getBlob());

    if (microphone) {
        microphone.stop();
        microphone = null;
    }
    if (recorder) {
        // click(btnStopRecording);
    }
    recorder.stopRecording(stopRecordingCallback);
};

//btnReleaseMicrophone.onclick = function () {
//    this.disabled = true;
//    btnStartRecording.disabled = false;
//
//    if (microphone) {
//        microphone.stop();
//        microphone = null;
//    }
//
//    if (recorder) {
//        // click(btnStopRecording);
//    }
//};

btnDownloadRecording.onclick = function () {
    //this.disabled = true;
    if (!recorder || !recorder.getBlob())
        return;
    var blob = recorder.getBlob();
    var file = new File([blob], getFileName('ogg'), {
        type: 'audio/ogg'
    });
    invokeSaveAsDialog(file);
};

function click(el) {
    el.disabled = false; // make sure that element is not disabled
    var evt = document.createEvent('Event');
    evt.initEvent('click', true, true);
    el.dispatchEvent(evt);
}

function getRandomString() {
    if (window.crypto && window.crypto.getRandomValues && navigator.userAgent.indexOf('Safari') === -1) {
        var a = window.crypto.getRandomValues(new Uint32Array(3)),
                token = '';
        for (var i = 0, l = a.length; i < l; i++) {
            token += a[i].toString(36);
        }
        return token;
    } else {
        return (Math.random() * new Date().getTime()).toString(36).replace(/\./g, '');
    }
}

function getFileName(fileExtension) {
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getMonth();
    var date = d.getDate();
    return 'RecordRTC-' + year + month + date + '-' + getRandomString() + '.' + fileExtension;
}

function SaveToDisk(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.download = fileName || 'unknown';
        save.style = 'display:none;opacity:0;color:transparent;';
        (document.body || document.documentElement).appendChild(save);

        if (typeof save.click === 'function') {
            save.click();
        } else {
            save.target = '_blank';
            var event = document.createEvent('Event');
            event.initEvent('click', true, true);
            save.dispatchEvent(event);
        }

        (window.URL || window.webkitURL).revokeObjectURL(save.href);
    }
}