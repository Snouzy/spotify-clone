<?php

    $songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");
    $result = [];

    while($row = mysqli_fetch_array($songQuery)) {
        $result[] = $row['id'];
    }

    $jsonArray = json_encode($result);

?>

<script>
    $(document).ready(function(){
        currentPlaylist = <?php echo $jsonArray; ?>;
        audioElement = new Audio();
        console.log('Here is the variable <currentPlaylist> :', currentPlaylist);
        setTrack(currentPlaylist[0], currentPlaylist, false)

        $(".playbackBar .progressBar").mousedown(function(){
            mouseDown = true;
        })
        $(".playbackBar .progressBar").mousemove(function(e){
            if(mouseDown) {
                //set time of song depending on position of the mousedown
                timeFromOffset(e, this, audioElement);
            }
        })
        $(".playbackBar .progressBar").mouseup(function(e){
            timeFromOffset(e, this, audioElement);
        })

        $(document).mouseup(function(){
            mouseDown = false;
        })
    });

    function timeFromOffset(mouse, progressBar, audioElement) {
        console.log('Here is the variable <audioElement> :', audioElement);
        var percentage = mouse.offsetX / $(progressBar).width() * 100; //percentage of the click
        console.log('percentage:', percentage)
        var seconds = audioElement.audio.duration * (percentage / 100);
        console.log('seconds:', seconds)
        audioElement.setTime(seconds);
    }

    function setTrack(trackId, newPlaylist, play) {

        $.post("includes/handlers/ajax/getSongjson.php", {songId: trackId}, function(data) {
            var track = JSON.parse(data);
            $(".trackName span").text(track.title);

            $.post("includes/handlers/ajax/getArtistjson.php", {artistId: track.artist}, function(data) {
                var artist = JSON.parse(data);
                $(".artistName span").text(artist.name);
            });
            $.post("includes/handlers/ajax/getAlbumjson.php", {albumId: track.album}, function(data) {
                var album = JSON.parse(data);
                $(".albumLink img").attr('src', album["artwork-path"]);
            });
            
            audioElement.setTrack(track);
        });
        if(play) audioElement.play();

    };

    function play() {
        if(audioElement.audio.currentTime == 0) {
            $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentPlaying.id });
        }
        $(".controlButton.play").hide();
        $(".controlButton.pause").show();
        audioElement.play();
    }
    function pause() {
        $(".controlButton.play").show();
        $(".controlButton.pause").hide();
        audioElement.pause();
    }
</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">

        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img class="albumArtwork">
                </span>

                <div class="trackInfo">
                    <span class="trackName">
                        <span>Happy Birthday</span>
                    </span>

                    <span class="artistName">
                        <span>Reece Kenney</span>
                    </span>

                </div>
            </div>
        </div>

        <div id="nowPlayingCenter">

            <div class="content playerControls">
                <div class="buttons">

                    <button class="controlButton shuffle" title="Shuffle button">
                        <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                    </button>

                    <button class="controlButton previous" title="Previous button">
                        <img src="assets/images/icons/previous.png" alt="Previous">
                    </button>

                    <button class="controlButton play" title="Play button" onclick="play()">
                        <img src="assets/images/icons/play.png" alt="Play">
                    </button>

                    <button class="controlButton pause" title="Pause button" onclick="pause()" style="display: none;">
                        <img src="assets/images/icons/pause.png" alt="Pause">
                    </button>

                    <button class="controlButton next" title="Next button">
                        <img src="assets/images/icons/next.png" alt="Next">
                    </button>

                    <button class="controlButton repeat" title="Repeat button">
                        <img src="assets/images/icons/repeat.png" alt="Repeat">
                    </button>

                </div>

                <div class="playbackBar">

                    <span class="progressTime current">0:00</span>

                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>

                    <span class="progressTime remaining">0:00</span>

                </div>
            </div>
        </div>

        <div id="nowPlayingRight">
            <div class="volumeBar">

                <button class="controlButton volume" title="Volume button">
                    <img src="assets/images/icons/volume.png" alt="Volume">
                </button>

                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>