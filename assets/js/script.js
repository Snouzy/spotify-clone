var currentPlaylist = [];
var mouseDown = false;
var audioElement;
function formatTime(s) {
    var time = Math.round(s);
    var minutes = Math.floor(time/60);
    var seconds = time - minutes * 60;
    var extraZro = seconds < 10 ? "0" : "";

    return `${minutes}:${extraZro}${seconds}`;
}

function updateTimeProgressBar(audio) {
    $(".progressTime.current").text(formatTime(audio.currentTime));
    $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime));

    var progress = audio.currentTime / audio.duration * 100;
    $(".playBackBar .progress").css("width", `${progress}%`)
}

function Audio() {
    this.currentPlaying;
    this.audio = document.createElement('audio');

    // Cause des bugs lors du déplacements du cours de la barre
    this.audio.addEventListener("canplay", function(){
        // $(".progressTime.remaining").text(formatTime(this.duration));
    })
    this.audio.addEventListener("timeupdate", function(){
        if(this.duration) {
            updateTimeProgressBar(this);
        }
    })

    this.setTrack = function(track) {
        this.currentPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function() {
        this.audio.play();
    }

    this.pause = function() {
        this.audio.pause();
    }

    this.setTime = function(seconds) {
        this.audio.currentTime = seconds;
    }
}